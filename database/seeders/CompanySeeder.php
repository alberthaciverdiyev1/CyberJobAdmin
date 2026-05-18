<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\CompanyCategory;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        $categoryIds = CompanyCategory::pluck('id')->toArray();

        if (empty($categoryIds)) {
            $this->command->warn('No company categories found. Run CompanyCategorySeeder first.');
            return;
        }

        $companies = [
            [
                'name' => 'ABB Tech',
                'email' => 'hr@abbtech.az',
                'phone' => '+994 12 505 55 55',
                'address' => 'Bakı, Nizami küçəsi 185',
                'short_address' => 'Nizami küçəsi',
                'about' => [
                    'az' => 'ABB Tech Azərbaycanda aparıcı IT şirkətlərindən biridir. Biz innovativ həllər və rəqəmsal transformasiya xidmətləri göstəririk. Şirkətimiz 2005-ci ildən fəaliyyət göstərir və 500-dən çox əməkdaşı var.',
                    'en' => 'ABB Tech is one of the leading IT companies in Azerbaijan. We provide innovative solutions and digital transformation services. Our company has been operating since 2005 and has over 500 employees.',
                ],
                'category_id' => $categoryIds[array_search('Information Technology', array_map(fn($c) => CompanyCategory::find($c)?->name['en'] ?? '', $categoryIds)) !== false ? 0 : $categoryIds[0]],
                'is_verified' => true,
                'is_active' => true,
                'founded_year' => 2005,
            ],
            [
                'name' => 'Pasha Bank',
                'email' => 'career@pashabank.az',
                'phone' => '+994 12 599 99 99',
                'address' => 'Bakı, Heydər Əliyev prospekti 153',
                'short_address' => 'Heydər Əliyev prospekti',
                'about' => [
                    'az' => 'Pasha Bank Azərbaycanın ən böyük özəl banklarından biridir. Bank 2007-ci ildə təsis edilmişdir və geniş çeşiddə maliyyə xidmətləri təklif edir.',
                    'en' => 'Pasha Bank is one of the largest private banks in Azerbaijan. The bank was founded in 2007 and offers a wide range of financial services.',
                ],
                'category_id' => $categoryIds[array_search('Finance & Accounting', array_map(fn($c) => CompanyCategory::find($c)?->name['en'] ?? '', $categoryIds)) !== false ? 1 : $categoryIds[0]],
                'is_verified' => true,
                'is_active' => true,
                'founded_year' => 2007,
            ],
            [
                'name' => 'Azərişıq MMC',
                'email' => 'info@azerisig.az',
                'phone' => '+994 12 490 10 10',
                'address' => 'Bakı, Tbilisi prospekti 73',
                'short_address' => 'Tbilisi prospekti',
                'about' => [
                    'az' => 'Azərişıq MMC enerji sektorunda fəaliyyət göstərən aparıcı şirkətdir. Şirkət elektrik enerjisi paylanması və alternativ enerji layihələri üzrə ixtisaslaşmışdır.',
                    'en' => 'Azerishiq LLC is a leading company in the energy sector. The company specializes in electricity distribution and alternative energy projects.',
                ],
                'category_id' => $categoryIds[array_search('Energy', array_map(fn($c) => CompanyCategory::find($c)?->name['en'] ?? '', $categoryIds)) !== false ? 10 : $categoryIds[0]],
                'is_verified' => true,
                'is_active' => true,
                'founded_year' => 2010,
            ],
            [
                'name' => 'MediClinic Hospital',
                'email' => 'hr@mediclinic.az',
                'phone' => '+994 12 465 10 10',
                'address' => 'Bakı, Bakıxanov küçəsi 25',
                'short_address' => 'Bakıxanov küçəsi',
                'about' => [
                    'az' => 'MediClinic Hospital müasir tibb avadanlıqları ilə təchiz olunmuş özəl xəstəxanadır. 100-dən çox həkim və tibb işçisi çalışır.',
                    'en' => 'MediClinic Hospital is a private hospital equipped with modern medical equipment. Over 100 doctors and medical staff work here.',
                ],
                'category_id' => $categoryIds[array_search('Healthcare & Medicine', array_map(fn($c) => CompanyCategory::find($c)?->name['en'] ?? '', $categoryIds)) !== false ? 2 : $categoryIds[0]],
                'is_verified' => true,
                'is_active' => true,
                'founded_year' => 2015,
            ],
            [
                'name' => 'BC Group',
                'email' => 'career@bcgroup.az',
                'phone' => '+994 12 497 11 11',
                'address' => 'Bakı, Neftçilər prospekti 77',
                'short_address' => 'Neftçilər prospekti',
                'about' => [
                    'az' => 'BC Group Azərbaycanda tikinti və daşınmaz əmlak sahəsində lider şirkətlərdən biridir. 2010-cu ildən etibarən 30-dan çox yaşayış kompleksi tikilib istifadəyə verilmişdir.',
                    'en' => 'BC Group is one of the leading companies in construction and real estate in Azerbaijan. Since 2010, more than 30 residential complexes have been built and put into operation.',
                ],
                'category_id' => $categoryIds[array_search('Construction & Architecture', array_map(fn($c) => CompanyCategory::find($c)?->name['en'] ?? '', $categoryIds)) !== false ? 4 : $categoryIds[0]],
                'is_verified' => true,
                'is_active' => true,
                'founded_year' => 2010,
            ],
            [
                'name' => 'Baku International School',
                'email' => 'jobs@bis.edu.az',
                'phone' => '+994 12 404 88 88',
                'address' => 'Bakı, Badamdar şossesi 79',
                'short_address' => 'Badamdar şossesi',
                'about' => [
                    'az' => 'Baku International School beynəlxalq bakalavriat proqramı (IB) təklif edən aparıcı özəl məktəbdir. 500-dən çox şagird və 100-dən çox müəllim heyəti var.',
                    'en' => 'Baku International School is a leading private school offering the International Baccalaureate (IB) program. It has over 500 students and over 100 teaching staff.',
                ],
                'category_id' => $categoryIds[array_search('Education & Science', array_map(fn($c) => CompanyCategory::find($c)?->name['en'] ?? '', $categoryIds)) !== false ? 3 : $categoryIds[0]],
                'is_verified' => true,
                'is_active' => true,
                'founded_year' => 2012,
            ],
            [
                'name' => 'Azərbaycan Logistika Mərkəzi',
                'email' => 'info@logistics.az',
                'phone' => '+994 12 454 33 33',
                'address' => 'Bakı, Ziya Bünyadov prospekti 15',
                'short_address' => 'Ziya Bünyadov prospekti',
                'about' => [
                    'az' => 'Azərbaycan Logistika Mərkəzi beynəlxalq yük daşımaları, anbar xidmətləri və gömrük rəsmiləşdirilməsi sahələrində xidmət göstərir.',
                    'en' => 'Azerbaijan Logistics Center provides services in international cargo transportation, warehouse services, and customs clearance.',
                ],
                'category_id' => $categoryIds[array_search('Logistics & Transportation', array_map(fn($c) => CompanyCategory::find($c)?->name['en'] ?? '', $categoryIds)) !== false ? 6 : $categoryIds[0]],
                'is_verified' => false,
                'is_active' => true,
                'founded_year' => 2018,
            ],
            [
                'name' => 'Azərmarka MMC',
                'email' => 'hr@azermarka.az',
                'phone' => '+994 12 465 22 22',
                'address' => 'Bakı, Xaqani küçəsi 45',
                'short_address' => 'Xaqani küçəsi',
                'about' => [
                    'az' => 'Azərmarka marketinq və reklam sahəsində ixtisaslaşmış kreativ agentlikdir. Brendinq, rəqəmsal marketinq, SMM və PR xidmətləri təklif edir.',
                    'en' => 'Azermarka is a creative agency specializing in marketing and advertising. It offers branding, digital marketing, SMM, and PR services.',
                ],
                'category_id' => $categoryIds[array_search('Marketing & Advertising', array_map(fn($c) => CompanyCategory::find($c)?->name['en'] ?? '', $categoryIds)) !== false ? 5 : $categoryIds[0]],
                'is_verified' => true,
                'is_active' => true,
                'founded_year' => 2020,
            ],
            [
                'name' => 'Hüquq Məsləhət Mərkəzi',
                'email' => 'info@hmm.az',
                'phone' => '+994 12 490 44 44',
                'address' => 'Bakı, Rəşid Behbudov küçəsi 12',
                'short_address' => 'Rəşid Behbudov küçəsi',
                'about' => [
                    'az' => 'Hüquq Məsləhət Mərkəzi korporativ və fərdi hüquq xidmətləri göstərir. Mülki, cinayət, vergi və əmək hüququ sahələrində ixtisaslaşmışdır.',
                    'en' => 'Legal Advisory Center provides corporate and individual legal services. It specializes in civil, criminal, tax, and labor law.',
                ],
                'category_id' => $categoryIds[array_search('Legal & Law', array_map(fn($c) => CompanyCategory::find($c)?->name['en'] ?? '', $categoryIds)) !== false ? 12 : $categoryIds[0]],
                'is_verified' => true,
                'is_active' => true,
                'founded_year' => 2016,
            ],
            [
                'name' => 'Quba Palace Hotel & Spa',
                'email' => 'career@qubapalace.az',
                'phone' => '+994 12 310 00 10',
                'address' => 'Quba, Quba palas yolu 1',
                'short_address' => 'Quba şəhəri',
                'about' => [
                    'az' => 'Quba Palace Hotel & Spa 5 ulduzlu otel və kurort kompleksidir. 300-dən çox otaq, SPA mərkəzi, restoranlar və konfrans zalı mövcuddur.',
                    'en' => 'Quba Palace Hotel & Spa is a 5-star hotel and resort complex. It has over 300 rooms, SPA center, restaurants, and a conference hall.',
                ],
                'category_id' => $categoryIds[array_search('Tourism & Hospitality', array_map(fn($c) => CompanyCategory::find($c)?->name['en'] ?? '', $categoryIds)) !== false ? 11 : $categoryIds[0]],
                'is_verified' => true,
                'is_active' => true,
                'founded_year' => 2019,
            ],
            [
                'name' => 'AzəriTextil MMC',
                'email' => 'info@azeritextil.az',
                'phone' => '+994 12 477 55 55',
                'address' => 'Sumqayıt, Sənaye zonası 8',
                'short_address' => 'Sumqayıt sənaye zonası',
                'about' => [
                    'az' => 'AzəriTextil MMC yüngül sənaye sahəsində fəaliyyət göstərən istehsal şirkətidir. Pambıq emalı, parça istehsalı və hazır geyim istehsalı ilə məşğuldur.',
                    'en' => 'AzeriTextil LLC is a manufacturing company operating in the light industry. It is engaged in cotton processing, fabric production, and ready-made garment manufacturing.',
                ],
                'category_id' => $categoryIds[array_search('Manufacturing & Industry', array_map(fn($c) => CompanyCategory::find($c)?->name['en'] ?? '', $categoryIds)) !== false ? 14 : $categoryIds[0]],
                'is_verified' => false,
                'is_active' => true,
                'founded_year' => 2014,
            ],
        ];

        // Fix category assignments with a simpler approach
        $catMap = [];
        foreach (CompanyCategory::all() as $cat) {
            $catMap[$cat->name['en']] = $cat->id;
        }

        $categoryNameToIndex = [
            'Information Technology' => 'Information Technology',
            'Finance & Accounting' => 'Finance & Accounting',
            'Energy' => 'Energy',
            'Healthcare & Medicine' => 'Healthcare & Medicine',
            'Construction & Architecture' => 'Construction & Architecture',
            'Education & Science' => 'Education & Science',
            'Logistics & Transportation' => 'Logistics & Transportation',
            'Marketing & Advertising' => 'Marketing & Advertising',
            'Legal & Law' => 'Legal & Law',
            'Tourism & Hospitality' => 'Tourism & Hospitality',
            'Manufacturing & Industry' => 'Manufacturing & Industry',
        ];

        $companies[0]['category_id'] = $catMap['Information Technology'];
        $companies[1]['category_id'] = $catMap['Finance & Accounting'] ?? $catMap['Information Technology'];
        $companies[2]['category_id'] = $catMap['Energy'] ?? $catMap['Information Technology'];
        $companies[3]['category_id'] = $catMap['Healthcare & Medicine'] ?? $catMap['Information Technology'];
        $companies[4]['category_id'] = $catMap['Construction & Architecture'] ?? $catMap['Information Technology'];
        $companies[5]['category_id'] = $catMap['Education & Science'] ?? $catMap['Information Technology'];
        $companies[6]['category_id'] = $catMap['Logistics & Transportation'] ?? $catMap['Information Technology'];
        $companies[7]['category_id'] = $catMap['Marketing & Advertising'] ?? $catMap['Information Technology'];
        $companies[8]['category_id'] = $catMap['Legal & Law'] ?? $catMap['Information Technology'];
        $companies[9]['category_id'] = $catMap['Tourism & Hospitality'] ?? $catMap['Information Technology'];
        $companies[10]['category_id'] = $catMap['Manufacturing & Industry'] ?? $catMap['Information Technology'];

        foreach ($companies as $company) {
            Company::create($company);
        }
    }
}
