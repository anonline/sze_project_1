<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaceachievementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('race_achievement', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('race_id');
            $table->foreignId('user_id');
            $table->date('finish');
            $table->time('time');
            $table->float('average_speed');
            $table->time('space');
            $table->tinyInteger('rating')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('race_achievement');
    }
}
