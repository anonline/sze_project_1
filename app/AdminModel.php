<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    protected $table = 'admins';

    public function races(){

        return $this->hasMany('RaceModel','admin_id', 'id' );
    }

}
