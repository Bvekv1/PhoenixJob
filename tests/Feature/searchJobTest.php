<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class searchJobTest extends TestCase
{
    /** @test */
    public function searchJobTest()
    {
        $response = $this->call('POST', 'job_search', ['search','Full Time',
                                                        'category','Category'
                                                    ]);

        $this->assertEquals(200, $response->status());
    }
}
