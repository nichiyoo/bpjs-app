<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class District extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function villages(): HasMany
    {
        return $this->hasMany(Village::class, 'district_id');
    }

    public function officers(): HasManyThrough
    {
        return $this->hasManyThrough(Officer::class, Village::class, 'district_id', 'village_id');
    }
}
