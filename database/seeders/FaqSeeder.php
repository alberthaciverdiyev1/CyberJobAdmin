<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $serviceFaqs = [
            [
                'question' => ['az' => 'İş elanını necə yerləşdirə bilərəm?', 'en' => 'How can I post a job vacancy?'],
                'answer' => ['az' => 'Qeydiyyatdan keçdikdən sonra şəxsi kabinetinizdə "Yeni iş elanı" düyməsinə klikləyərək vakansiya yerləşdirə bilərsiniz. Elanınız admin tərəfindən təsdiqləndikdən sonra saytda yayımlanacaq.', 'en' => 'After registration, you can post a vacancy by clicking the "New Job Post" button in your personal cabinet. Your post will be published on the site after admin approval.'],
            ],
            [
                'question' => ['az' => 'İş elanı nə qədər müddətə aktiv qalır?', 'en' => 'How long does a job post remain active?'],
                'answer' => ['az' => 'Standart iş elanları 30 gün müddətə aktiv qalır. Premium elanlar isə 60 gün ərzində saytın yuxarı hissəsində yerləşdirilir.', 'en' => 'Standard job posts remain active for 30 days. Premium posts are placed at the top of the site for 60 days.'],
            ],
            [
                'question' => ['az' => 'CV necə yüklənir?', 'en' => 'How do I upload a CV?'],
                'answer' => ['az' => 'Profil səhifənizdə "CV yüklə" bölməsindən CV-nizi PDF və ya DOC formatında yükləyə bilərsiniz. Maksimum fayl ölçüsü 5 MB-dır.', 'en' => 'You can upload your CV in PDF or DOC format from the "Upload CV" section on your profile page. Maximum file size is 5 MB.'],
            ],
            [
                'question' => ['az' => 'Şirkət profili necə yaradılır?', 'en' => 'How to create a company profile?'],
                'answer' => ['az' => 'Qeydiyyatdan keçdikdən sonra "Şirkət profili" bölməsinə keçərək şirkətiniz haqqında məlumatları daxil edə bilərsiniz. Şirkət profili yaratmaq pulsuzdur.', 'en' => 'After registration, you can enter your company information by going to the "Company Profile" section. Creating a company profile is free.'],
            ],
            [
                'question' => ['az' => 'Premium paketlər hansılardır?', 'en' => 'What are the premium packages?'],
                'answer' => ['az' => 'Premium paketlərə "Önə çıxarılmış elan", "VIP elan" və "Şirkət səhifəsi dizaynı" daxildir. Qiymətlər haqqında ətraflı məlumat üçün "Tariflər" səhifəsinə baxın.', 'en' => 'Premium packages include "Featured Post", "VIP Post", and "Company Page Design". See the "Pricing" page for detailed pricing information.'],
            ],
            [
                'question' => ['az' => 'Elanım niyə təsdiqlənmədi?', 'en' => 'Why was my post not approved?'],
                'answer' => ['az' => 'Elanınızın təsdiqlənməməsinin səbəbləri: yanlış kateqoriya seçimi, natamam məlumat, qeyri-adekvat tələblər və ya təkrarlanan elan ola bilər. Ətraflı məlumat üçün dəstək xidmətimizlə əlaqə saxlayın.', 'en' => 'Reasons for disapproval: incorrect category selection, incomplete information, inappropriate requirements, or duplicate posting. Contact our support for details.'],
            ],
            [
                'question' => ['az' => 'İş axtaranlar üçün hansı xidmətlər mövcuddur?', 'en' => 'What services are available for job seekers?'],
                'answer' => ['az' => 'İş axtaranlar üçün CV yerləşdirmə, iş elanlarına birbaşa müraciət, xəbərdarlıq sistemi və karyera məsləhətləri kimi xidmətlər tamamilə pulsuzdur.', 'en' => 'CV posting, direct application to job posts, notification system, and career advice services are completely free for job seekers.'],
            ],
            [
                'question' => ['az' => 'Hesab məlumatlarımı necə yeniləyə bilərəm?', 'en' => 'How can I update my account information?'],
                'answer' => ['az' => 'Profil səhifənizdə "Parametrlər" bölməsindən şəxsi məlumatlarınızı, şifrənizi və bildiriş seçimlərinizi yeniləyə bilərsiniz.', 'en' => 'You can update your personal information, password, and notification preferences from the "Settings" section on your profile page.'],
            ],
            [
                'question' => ['az' => 'Şifrəmi unutmuşam, nə etməliyəm?', 'en' => 'I forgot my password, what should I do?'],
                'answer' => ['az' => 'Giriş səhifəsində "Şifrəni unutmusunuz?" linkinə klikləyin və e-poçt ünvanınızı daxil edin. Şifrənizi yeniləmək üçün link e-poçt ünvanınıza göndəriləcək.', 'en' => 'Click the "Forgot Password?" link on the login page and enter your email address. A link to reset your password will be sent to your email.'],
            ],
            [
                'question' => ['az' => 'Sayt hansı dilləri dəstəkləyir?', 'en' => 'Which languages does the site support?'],
                'answer' => ['az' => 'Saytımız Azərbaycan və İngilis dillərini dəstəkləyir. Dil seçimini səhifənin yuxarı sağ küncündən dəyişə bilərsiniz.', 'en' => 'Our site supports Azerbaijani and English languages. You can change the language selection from the top right corner of the page.'],
            ],
        ];

        $ratingFaqs = [
            [
                'question' => ['az' => 'Reytinq necə hesablanır?', 'en' => 'How is the rating calculated?'],
                'answer' => ['az' => 'Reytinq şirkətin aktiv elan sayısı, baxış statistikası və istifadəçi rəyləri əsasında hesablanır. Hər ay yenilənir.', 'en' => 'The rating is calculated based on the company\'s active listing count, view statistics, and user reviews. It is updated every month.'],
            ],
            [
                'question' => ['az' => 'Reytinqdə birinci olmaq üçün nə etməliyəm?', 'en' => 'What should I do to be first in the ranking?'],
                'answer' => ['az' => 'Daha çox aktiv elan yerləşdirin, elanlarınızı mütəmadi yeniləyin və şirkət profilinizi tam doldurun. Aktivlik reytinqdə irəliləməyinizə kömək edir.', 'en' => 'Post more active listings, update your listings regularly, and complete your company profile. Activity helps you advance in the ranking.'],
            ],
            [
                'question' => ['az' => 'Reytinq nə vaxt yenilənir?', 'en' => 'When is the rating updated?'],
                'answer' => ['az' => 'Reytinq hər ayın 1-də yenilənir. Ay ərzindəki aktivliyiniz növbəti ayın reytinqinə təsir edir.', 'en' => 'The rating is updated on the 1st of each month. Your activity during the month affects next month\'s rating.'],
            ],
            [
                'question' => ['az' => 'Reytinqdə neçə şirkət iştirak edir?', 'en' => 'How many companies participate in the rating?'],
                'answer' => ['az' => 'Bütün aktiv şirkətlər avtomatik olaraq reytinqdə iştirak edir. Sıralama şirkətin ümumi aktivliyinə görə müəyyən olunur.', 'en' => 'All active companies automatically participate in the rating. The ranking is determined by the company\'s overall activity.'],
            ],
        ];

        foreach ($serviceFaqs as $faq) {
            Faq::create(array_merge($faq, ['type' => 'service']));
        }

        foreach ($ratingFaqs as $faq) {
            Faq::create(array_merge($faq, ['type' => 'rating']));
        }
    }
}
