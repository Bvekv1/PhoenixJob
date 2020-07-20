<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;

class applyJobTest extends TestCase
{
    /** @test */
    public function applyJobTest()
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
                    ->post('localhost:4000/api/v1/jobApplied',
                            [
                                'jobId'=>'1'
                            ]
                );

        $this->assertEquals(200, $response->status());
    }
}
