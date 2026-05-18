<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    public function run(): void
    {
        $partners = [
            ['image' => 'partners/partner-1.png', 'link' => 'https://example.com/partner1', 'is_active' => true],
            ['image' => 'partners/partner-2.png', 'link' => 'https://example.com/partner2', 'is_active' => true],
            ['image' => 'partners/partner-3.png', 'link' => null, 'is_active' => true],
            ['image' => 'partners/partner-4.png', 'link' => 'https://example.com/partner4', 'is_active' => true],
            ['image' => 'partners/partner-5.png', 'link' => 'https://example.com/partner5', 'is_active' => false],
            ['image' => 'partners/partner-6.png', 'link' => 'https://example.com/partner6', 'is_active' => true],
            ['image' => 'partners/partner-7.png', 'link' => 'https://example.com/partner7', 'is_active' => true],
            ['image' => 'partners/partner-8.png', 'link' => null, 'is_active' => true],
        ];

        foreach ($partners as $partner) {
            Partner::create($partner);
        }
    }
}
