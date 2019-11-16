<?php

use Illuminate\Database\Seeder;

class PropertyTypesStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('property_types')->delete();
        \DB::table('statuses')->delete();

        $property_types = [["title" => 'Condo'], ["title" => 'House'], ["title" => 'Land']];
        $statuses = [["title" => 'Active'], ["title" => 'Inactive'], ["title" => 'Draft']];
        DB::table('property_types')->insert($property_types);
        DB::table('statuses')->insert($statuses);
    }
}
