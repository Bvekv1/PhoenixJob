@extends('layout.mainlayout')
@section('content')
    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                        <div class="col-xl-12">
                            <div class="bradcam_text">
                                <h3>Applied Jobs List</h3>
                            </div>
                        </div>
            </div>
        </div>
    </div>
    <!--/ breadcrumb_area  -->
    <div class="job_listing_area">
        <div class="container">
            <div class="job_lists">
                <div class="row">
                    @if(isset($getjobapplied))
                        @foreach($getjobapplied as $getappliedjobs)
                            <div class="col-lg-12 col-md-12">
                                <div class="single_jobs white-bg d-flex justify-content-between">
                                    <div class="jobs_left d-flex align-items-center">
                                        <div class="thumb">
                                            <img src="img/svg_icon/1.svg" alt="">
                                        </div>
                                        <div class="jobs_conetent">
                                            <a href="job_details.html"><h4>{{$getappliedjobs->job->jobTitle}}</h4></a>
                                            <div class="links_locat d-flex align-items-center">
                                                <div class="location">
                                                    <p> <i class="fa fa-map-marker"></i> {{$getappliedjobs->job->Location}}</p>
                                                </div>
                                                <div class="location">
                                                    <p> <i class="fa fa-clock-o"></i> {{$getappliedjobs->job->jobHours}}</p>
                                                </div>
                                                <div class="location">
                                                    <p class="alert-danger text-danger"> {{$getappliedjobs->notificationMessage}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jobs_right">
                                        <div class="apply_now">
                                            <a class="boxed-btn4" href="#"> View </a>
                                            <a href="/deleteappliedJob/{{$getappliedjobs->job->jobId}}" class="boxed-btn3">Delete</a>
                                        </div>
                                        <div class="date">
                                            <p>Applied On: {{$getappliedjobs->createdAt}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
