<?php

/** @var Factory $factory */

use App\Room;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Room::class, function (Faker $faker) {
    $type = random_int(1, 3);
    if($type === 1) {
        $name = null;
        $description = null;
    } else {
        $name = $faker->city;
        $description = $faker->state;
    }
    return [
        'type' => $type,
        'name' => $name,
        'description' => $description,
        'university_id' => random_int(1, 5)
    ];
});
