<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;

class deleteJobTest extends TestCase
{
    /** @test */
    public function deleteJobTest()
    {
        $login = Http::post('http://localhost:4000/api/v1/users/login', [
            'email' => 'kappa@gmail.com',
            'password' => 'kappa123'
        ]);

        $responseData = json_decode($login->body());
        // var_dump($responseData);
        // die();
        $token = $responseData->token;

        $response = Http::WithHeaders(['Authorization' => 'Bearer '.$token])
                    ->delete('localhost:4000/api/v1/job/1');

        $this->assertEquals(200, $response->status());
    }
}
