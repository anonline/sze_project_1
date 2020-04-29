<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'name' => $faker->text(7),
        'place' => $faker->address,
        'date' => $faker->date('Y-m-d'),
        'admin_id' => $faker->numberBetween(0, 5),
        'webpage' => $faker->url
    ];
});
