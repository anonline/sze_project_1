<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AchievementModel extends Model
{
    protected $table = 'race_achievement';

    public function race(){

        return $this->belongsTo('RaceModel', 'id', 'race_id');
    }

    public function user(){

        return $this->belongsTo('User', 'id', 'user_id');
    }
}
