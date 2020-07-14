@extends('layout.admin_layout')
@section('content')
@if(isset($detail))
    @foreach($detail as $details)
    @error('message')
            <script>
                alert('Profile updated successfull');
            </script>
            @enderror
    @error('error')
            <div class="alert-danger"> <p> {{$errors->first('error')}}</p></div>
    @enderror
<section class="form-section">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-6 col-md-6">
            <form class="form-container" action="{{ route('edit_profile') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <h1 for="exampleInputEmail1" >Edit Profile</h1>
                </div>
                <div class="form-group">
                    <input type="text" name="id" value="{{$detail->id}}" class="form-control" placeholder="" readonly hidden>
                </div>
                <div class="form-group">
                    <input type="text" name="firstName" class="form-control" value="{{$detail->firstName}}"
                    placeholder="Enter First Name" required>
                </div>
                <div class="form-group">
                    <input type="text" name="lastName" class="form-control" placeholder="Enter Last Name" 
                    value="{{$detail->lastName}}" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Enter Email" 
                    value="{{$detail->email}}" required>
                </div>
                @error('name')
                <span class="alert-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div class="form-group">
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                </div>
                <div class="form-group " readonly hidden>
                    <label for="exampleFormControlSelect1">User Type</label>
                    <select name="userType" class="form-control mb-3" id="exampleFormControlSelect1">
                        <option value="1 {{ '1' == $detail->userType ? 'selected' : ''}}">User</option>
                        <option value="0 {{ '0' == $detail->userType ? 'selected' : ''}}">Company</option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="text" name="companyName" class="form-control" placeholder="Enter Company Name"
                    value="{{$detail->companyName}}" required>
                </div>
                <div class="form-group ">
                    <label for="exampleFormControlSelect1">Enter Organization Type</label>
                    <select name="organizationType" class="form-control mb-3" id="exampleFormControlSelect1">
                        <option value="Private {{ 'Private' == $detail->organizationType ? 'selected' : ''}}">Private</option>
                        <option value="Public {{ 'Public' == $detail->organizationType ? 'selected' : ''}}">Public</option>
                        <option value="Government {{ 'Government' == $detail->organizationType ? 'selected' : ''}}">Government</option>
                        <option value="NGO {{ 'NGO' == $detail->organizationType ? 'selected' : ''}}">NGO</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" name="address" class="form-control" placeholder="Enter Your Address"
                    value="{{$detail->address}}" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Enter your country</label>
                    <select class="form-control mb-3" name="country" id="exampleFormControlSelect1">
                        <option value="Nepal {{ 'Nepal' == $detail->country ? 'selected' : ''}}">Nepal</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Enter your city</label>
                    <select name="city" class="form-control mb-3" id="exampleFormControlSelect1">
                        <option value="Kathmandu {{ 'Kathmandu' == $detail->city ? 'selected' : ''}}">Kathmandu</option>
                        <option value="Lalitpur {{ 'Lalitpur' == $detail->city ? 'selected' : ''}}">Lalitpur</option>
                        <option value="Bhaktapur {{ 'Bhaktapur' == $detail->city ? 'selected' : ''}}">Bhaktapur</option>
                        <option value="Pokhara {{ 'Pokhara' == $detail->city ? 'selected' : ''}}">Pokhara</option>
                        <option value="Jhapa {{ 'Jhapa' == $detail->city ? 'selected' : ''}}">Jhapa</option>
                        <option value="Kailali {{ 'Kailali' == $detail->city ? 'selected' : ''}}">Kailali</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" name="phone" class="form-control" placeholder="Enter Phone number" 
                    value="{{$detail->phone}}" required>
                </div>
                <div class="form-group">
                    <input type="text" name="website" class="form-control" placeholder="Enter Website" 
                    value="{{$detail->website}}" required>
                </div>
                <div class="form-group">
                    <label>Enter company description</label>
                    <textarea name="description" type="text" class="form-control"
                    style="width:400px; height:100px;" value="{{$detail->companyDescription}}" required>
                    </textarea>
                </div>
                    <button type="submit" class="btn btn-success btn-block">Update</button>
            </form>
        </div>
    </div>
</section>
@endforeach
    @endif

        <!-- <section class="form-section">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-6 col-md-6">
            <form class="form-container" action="{{ route('edit_profile') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <h1 for="exampleInputEmail1" >Edit User Profile</h1>
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
                    <input type="text" name="companyName" class="form-control" placeholder="Enter Company Name" required>
                </div>
                <div class="form-group ">
                    <label for="exampleFormControlSelect1">Enter Organization Type</label>
                    <select name="organizationType" class="form-control mb-3" id="exampleFormControlSelect1">
                        <option value="Private">Private</option>
                        <option value="Public">Public</option>
                        <option value="Government">Government</option>
                        <option value="NGO">NGO</option>
                    </select>
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
                    <input type="text" name="website" class="form-control" placeholder="Enter Website" required>
                </div>
                <div class="form-group">
                    <label>Enter company description</label>
                    <textarea name="description" type="text" class="form-control"
                    style="width:400px; height:100px;" required>
                    </textarea>
                </div>
                    <button type="submit" class="btn btn-success btn-block">Update</button>
            </form>
        </div>
    </div>
</section>         -->
@endsection
<b></b>
