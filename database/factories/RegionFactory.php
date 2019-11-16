<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Region::class, function (Faker $faker) {
    static $number = 1;
    return [
        'region_title' => 'Region ' . $number++,
        'country_id' => function () {
            return App\Country::inRandomOrder()->first()->id;
        },
    ];
});
