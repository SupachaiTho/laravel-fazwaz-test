<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Status;
use App\Property;

class StatusTest extends TestCase
{
    use RefreshDatabase;

    private $status;
    private $property;

    public function setUp():void {
        parent::setUp();
        $this->status = factory(Status::class)->create();
        $this->property = factory(Property::class)->states('unit_test')->create([
            'status_id' => $this->status->id,
        ]);
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_status_has_status_title() {
        $this->assertIsString($this->status->status_title);
    }

    public function test_status_has_properties_relationship() {
        $this->assertEquals(1, $this->status->properties->count());
    }
}
