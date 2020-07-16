<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppliedJobController extends Controller
{
    public function job_applied_page(){
        return view('job_applied');
    } 
}
