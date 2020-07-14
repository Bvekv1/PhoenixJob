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
        $response = $this->call('POST', 'login', ['email' => 'sujanmaharjan@gmail.com',
                                                    'password' => 'kappa123',
                                    ]);

        $this->assertEquals(302, $response->status());
        $this->assertInstanceOf('Illuminate\Testing\TestResponse', $response);
        $this->assertEquals('http://localhost', $response->getTargetUrl());

    }
}
