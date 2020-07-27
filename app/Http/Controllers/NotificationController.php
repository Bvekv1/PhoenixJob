<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NotificationController extends Controller
{
    public function view_job_applicants($jobId){
        return view('job_notifications');
    }

    public function get_applicant(request $request){

        $userToken = session()->get('usertoken');
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$userToken
        ])->get('http://localhost:4000/api/v1/notification');
        $data = json_decode($response->body());


        // dd($data);
if ($data !== []){
    return view('job_notifications',['getjobNotification'=>$data]);
} else {
    return redirect()->back()->withErrors(['message'=>'No data']);
}
}

}
      