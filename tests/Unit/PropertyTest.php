<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Property;

class PropertyTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_have_100000_properties()
    {
        $this->assertEquals(100000, Property::count());
    }

    public function test_have_2001_properties()
    {
        $this->assertEquals(2001, Property::where('project_id', 1)->count());
    }

    public function test_have_3000_properties()
    {
        $this->assertEquals(3000, Property::where('property_type_id', 1)
        ->where('status_id', 1)
        ->where('for_sale', true)
        ->where('bedroom', 2)
        ->count());
    }
    public function test_have_0_properties()
    {
        $this->assertEquals(0, Property::where('property_type_id', 2)
        ->where('status_id', 2)
        ->where('for_rent', true)
        ->where('region_id', 4)
        ->count());
    }
}
