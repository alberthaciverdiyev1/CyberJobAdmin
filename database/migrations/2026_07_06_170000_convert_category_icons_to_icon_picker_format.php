<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    private const ICON_MAP = [
        'code' => 'fas-code',
        'database' => 'fas-database',
        'globe' => 'fas-globe',
        'server' => 'fas-server',
        'network' => 'fas-network-wired',
        'security' => 'fas-shield-halved',
        'cloud' => 'fas-cloud',
        'mobile' => 'fas-mobile-screen-button',
        'design' => 'fas-pen-ruler',
        'analytics' => 'fas-chart-line',
        'ai' => 'fas-brain',
        'robot' => 'fas-robot',
        'cogs' => 'fas-gears',
        'paint' => 'fas-palette',
        'chart' => 'fas-chart-bar',
        'envelope' => 'fas-envelope',
        'shopping' => 'fas-cart-shopping',
        'camera' => 'fas-camera',
        'support' => 'fas-headset',
        'education' => 'fas-graduation-cap',
    ];

    public function up(): void
    {
        DB::table('categories')
            ->whereNotNull('icon')
            ->where(function ($query) {
                $query->where('icon_custom', '')
                    ->orWhereNull('icon_custom');
            })
            ->orderBy('id')
            ->each(function (object $category) {
                if (isset(self::ICON_MAP[$category->icon])) {
                    DB::table('categories')
                        ->where('id', $category->id)
                        ->update(['icon' => self::ICON_MAP[$category->icon]]);
                }
            });
    }

    public function down(): void
    {
        $reverseMap = array_flip(self::ICON_MAP);

        DB::table('categories')
            ->whereNotNull('icon')
            ->orderBy('id')
            ->each(function (object $category) use ($reverseMap) {
                if (isset($reverseMap[$category->icon])) {
                    DB::table('categories')
                        ->where('id', $category->id)
                        ->update(['icon' => $reverseMap[$category->icon]]);
                }
            });
    }
};
