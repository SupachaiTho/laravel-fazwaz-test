<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Status::class, function (Faker $faker) {
    $array_status = ['Active', 'Inactive', 'Draft'];
    return [
        'status_title' => $array_status[rand(0, 2)],
    ];
});
