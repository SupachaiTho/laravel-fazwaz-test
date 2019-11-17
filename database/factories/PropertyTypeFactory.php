<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\PropertyType::class, function (Faker $faker) {
    $array_type = ['Condo', 'Land', 'House'];
    return [
        'property_type_title' => $array_type[rand(0, 2)],
    ];
});
