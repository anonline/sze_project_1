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
            $table->id();
            $table->foreignId('race_id');
            $table->foreignId('user_id');
            $table->date('finish');
            $table->string('time');
            $table->string('average_speed');
            $table->string('space');
            $table->tinyInteger('rating');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('raceachievement');
    }
}
