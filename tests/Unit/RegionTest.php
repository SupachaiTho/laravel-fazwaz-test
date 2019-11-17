<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Region;

class RegionTest extends TestCase
{
    use RefreshDatabase;

    private $region;

    public function setUp():void {
        parent::setUp();
        $this->region = factory(Region::class)->states('unit_test')->create();
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_region_has_region_title() {
        $this->assertIsString($this->region->region_title);
    }

    public function test_region_has_country_relationship() {
        $this->assertEquals($this->region->country_id, $this->region->country->id);
    }
}
