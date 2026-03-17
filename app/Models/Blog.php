<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;
    protected $table = 'blogs';
    protected $fillable = ['title', 'description', 'image', 'read_count', 'is_active'];

    protected $casts = [
        'image' => 'string',
        'title' => 'array',
        'description' => 'array',
        'is_active' => 'boolean',
    ];
}
