<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@home')->name('home');

//for login **************************************************************************
Route::get('/login', 'LoginController@login_page')->name('login_page');
Route::post('/login', 'LoginController@login')->name('login');

//for registration *******************************************************************
Route::get('/register', 'RegistrationController@register_page')->name('registration_page');
Route::post('/register', 'RegistrationController@register')->name('register');

//for job post ***********************************************************************
Route::get('/post_job', 'JobController@job_post_form')->name('job_post_form');
Route::post('/post_job', 'JobController@job_post')->name('job_post');

Route::get('/admin_dashboard', function () {
    return view('admin_dashboard');
});

//for job search result ***************************************************************
Route::post('/job_search','JobController@search_result')->name('search_job');

//for job detail **********************************************************************
Route::get('/job_detail/{jobId}','JobController@job_detail');

//for job edit ************************************************************************
Route::get('/job_edit/{jobId}','JobController@job_edit_page')->name('job_edit_page');
Route::post('/job_edit','JobController@job_edit')->name('job_edit');

//for user profile edit **********************************************************************
Route::get('/editProfile/{userId}','ProfileController@edit_profile_page')->name('edit_profile_page');
Route::post('/editProfile','ProfileController@edit_profile')->name('edit_profile');

//for job delete
Route::get('/deleteJob/{jobId}', 'JobController@delete_job')->name('delete_job');

//for admin dashboard
Route::get('/admin_dashboard', 'AdminController@admin_dashboard_page')->name('admin_dashboard_page');

//for applied job
Route::get('/applied_job', 'AppliedJobController@job_applied_page')->name('job_applied_page');

//for applied job
Route::post('/jobApplied', 'AppliedJobController@job_applied')->name('job_applied');

//for get applied job
Route::get('/getappliedJob', 'AppliedJobController@get_applied_job')->name('get_applied_job');

//for deleting applied job
Route::get('/deleteappliedJob/{jobId}', 'AppliedJobController@delete_applied_job')->name('delete_applied_job');

//for job applicants
Route::get('/job_applicants/{jobId}', 'ApplicantController@view_job_applicants')->name('view_job_applicants');

Route::get('/job_applicants/{jobId}', 'ApplicantController@get_applicant')->name('job_applicants');

Route::get('/job_applicants/{jobId}/{userId}', 'ApplicantController@hire_applicant')->name('hire_applicants');

