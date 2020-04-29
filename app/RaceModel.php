<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\RaceDataModel;

class RaceModel extends Model
{
    protected $table = 'races';
    protected $primaryKey = 'id';

    public function users(){

        return $this->belongsToMany('UserModel', 'race_registration', 'user_id', 'race_id');
    }

    public function achievement(){

        return $this->belongsToMany('AchievementModel', 'race_achievement', 'id', 'race_id');
    }

    public function RaceDataModel(){

        return $this->hasMany('App\RaceDataModel', 'races_id', 'id');

    }

    public function admin(){

        return $this->belongsTo('App\AdminModel');
    }
}
