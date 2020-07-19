<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AppliedJobController extends Controller
{
    public function job_applied_page(){
        if (session()->has('usertoken')){
        return view('job_applied');
        }
        else{
            return redirect('/');
        }
    }

    public function job_applied(request $request){
        $jobId=$request->input('jobId');
        // dd($jobId);
        $userToken = session()->get('usertoken');
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$userToken
        ])->post('http://localhost:4000/api/v1/jobApplied/', ['jobId'=>$jobId]);
        $data = json_decode($response->body());
//        dd($data);

        if ($data->status == 200 && $data->message === 'Job was applied successfully'){
            return back()->withErrors(['message' => $data->message]);
        }
        else {
            return back()->withErrors(['error' => 'job was not applied']);
        }
    }

    public function get_applied_job(request $request){
        $userToken = session()->get('usertoken');
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$userToken
        ])->get('http://localhost:4000/api/v1/jobApplied');
        $data = json_decode($response->body());
//        dd($data);
//        foreach ($data as $datas){
//            dd($datas->job->jobTitle);
//        }
        if ($data !== []){
            return view('job_applied',['getjobapplied'=>$data]);
        } else {
            return redirect()->back()->withErrors(['message'=>'No data']);
        }
    }

    public function delete_applied_job(request $request, $jobId){

        $userToken = session()->get('usertoken');
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$userToken
        ])->delete('http://localhost:4000/api/v1/jobApplied/'. $jobId);
        $data = json_decode($response->body());

//         dd($data);
        if ($data->status == 200 && $data->message === 'Job applied was successfully deleted'){
            return back()->withErrors(['message' => $data->message]);
        }
        else {
            return back()->withErrors(['error' => 'job applied was not deleted']);
        }
    }




    }




