<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Property::class, function (Faker $faker) {
    return [
        'title' => rtrim($faker->sentence(rand(1, 3)), "."),
        'description' => $faker->paragraphs(rand(1, 4), true),
        'bedroom' => $faker->randomDigitNot(2),
        'bathroom' => rand(0,3),
        'for_sale' => $faker->boolean,
        'for_rent' => $faker->boolean,
        'region_id' => function () {
            return App\Region::inRandomOrder()->first()->id;
        },
        'property_type_id' => function () {
            return App\PropertyType::inRandomOrder()->first()->id;
        },
        'project_id' => function () {
            return App\Project::where('id','>','1')->inRandomOrder()->first()->id;
        },
        'status_id' => function () {
            return App\Status::inRandomOrder()->first()->id;
        },
    ];
});

$factory->state(App\Property::class, 'active_condo', function() {
    return [
        'status_id' => function () {
            return App\Status::where('title', '=', 'Active')->first()->id;
        },
        'property_type_id' => function () {
            return App\PropertyType::where('title', '=', 'Condo')->first()->id;
        },
        'for_sale' => true,
        'bedroom' => 2,
    ];
});

$factory->state(App\Property::class, 'first_project', function() {
    return [
        'project_id' => function () {
            return App\Project::first()->id;
        },
    ];
});
