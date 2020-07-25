<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function view_job_applicants($jobId){
        return view('job_applicants');
    }
}
