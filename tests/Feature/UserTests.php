<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;

class UserTests extends TestCase
{
    /** @test */

    public function loginTest()
    {
        $response = $this->call('POST', 'login', ['email' => 'kappa123@gmail.com',
                                                    'password' => 'kappa123',
                                    ]);

        $this->assertEquals(302, $response->status());
        $this->assertInstanceOf('Illuminate\Testing\TestResponse', $response);
        $this->assertEquals('http://localhost', $response->getTargetUrl());

    }

    /** @test */
    public function registerTest()
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

    /** @test */
    public function editProfileTest()
    {
        $login = Http::post('http://localhost:4000/api/v1/users/login', [
            'email' => 'okaydude@gmail.com',
            'password' => 'kappa123'
        ]);

        $responseData = json_decode($login->body());
        // var_dump($responseData);
        // die();
        $token = $responseData->token;

        
        $response = Http::WithHeaders(['Authorization' => 'Bearer '.$token])
                        ->put('http://localhost:4000/api/v1/users/1',[
                            'firstName' => 'okay',
                            'lastName' => 'dude',
                            'email' => 'okaydude@gmail.com',
                            'userType' => '1',    
                            'companyName' => 'Okay',
                            'organizationType' => 'Private',
                            'address' => 'Kathmandu',
                            'country' => 'Nepal',
                            'city' => 'Kathmandu',
                            'phone' => '9808081317',
                            'website' => "www.okay.com",
                            'companyDescription' => "Don't know"
                        ]);
        $this->assertEquals(200, $response->status());
        // $response->assertStatus(200);
    }
}
