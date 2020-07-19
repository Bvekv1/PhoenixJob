<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProfileController extends Controller
{
    //
    public function edit_profile_page($userId){
        if (Session()-> has('usertoken')){
            $userToken = session()->get('usertoken');
            $userCheck = Http::withHeaders([
                'Authorization' => 'Bearer '.$userToken
            ])->get('http://localhost:4000/usercheck');
            $userDetail = json_decode($userCheck->body());
            dd($userDetail);
            $response =  Http::get('http://localhost:4000/api/v1/users/'. $userDetail->id);
            $data = json_decode($response->body());
            // dd($data);
            return view('edit_profile', ['detail'=>$data]);
            
        }
        else {
            return redirect('/login');
        }
    }

    public function edit_profile(request $request){
        $this->validate($request,[
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
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
        $userType = $request->input('userType');;
        $companyName = $request->input('companyName');
        $organizationType = $request->input('organizationType');
        $address = $request->input('address');
        $country = $request->input('country');
        $city = $request->input('city');
        $phone = $request->input('phone');
        $website = $request->input('website');
        $description = $request->input('description');

        $userToken = session()->get('usertoken');
        // dd($userToken);
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$userToken
        ])->put('http://localhost:4000/api/v1/users/'.$request->input('id'), [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $email,
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
        $data = json_decode($response->body());
            //    dd($request->input('userId'));
                if ($data->status == 200 && $data->message === 'User was successfully Updated'){
                    return back()->withErrors(['message' => $data->message]);
                }
                else {
                    return back()->withErrors(['error' => 'There was an error updating ']);
                }
      
    }
       
}
