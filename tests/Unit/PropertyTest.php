<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Property;

class PropertyTest extends TestCase
{
    use RefreshDatabase;
    private $property;

    public function setUp():void {
        parent::setUp();

        $this->property = factory(Property::class)->states('unit_test')->create();
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_property_has_property_title() {
        $this->assertIsString($this->property->property_title);
    }

    public function test_property_has_description() {
        $this->assertIsString($this->property->description);
    }

    public function test_property_has_bedroom() {
        $this->assertIsInt($this->property->bedroom);
    }

    public function test_property_has_bathroom() {
        $this->assertIsInt($this->property->bathroom);
    }

    public function test_property_has_property_type_relationship() {
        $this->assertEquals($this->property->property_type->id, $this->property->property_type_id);
    }

    public function test_property_has_status_relationship() {
        $this->assertEquals($this->property->status->id, $this->property->status_id);
    }

    public function test_property_has_for_sale() {
        $this->assertIsBool($this->property->for_sale);
    }

    public function test_property_has_for_rent() {
        $this->assertIsBool($this->property->for_rent);
    }

    public function test_property_has_project_relationship() {
        $this->assertEquals($this->property->project->id, $this->property->project_id);
    }

    public function test_property_has_region_relationship() {
        $this->assertEquals($this->property->region->id, $this->property->region_id);
    }
}
