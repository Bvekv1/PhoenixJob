<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function view_job_applicants($jobId){
        return view('job_applicants');
    }

    public function get_applicant(request $request, $jobId){

        $userToken = session()->get('usertoken');
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$userToken
        ])->get('http://localhost:4000/api/v1/hire/'. $jobId);
        $data = json_decode($response->body());

//         dd($data);
if ($data !== []){
    return view('job_applicants',['getjobapplicant'=>$data]);
} else {
    return redirect()->back()->withErrors(['message'=>'No data']);
}
}

}
      

