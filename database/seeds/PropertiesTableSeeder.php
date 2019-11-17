<?php

use Illuminate\Database\Seeder;

class PropertiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('properties')->delete();

        factory(App\Property::class, 100)->create();

        // factory(App\Property::class, 2001)->states('first_project')->create();
        // factory(App\Property::class, 3000)->states('active_condo')->create();
        // for ($i = 0; $i < 100; $i++) {
        //     factory(App\Property::class, 940)->create();
        // }
        // factory(App\Property::class, 999)->create();

        // DB::table('properties')
        // ->where('status_id', 2)
        // ->where('property_type_id', 2)
        // ->where('for_rent', true)
        // ->update(['region_id' => App\Region::first()->id]);
    }
}
