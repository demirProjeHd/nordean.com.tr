<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Setting;

return new class extends Migration
{
    public function up()
    {
        // Add mail driver settings
        Setting::updateOrCreate(
            ['key' => 'mail_driver'],
            [
                'value' => 'smtp',
                'group' => 'mail',
                'type' => 'select',
                'label' => 'Mail Driver'
            ]
        );

        Setting::updateOrCreate(
            ['key' => 'brevo_api_key'],
            [
                'value' => '',
                'group' => 'mail',
                'type' => 'password',
                'label' => 'Brevo API Key'
            ]
        );
    }

    public function down()
    {
        Setting::whereIn('key', ['mail_driver', 'brevo_api_key'])->delete();
    }
};
