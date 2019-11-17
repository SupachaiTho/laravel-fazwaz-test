<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\PropertyType;
use App\Property;

class PropertyTypeTest extends TestCase
{
    use RefreshDatabase;

    private $property_type;
    private $property;

    public function setUp():void {
        parent::setUp();
        $this->property_type = factory(PropertyType::class)->create();
        $this->property = factory(Property::class)->states('unit_test')->create([
            'property_type_id' => $this->property_type->id,
        ]);
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_property_type_has_property_type_title() {
        $this->assertIsString($this->property_type->property_type_title);
    }

    public function test_property_type_has_properties_relationship() {
        $this->assertEquals(1, $this->property_type->properties->count());
    }
}
