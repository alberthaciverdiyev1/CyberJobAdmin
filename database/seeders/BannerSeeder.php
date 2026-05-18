<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    public function run(): void
    {
        $banners = [
            [
                'image' => 'banners/banner-1.jpg',
                'location' => 'header',
                'link' => 'https://jobing.az/vacancies',
                'start_at' => now(),
                'expiration_date' => now()->addDays(90),
                'is_active' => true,
                'is_desktop' => true,
            ],
            [
                'image' => 'banners/banner-2.jpg',
                'location' => 'sidebar',
                'link' => 'https://jobing.az/companies',
                'start_at' => now(),
                'expiration_date' => now()->addDays(60),
                'is_active' => true,
                'is_desktop' => true,
            ],
            [
                'image' => 'banners/banner-3.jpg',
                'location' => 'between_content',
                'link' => null,
                'start_at' => now(),
                'expiration_date' => now()->addDays(45),
                'is_active' => true,
                'is_desktop' => false,
            ],
            [
                'image' => 'banners/banner-4.jpg',
                'location' => 'footer',
                'link' => 'https://jobing.az/about',
                'start_at' => now()->subDays(10),
                'expiration_date' => now()->addDays(20),
                'is_active' => true,
                'is_desktop' => true,
            ],
            [
                'image' => 'banners/banner-5.jpg',
                'location' => 'header',
                'link' => null,
                'start_at' => now()->subDays(30),
                'expiration_date' => now()->subDays(1),
                'is_active' => false,
                'is_desktop' => true,
            ],
        ];

        foreach ($banners as $banner) {
            Banner::create($banner);
        }
    }
}
