<?php

namespace Database\Seeders;

use App\Models\CompanyCategory;
use Illuminate\Database\Seeder;

class CompanyCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['az' => 'İnformasiya Texnologiyaları', 'en' => 'Information Technology'],
            ['az' => 'Maliyyə və Mühasibatlıq', 'en' => 'Finance & Accounting'],
            ['az' => 'Səhiyyə və Tibb', 'en' => 'Healthcare & Medicine'],
            ['az' => 'Təhsil və Elm', 'en' => 'Education & Science'],
            ['az' => 'Tikinti və Memarlıq', 'en' => 'Construction & Architecture'],
            ['az' => 'Marketinq və Reklam', 'en' => 'Marketing & Advertising'],
            ['az' => 'Logistika və Nəqliyyat', 'en' => 'Logistics & Transportation'],
            ['az' => 'Satış və Biznes', 'en' => 'Sales & Business'],
            ['az' => 'Konsaltinq və Audit', 'en' => 'Consulting & Audit'],
            ['az' => 'Kənd Təsərrüfatı', 'en' => 'Agriculture'],
            ['az' => 'Energetika', 'en' => 'Energy'],
            ['az' => 'Turizm və Qonaqpərvərlik', 'en' => 'Tourism & Hospitality'],
            ['az' => 'Hüquq və Hüquqşünaslıq', 'en' => 'Legal & Law'],
            ['az' => 'Media və Nəşriyyat', 'en' => 'Media & Publishing'],
            ['az' => 'İstehsalat və Sənaye', 'en' => 'Manufacturing & Industry'],
        ];

        foreach ($categories as $category) {
            CompanyCategory::create(['name' => $category]);
        }
    }
}
