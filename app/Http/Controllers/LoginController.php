<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function login_page(){
        if (session()->has('usertoken')){
            return redirect('/');
        }
        else{
            return view('login');
        }
    }

        public function login(request $request){
            $this->validate($request,[
                'email' => 'required',
                'password' => 'required'
            ]);
            $email = $request->input('email');
            $password = $request->input('password');

//            dd($email,$password);

            $response = Http::post('http://localhost:4000/loginUser', [
                'email' => $email,
                'password' => $password
            ]);

//        dd($responseData = json_decode($response->body()));

            $responseData = json_decode($response->body());
//            dd($responseData);

            if ($responseData === null){
                $errors = ['email' => trans('auth.failed'),'password' => trans('auth.failed')];
                if ($request->expectsJson()) {
                    return response()->json($errors, 422);
                }
                return redirect()->back()->withErrors($errors)->withInput($request->only('email'));
            }
            elseif ($responseData->status == 200 && $responseData->token !== '') {
                session(['usertoken' => $responseData->token]);
                return redirect('/post_job');
            }
            else{
                $errors = ['email' => trans('auth.failed'),'password' => trans('auth.failed')];
                if ($request->expectsJson()) {
                    return response()->json($errors, 422);
                }
                return redirect()->back()->withErrors($errors)->withInput($request->only('email'));
            }

        }

}
