<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RaceRegistrationModel extends Model
{
    protected $table = 'race_registration';

    protected $fillable = ['race_id', 'user_id'];

    public $timestamps = false;

    public function user(){

        return $this->belongsTo('User', 'id', 'user_id');
    }

    public function race(){

        return $this->belongsTo('RaceDataModel', 'id', 'race_id');
    }
}
