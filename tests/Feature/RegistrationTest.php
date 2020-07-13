<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegistrationTest extends TestCase
{

   /** @test */
    public function register()
    {
        $response = $this->call('POST', 'register', ['email' => 'zexcu008@gmail.com',
                                                        'firstName' => 'Sujan',
                                                        'lastName' => 'Maharjan',
                                                        'password' => 'kappa123',
                                                        'userType' => '1',
                                                        'companName' => '345',
                                                        'organizationType' => 'Private',
                                                        'address' => 'Kathmandu',
                                                        'country' => 'Nepal',
                                                        'city' => 'Kathmandu',
                                                        'phone' => '9808081317',
                                                        'website' => 'okay.com',
                                                        'companyDescription' => 'Nothing'
                                                    ]);

        $this->assertEquals(302, $response->status());
        $this->assertInstanceOf('Illuminate\Testing\TestResponse', $response);
        $this->assertEquals('http://localhost', $response->getTargetUrl());
     
    }
}
