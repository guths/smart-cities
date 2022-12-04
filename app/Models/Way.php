<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Way extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function points(): HasMany
    {
        return $this->hasMany(Point::class);
    }

    public function times(): HasMany
    {
        return $this->hasMany(Time::class);
    }
}
