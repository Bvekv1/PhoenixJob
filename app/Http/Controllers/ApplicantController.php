<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApplicantController extends Controller
{

    public function get_applicant(request $request, $jobId){
        $userToken = session()->get('usertoken');
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$userToken
        ])->get('http://localhost:4000/api/v1/hire/'. $jobId);
        $data = json_decode($response->body());


        // dd($data);
if ($data !== []){
    return view('job_applicants',['getjobapplicant'=>$data]);
} else {
    return view('job_applicants');
}
}

public function hire_applicant(request $request, $jobId, $userId){
    // dd($jobId,$userId);
    $userToken = session()->get('usertoken');
    $response = Http::withHeaders([
        'Authorization' => 'Bearer '.$userToken
    ])->put('http://localhost:4000/api/v1/hire/'. $jobId,[
        'userId'=>$userId,
        'hireStatus'=> 1
    ]);
    $data = json_decode($response->body());
    // dd($data);
if ($data !== []){
return redirect()->back()->withErrors(['message'=>'applicant was hired']);
} else {
return redirect()->back()->withErrors(['error'=>'error occur']);
}
}

    public function reject_applicant(request $request, $jobId, $userId){
        // dd($jobId,$userId);
        $userToken = session()->get('usertoken');
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$userToken
        ])->put('http://localhost:4000/api/v1/reject/'. $jobId,[
            'userId'=>$userId,
            'hireStatus'=> 2
        ]);
        $data = json_decode($response->body());
        // dd($data);
        if ($data !== []){
            return redirect()->back()->withErrors(['rejectMessage'=>'applicant was rejected']);
        } else {
            return redirect()->back()->withErrors(['error'=>'error occur']);
        }
    }



}


