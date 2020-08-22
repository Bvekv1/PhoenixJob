<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Http;

class RegistrationTest extends TestCase
{

   /** @test */
    public function register()
    {
      
        $response = Http::post('http://localhost:4000/api/v1/users', ['email' => 'asdfsdf@gmail.com',
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

        $this->assertEquals(200, $response->status());
        // $this->assertInstanceOf('Illuminate\Testing\TestResponse', $response);
        // $this->assertEquals('http://localhost', $response->getTargetUrl());
     
    }
}
