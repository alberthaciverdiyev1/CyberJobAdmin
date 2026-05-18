<?php

namespace Database\Seeders;

use App\Models\Filter;
use Illuminate\Database\Seeder;

class FilterSeeder extends Seeder
{
    public function run(): void
    {
        $parentFilters = [
            ['name' => ['az' => 'Təhsil Səviyyəsi', 'en' => 'Education Level'], 'key' => 'education'],
            ['name' => ['az' => 'İş Təcrübəsi', 'en' => 'Work Experience'], 'key' => 'experience'],
            ['name' => ['az' => 'Məşğulluq Növü', 'en' => 'Employment Type'], 'key' => 'employment_type'],
            ['name' => ['az' => 'İş Qrafiki', 'en' => 'Work Schedule'], 'key' => 'work_schedule'],
            ['name' => ['az' => 'Dil Biliyi', 'en' => 'Language Skills'], 'key' => 'language'],
        ];

        $childFilters = [
            'education' => [
                ['name' => ['az' => 'Ali təhsil', 'en' => 'Higher education'], 'key' => null],
                ['name' => ['az' => 'Orta ixtisas', 'en' => 'Secondary specialized'], 'key' => null],
                ['name' => ['az' => 'Orta təhsil', 'en' => 'Secondary education'], 'key' => null],
                ['name' => ['az' => 'Magistr', 'en' => "Master's degree"], 'key' => null],
                ['name' => ['az' => 'Doktorantura', 'en' => 'Doctorate'], 'key' => null],
            ],
            'experience' => [
                ['name' => ['az' => 'Təcrübəsiz', 'en' => 'No experience'], 'key' => null],
                ['name' => ['az' => '1 ildən az', 'en' => 'Less than 1 year'], 'key' => null],
                ['name' => ['az' => '1-3 il', 'en' => '1-3 years'], 'key' => null],
                ['name' => ['az' => '3-5 il', 'en' => '3-5 years'], 'key' => null],
                ['name' => ['az' => '5-10 il', 'en' => '5-10 years'], 'key' => null],
                ['name' => ['az' => '10 ildən çox', 'en' => 'More than 10 years'], 'key' => null],
            ],
            'employment_type' => [
                ['name' => ['az' => 'Tam ştat', 'en' => 'Full-time'], 'key' => null],
                ['name' => ['az' => 'Yarım ştat', 'en' => 'Part-time'], 'key' => null],
                ['name' => ['az' => 'Müqavilə əsasında', 'en' => 'Contract'], 'key' => null],
                ['name' => ['az' => 'Staj', 'en' => 'Internship'], 'key' => null],
                ['name' => ['az' => 'Layihə əsasında', 'en' => 'Project-based'], 'key' => null],
            ],
            'work_schedule' => [
                ['name' => ['az' => 'Tam gün', 'en' => 'Full day'], 'key' => null],
                ['name' => ['az' => 'Növbəli cədvəl', 'en' => 'Shift schedule'], 'key' => null],
                ['name' => ['az' => 'Çevik qrafik', 'en' => 'Flexible schedule'], 'key' => null],
                ['name' => ['az' => 'Uzaqdan iş', 'en' => 'Remote work'], 'key' => null],
            ],
            'language' => [
                ['name' => ['az' => 'Azərbaycan dili', 'en' => 'Azerbaijani'], 'key' => null],
                ['name' => ['az' => 'İngilis dili', 'en' => 'English'], 'key' => null],
                ['name' => ['az' => 'Rus dili', 'en' => 'Russian'], 'key' => null],
                ['name' => ['az' => 'Türk dili', 'en' => 'Turkish'], 'key' => null],
            ],
        ];

        foreach ($parentFilters as $parentData) {
            $parent = Filter::create([
                'name' => $parentData['name'],
                'key' => $parentData['key'],
                'parent_id' => null,
            ]);

            $parentKey = $parentData['key'];
            if (isset($childFilters[$parentKey])) {
                foreach ($childFilters[$parentKey] as $childData) {
                    Filter::create([
                        'name' => $childData['name'],
                        'key' => $childData['key'],
                        'parent_id' => $parent->id,
                    ]);
                }
            }
        }
    }
}
