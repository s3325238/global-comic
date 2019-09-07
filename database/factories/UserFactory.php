<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

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
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'language' => $faker->randomElement(['vi', 'jp', 'en', 'kr']),
        'password' => '$2y$10$3B4Xw.mY9DtpkTOsczTjyeWJM42Tr8N7gVIgEHfT9pxJjS5gn/MAC', // password
        'verifyToken' => null,
        'status' => 1,
        'avatar' => 'default-avatar.png',
        'role_id' => '1',
        'remember_token' => Str::random(60),
    ];
});
