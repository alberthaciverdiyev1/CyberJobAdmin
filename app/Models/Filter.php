<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Filter extends Model
{
    use SoftDeletes;

    protected $table = 'filters';

    protected $fillable = ['name', 'key','parent_id'];

    protected $casts = [
        'name' => 'array',
    ];
    public function parent()
    {
        return $this->belongsTo(Filter::class, 'parent_id');
    }
    public function children()
    {
        return $this->hasMany(Filter::class, 'parent_id');
    }
}
