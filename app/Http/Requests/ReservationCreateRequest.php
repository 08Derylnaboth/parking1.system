<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'start'=>['required','date','after_or_equal:now'],
            'end'=>['required','date','after:start'],
            'spot_id'=>['required'],
            'range'=>[new ExistingReservationRuleForInterval($this->get(key:'spot_id'))],
        ];
    }

    protected function prepareForValidation(){
        return $this->merge([
            'range'=>[
                'start'=>$this->get(key:'start'),
                'end'=>$this->get(key:'end'),
            ]
            ]);
    }
}
