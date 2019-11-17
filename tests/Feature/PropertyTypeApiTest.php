<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Http\Resources\PropertyTypeResource;
use Tests\TestCase;
use App\PropertyType;

class PropertyTypeApiTest extends TestCase
{
    use RefreshDatabase;

    private $property_types;

    public function setUp():void {
        parent::setUp();
        $this->property_types = factory(PropertyType::class, 5)->create();
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_get_all_property_types()
    {
        $response = $this->json('GET', route('property_types.api'));

        $resource = PropertyTypeResource::collection($this->property_types);

        $response->assertResource($resource);
    }
}
