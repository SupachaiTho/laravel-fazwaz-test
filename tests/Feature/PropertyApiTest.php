<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Http\Resources\PropertyResource;
use Tests\TestCase;
use App\Property;

class PropertyApiTest extends TestCase
{
    use RefreshDatabase;

    private $properties;
    private $quert;

    public function setUp():void {
        parent::setUp();
        factory(Property::class, 20)->states('unit_test')->create();

        $this->query = Property::join('property_types', 'properties.property_type_id', 'property_types.id')
            ->join('statuses', 'properties.status_id', 'statuses.id')
            ->join('projects', 'properties.project_id', 'projects.id')
            ->join('regions', 'properties.region_id', 'regions.id')
            ->join('countries', 'regions.country_id', 'countries.id')
            ->select(
                'property_id',
                'property_title',
                'description',
                'bedroom',
                'bathroom',
                'property_type_title',
                'status_title',
                'for_sale',
                'for_rent',
                'project_title',
                'country_title',
            )->orderBy('property_title', 'asc')
            ->paginate(20);
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_get_all_properties()
    {
        $this->properties = $this->query;

        $response = $this->json('GET',route('properties.api'));

        $json = $response->json()['data']['data'];

        $resource = PropertyResource::collection($this->properties);

        $resourceResponse = $resource->response()->getData(true)['data'];

        $this->assertEquals($json, $resourceResponse);
    }
}
