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

$factory->define(App\Author::class, function (Faker\Generator $faker) {
    return [
        'sexo' => $sexo = $faker->randomElement(['hombre','mujer']),
        'nombre' => $faker->name($sexo),
        'pais' => $faker->country,
    ];
});
