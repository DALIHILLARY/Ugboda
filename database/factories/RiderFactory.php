<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Rider;
use Faker\Generator as Faker;

$factory->define(Rider::class, function (Faker $faker) {

    return [
        'FirstName' => $faker->word,
        'LastName' => $faker->word,
        'District' => $faker->word,
        'Plate' => $faker->word,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
