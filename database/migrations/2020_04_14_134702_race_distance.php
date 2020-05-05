<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RaceDistance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('race_data', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('races_id');
            $table->float('distance');
            $table->integer('max_register_number');
            $table->integer('register_number');
            $table->integer('rating')->default(0);
            $table->integer('number_of_votes')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('race_data');
    }
}
