<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RaceData extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'distance' => $this->distance,
            'max_register_number' => $this->max_register_number,
            'register_number' => $this->register_number,
            'rating' => $this->rating
        ];
    }
}
