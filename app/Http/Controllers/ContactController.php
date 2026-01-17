<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Config;
use App\Models\ContactMessage;
use App\Models\Setting;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    /**
     * Configure mail settings from database
     */
    private function configureMailSettings()
    {
        $mailHost = Setting::get('mail_host', config('mail.mailers.smtp.host'));
        $mailPort = Setting::get('mail_port', config('mail.mailers.smtp.port'));
        $mailUsername = Setting::get('mail_username', config('mail.mailers.smtp.username'));
        $mailPassword = Setting::get('mail_password', config('mail.mailers.smtp.password'));
        $mailEncryption = Setting::get('mail_encryption', config('mail.mailers.smtp.encryption'));
        $mailFromAddress = Setting::get('mail_from_address', config('mail.from.address'));
        $mailFromName = Setting::get('mail_from_name', config('mail.from.name'));

        // Update mail configuration at runtime
        Config::set('mail.mailers.smtp.host', $mailHost);
        Config::set('mail.mailers.smtp.port', $mailPort);
        // Set username/password to null if empty (for SMTP relay without auth)
        Config::set('mail.mailers.smtp.username', empty($mailUsername) ? null : $mailUsername);
        Config::set('mail.mailers.smtp.password', empty($mailPassword) ? null : $mailPassword);
        Config::set('mail.mailers.smtp.encryption', $mailEncryption);
        Config::set('mail.from.address', $mailFromAddress);
        Config::set('mail.from.name', $mailFromName);

        // Reinitialize mail manager to use new config
        app('mail.manager')->forgetMailers();
    }

    /**
     * Handle contact form submission
     */
    public function send(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|in:quote,technical,sample,other',
            'message' => 'required|string|max:2000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => __('messages.contact.validation_error'),
                'errors' => $validator->errors()
            ], 422);
        }

        $data = $validator->validated();

        // Get subject translation
        $subjectKey = 'messages.contact.subjects.' . $data['subject'];
        $subjectTranslation = __($subjectKey);

        // Configure mail settings from database
        $this->configureMailSettings();

        try {
            // Save to database
            $contactMessage = ContactMessage::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'] ?? null,
                'subject' => $data['subject'],
                'message' => $data['message'],
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            // Send email to admin
            Mail::to(config('mail.from.address'))
                ->send(new ContactFormMail($data, $subjectTranslation));

            // Log the contact form submission
            Log::info('Contact form submission', [
                'id' => $contactMessage->id,
                'name' => $data['name'],
                'email' => $data['email'],
                'subject' => $subjectTranslation
            ]);

            return response()->json([
                'success' => true,
                'message' => __('messages.contact.success_response')
            ]);

        } catch (\Exception $e) {
            Log::error('Contact form error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => __('messages.contact.error_response')
            ], 500);
        }
    }
}
