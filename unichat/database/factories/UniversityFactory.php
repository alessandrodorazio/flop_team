<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\University;
use Faker\Generator as Faker;

$factory->define(University::class, function (Faker $faker) {
    return [
        'name' => $faker->streetName
    ];
});
