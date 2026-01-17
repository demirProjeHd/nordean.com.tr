<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class MailSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mailSettings = [
            [
                'key' => 'mail_host',
                'value' => 'smtp.gmail.com',
                'type' => 'text',
                'group' => 'mail',
            ],
            [
                'key' => 'mail_port',
                'value' => '587',
                'type' => 'text',
                'group' => 'mail',
            ],
            [
                'key' => 'mail_username',
                'value' => 'info@nordean.com.tr',
                'type' => 'text',
                'group' => 'mail',
            ],
            [
                'key' => 'mail_password',
                'value' => '',
                'type' => 'password',
                'group' => 'mail',
            ],
            [
                'key' => 'mail_encryption',
                'value' => 'tls',
                'type' => 'select',
                'group' => 'mail',
            ],
            [
                'key' => 'mail_from_address',
                'value' => 'info@nordean.com.tr',
                'type' => 'text',
                'group' => 'mail',
            ],
            [
                'key' => 'mail_from_name',
                'value' => 'Nordean - Isolgomma Turkey',
                'type' => 'text',
                'group' => 'mail',
            ],
        ];

        foreach ($mailSettings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
