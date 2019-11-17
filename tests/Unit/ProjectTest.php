<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Project;
use App\Property;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    private $project;
    private $property;

    public function setUp():void {
        parent::setUp();
        $this->project = factory(Project::class)->create();
        $this->property = factory(Property::class)->states('unit_test')->create([
            'project_id' => $this->project->id,
        ]);
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_project_has_project_title() {
        $this->assertIsString($this->project->project_title);
    }

    public function test_project_has_propereties_rekationship() {
        $this->assertEquals(1, $this->project->properties->count());
    }
}
