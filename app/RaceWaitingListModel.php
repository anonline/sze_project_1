<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RaceWaitingListModel extends Model
{
    protected $table = 'race_waiting_list';

    protected $fillable = ['user_id', 'race_id'];

    public $timestamps = false;

    public static function boot()

    {

        parent::boot();

        static::creating(function ($model) {

            $model->created_at = $model->freshTimestamp();

        });

    }
}
