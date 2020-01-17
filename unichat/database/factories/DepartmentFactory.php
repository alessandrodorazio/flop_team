<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Department;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Department::class, function (Faker $faker) {
    return [
        'name' => $faker->domainName,
        'university_id' => random_int(1, 5)
    ];
});
