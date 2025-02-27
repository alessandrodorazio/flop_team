<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Faculty;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Faculty::class, function (Faker $faker) {
    return [
        'name' => $faker->safeColorName,
        'department_id' => random_int(1, 20)
    ];
});
