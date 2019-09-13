<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\TranslateGroup;
use App\Manga;
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

$factory->define(TranslateGroup::class, function (Faker $faker) {
    return [
        'group_name' => $faker->name,
        'language_translate' => $faker->randomElement(['vi', 'jp', 'en', 'kr']),
        'leader_id' => $faker->unique()->numberBetween(1,5000),
    ];
});

$factory->define(Manga::class, function (Faker $faker) {
    return [
        'manga_title' => $faker->name,
        'language' => $faker->randomElement(['vi', 'jp', 'en', 'kr']),
    ];
});