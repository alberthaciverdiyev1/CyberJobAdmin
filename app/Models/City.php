<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';
    protected $fillable = ['name'];
    protected $casts = [
        'name' => 'array',
    ];
    public function vacancies()
    {
        return $this->hasMany(Vacancy::class, 'city_id');
    }
}
