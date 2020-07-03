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

//for job search result **********************************************************************
Route::get('/job_search')->name('search_job');
Route::post('/job_search')->name('search_job');

Route::get('/job_search', function () {
    return view('job_search');
});

Route::get('/job_detail', function () {
    return view('job_detail');
});

