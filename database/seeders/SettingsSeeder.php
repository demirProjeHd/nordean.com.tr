<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // General Settings
        Setting::updateOrCreate(
            ['key' => 'company_name'],
            ['value' => 'Nordean', 'group' => 'general']
        );

        Setting::updateOrCreate(
            ['key' => 'company_name_full'],
            ['value' => 'Nordean Mühendislik', 'group' => 'general']
        );

        Setting::updateOrCreate(
            ['key' => 'tagline_tr'],
            ['value' => 'İtalyan Isolgomma\'nın Türkiye\'deki tek yetkili distribütörü', 'group' => 'general']
        );

        Setting::updateOrCreate(
            ['key' => 'tagline_en'],
            ['value' => 'Exclusive distributor of Italian Isolgomma in Turkey', 'group' => 'general']
        );

        // Contact Information - Address
        Setting::updateOrCreate(
            ['key' => 'address_tr'],
            ['value' => 'Yeşilkent Mah. Ardıçlı Manolya Cad. Ardıçlı Göl Evleri No:28/6 İç Kapı No:1, Avcılar, İstanbul', 'group' => 'contact']
        );

        Setting::updateOrCreate(
            ['key' => 'address_en'],
            ['value' => 'Yeşilkent Mah. Ardıçlı Manolya Cad. Ardıçlı Göl Evleri No:28/6 Inner Door No:1, Avcılar, Istanbul', 'group' => 'contact']
        );

        // Contact Information - Phone
        Setting::updateOrCreate(
            ['key' => 'phone'],
            ['value' => '+905326421443', 'group' => 'contact']
        );

        Setting::updateOrCreate(
            ['key' => 'phone_display'],
            ['value' => '+90 532 642 14 43', 'group' => 'contact']
        );

        // Contact Information - Email
        Setting::updateOrCreate(
            ['key' => 'email'],
            ['value' => 'info@nordean.com.tr', 'group' => 'contact']
        );

        Setting::updateOrCreate(
            ['key' => 'email_sales'],
            ['value' => 'sales@nordean.com.tr', 'group' => 'contact']
        );

        Setting::updateOrCreate(
            ['key' => 'email_support'],
            ['value' => 'support@nordean.com.tr', 'group' => 'contact']
        );

        // Contact Information - Map
        Setting::updateOrCreate(
            ['key' => 'contact_map_url'],
            ['value' => 'https://maps.google.com/maps?q=Yeşilkent+Mah.+Ardıçlı+Manolya+Cad.+Ardıçlı+Göl+Evleri+No:28/6+İç+Kapı+No:1,+Avcılar,+İstanbul&t=&z=15&ie=UTF8&iwloc=&output=embed', 'group' => 'contact']
        );

        // Social Media
        Setting::updateOrCreate(
            ['key' => 'facebook_url'],
            ['value' => 'https://facebook.com/nordean', 'group' => 'social']
        );

        Setting::updateOrCreate(
            ['key' => 'instagram_url'],
            ['value' => 'https://instagram.com/nordean', 'group' => 'social']
        );

        Setting::updateOrCreate(
            ['key' => 'linkedin_url'],
            ['value' => 'https://linkedin.com/company/nordean', 'group' => 'social']
        );

        Setting::updateOrCreate(
            ['key' => 'twitter_url'],
            ['value' => 'https://twitter.com/nordean', 'group' => 'social']
        );

        // Working Hours
        Setting::updateOrCreate(
            ['key' => 'working_hours_tr'],
            ['value' => 'Pazartesi - Cuma: 09:00 - 18:00', 'group' => 'contact']
        );

        Setting::updateOrCreate(
            ['key' => 'working_hours_en'],
            ['value' => 'Monday - Friday: 09:00 - 18:00', 'group' => 'contact']
        );

        // SEO Settings
        Setting::updateOrCreate(
            ['key' => 'meta_title_tr'],
            ['value' => 'Nordean - Ses ve Titreşim Yalıtımı Çözümleri', 'group' => 'seo']
        );

        Setting::updateOrCreate(
            ['key' => 'meta_title_en'],
            ['value' => 'Nordean - Sound and Vibration Insulation Solutions', 'group' => 'seo']
        );

        Setting::updateOrCreate(
            ['key' => 'meta_description_tr'],
            ['value' => 'İtalyan Isolgomma\'nın Türkiye\'deki tek yetkili distribütörü. Profesyonel ses ve titreşim yalıtım çözümleri.', 'group' => 'seo']
        );

        Setting::updateOrCreate(
            ['key' => 'meta_description_en'],
            ['value' => 'Exclusive distributor of Italian Isolgomma in Turkey. Professional sound and vibration insulation solutions.', 'group' => 'seo']
        );

        Setting::updateOrCreate(
            ['key' => 'meta_keywords_tr'],
            ['value' => 'ses yalıtımı, titreşim kontrolü, akustik yalıtım, isolgomma, nordean', 'group' => 'seo']
        );

        Setting::updateOrCreate(
            ['key' => 'meta_keywords_en'],
            ['value' => 'sound insulation, vibration control, acoustic insulation, isolgomma, nordean', 'group' => 'seo']
        );

        // Mail Settings (for Gmail SMTP)
        Setting::updateOrCreate(
            ['key' => 'mail_host'],
            ['value' => 'smtp.gmail.com', 'type' => 'text', 'group' => 'mail']
        );

        Setting::updateOrCreate(
            ['key' => 'mail_port'],
            ['value' => '587', 'type' => 'text', 'group' => 'mail']
        );

        Setting::updateOrCreate(
            ['key' => 'mail_username'],
            ['value' => 'info@nordean.com.tr', 'type' => 'text', 'group' => 'mail']
        );

        Setting::updateOrCreate(
            ['key' => 'mail_password'],
            ['value' => '', 'type' => 'password', 'group' => 'mail']
        );

        Setting::updateOrCreate(
            ['key' => 'mail_encryption'],
            ['value' => 'tls', 'type' => 'select', 'group' => 'mail']
        );

        Setting::updateOrCreate(
            ['key' => 'mail_from_address'],
            ['value' => 'info@nordean.com.tr', 'type' => 'text', 'group' => 'mail']
        );

        Setting::updateOrCreate(
            ['key' => 'mail_from_name'],
            ['value' => 'Nordean - Isolgomma Turkey', 'type' => 'text', 'group' => 'mail']
        );
    }
}
