<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $user = User::where('email', 'admin@cyberjob.az')->first();

        if (!$user) {
            User::factory()->create([
                'name' => 'Cyber Job',
                'email' => 'admin@cyberjob.az',
                'password' => Hash::make('123456'),
            ]);
        } else {
            $user->update([
                'name' => 'Cyber Job',
                'password' => Hash::make('123456'),
            ]);
        }

        $this->call([
            CompanyCategorySeeder::class,
            CategorySeeder::class,
            CitySeeder::class,
            BannerSeeder::class,
            PartnerSeeder::class,
            FaqSeeder::class,
            FilterSeeder::class,
            BlogSeeder::class,
            SettingSeeder::class,
            CompanySeeder::class,
            VacancySeeder::class,
        ]);
    }
}
