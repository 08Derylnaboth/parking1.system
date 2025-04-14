<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spot extends Model
{
    /** @use HasFactory<\Database\Factories\SpotFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    public function spotAttributes():BelongsToMany{
        return $this->belongsToMany(related:SpotAttribute::class);
    }

    public function garage():BelongsTo{
        return $this->belongsTo(related:Garage::class);
    }

    public function reservations():HasMany{
        return $this->hasMany(related:Reservation::class);
    }

    public function size():BelongsTo{
        return $this->belongsTo(related:Size::class);
    }

}
