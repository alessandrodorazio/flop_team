<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Dictionary;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Dictionary::class, function (Faker $faker) {
    return [
        'word' => $faker->word
    ];
});
