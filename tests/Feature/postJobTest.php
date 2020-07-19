<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class postJobTest extends TestCase
{
    /** @test */

    public function postJobTest()
    {
        // $response = $this->post('/login', ['email' => 'kappa@gmail.com'
        //                                                         ,'password' => 'kappa123']);
        // $user = json_decode($response);
        
        $login = Http::post('http://localhost:4000/loginUser', [
            'email' => 'manish@gmail.com',
            'password' => 'manish'
        ]);

        $responseData = json_decode($login->body());
        $token = $responseData->token;

        // var_dump($responseData);
        // die();

        $response = Http::withHeaders(['Authorization' => 'Bearer '.$token])->
                                post('http://localhost:4000/api/v1/job',
                                            ['jobTitle' => 'Software Engineer',
                                            'experience' => '2 years',
                                            'level' => 'Bachelor',
                                            'positions' => 'Manager',
                                            'jobType' => 'Part Time',
                                            'salary' => '2000',
                                            'education' => 'Bachelor',
                                            'location' => 'Kathmandu',
                                            'applyBefore' => 'Tuesday',
                                            'jobDescription' => 'Simple work',
                                            'jobQualification' => 'Easy',
                                            'jobHours' => '3 hours',
                                            'benefits' => 'Easy',
                                            'expected' => 'Fun'
                                            // ['headers' => [
                                            //     'Authorization' => 'Bearer '.$responseData->token
                                            // ]
                                ]);       
        // $response->headers->set('Authorization','Bearer '.$responseData->token);

        $this->assertEquals(200, $response->status());
        // $this->assertInstanceOf('Illuminate\Testing\TestResponse', $response);
        // $this->assertEquals('http://localhost', $response->getTargetUrl());
    }
}
