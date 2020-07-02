@extends('layout.mainlayout')
@section('content')
<section class="form-section">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-6 col-md-6">
            <form class="form-container">
                <div class="form-group">
                    <h1 for="exampleInputEmail1" >Register</h1>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter First Name" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter Last Name" required>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Enter Email" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group d-none" >
                    <label for="exampleFormControlSelect1">User Type</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>User</option>
                        <option>Company</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter Company Name" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter Organization Type" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter Your Address" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter Your Country" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter Your City" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter Phonenumber" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter Website" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter Company Description" required>
                </div>
                    <button type="submit" class="btn btn-primary btn-block">Signup</button>
            </form>
        </div>
    </div>
</section>
@endsection
<b></b>