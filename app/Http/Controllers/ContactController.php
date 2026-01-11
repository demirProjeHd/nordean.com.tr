<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
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

        try {
            // Log the contact form submission
            Log::info('Contact form submission', [
                'name' => $data['name'],
                'email' => $data['email'],
                'subject' => $subjectTranslation
            ]);

            // Here you would typically send an email
            // For now, we'll just return success
            // Mail::send(...);

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
