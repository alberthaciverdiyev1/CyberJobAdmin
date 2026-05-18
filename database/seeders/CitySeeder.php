<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        $cities = [
            ['az' => 'Bakı', 'en' => 'Baku'],
            ['az' => 'Gəncə', 'en' => 'Ganja'],
            ['az' => 'Sumqayıt', 'en' => 'Sumgait'],
            ['az' => 'Mingəçevir', 'en' => 'Mingachevir'],
            ['az' => 'Naxçıvan', 'en' => 'Nakhchivan'],
            ['az' => 'Şirvan', 'en' => 'Shirvan'],
            ['az' => 'Lənkəran', 'en' => 'Lankaran'],
            ['az' => 'Şəki', 'en' => 'Shaki'],
            ['az' => 'Yevlax', 'en' => 'Yevlakh'],
            ['az' => 'Xırdalan', 'en' => 'Khirdalan'],
            ['az' => 'Abşeron', 'en' => 'Absheron'],
            ['az' => 'Quba', 'en' => 'Guba'],
            ['az' => 'Beyləqan', 'en' => 'Beylagan'],
            ['az' => 'Ağcabədi', 'en' => 'Aghjabadi'],
            ['az' => 'Göyçay', 'en' => 'Goychay'],
            ['az' => 'İmişli', 'en' => 'Imishli'],
            ['az' => 'Zaqatala', 'en' => 'Zagatala'],
            ['az' => 'Masallı', 'en' => 'Masally'],
            ['az' => 'Bərdə', 'en' => 'Barda'],
            ['az' => 'Salyan', 'en' => 'Salyan'],
            ['az' => 'Tərtər', 'en' => 'Tartar'],
            ['az' => 'Qazax', 'en' => 'Gazakh'],
            ['az' => 'Ağdam', 'en' => 'Agdam'],
            ['az' => 'Füzuli', 'en' => 'Fuzuli'],
            ['az' => 'Şuşa', 'en' => 'Shusha'],
            ['az' => 'Xankəndi', 'en' => 'Khankendi'],
            ['az' => 'Cəlilabad', 'en' => 'Jalilabad'],
            ['az' => 'Saatlı', 'en' => 'Saatly'],
            ['az' => 'Sabirabad', 'en' => 'Sabirabad'],
            ['az' => 'Neftçala', 'en' => 'Neftchala'],
        ];

        foreach ($cities as $city) {
            City::create(['name' => $city]);
        }
    }
}
