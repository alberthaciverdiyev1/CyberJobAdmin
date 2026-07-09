<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        Setting::create([
            'site_name' => 'Cyber Job',
            'logo' => null,
            'favicon' => null,
            'phone_number' => '+994 50 123 45 67',
            'mail' => 'info@jobing.az',
            'address' => 'Baku, Azerbaijan, Nizami Street 203',
            'working_hours' => '09:00 - 18:00',
            'whatsapp_number' => '+994 50 123 45 67',
            'whatsapp_business_number' => '+994 12 400 00 00',
            'telegram_number' => '+994 50 123 45 67',
            'instagram_url' => 'https://instagram.com/jobing.az',
            'facebook_url' => 'https://facebook.com/jobing.az',
            'linkedin_url' => 'https://linkedin.com/company/jobing-az',
            'tiktok_url' => 'https://tiktok.com/@jobing.az',
            'youtube_url' => 'https://youtube.com/@jobing.az',
            'twitter_url' => 'https://twitter.com/jobing.az',
            'seo_title' => 'Cyber Job - Azərbaycanın Ən Böyük İş Platforması',
            'seo_description' => 'Cyber Job platformasında minlərlə vakansiya. Azərbaycanda iş axtarışı üçün ən etibarlı platforma. İş elanları, karyera məsləhətləri və daha çoxu.',
            'seo_keywords' => 'iş elanları, vakansiya, iş axtarışı, Azərbaycan, karyera, iş platforması',
            'header_scripts' => '<script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXXXX"></script>',
            'body_scripts' => null,
            'footer_scripts' => null,
        ]);
    }
}
