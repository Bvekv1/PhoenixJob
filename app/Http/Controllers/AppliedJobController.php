<?php

namespace App\Http\Controllers;

use http\Cookie;
use Illuminate\Filesystem\Cache;
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
        $this->validate($request, [
            'resumeFile' => 'required'
        ]);
        $jobId=$request->input('jobId');
        $filename = $request->file('resumeFile')->getClientOriginalName();
        $file = "upload " . time() . "_" . date('y') . "_" . $filename; //renaming the file name
        $request->file('resumeFile')->move('upload', $file);

//         dd($fileResponse->body());
        $userToken = session()->get('usertoken');
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$userToken
        ])->post('http://localhost:4000/api/v1/jobApplied/', [
            'jobId'=>$jobId,
            'filename' => $file
            ]);
        $data = json_decode($response->body());
//        dd($data);

        if ($data->status == 200 && $data->message === 'Job was applied successfully'){
            return redirect()->back()->withErrors(['message' => $data->message]);
        }
        else {
            return redirect()->back()->withErrors(['error' => 'job was not applied']);
        }
    }

    public function get_applied_job(request $request){
        $userToken = session()->get('usertoken');
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$userToken
        ])->get('http://localhost:4000/api/v1/jobApplied');
        $data = json_decode($response->body());
    //   dd($data);
    //    foreach ($data as $datas){
    //        dd($datas->job->jobTitle);
    //    }
        if ($data !== []){
            return view('job_applied',['getjobapplied'=>$data]);
        } else {
            return view('job_applied');
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
            return redirect()->back()->withErrors(['deleteMessage' => $data->message]);
        }
        else {
            return redirect()->back()->withErrors(['error' => 'job applied was not deleted']);
        }
    }




    }




