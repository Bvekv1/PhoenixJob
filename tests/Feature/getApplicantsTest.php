<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;

class getApplicantsTest extends TestCase
{
   /** @test */
    public function testExample()
    {
        $login = Http::post('http://localhost:4000/api/v1/users/login', [
            'email' => 'rohan12@gmail.com',
            'password' => 'rohan123'
        ]);

        $responseData = json_decode($login->body());
        // var_dump($responseData);
        // die();
        $token = $responseData->token;
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$token
        ])->get('http://localhost:4000/api/v1/hire/4');

        $this->assertEquals(200, $response->status());
       
    }
}
