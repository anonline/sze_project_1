<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RaceDataModel extends Model
{
    protected $table = 'race_data';

    public function RaceModel(){

        $this->belongsTo('App\RaceModel');
    }



}

