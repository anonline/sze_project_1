<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;


class AdminModel extends Authenticatable
{
    protected $table = 'admins';

    protected $fillable = ['name', 'email', 'password', 'organizer', 'phone_number'];

    protected $hidden = ['password'];

    public $timestamps = false;

    use HasApiTokens, Notifiable;

    protected $guard = 'admin';

    public function races(){

        return $this->hasMany('RaceModel','admin_id', 'id' );
    }

}
