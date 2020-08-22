@extends('layout.mainlayout')
@section('content')

<!-- bradcam_area  -->
<div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
            @if(isset($jobdetail))
                @foreach($jobdetail as $jobdetail)
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>{{$jobdetail->jobTitle}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ breadcrumb_area  -->

    <div class="job_details_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="job_details_header">
                        <div class="single_jobs white-bg d-flex justify-content-between">
                            <div class="jobs_left d-flex align-items-center">
                                <div class="jobs_conetent">
                                    <a href="#"><h4>{{$jobdetail->jobTitle}}</h4></a>
                                    <div class="links_locat d-flex align-items-center">
                                        <div class="location">
                                            <p> <i class="fa fa-map-marker"></i> {{$jobdetail->Location}}</p>
                                        </div>
                                        <div class="location">
                                            <p> <i class="fa fa-clock-o"></i> {{$jobdetail->jobHours}} Hours</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="jobs_right">
                                <div class="apply_now">
                                    <a class="heart_mark" href="#"> <i class="ti-heart"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="descript_wrap white-bg">
                        <div class="single_wrap">
                            <h4>Job description</h4>
                            <p>{{$jobdetail->jobDescription}}</p>
                        </div>
                        <div class="single_wrap">
                            <h4>Qualifications</h4>
                            <ul>
                                <li>{{$jobdetail->jobQualification}}
                                </li>
                            </ul>
                        </div>
                        <div class="single_wrap">
                            <h4>Benefits</h4>
                            <p>{{$jobdetail->benefits}}</p>
                        </div>
                    </div>
                    @if(session()->has('usertoken'))
                    <div class="apply_job_form white-bg">

                        <h4>Apply for the job</h4>
                        <form action="{{route('job_applied')}}" method="post" enctype="multipart/form-data">
                             {{ csrf_field() }}
                            <div class="row">
                            <div class="col-md-12" >
                            <input type="text" name="jobId" value="{{$jobdetail->jobId}}" hidden readonly />
                            </div>
                                <div class="col-md-6">
                                    <div class="input_field">
                                        <input type="text" name="name" placeholder="Your name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input_field">
                                        <input type="text" name="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input_field">
                                        <input type="text" name="website" placeholder="Website/Portfolio link">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <button type="button" id="inputGroupFileAddon03"><i class="fa fa-cloud-upload" aria-hidden="true"></i>
                                          </button>
                                        </div>
                                        <div class="custom-file">
                                          <input type="file" name="resumeFile" class="custom-file-input" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" required>
                                          <label class="custom-file-label" for="inputGroupFile03">Upload CV</label>
                                        </div>
                                      </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input_field">
                                        <textarea name="#" id="" cols="30" rows="10" placeholder="Coverletter"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="submit_btn">
                                        <button class="boxed-btn3 w-100" type="submit">Apply Now</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                    @endif
                </div>

                <div class="col-lg-8">
                    <div class="job_sumary">
                        <div class="summery_header">
                            <h3>Job Summery</h3>
                        </div>
                        <div class="job_content">
                            <ul>
                                <li>Experience: <span>{{$jobdetail->experience}}</span></li>
                                <li>Level: <span>{{$jobdetail->level}}</span></li>
                                <li>Total Positions: <span>{{$jobdetail->positions}}</span></li>
                                <li>Job Type: <span> {{$jobdetail->jobType}}</span></li>
                                <li>Salary: <span> {{$jobdetail->salary}}</span></li>
                                <li>Education: <span> {{$jobdetail->education}}</span></li>
                                <li>Location: <span> {{$jobdetail->Location}}</span></li>
                                <li>Job Hours: <span> {{$jobdetail->jobHours}}</span></li>
                                <li>Apply Before: <span> {{$jobdetail->applyBefore}}</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="share_wrap d-flex">
                        <span>Share at:</span>
                        <ul>
                            <li><a href="#"> <i class="fa fa-facebook"></i></a> </li>
                            <li><a href="#"> <i class="fa fa-google-plus"></i></a> </li>
                            <li><a href="#"> <i class="fa fa-twitter"></i></a> </li>
                            <li><a href="#"> <i class="fa fa-envelope"></i></a> </li>
                        </ul>
                    </div>
                </div>
                @endforeach
                    @endif
            </div>
        </div>
    </div>

@endsection
