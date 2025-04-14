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

    public function scopeFilter(Builder $query, array $filters)
    {
        $query->when(Arr::has(filters,['start','end'],function(Builder $query)use($filters)))
        {
            $query->whereDoesntHave(relation:'reservation',function(Builder $query)use($filters))
            {
                $start=Carbon::parse(Arr::get($filters,key:'start'));
                $end=Carbon::parse(Arr::get($filters,key:'end'));

                $query->whereBetween(column:'start',[$start,$end])
                      ->orWhereBetween(column:'end',[$start,$end])
                      ->orWhereRaw(sql:'?BETWEEN start and end',[$start])
                      ->orWhereRaw(sql:'?BETWEEN start and end',[$end])


            }
        }
    }
    

}
