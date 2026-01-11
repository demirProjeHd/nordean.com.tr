<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Setting;
use App\Models\SocialMedia;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Share settings and social media with all views
        View::composer('*', function ($view) {
            try {
                $siteSettings = Setting::all()->pluck('value', 'key');
                $socialMedia = SocialMedia::active()->ordered()->get();
                
                $view->with('siteSettings', $siteSettings);
                $view->with('socialMedia', $socialMedia);
            } catch (\Exception $e) {
                // Database might not be migrated yet
                $view->with('siteSettings', collect());
                $view->with('socialMedia', collect());
            }
        });

        // Configure mail settings from database
        try {
            $smtpSettings = Setting::where('group', 'smtp')->pluck('value', 'key');
            
            if ($smtpSettings->count() > 0) {
                config([
                    'mail.default' => 'smtp',
                    'mail.mailers.smtp.host' => $smtpSettings['smtp_host'] ?? env('MAIL_HOST', 'smtp-relay.brevo.com'),
                    'mail.mailers.smtp.port' => $smtpSettings['smtp_port'] ?? env('MAIL_PORT', 587),
                    'mail.mailers.smtp.username' => $smtpSettings['smtp_username'] ?? env('MAIL_USERNAME'),
                    'mail.mailers.smtp.password' => $smtpSettings['smtp_password'] ?? env('MAIL_PASSWORD'),
                    'mail.mailers.smtp.encryption' => $smtpSettings['smtp_encryption'] ?? env('MAIL_ENCRYPTION', 'tls'),
                    'mail.from.address' => $smtpSettings['mail_from_address'] ?? env('MAIL_FROM_ADDRESS'),
                    'mail.from.name' => $smtpSettings['mail_from_name'] ?? env('MAIL_FROM_NAME', 'Comland Ltd.'),
                ]);
            }
        } catch (\Exception $e) {
            // Database might not be migrated yet
        }
    }
}
