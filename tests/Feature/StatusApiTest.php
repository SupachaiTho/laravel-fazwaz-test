<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Http\Resources\StatusResource;
use Tests\TestCase;
use App\Status;

class StatusApiTest extends TestCase
{
    use RefreshDatabase;

    private $statuses;

    public function setUp():void {
        parent::setUp();
        $this->statuses = factory(Status::class, 5)->create();
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_get_all_statuses()
    {
        $response = $this->json('GET', route('statuses.api'));

        $resource = StatusResource::collection($this->statuses);

        $response->assertResource($resource);
    }
}
