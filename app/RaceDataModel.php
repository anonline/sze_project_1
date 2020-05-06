<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AchievementModel;

class RaceDataModel extends Model
{
    protected $table = 'race_data';

    protected $fillable = ['races_id', 'distance', 'max_register_number', 'register_number'];

    public $timestamps = false;


    public function raceModel(){

        $this->belongsTo('App\RaceModel');
    }

    public function achievement(){

        $this->belongsTo('AchievementModel');
    }



}

