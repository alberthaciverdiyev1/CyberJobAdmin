<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Vacancy extends Model
{
    protected $table = 'vacancies';

    protected $fillable = [
        'name',
        'requirements',
        'description',
        'city_id',
        'view_count',
        'expire_date',
        'banner_image',
        'min_salary',
        'max_salary',
        'min_age',
        'max_age',
        'email',
        'company_id',
        'category_id',
        'is_active',
        'is_premium',
        'is_bring_top',
    ];

    protected $casts = [
        'expire_date' => 'datetime',
        'is_active' => 'boolean',
        'is_premium' => 'boolean',
        'is_bring_top' => 'boolean',
        'min_salary' => 'float',
        'max_salary' => 'float',
        'min_age' => 'integer',
        'max_age' => 'integer',
        'view_count' => 'integer',
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function filters(): BelongsToMany
    {
        return $this->belongsToMany(Filter::class, 'vacancy_filters');
    }
}
