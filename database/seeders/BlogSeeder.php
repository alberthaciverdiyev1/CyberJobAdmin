<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $blogs = [
            [
                'title' => ['az' => '2025-ci ildə ən populyar IT peşələri', 'en' => 'Most Popular IT Professions in 2025'],
                'description' => [
                    'az' => '2025-ci ildə IT sektorunda ən çox tələb olunan peşələr haqqında ətraflı məlumat. Proqram təminatı mühəndisliyi, süni intellekt, kiber təhlükəsizlik və bulud texnologiyaları sahələrində karyera qurmaq istəyənlər üçün dəyərli məsləhətlər. Bu sahələrdə orta aylıq əmək haqqı və tələb olunan bacarıqlar haqqında da məlumat tapa bilərsiniz.',
                    'en' => 'Detailed information about the most in-demand professions in the IT sector in 2025. Valuable advice for those looking to build a career in software engineering, artificial intelligence, cybersecurity, and cloud technologies. You can also find information about average monthly salaries and required skills in these fields.',
                ],
                'image' => 'blogs/blog-it-professions.jpg',
                'read_count' => 1250,
                'is_active' => true,
            ],
            [
                'title' => ['az' => 'CV yazma qaydaları: İşəgötürənlərin diqqət etdiyi məqamlar', 'en' => 'CV Writing Rules: What Employers Look For'],
                'description' => [
                    'az' => 'Uğurlu CV yazmaq üçün 10 qayda. CV-nizdə olmalı olan əsas bölmələr, peşəkar təcrübənin düzgün təsviri, bacarıqların vurğulanması və şəxsi keyfiyyətlərin əhəmiyyəti. Həmçinin, CV-nizi göndərməzdən əvvəl yoxlama siyahısı.',
                    'en' => '10 rules for writing a successful CV. Essential sections your CV should include, proper description of professional experience, highlighting skills, and the importance of personal qualities. Also, a checklist to review before sending your CV.',
                ],
                'image' => 'blogs/blog-cv-tips.jpg',
                'read_count' => 980,
                'is_active' => true,
            ],
            [
                'title' => ['az' => 'Müsahibədə uğur qazanmağın yolları', 'en' => 'Ways to Succeed in an Interview'],
                'description' => [
                    'az' => 'İş müsahibəsində uğur qazanmaq üçün hazırlıq mərhələləri: şirkət haqqında araşdırma, ümumi suallara cavab hazırlığı, görünüş və davranış qaydaları. Müsahibə zamanı tez-tez verilən suallar və onlara düzgün cavab vermə üsulları.',
                    'en' => 'Preparation stages for success in a job interview: researching the company, preparing answers to common questions, appearance and behavior rules. Frequently asked questions during interviews and how to answer them correctly.',
                ],
                'image' => 'blogs/blog-interview-tips.jpg',
                'read_count' => 750,
                'is_active' => true,
            ],
            [
                'title' => ['az' => 'Remote iş: üstünlüklər və çətinliklər', 'en' => 'Remote Work: Advantages and Challenges'],
                'description' => [
                    'az' => 'Remote iş modelinin üstünlükləri: elastik iş qrafiki, nəqliyyat xərclərinə qənaət, daha çox sərbəstlik. Çətinliklər: təcrid olunma hissi, iş-güc balansının qorunması, evdə diqqəti cəmləmə problemləri. Remote işdə uğurlu olmaq üçün məsləhətlər.',
                    'en' => 'Advantages of the remote work model: flexible work schedule, saving on transportation costs, more freedom. Challenges: feeling of isolation, maintaining work-life balance, concentration problems at home. Tips for being successful in remote work.',
                ],
                'image' => 'blogs/blog-remote-work.jpg',
                'read_count' => 620,
                'is_active' => true,
            ],
            [
                'title' => ['az' => 'Karyera dəyişikliyi: Yeni sahəyə keçid üçün addımlar', 'en' => 'Career Change: Steps for Transitioning to a New Field'],
                'description' => [
                    'az' => 'Karyera dəyişdirmək qərarı, yeni sahənin tədqiqi, təhsil və sertifikatlaşdırma, şəbəkə qurma, CV-nin yenilənməsi və müsahibəyə hazırlıq. 30 yaşdan sonra karyera dəyişikliyi etmək mümkündürmü?',
                    'en' => 'Career change decision, researching a new field, education and certification, networking, updating your CV, and interview preparation. Is it possible to change careers after age 30?',
                ],
                'image' => 'blogs/blog-career-change.jpg',
                'read_count' => 480,
                'is_active' => true,
            ],
            [
                'title' => ['az' => 'Azərbaycanda əmək bazarı 2025: Trendlər və proqnozlar', 'en' => 'Azerbaijan Labor Market 2025: Trends and Forecasts'],
                'description' => [
                    'az' => '2025-ci ildə Azərbaycanda əmək bazarının əsas tendensiyaları: IT sektorunun böyüməsi, qeyri-neft sektorunda iş yerlərinin artması, startap ekosisteminin inkişafı. Ən çox tələb olunan peşələr və gözlənilən maaş artımları.',
                    'en' => 'Main trends in the Azerbaijani labor market in 2025: growth of the IT sector, increase in jobs in the non-oil sector, development of the startup ecosystem. Most in-demand professions and expected salary increases.',
                ],
                'image' => 'blogs/blog-labor-market.jpg',
                'read_count' => 890,
                'is_active' => true,
            ],
        ];

        foreach ($blogs as $blog) {
            Blog::create($blog);
        }
    }
}
