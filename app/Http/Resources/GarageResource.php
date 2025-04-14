<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GarageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'zipcode'=>$this->zipcode,
            'coordinates'=>[
                'lng'=>$this->lng,
                'lat'=>$this->lat,],
            'free_spots'=>'',
            'total_spots'=>'',
        ];
    }
}
