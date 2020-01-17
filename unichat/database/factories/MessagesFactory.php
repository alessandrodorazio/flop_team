<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Message;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker, $options) {
    $important = random_int(1, 100) > 80;
    return [
        'text' => $faker->sentence,
        'important' => $important,
        'room_id' => $options['room_id'],
        'user_id' => $options['user_id']
    ];
});
