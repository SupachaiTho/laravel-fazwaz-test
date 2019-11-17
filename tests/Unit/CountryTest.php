<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Country;
use App\Region;

class CountryTest extends TestCase
{
    use RefreshDatabase;

    private $country;
    private $region;

    public function setUp():void {
        parent::setUp();
        $this->country = factory(Country::class)->create();
        $this->region = factory(Region::class)->create([
            'country_id' => $this->country->id,
        ]);
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_country_has_country_title() {
        $this->assertIsString($this->country->country_title);
    }

    public function test_country_has_region_relationship() {
        $this->assertEquals(1, $this->country->regions->count());
    }
}
