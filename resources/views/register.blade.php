@extends('layout.mainlayout')
@section('content')
<section class="form-section">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-6 col-md-6">
            <form class="form-container" action="{{ route('register') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <h1 for="exampleInputEmail1" >Register</h1>
                </div>
                <div class="form-group">
                    <input type="text" name="firstName" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter First Name">
                </div>
                <div class="form-group">
                    <input type="text" name="lastName" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Last Name">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email">
                </div>
                @error('name')
                <span class="alert-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <div class="form-group">
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group d-none" >
                    <label for="exampleFormControlSelect1">User Type</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>User</option>
                        <option>Admin</option>
                        <option>Company</option>
                    </select>
                </div>
                <div class="form-group">
<<<<<<< HEAD
<<<<<<< HEAD
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Company Name">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Organization Type">
=======
=======
>>>>>>> 8894fada656186547fe8d25c49fa717961ec3ff7
                    <input type="text" name="companyName" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Company Name">
                </div>
                <div class="form-group">
                    <input type="text" name="organizationType" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Organization Type">
<<<<<<< HEAD
>>>>>>> bikesh_apiconnection
=======

>>>>>>> 8894fada656186547fe8d25c49fa717961ec3ff7
                </div>
                <div class="form-group">
                    <input type="text" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Address">
                </div>
                <div class="form-group">
                    <input type="text" name="country" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Country">
                </div>
                <div class="form-group">
                    <input type="text" name="city" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your City">
                </div>
                <div class="form-group">
                    <input type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Phonenumber">
                </div>
                <div class="form-group">
<<<<<<< HEAD
<<<<<<< HEAD
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Website">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Company Description">
=======
=======
>>>>>>> 8894fada656186547fe8d25c49fa717961ec3ff7
                    <input type="text" name="website" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Website">
                </div>
                <div class="form-group">
                    <input type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Company Description">
<<<<<<< HEAD
>>>>>>> bikesh_apiconnection
=======
>>>>>>> 8894fada656186547fe8d25c49fa717961ec3ff7
                </div>
                    <button type="submit" class="btn btn-primary btn-block">Signup</button>
            </form>
        </div>
    </div>
</section>
@endsection
<b></b>
