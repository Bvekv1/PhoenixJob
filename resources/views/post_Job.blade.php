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
                    <input type="text" name="job_title" class="form-control" placeholder="Enter Job Title">
                </div>
                <div class="form-group">
                    <input type="text" name="experience" class="form-control" placeholder="Enter Experiences">
                </div>
                <div class="form-group">
                    <input type="text" name="level" class="form-control" placeholder="Enter level">
                </div>
                <div class="form-group">
                    <input type="text" name="position" class="form-control" id="exampleInputPassword1" placeholder="Position">
                </div>
                <div class="form-group">
                    <input type="text" name="jobType" class="form-control" placeholder="Enter Job Type">
                </div>
                <div class="form-group">
                    <input type="text" name="salary" class="form-control" placeholder="Enter Salary">
                </div>
                <div class="form-group">
                    <input type="text" name="education" class="form-control" placeholder="Enter Education">
                </div>
                <div class="form-group">
                    <input type="text" name="location" class="form-control" placeholder="Enter Location">
                </div>
                <div class="form-group">
                    <input type="text" name="applyBefore" class="form-control" placeholder="Apply before">
                </div>
                <div class="form-group">
                    <label>Enter job description</label>
                    <textarea type="text" class="form-control"
                        style="width:400px; height:50px;" required>
                    </textarea>
                </div>
                <div class="form-group">
                    <label>Enter qualifications</label>
                    <textarea type="text" class="form-control"
                        style="width:400px; height:50px;" required>
                    </textarea>
                </div>
                <div class="form-group">
                    <input type="text" name="expected" class="form-control" placeholder="Enter Expected">
                </div>
                <div class="form-group">
                    <input type="text" name="jobHours" class="form-control" placeholder="Enter Job Hour">
                </div>
                <div class="form-group">
                    <label>Enter benefits</label>
                    <textarea type="text" class="form-control"
                        style="width:400px; height:50px;" required>
                    </textarea>
                </div>
                    <button type="submit" class="btn btn-success btn-block">Post Job</button>
            </form>
        </div>
    </div>
</section>
@endsection
<b></b>
