<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubscriptionPlan extends Model
{
    protected $fillable = ['name', 'old_price', 'new_price', 'type', 'is_active'];

    protected $casts = [
        'name' => 'array',
        'is_active' => 'boolean',
    ];

    public function options(): HasMany
    {
        return $this->hasMany(SubscriptionPlanOption::class);
    }
}
