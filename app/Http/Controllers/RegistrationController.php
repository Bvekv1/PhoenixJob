<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RegistrationController extends Controller
{
    public function register_page(){
        return view('register');
    }

    public function register(request $request){
        $this->validate($request,[
            'name' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'password' => 'required',
            'confirmpassword' => 'required'
        ]);
        $username = $request->input('name');
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $password = $request->input('password');
        $userType = $request->input('userType');

        $response = Http::post('http://localhost:3001/api/v1/users', [
            'username' => $username,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'password' => $password,
            'userType' => $userType
        ]);
//        dd($response->body());
        $data = json_decode($response->body());
//        dd($data->message);
        if ($data->status == 200 && $data->message === 'Successfully registered'){
            session(['usertoken'=> $data->usertoken]);
            $userCheck = Http::withHeaders([
                'Authorization' => 'Bearer '.$data->usertoken
            ])->get('http://localhost:3001/api/v1/users/token_verification');
            $userDetail = json_decode($userCheck->body());
//            dd($userDetail->firstname,$userDetail->lastname);
            if ($userDetail->userType == 1){
                return redirect('/');
            }
            else if ($userDetail->userType ==2){
                return redirect('/retailer');
            }
        }
        elseif ($data->status == 409 && $data->message === 'user was already registered'){
            return redirect()->back()->withErrors(['name'=>'user was already registered'])->withInput($request->only('name'));
        }
        else{
            $errors = ['name' => trans('auth.failed'),'password' => trans('auth.failed')];
            if ($request->expectsJson()) {
                return response()->json($errors, 422);
            }
            return redirect()->back()->withErrors($errors)->withInput($request->only('name'));
        }
    }
}
