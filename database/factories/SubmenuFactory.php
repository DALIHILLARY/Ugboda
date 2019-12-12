<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Submenu;
use Faker\Generator as Faker;

$factory->define(Submenu::class, function (Faker $faker) {

    return [
        'parent' => $faker->randomDigitNotNull,
        'child' => $faker->randomDigitNotNull,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
