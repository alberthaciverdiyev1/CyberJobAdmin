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
}
