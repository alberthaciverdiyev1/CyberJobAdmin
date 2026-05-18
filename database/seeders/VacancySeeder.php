<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\City;
use App\Models\Company;
use App\Models\Filter;
use App\Models\Vacancy;
use Illuminate\Database\Seeder;

class VacancySeeder extends Seeder
{
    public function run(): void
    {
        $companyIds = Company::pluck('id')->toArray();
        $cityIds = City::pluck('id')->toArray();
        $categoryIds = Category::whereNull('parent_id')->pluck('id')->toArray();
        $childCategoryIds = Category::whereNotNull('parent_id')->pluck('id')->toArray();
        $filterIds = Filter::whereNotNull('parent_id')->pluck('id')->toArray();

        if (empty($companyIds) || empty($cityIds) || empty($categoryIds)) {
            $this->command->warn('Missing required data for vacancies. Run other seeders first.');
            return;
        }

        $allCategoryIds = array_merge($categoryIds, $childCategoryIds);

        $vacancies = [
            [
                'name' => 'Senior PHP Developer',
                'requirements' => "• 5+ il PHP təcrübəsi\n• Laravel framework bilikləri\n• MySQL və PostgreSQL məlumat bazaları ilə iş təcrübəsi\n• RESTful API təcrübəsi\n• Git versiyalama sistemi bilikləri\n• İngilis dili (oxu və yazı səviyyəsində)",
                'description' => "Şirkətimiz üçün təcrübəli PHP Developer axtarırıq. Siz mövcud layihələrimizin inkişafı və yeni layihələrin yaradılması üzərində çalışacaqsınız. Komandamızda 10 nəfərə yaxın təcrübəli mütəxəssis var.\n\nVəzifə öhdəlikləri:\n• Yeni funksionallıqların hazırlanması\n• Mövcud kod bazasının optimallaşdırılması\n• Layihə sənədləşdirməsi\n• Kod review prosesində iştirak",
                'min_salary' => 2500,
                'max_salary' => 4000,
                'min_age' => 23,
                'max_age' => 45,
                'email' => 'hr@company.az',
                'is_active' => true,
                'is_premium' => true,
                'is_bring_top' => true,
                'expire_date' => now()->addDays(45),
            ],
            [
                'name' => 'Frontend Developer (React)',
                'requirements' => "• 3+ il React təcrübəsi\n• JavaScript/TypeScript bilikləri\n• CSS/SCSS, Tailwind CSS təcrübəsi\n• Redux və ya Zustand ilə iş təcrübəsi\n• RESTful API-lərlə iş təcrübəsi",
                'description' => "Müasir veb tətbiqlərimizin inkişafı üçün Frontend Developer axtarırıq. Biz startup mühitində çalışan dinamik bir komandayıq.\n\nVəzifə öhdəlikləri:\n• İstifadəçi interfeyslərinin hazırlanması\n• Performans optimallaşdırılması\n• Dizayn komandası ilə birgə iş",
                'min_salary' => 2000,
                'max_salary' => 3500,
                'min_age' => 20,
                'max_age' => 40,
                'email' => 'dev@company.az',
                'is_active' => true,
                'is_premium' => false,
                'is_bring_top' => false,
                'expire_date' => now()->addDays(30),
            ],
            [
                'name' => 'Satış meneceri',
                'requirements' => "• 2+ il satış sahəsində təcrübə\n• MS Office proqramları bilikləri\n• Ünsiyyət bacarığı\n• Komandada işləmə qabiliyyəti\n• Analitik düşüncə",
                'description' => "Məhsul və xidmətlərimizin satışı üçün Satış meneceri axtarırıq.\n\nVəzifə öhdəlikləri:\n• Yeni müştərilərin axtarışı\n• Mövcud müştərilərlə əlaqələrin qorunması\n• Satış hesabatlarının hazırlanması\n• Müştəri görüşləri və təqdimatlar",
                'min_salary' => 1000,
                'max_salary' => 2500,
                'min_age' => 20,
                'max_age' => 50,
                'email' => 'sales@company.az',
                'is_active' => true,
                'is_premium' => false,
                'is_bring_top' => false,
                'expire_date' => now()->addDays(30),
            ],
            [
                'name' => 'Mühasib',
                'requirements' => "• Ali təhsil (maliyyə və ya mühasibatlıq)\n• 3+ il mühasibatlıq təcrübəsi\n• 1C proqramı bilikləri\n• Vergi qanunvericiliyi bilikləri\n• MS Excel bilikləri",
                'description' => "Şirkətimizin mühasibatlıq şöbəsi üçün təcrübəli mühasib axtarırıq.\n\nVəzifə öhdəlikləri:\n• İlkin mühasibat sənədlərinin aparılması\n• Vergi hesabatlarının hazırlanması\n• Bank əməliyyatlarının həyata keçirilməsi\n• Aylıq və rüblük hesabatların tərtib edilməsi",
                'min_salary' => 1200,
                'max_salary' => 2000,
                'min_age' => 22,
                'max_age' => 50,
                'email' => 'finance@company.az',
                'is_active' => true,
                'is_premium' => false,
                'is_bring_top' => false,
                'expire_date' => now()->addDays(25),
            ],
            [
                'name' => 'HR Koordinatoru',
                'requirements' => "• Ali təhsil\n• 1+ il HR sahəsində təcrübə\n• İş qanunvericiliyi bilikləri\n• Ünsiyyət bacarığı\n• MS Office bilikləri",
                'description' => "İnsan resursları departamentimizə gənc və dinamik HR koordinatoru axtarırıq.\n\nVəzifə öhdəlikləri:\n• İşə qəbul prosesinin koordinasiyası\n• Kadr sənəd dövriyyəsinin aparılması\n• Adaptasiya proqramının həyata keçirilməsi\n• Korporativ tədbirlərin təşkili",
                'min_salary' => 900,
                'max_salary' => 1500,
                'min_age' => 18,
                'max_age' => 35,
                'email' => 'hr@company.az',
                'is_active' => true,
                'is_premium' => false,
                'is_bring_top' => true,
                'expire_date' => now()->addDays(20),
            ],
            [
                'name' => "DevOps Mühəndisi",
                'requirements' => "• 3+ il DevOps təcrübəsi\n• AWS/Azure bulud platformaları bilikləri\n• Docker, Kubernetes təcrübəsi\n• CI/CD pipeline təcrübəsi\n• Linux sistem inzibatçılığı\n• Terraform və ya Ansible bilikləri",
                'description' => "İnfrastruktur komandamıza təcrübəli DevOps mühəndisi axtarırıq.\n\nVəzifə öhdəlikləri:\n• Bulud infrastrukturunun idarə edilməsi\n• Avtomatlaşdırma proseslərinin qurulması\n• Monitorinq sistemlərinin konfiqurasiyası\n• Təhlükəsizlik auditi və optimallaşdırma",
                'min_salary' => 3000,
                'max_salary' => 5000,
                'min_age' => 25,
                'max_age' => 45,
                'email' => 'devops@company.az',
                'is_active' => true,
                'is_premium' => true,
                'is_bring_top' => false,
                'expire_date' => now()->addDays(60),
            ],
            [
                'name' => 'Qrafik Dizayner',
                'requirements' => "• Ali və ya orta ixtisas təhsili\n• Adobe Photoshop, Illustrator, Figma bilikləri\n• Portfolyo təqdim etmə qabiliyyəti\n• Kreativ düşüncə\n• Detallara diqqət",
                'description' => "Kreativ komandamız üçün Qrafik Dizayner axtarırıq.\n\nVəzifə öhdəlikləri:\n• Sosial media üçün vizual məzmunların hazırlanması\n• Brend kitabçasına uyğun dizayn işləri\n• Çap məhsullarının hazırlanması\n• Logo və brendinq işləri",
                'min_salary' => 800,
                'max_salary' => 1500,
                'min_age' => 18,
                'max_age' => 40,
                'email' => 'design@company.az',
                'is_active' => true,
                'is_premium' => false,
                'is_bring_top' => false,
                'expire_date' => now()->addDays(20),
            ],
            [
                'name' => 'Kontent Menecer',
                'requirements' => "• 2+ il kontent menecment təcrübəsi\n• SEO bilikləri\n• Azərbaycan və İngilis dillərində mükəmməl yazı bacarığı\n• WordPress bilikləri\n• Sosial media platformaları bilikləri",
                'description' => "Veb saytımız və sosial media kanallarımız üçün Kontent Menecer axtarırıq.\n\nVəzifə öhdəlikləri:\n• Məqalə və bloq yazılarının hazırlanması\n• SEO optimallaşdırması\n• Sosial media strategiyasının hazırlanması\n• Analitika hesabatlarının hazırlanması",
                'min_salary' => 800,
                'max_salary' => 1300,
                'min_age' => 20,
                'max_age' => 38,
                'email' => 'content@company.az',
                'is_active' => true,
                'is_premium' => false,
                'is_bring_top' => false,
                'expire_date' => now()->addDays(15),
            ],
            [
                'name' => 'İnşaat Mühəndisi',
                'requirements' => "• Ali təhsil (inşaat mühəndisliyi)\n• 5+ il təcrübə\n• Autocad, ArchiCAD bilikləri\n• Layihə idarəetmə bacarığı\n• Tikinti normaları bilikləri",
                'description' => "Yeni tikinti layihələrimiz üçün təcrübəli İnşaat Mühəndisi axtarırıq.\n\nVəzifə öhdəlikləri:\n• Layihə sənədləşdirməsinin hazırlanması\n• Tikinti sahəsində nəzarət\n• Podratçılarla koordinasiya\n• Keyfiyyətə nəzarət",
                'min_salary' => 2000,
                'max_salary' => 3500,
                'min_age' => 25,
                'max_age' => 55,
                'email' => 'construction@company.az',
                'is_active' => true,
                'is_premium' => false,
                'is_bring_top' => false,
                'expire_date' => now()->addDays(35),
            ],
            [
                'name' => 'Ofis Meneceri',
                'requirements' => "• Ali təhsil\n• 1+ il ofis menecment təcrübəsi\n• MS Office bilikləri\n• Ünsiyyət və təşkilatçılıq bacarığı\n• İngilis dili (azı orta səviyyə)",
                'description' => "Ofisimizin gündəlik işlərinin idarə edilməsi üçün Ofis Meneceri axtarırıq.\n\nVəzifə öhdəlikləri:\n• Ofis təchizatının idarə edilməsi\n• Zənglərin qəbulu və istiqamətləndirilməsi\n• Görüşlərin təşkili və koordinasiyası\n• Sənəd dövriyyəsinin təmin edilməsi",
                'min_salary' => 600,
                'max_salary' => 1000,
                'min_age' => 18,
                'max_age' => 40,
                'email' => 'office@company.az',
                'is_active' => true,
                'is_premium' => false,
                'is_bring_top' => false,
                'expire_date' => now()->addDays(20),
            ],
            [
                'name' => 'Data Analyst',
                'requirements' => "• 2+ il data analitika təcrübəsi\n• SQL bilikləri\n• Python (Pandas, NumPy) bilikləri\n• Power BI və ya Tableau bilikləri\n• Statistik analiz bilikləri\n• İngilis dili (azı orta səviyyə)",
                'description' => "Məlumat analitikası komandamız üçün Data Analyst axtarırıq.\n\nVəzifə öhdəlikləri:\n• Məlumatların toplanması və təmizlənməsi\n• Analitik hesabatların hazırlanması\n• Biznes metriklərin izlənilməsi\n• Məlumat əsaslı qərarların qəbulu üçün analizlər",
                'min_salary' => 1800,
                'max_salary' => 3000,
                'min_age' => 21,
                'max_age' => 45,
                'email' => 'analytics@company.az',
                'is_active' => true,
                'is_premium' => false,
                'is_bring_top' => false,
                'expire_date' => now()->addDays(40),
            ],
            [
                'name' => 'Mobil Tətbiq Developer (Flutter)',
                'requirements' => "• 2+ il Flutter təcrübəsi\n• Dart proqramlaşdırma dili bilikləri\n• RESTful API təcrübəsi\n• Mobil UI/UX prinsipləri bilikləri\n• Google Play / App Store yayımlama təcrübəsi",
                'description' => "Mobil tətbiqimizin inkişafı üçün Flutter Developer axtarırıq.\n\nVəzifə öhdəlikləri:\n• Yeni ekranların hazırlanması\n• Mövcud kod bazasının təkmilləşdirilməsi\n• API inteqrasiyası\n• Tətbiq performansının optimallaşdırılması",
                'min_salary' => 2200,
                'max_salary' => 3800,
                'min_age' => 20,
                'max_age' => 45,
                'email' => 'mobile@company.az',
                'is_active' => true,
                'is_premium' => true,
                'is_bring_top' => true,
                'expire_date' => now()->addDays(50),
            ],
        ];

        foreach ($vacancies as $data) {
            $vacancy = Vacancy::create([
                'name' => $data['name'],
                'requirements' => $data['requirements'],
                'description' => $data['description'],
                'city_id' => $cityIds[array_rand($cityIds)],
                'view_count' => rand(0, 500),
                'expire_date' => $data['expire_date'],
                'banner_image' => rand(0, 1) ? 'vacancy_banners/vacancy-' . rand(1, 5) . '.jpg' : null,
                'min_salary' => $data['min_salary'],
                'max_salary' => $data['max_salary'],
                'min_age' => $data['min_age'],
                'max_age' => $data['max_age'],
                'email' => $data['email'],
                'company_id' => $companyIds[array_rand($companyIds)],
                'category_id' => $allCategoryIds[array_rand($allCategoryIds)],
                'is_active' => $data['is_active'],
                'is_premium' => $data['is_premium'],
                'is_bring_top' => $data['is_bring_top'],
            ]);

            // Attach random filters
            if (!empty($filterIds)) {
                $selectedFilters = (array) array_rand(array_flip($filterIds), min(rand(2, 4), count($filterIds)));
                $vacancy->filters()->attach($selectedFilters);
            }
        }
    }
}
