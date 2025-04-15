<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'spot_id'=>$this->spot_id,
            'start'=>$this->start,
            'end'=>$this->end,
            'paid_at'=>$this->paid_at,
            'created_at'=>$this->created_at,
        ];
        //parent::toArray($request);
    }
}
