<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    /** @use HasFactory<\Database\Factories\VehicleFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    public function user():BelongsTo{
        return $this->belongsTo(related:User::class);
    }

    public function size():BelongsTo{
        return $this->belongsTo(related:Size::class);
    }

}
