<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Project;
use App\Proprety;

class ProjectTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    // Total projects are 10,000
    public function test_have_10000_projects()
    {
        $this->assertEquals(10000, Project::count());
    }

    // There should be 1 project with 2001 properties
    public function test_have_2001_properties()
    {
        $this->assertEquals(1, count(\DB::select('
            SELECT project_id, count(property_id) as num
            FROM properties
            GROUP BY project_id
            HAVING num = 2001')
        ));
    }
}
