<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class AdminController extends Controller
{
    public function admin_dashboard_page(){
        if (session()->has('usertoken')){
            $response = Http::get('http://localhost:4000/api/v1/job');

            $jobs = json_decode($response->body());
        //    dd($jobs);
            return view('admin_dashboard',['jobList'=>$jobs]);
        }
        else{
            return redirect('/login');
            
        }
        
    }
}
