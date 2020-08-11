<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;


class JobStatusTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function JobStatusTest()
    {
        $login = Http::post('http://localhost:4000/api/v1/users/login', [
            'email' => 'suwal@gmail.com',
            'password' => 'asdf'
        ]);

        $responseData = json_decode($login->body());
        // var_dump($responseData);
        // die();
        $token = $responseData->token;

        // var_dump($responseData);
        // die();

        $response = Http::withHeaders(['Authorization' => 'Bearer '.$token])->
                                get('http://localhost:4000/api/v1/jobStatus/:jobId'); 
        $this->assertEquals(200, $response->status());
    }
}
