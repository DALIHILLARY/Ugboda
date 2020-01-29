<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Report;
use Faker\Generator as Faker;

$factory->define(Report::class, function (Faker $faker) {

    return [
        'rider_Id' => $faker->word,
        'plate_Id' => $faker->word,
        'phone' => $faker->word,
        'category' => $faker->word,
        'progress' => $faker->word,
        'location' => $faker->word,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
