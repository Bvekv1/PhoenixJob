<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class JobController extends Controller
{
    public function job_post_form(){
        if (session()->has('usertoken')){
            return view('post_Job');
        }
        else{
            return redirect('/');
        }

    }

    public function job_post(request $request){
        $this->validate($request,[
            'job_title' => 'required',
            'experience' => 'required',
            'level' => 'required',
            'position' => 'required',
            'jobType' => 'required',
            'salary' => 'required',
            'education' => 'required',
            'location' => 'required',
            'applyBefore' => 'required',
            'jobDescription' => 'required',
            'jobQualification' => 'required',
            'jobHours' => 'required',
            'benefits' => 'required',
            'expected' => 'required'
        ]);

        $job_title = $request->input('job_title');
        $experience = $request->input('experience');
        $level = $request->input('level');
        $position = $request->input('position');
        $jobType = $request->input('jobType');
        $salary = $request->input('salary');
        $education = $request->input('education');
        $location = $request->input('location');
        $applyBefore = $request->input('applyBefore');
        $jobDescription = $request->input('jobDescription');
        $jobQualification = $request->input('jobQualification');
        $expected = $request->input('expected');
        $jobHours = $request->input('jobHours');
        $benefits = $request->input('benefits');

        $userToken = session()->get('usertoken');
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$userToken
        ])->post('http://localhost:4000/postJob', [
            'jobTitle' => $job_title,
            'experience' => $experience,
            'level' => $level,
            'positions' => $position,
            'jobType' => $jobType,
            'salary' => $salary,
            'education' => $education,
            'location' => $location,
            'applyBefore' => $applyBefore,
            'jobDescription' => $jobDescription,
            'jobQualification' => $jobQualification,
            'jobHours' => $jobHours,
            'benefits' => $benefits,
            'expected' => $expected
        ]);

        $responseData = json_decode($response->body());
//        dd($responseData);
        if ($responseData->status == 200 && $responseData->message === 'sucess'){
            return redirect()->back()->withErrors(['message'=>'job posted successfully']);
        }
    }
}