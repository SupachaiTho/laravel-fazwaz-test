<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    return [
        'project_title' => rtrim($faker->sentence(rand(1, 3)), "."),
    ];
});
