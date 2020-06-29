<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function home(){
        $response = Http::get('http://localhost:4000/displayAllJob');

        $jobs = json_decode($response->body());
//        dd($jobs);
        return view('home',['jobList'=>$jobs]);
    }
}
