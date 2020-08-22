<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RegistrationController extends Controller
{
    public function register_page(){
        if (session()->has('usertoken')){
            return redirect('/');
        }
        else{
            return view('register');
        }

    }

    public function register(request $request){
        $this->validate($request,[
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'password' => 'required',
            'companyName' => 'required',
            'organizationType' => 'required',
            'address' => 'required',
            'country' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'website' => 'required',
            'description' => 'required'
        ]);
        $email = $request->input('email');
        $firstName = $request->input('firstName');
        $lastName = $request->input('lastName');
        $password = $request->input('password');
        $userType = $request->input('userType');
        $companyName = $request->input('companyName');
        $organizationType = $request->input('organizationType');
        $address = $request->input('address');
        $country = $request->input('country');
        $city = $request->input('city');
        $phone = $request->input('phone');
        $website = $request->input('website');
        $description = $request->input('description');
//        dd($country,$userType,$city,$organizationType,$email);

        $response = Http::post('http://localhost:4000/api/v1/users', [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $email,
            'password' => $password,
            'userType' => $userType,
            'companyName' => $companyName,
            'organizationType' => $organizationType,
            'address' => $address,
            'country' => $country,
            'city' => $city,
            'phone' => $phone,
            'website' => $website,
            'companyDescription' => $description,
        ]);
//        dd($response->body());
        $data = json_decode($response->body());
//        dd($data);
        if ($data->status == 200 && $data->message === 'Company registered sucessfully'){
           return redirect()->route('login');
        }
        elseif ($data->status == 409 && $data->message === 'Account already exist with this detail'){
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
