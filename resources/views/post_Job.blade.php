@extends('layout.admin_layout')
@section('content')
    @error('message')
    <script>
        alert('job successfully posted');
    </script>
    @enderror
<section class="form-section">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-6 col-md-6">
            <form class="form-container" action="{{ route('job_post') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <h1 for="exampleInputEmail1" >Post Job</h1>
                </div>
                <div class="form-group">
                    <input type="text" name="job_title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Job Title">
                </div>
                <div class="form-group">
                    <input type="text" name="experience" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Experiences">
                </div>
                <div class="form-group">
                    <input type="text" name="level" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter level">
                </div>
                <div class="form-group">
                    <input type="text" name="position" class="form-control" id="exampleInputPassword1" placeholder="Position">
                </div>
                <div class="form-group">
                    <input type="text" name="jobType" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Job Type">
                </div>
                <div class="form-group">
                    <input type="text" name="salary" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Salary">
                </div>
                <div class="form-group">
                    <input type="text" name="education" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Education">
                </div>
                <div class="form-group">
                    <input type="text" name="location" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Location">
                </div>
                <div class="form-group">
                    <input type="text" name="applyBefore" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Apply before">
                </div>
                <div class="form-group">
                    <input type="text" name="jobDescription" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Job description">
                </div>
                <div class="form-group">
                    <input type="text" name="jobQualification" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Job Qualification">
                </div>
                <div class="form-group">
                    <input type="text" name="expected" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Expected">
                </div>
                <div class="form-group">
                    <input type="text" name="jobHours" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Job Hour">
                </div>
                <div class="form-group">
                    <input type="text" name="benefits" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Benefits">
                </div>
                    <button type="submit" class="btn btn-primary btn-block">Post Job</button>
            </form>
        </div>
    </div>
</section>
@endsection
<b></b>
