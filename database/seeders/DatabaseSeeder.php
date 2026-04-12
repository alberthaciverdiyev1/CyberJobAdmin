<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

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

//        DB::table('settings')->insert([
//            'phone_number' => '+994 50 123 45 67',
//            'whatsapp_number' => '+994 50 123 45 67',
//            'whatsapp_business_number' => '+994 12 400 00 00',
//            'instagram_url' => 'https://instagram.com/jobing.az',
//            'facebook_url' => 'https://facebook.com/jobing.az',
//            'linkedin_url' => 'https://linkedin.com/company/jobing-az',
//            'telegram_number' => '+994 50 123 45 67',
//            'mail' => 'info@jobing.az',
//            'address' => 'Baku, Azerbaijan, Nizami Street 203',
//            'working_hours' => '09:00 - 18:00',
//
//            'header_scripts' => '<script async src="https://www.googletagmanager.com/gtag/js?id=UA-XXXXX-Y"></script>',
//            'body_scripts' => '<noscript><img height="1" width="1" src="https://www.facebook.com/tr?id=XXXXX"/></noscript>',
//            'footer_scripts' => '<script>console.log("System Ready");</script>',
//
//            'created_at' => now(),
//            'updated_at' => now(),
//        ]);

//                User::factory()->create([
//            'name' => 'Cyber Job',
//            'email' => 'adjkanskdja@sajshda.asad',
//            'password' => Hash::make('d6a7d@9"as(=_'),
//        ]);
    }
}
