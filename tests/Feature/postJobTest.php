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

//        dd($responseData = json_decode($response->body()));

        $responseData = json_decode($login->body());
        $token = $responseData->token;

        // var_dump($token);
        // die();

        $response = $this->call('POST',
                                'post_job',
                                ['job_title' => 'Software Engineer',
                                'experience' => '2 years',
                                'level' => 'Bachelor',
                                'position' => 'Manager',
                                'jobType' => 'Part Time',
                                'salary' => '2000',
                                'education' => 'Bachelor',
                                'location' => 'Kathmandu',
                                'applyBefore' => 'Tuesday',
                                'jobDescription' => 'Simple work',
                                'jobQualification' => 'Easy',
                                'jobHours' => '3 hours',
                                'benefits' => 'Easy',
                                'expected' => 'Fun'],
                                // ['headers' => [
                                //     'Authorization' => 'Bearer '.$responseData->token
                                // ]
                                ['headers' => [
                                  'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MiwidXNlclR5cGUiOiIwIiwiaWF0IjoxNTk0NjU4NDcxfQ.9ifeQxqlNXdlOi_8QfOvaVNhB82Jzl3bE40-nmHyBoI',
                                ]]
                            );       

        $this->assertEquals(302, $response->status());
        $this->assertInstanceOf('Illuminate\Testing\TestResponse', $response);
        $this->assertEquals('http://localhost', $response->getTargetUrl());
    }
}
