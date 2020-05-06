<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class AchievementModel extends Model
{
    protected $table = 'race_achievement';

    public $timestamps = false;

    public function raceData(){

        return $this->belongsTo('App\RaceDataModel', 'race_id', 'id');
    }

    public function race(){

        return $this->hasOneThrough('App\RaceModel', 'App\RaceDataModel', 'id', 'id', 'race_id', 'races_id');
    }

    public function user(){

        return $this->belongsTo('User', 'id', 'user_id');
    }
}