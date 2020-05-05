<?php

namespace App\Http\Resources;

use App\Http\Resources\Race as RaceResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Achievement extends JsonResource
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
            'race' => new RaceResource( $this->race()->first()),
            'finish' => $this->finish,
            'time' => $this->time,
            'average_speed' => $this->average_speed,
            'space' => $this->space,
            'rating' => $this->rating
        ];
    }
}
