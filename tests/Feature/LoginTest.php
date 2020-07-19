<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /** @test */

    public function testExample()
    {
        $response = $this->call('POST', 'login', ['email' => 'manish@gmail.com',
                                                    'password' => 'manish',
                                    ]);

        $this->assertEquals(302, $response->status());
        $this->assertInstanceOf('Illuminate\Testing\TestResponse', $response);
        $this->assertEquals('http://localhost/post_job', $response->getTargetUrl());

    }
}
