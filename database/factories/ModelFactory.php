<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(Reflex\Scorpio\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Reflex\Scorpio\Page::class, function (Faker\Generator $faker) {
    return [
        'title' => $title = $faker->sentence,
        'slug'  => str_slug($title),
        'body'  => $faker->paragraph,
    ];
});

$factory->define(Reflex\Scorpio\Theme::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence
    ];
});
