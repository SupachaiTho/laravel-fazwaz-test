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

class SeederTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    // How To Test State 3
    // 1. REMOVE line 34 and 35 at phpunit.xml
    // 2. REMOVE protected function setUp at SeederTest.php
    // 3. run `php artisan migrate:fresh --seed`
    // 4. run `vendor/bin/phpunit`
    
    protected function setUp(): void 
    {

        $this->markTestSkipped('Test State 3');
    }

    public function testExample()
    {
        $this->assertTrue(true);
    }

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

    // Total projects are 10,000
    public function test_have_10000_projects()
    {
        $this->assertEquals(10000, Project::count());
    }

    // There should be 1 project with 2001 properties
    public function test_have_2001_properties()
    {
        $this->assertEquals(1, count(\DB::select('
            SELECT project_id, count(property_id) as num
            FROM properties
            GROUP BY project_id
            HAVING num = 2001')
        ));
    }
}
