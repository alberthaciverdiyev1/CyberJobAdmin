<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';
    protected $fillable = ['name', 'email', 'phone', 'address', 'about', 'logo', 'cover_image', 'banner_image', 'category_id', 'is_verified', 'is_active'];
    protected $casts = [
        'about' => 'array',
    ];
    public function category()
    {
        return $this->belongsTo(CompanyCategory::class, 'category_id');
    }
}
