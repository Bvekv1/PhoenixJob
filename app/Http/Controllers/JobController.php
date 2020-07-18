<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class JobController extends Controller
{
    public function job_post_form(){
        if (session()->has('usertoken')){
            return view('post_Job');
        }
        else{
            return redirect('/');
        }

    }

    public function job_post(request $request){
        $this->validate($request,[
            'job_title' => 'required',
            'experience' => 'required',
            'level' => 'required',
            'position' => 'required',
            'jobType' => 'required',
            'salary' => 'required',
            'education' => 'required',
            'location' => 'required',
            'applyBefore' => 'required',
            'jobDescription' => 'required',
            'jobQualification' => 'required',
            'jobHours' => 'required',
            'benefits' => 'required',
            'expected' => 'required'
        ]);

        $job_title = $request->input('job_title');
        $experience = $request->input('experience');
        $level = $request->input('level');
        $position = $request->input('position');
        $jobType = $request->input('jobType');
        $salary = $request->input('salary');
        $education = $request->input('education');
        $location = $request->input('location');
        $applyBefore = $request->input('applyBefore');
        $jobDescription = $request->input('jobDescription');
        $jobQualification = $request->input('jobQualification');
        $expected = $request->input('expected');
        $jobHours = $request->input('jobHours');
        $benefits = $request->input('benefits');

        $userToken = session()->get('usertoken');
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$userToken
        ])->post('http://localhost:4000/api/v1/job', [
            'jobTitle' => $job_title,
            'experience' => $experience,
            'level' => $level,
            'positions' => $position,
            'jobType' => $jobType,
            'salary' => $salary,
            'education' => $education,
            'location' => $location,
            'applyBefore' => $applyBefore,
            'jobDescription' => $jobDescription,
            'jobQualification' => $jobQualification,
            'jobHours' => $jobHours,
            'benefits' => $benefits,
            'expected' => $expected
        ]);

        $responseData = json_decode($response->body());
//        dd($responseData);
        if ($responseData->status == 200 && $responseData->message === 'sucess'){
            return redirect()->back()->withErrors(['message'=>'job posted successfully']);
        }
    }

    public function search_result(request $request){
        $search = $request->input('search');
        $searchByCategory = $request->input('category');
//        dd($searchByCategory);

        if ($searchByCategory === 'Category'){
            $this->validate($request,[
                'search' => 'required'
            ]);
            $response = Http::get('http://localhost:4000/api/v1/job/searchJobByTitle/'.$search);

            $data = json_decode($response-> body());
//        dd($data);
            if ($data !== []){
                return view('job_search',['result'=>$data]);
            }
            else {
                return view('job_search');
            }
        }
        else{
            $response = Http::get('http://localhost:4000/api/v1/job/searchJobByCategory/'.$searchByCategory);
            $data = json_decode($response->body());
//             dd($data);
            if ($data !== []){
//                dd($data->jobTitle);
                return view('job_search',['result'=>$data]);
            }
            else {
                return view('job_search');
            }
        }
    }

    public function job_detail(request $request, $jobId){

        $response = Http::get('http://localhost:4000/api/v1/job/'. $jobId);
        $data = json_decode($response->body());
//        dd($data);
        if ($data !== []){
            return view('job_detail',['jobdetail'=>$data]);
        } else {
            return redirect()->back()->withErrors(['message'=>'No data']);
        }
    }

    public function job_edit_page($jobId){

        $response = Http::get('http://localhost:4000/api/v1/job/'. $jobId);
        $data = json_decode($response->body());
//        dd($data);
        if ($data !== []){
            return view('post_Job',['edit'=>$data]);
        } else {
            return redirect()->back()->withErrors(['error'=>'No data']);
        }
    }

    public function job_edit(request $request){
        $this->validate($request,[
            'job_title' => 'required',
            'experience' => 'required',
            'level' => 'required',
            'position' => 'required',
            'jobType' => 'required',
            'salary' => 'required',
            'education' => 'required',
            'location' => 'required',
            'applyBefore' => 'required',
            'jobDescription' => 'required',
            'jobQualification' => 'required',
            'jobHours' => 'required',
            'benefits' => 'required',
            'expected' => 'required'
        ]);

        $job_title = $request->input('job_title');
        $experience = $request->input('experience');
        $level = $request->input('level');
        $position = $request->input('position');
        $jobType = $request->input('jobType');
        $salary = $request->input('salary');
        $education = $request->input('education');
        $location = $request->input('location');
        $applyBefore = $request->input('applyBefore');
        $jobDescription = $request->input('jobDescription');
        $jobQualification = $request->input('jobQualification');
        $expected = $request->input('expected');
        $jobHours = $request->input('jobHours');
        $benefits = $request->input('benefits');

        $userToken = session()->get('usertoken');
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$userToken
        ])->put('http://localhost:4000/api/v1/job/'.$request->input('jobId'), [
            'jobTitle' => $job_title,
            'experience' => $experience,
            'level' => $level,
            'positions' => $position,
            'jobType' => $jobType,
            'salary' => $salary,
            'education' => $education,
            'location' => $location,
            'applyBefore' => $applyBefore,
            'jobDescription' => $jobDescription,
            'jobQualification' => $jobQualification,
            'jobHours' => $jobHours,
            'benefits' => $benefits,
            'expected' => $expected
        ]);

        $data = json_decode($response->body());
//        dd($data);
        if ($data->status == 200 && $data->message === 'Job info was successfully updated'){
            return back()->withErrors(['message' => $data->message]);
        }
        else {
            return back()->withErrors(['error' => 'job not update']);
        }
    }

    public function delete_job(request $request, $jobId){
        $response = Http::delete('http://localhost:4000/api/v1/job/'. $jobId);
        $data = json_decode($response->body());
        dd($data);

        if ($data->status == 200 && $data->message === 'Job was successfully deleted'){
            return back()->withErrors(['message' => $data->message]);
        }
        else {
            return back()->withErrors(['error' => 'job was not deleted']);
        }
    }


    }


  


}

