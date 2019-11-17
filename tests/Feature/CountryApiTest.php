<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Resources\CountryResource;
use App\Country;

class CountryApiTest extends TestCase
{
    use RefreshDatabase;

    private $countries;

    public function setUp():void {
        parent::setUp();
        factory(Country::class, 5)->create();
        $this->countries = Country::orderBy('country_title', 'asc')->get();
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_get_all_countries()
    {
        $response = $this->json('GET', route('countries.api'));

        $resource = CountryResource::collection($this->countries);

        $response->assertResource($resource);
    }
}
