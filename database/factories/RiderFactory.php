<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Rider;
use Faker\Generator as Faker;

$factory->define(Rider::class, function (Faker $faker) {

    return [
        'FirstName' => $faker->word,
        'LastName' => $faker->word,
        'gender' => $faker->word,
        'NIN' => $faker->word,
        'District_Id' => $faker->word,
        'plate_Id' => $faker->word,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
