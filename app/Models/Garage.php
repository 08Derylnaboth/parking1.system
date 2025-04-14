<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Garage extends Model
{
    /** @use HasFactory<\Database\Factories\GarageFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    public function prices():HasMany{
        return $this->hasMany(related:Price::class);
    }

    public function spots():HasMany{
        return $this->hasMany(related:Spot::class);
    }

    public function spotAttributes():BelongsToMany{
        return $this->belongsToMany(related:SpotAttribute::class)->withPivot(columns:'price_per_hour');
    }
}
