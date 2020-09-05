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
                <div class="form-group ">
                    <label for="exampleFormControlSelect1">User Type</label>
                    <select name="userType" class="form-control mb-3" id="exampleFormControlSelect1">
                        <option value="1">User</option>
                        <option value="0">Company</option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="text" name="companyName" class="form-control" placeholder="Enter Company Name" hidden>
                </div>
                <div class="form-group">
                    <input type="text" name="address" class="form-control" placeholder="Enter Your Address" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Enter your country</label>
                    <select class="form-control mb-3" name="country" id="exampleFormControlSelect1">
                        <option value="Nepal">Nepal</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Enter your city</label>
                    <select name="city" class="form-control mb-3" id="exampleFormControlSelect1">
                        <option value="Kathmandu">Kathmandu</option>
                        <option value="Lalitpur">Lalitpur</option>
                        <option value="Bhaktapur">Bhaktapur</option>
                        <option value="Pokhara">Pokhara</option>
                        <option value="Jhapa">Jhapa</option>
                        <option value="Kailali">Kailali</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" name="phone" class="form-control" placeholder="Enter Phone number" required>
                </div>
                <div class="form-group">
                    <input type="text" name="website" class="form-control" placeholder="Enter Website" hidden>
                </div>
                    <button type="submit" class="btn btn-success btn-block">Signup</button>
            </form>
        </div>
    </div>
</section>
@endsection
<b></b>
