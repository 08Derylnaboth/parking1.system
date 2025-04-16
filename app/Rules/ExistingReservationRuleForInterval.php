<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ExistingReservationRuleForInterval implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
    }

    public function _constructor(public int $spot_id){}

    public function passes($attribute, $value):bool
    {
        $return Spot::where(column:'id',$this->spot_id)->whereHas(relation:'reservation',function(Builder $query)use($value))
            {
                $query->where([
                    'start','<',Carbon::parse(Arr::get($value,key:'end'))
                    'end','>',Carbon::parse(Arr::get($value,key:'start'))
                ])->count()==0;
                


            }
    }

    public function message(){
        return 'A reservation for this spot for this period is ivalid.';
    }


}
