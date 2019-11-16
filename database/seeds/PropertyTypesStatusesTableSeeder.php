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

        $property_types = [["property_type_title" => 'Condo'], ["property_type_title" => 'House'], ["property_type_title" => 'Land']];
        $statuses = [["status_title" => 'Active'], ["status_title" => 'Inactive'], ["status_title" => 'Draft']];
        DB::table('property_types')->insert($property_types);
        DB::table('statuses')->insert($statuses);
    }
}
