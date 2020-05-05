<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AchievementModel;

class RaceDataModel extends Model
{
    protected $table = 'race_data';

    public function raceModel(){

        $this->belongsTo('App\RaceModel');
    }

    public function achievement(){

        $this->belongsTo('AchievementModel');
    }



}

