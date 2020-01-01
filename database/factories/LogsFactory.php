<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Logs;
use Faker\Generator as Faker;

$factory->define(Logs::class, function (Faker $faker) {

    return [
        'passPhone' => $faker->word,
        'riderPhone' => $faker->word,
        'plate_id' => $faker->word,
        'approved' => $faker->word,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
