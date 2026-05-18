<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    protected $fillable = ['name', 'icon', 'icon_custom', 'parent_id'];
    protected $casts = [
        'name' => 'array',
        'icon' => 'string',
        'icon_custom' => 'string',
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function vacancies()
    {
        return $this->hasMany(Vacancy::class, 'category_id');
    }
}
