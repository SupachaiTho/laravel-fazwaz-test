<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Property;
use App\PropertyType;
use App\Status;
use App\Region;
use App\Project;

class PropertyTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    // Total properties are 100,000
    public function test_have_100000_properties()
    {
        $this->assertEquals(100000, Property::count());
    }

    //There should be 3000 properties that are 'Active' - ‘Condo’ -  'For sale: Yes' - '2 bedrooms'
    public function test_have_3000_properties()
    {
        $this->assertEquals(3000, Property::where('property_type_id', 1)
        ->where('status_id', 1)
        ->where('for_sale', true)
        ->where('bedroom', 2)
        ->count());
    }

    // There should be 0 property that are ‘Inactive’ - ‘House’ - ‘For rent: Yes’ - ‘Region 4’
    public function test_have_0_properties()
    {
        $this->assertEquals(0, Property::where('property_type_id', 2)
        ->where('status_id', 2)
        ->where('for_rent', true)
        ->where('region_id', 4)
        ->count());
    }
}
