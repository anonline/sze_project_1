<?php

namespace App\Http\Resources;

use App\AdminModel;
use App\RaceModel;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Admin as AdminResource;

class Race extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
                  return  [
                        'name' => $this->name,
                        'place' => $this->place,
                        'date' => $this->date,
                        'admin' => new AdminResource(AdminModel::find($this->admin_id)),
                        'webpage' => $this->webpage,
                        'races' => $this->RaceDataModel()->get()
                    ];

    }
}
