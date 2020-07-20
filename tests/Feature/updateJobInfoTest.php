<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;

class updateJobInfoTest extends TestCase
{
    /** @test */
    public function editJob()
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
                                put('http://localhost:4000/api/v1/job/1',
                                            ['jobTitle' => 'Software Engineer',
                                            'experience' => '2 years',
                                            'level' => 'Master',
                                            'positions' => 'nManager',
                                            'jobType' => 'Full Time',
                                            'salary' => '2000',
                                            'education' => 'Bachelor',
                                            'location' => 'Kathmandu',
                                            'applyBefore' => 'Tuesday',
                                            'jobDescription' => 'Simple work',
                                            'jobQualification' => 'Easy',
                                            'jobHours' => '3 hours',
                                            'benefits' => 'Easy',
                                            'expected' => 'Fun'
                                ]); 
        $this->assertEquals(200, $response->status());
    }

}
