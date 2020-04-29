<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Admin as AdminResource;
use App\AdminModel;

class RaceRegistration extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'place' => $this->place,
            'date' => $this->date,
            'webpage' => $this->webpage,
            'distance' => $this->distance,
            'admin' => new AdminResource(AdminModel::find($this->admin_id))
        ];
    }
}
