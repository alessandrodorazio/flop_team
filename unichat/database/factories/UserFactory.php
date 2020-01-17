<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    $type = random_int(1,100);
    if($type < 70) {
        $type = 1;
        $faculty_id = random_int(1, 100);
        $course_year = random_int(1, 3);
        $university_id = null;
    }
    if($type >= 70 && $type < 90) {
        $type = 2;
        $faculty_id = null;
        $course_year = null;
        $university_id = random_int(1, 5);
    }
    if($type >= 90) {
        $type = 3;
        $faculty_id = null;
        $course_year = null;
        $university_id = random_int(1, 5);
    }
    return [
        'name' => $faker->firstName,
        'surname' => $faker->lastName,
        'type' => $type,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'university_id' => $university_id,
        'course_year' => $course_year,
        'faculty_id' => $faculty_id,
        'remember_token' => Str::random(10),
    ];
});
