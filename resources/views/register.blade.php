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
                    <input type="text" name="firstName" class="form-control" placeholder="Enter First Name" required>
                </div>
                <div class="form-group">
                    <input type="text" name="lastName" class="form-control" placeholder="Enter Last Name" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                </div>
                @error('name')
                <span class="alert-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <div class="form-group">
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
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
                    <input type="text" name="companyName" class="form-control" placeholder="Enter Company Name" required>
                </div>
                <div class="form-group ">
                    <label for="exampleFormControlSelect1">Enter Organization Type</label>
                    <select class="form-control mb-3" id="exampleFormControlSelect1">
                        <option>Private</option>
                        <option>Public</option>
                        <option>Government</option>
                        <option>NGO</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" name="address" class="form-control" placeholder="Enter Your Address" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Enter your country</label>
                    <select class="form-control mb-3" id="exampleFormControlSelect1">
                        <option>Nepal</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Enter your city</label>
                    <select class="form-control mb-3" id="exampleFormControlSelect1">
                        <option>Kathmandu</option>
                        <option>Lalitpur</option>
                        <option>Bhaktapur</option>
                        <option>Pokhara</option>
                        <option>Jhapa</option>
                        <option>Kailali</option>                        
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" name="phone" class="form-control" placeholder="Enter Phonenumber" required>
                </div>
                <div class="form-group">
                    <input type="text" name="website" class="form-control" placeholder="Enter Website" required>
                </div>
                <div class="form-group">
                    <label>Enter company description</label>
                    <textarea type="text" class="form-control"
                    style="width:400px; height:100px;" required>
                    </textarea>
                </div>
                    <button type="submit" class="btn btn-success btn-block">Signup</button>
            </form>
        </div>
    </div>
</section>
@endsection
<b></b>
