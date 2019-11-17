<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Property::class, function (Faker $faker) {
    return [
        'property_title' => $faker->name,
        'description' => $faker->text,
        'bedroom' => $faker->randomDigitNot(2),
        'bathroom' => rand(0,10),
        'for_sale' => $faker->boolean,
        'for_rent' => $faker->boolean,
        // 'region_id' => function () {
        //     return App\Region::inRandomOrder()->first()->id;
        // },
        // 'property_type_id' => function () {
        //     return App\PropertyType::inRandomOrder()->first()->id;
        // },
        // 'project_id' => function () {
        //     return App\Project::where('id','>','1')->inRandomOrder()->first()->id;
        // },
        // 'status_id' => function () {
        //     return App\Status::inRandomOrder()->first()->id;
        // },
    ];
});

$factory->state(App\Property::class, 'active_condo', function() {
    return [
        'status_id' => function () {
            return App\Status::where('status_title', '=', 'Active')->first()->id;
        },
        'property_type_id' => function () {
            return App\PropertyType::where('property_type_title', '=', 'Condo')->first()->id;
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

$factory->state(App\Property::class, 'unit_test', function() {
    return [
        'region_id' => factory(App\Region::class)->states('unit_test')->create()->id,
        'property_type_id' => factory(App\PropertyType::class)->create()->id,
        'project_id' => factory(App\Project::class)->create()->id,
        'status_id' => factory(App\Status::class)->create()->id,
    ];
});