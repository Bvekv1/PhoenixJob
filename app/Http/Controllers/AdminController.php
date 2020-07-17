<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class AdminController extends Controller
{
    public function admin_dashboard_page(){
        $response = Http::get('http://localhost:4000/displayAllJob');

        $jobs = json_decode($response->body());
//        dd($jobs);
        return view('admin_dashboard',['jobList'=>$jobs]);
    }
}