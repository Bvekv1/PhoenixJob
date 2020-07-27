<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;

class hireApplicantTest extends TestCase
{
    /** @test */
    public function hireApplicant()
    {
        $login = Http::post('http://localhost:4000/api/v1/users/login', [
            'email' => 'kappa@gmail.com',
            'password' => 'kappa123'
        ]);

        $responseData = json_decode($login->body());
        // var_dump($responseData);
        // die();
        $token = $responseData->token;

        // var_dump($responseData);
        // die();

        $response = Http::withHeaders(['Authorization' => 'Bearer '.$token])->
                                put('http://localhost:4000/api/v1/hire/:jobId',
                                            ['hireStatus' => '1'
                                    
                                ]); 
        $this->assertEquals(200, $response->status());
    }

}
