<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $parentCategories = [
            ['az' => 'Texnologiya', 'en' => 'Technology', 'icon' => 'fas-display'],
            ['az' => 'Biznes və İdarəetmə', 'en' => 'Business & Management', 'icon' => 'fas-briefcase'],
            ['az' => 'Maliyyə', 'en' => 'Finance', 'icon' => 'fas-dollar-sign'],
            ['az' => 'Səhiyyə', 'en' => 'Healthcare', 'icon' => 'fas-heart'],
            ['az' => 'Təhsil', 'en' => 'Education', 'icon' => 'fas-graduation-cap'],
            ['az' => 'İnşaat və Daşınmaz Əmlak', 'en' => 'Construction & Real Estate', 'icon' => 'fas-building'],
            ['az' => 'Marketinq və PR', 'en' => 'Marketing & PR', 'icon' => 'fas-bullhorn'],
            ['az' => 'Logistika və Nəqliyyat', 'en' => 'Logistics & Transportation', 'icon' => 'fas-truck'],
            ['az' => 'Xidmət Sektoru', 'en' => 'Service Sector', 'icon' => 'fas-hand'],
            ['az' => 'Hüquq və Hüquqşünaslıq', 'en' => 'Legal & Law', 'icon' => 'fas-scale-balanced'],
        ];

        $childCategories = [
            ['az' => 'Proqram Təminatı', 'en' => 'Software Development'],
            ['az' => 'Şəbəkə İnzibatçılığı', 'en' => 'Network Administration'],
            ['az' => 'Verilənlər Bazası', 'en' => 'Database Management'],
            ['az' => 'Kiber Təhlükəsizlik', 'en' => 'Cybersecurity'],
            ['az' => 'UI/UX Dizayn', 'en' => 'UI/UX Design'],
            ['az' => 'Layihə Meneceri', 'en' => 'Project Manager'],
            ['az' => 'HR İdarəetməsi', 'en' => 'HR Management'],
            ['az' => 'Mühasib', 'en' => 'Accountant'],
            ['az' => 'Auditor', 'en' => 'Auditor'],
            ['az' => 'Beyin Cərrahı', 'en' => 'Neurosurgeon'],
            ['az' => 'Həkim', 'en' => 'Doctor'],
            ['az' => 'Tibb Bacısı', 'en' => 'Nurse'],
            ['az' => 'Riyaziyyat Müəllimi', 'en' => 'Mathematics Teacher'],
            ['az' => 'İngilis Dili Müəllimi', 'en' => 'English Teacher'],
            ['az' => 'Memar', 'en' => 'Architect'],
            ['az' => 'İnşaat Mühəndisi', 'en' => 'Civil Engineer'],
            ['az' => 'SMM Menecer', 'en' => 'SMM Manager'],
            ['az' => 'Kontent Yaradıcısı', 'en' => 'Content Creator'],
            ['az' => 'Sürücü / Ekspeditor', 'en' => 'Driver / Dispatcher'],
            ['az' => 'Anbardar', 'en' => 'Warehouse Worker'],
            ['az' => 'Ofis Meneceri', 'en' => 'Office Manager'],
            ['az' => 'Təmizlik İşçisi', 'en' => 'Cleaner'],
            ['az' => 'Hüquq Məsləhətçisi', 'en' => 'Legal Advisor'],
            ['az' => 'Vəkil', 'en' => 'Lawyer'],
        ];

        $parentIds = [];
        foreach ($parentCategories as $parentData) {
            $parent = Category::create([
                'name' => $parentData,
                'icon' => $parentData['icon'],
                'parent_id' => null,
            ]);
            $parentIds[] = $parent->id;
        }

        $childIndex = 0;
        foreach ($parentIds as $parentId) {
            $numChildren = match ($parentId) {
                $parentIds[0] => 5, // Technology: 5 children
                $parentIds[1] => 2, // Business: 2 children
                $parentIds[2] => 2, // Finance: 2 children
                $parentIds[3] => 3, // Healthcare: 3 children
                $parentIds[4] => 2, // Education: 2 children
                $parentIds[5] => 2, // Construction: 2 children
                $parentIds[6] => 2, // Marketing: 2 children
                $parentIds[7] => 2, // Logistics: 2 children
                $parentIds[8] => 2, // Service: 2 children
                $parentIds[9] => 2, // Legal: 2 children
                default => 0,
            };

            for ($i = 0; $i < $numChildren; $i++) {
                if ($childIndex < count($childCategories)) {
                    Category::create([
                        'name' => $childCategories[$childIndex],
                        'icon' => null,
                        'parent_id' => $parentId,
                    ]);
                    $childIndex++;
                }
            }
        }
    }
}
