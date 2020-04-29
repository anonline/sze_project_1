<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RaceRegistrationModel extends Model
{
    protected $table = 'race_registration';

    public function user(){

        return $this->belongsTo('User', 'id', 'user_id');
    }

    public function race(){

        return $this->belongsTo('RaceModel', 'id', 'race_id');
    }
}
