<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;

class editProfileTest extends TestCase
{
    /** @test */
    public function editProfile()
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
