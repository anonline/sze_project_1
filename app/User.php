<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{

    use HasApiTokens, Notifiable;

    public $timestamps = false;

    protected $table = 'users';

    protected $fillable = ['name', 'email', 'password', 'birth_date', 'phone_number', 'sex'];

    protected $hidden = ['password'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function races(){

        return $this->hasMany('RaceDataModel', 'race_registration.user_id','id');

    }

    public function raceAchievements(){

        return $this->hasMany('AchievementModel', 'user_id', 'id');

    }





}
