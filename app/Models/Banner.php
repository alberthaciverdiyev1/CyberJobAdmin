<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = ['location', 'image', 'link', 'start_at', 'expiration_date', 'is_active', 'is_desktop'];

    protected $casts = [
        'start_at' => 'datetime',
        'expiration_date' => 'datetime',
        'is_active' => 'boolean',
        'is_desktop' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::saved(function (Banner $banner) {
            if ($banner->location === 'home_hero' && $banner->is_active) {
                static::where('id', '!=', $banner->id)
                    ->where('location', 'home_hero')
                    ->where('is_active', true)
                    ->update(['is_active' => false]);
            }
        });
    }
}
