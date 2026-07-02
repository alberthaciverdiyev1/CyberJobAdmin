<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LegalTermAndUserAgreement extends Model
{
    protected $fillable = ['title', 'content', 'type', 'is_active'];

    protected $casts = [
        'title' => 'array',
        'content' => 'array',
        'is_active' => 'boolean',
    ];
}
