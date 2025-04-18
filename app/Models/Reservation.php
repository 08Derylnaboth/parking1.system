<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    /** @use HasFactory<\Database\Factories\ReservationFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    protected $dates = [
        'start',
        'end',
        'paid_at',
        'created_at',
        'updated_at'
    ];

    public function spot():BelongsTo{
        return $this->belongsTo(related:Spot::class);
    }

    public function user():BelongsTo{
        return $this->belongsTo(related:User::class);
    }

}
