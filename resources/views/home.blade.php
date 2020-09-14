@extends('layout.mainlayout')
@section('content')
<div class="slider_area">
        <div class="single_slider  d-flex align-items-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-6">
                        <div class="slider_text">
                            <h3 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">Find your Dream Job</h3>
                            <p class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".4s">We provide every kinds of jobs and provides many companies</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ilstration_img wow fadeInRight d-none d-lg-block text-right" data-wow-duration="1s" data-wow-delay=".2s">
            <img src="img/banner/illustration.png" alt="">
        </div>
    </div>
    <!-- slider_area_end -->

    <!-- catagory_area -->
    <div class="catagory_area">
        <div class="container">
            <form action="{{ route('search_job') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                 <div class="row cat_search">
                    <div class="col-lg-12">
                        <h1>Search your Job</h1>
                    </div>
                    <div class="col-lg-6 col-md-4">
                        <div class="single_input">
                            <input name="search" type="text" placeholder="Search keyword">
                        </div>
                    </div>
                     <div class="col-lg-3 col-md-4">
                        <div class="single_input">
                            <select name="category" class="wide" >
                                <option data-display="Category">Category</option>
                                <option value="Part Time">Part Time</option>
                                <option value="Full Time">Full Time</option>
                                <option value="Hour Base">Hour Base</option>
                              </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4">
                            <button type="submit" class="job_btn boxed-btn3">Find Job</button>
                    </div>

                </div>
            </form>
            <!-- <div class="row">
                <div class="col-lg-12">
                    <div class="popular_search d-flex align-items-center">
                        <span>Popular Search:</span>
                        <ul>
                            <li><a href="#">Design & Creative</a></li>
                            <li><a href="#">Marketing</a></li>
                            <li><a href="#">Administration</a></li>
                            <li><a href="#">Teaching & Education</a></li>
                            <li><a href="#">Engineering</a></li>
                            <li><a href="#">Software & Web</a></li>
                            <li><a href="#">Telemarketing</a></li>
                        </ul>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <!--/ catagory_area -->


    <!-- job_listing_area_start  -->
    <div class="job_listing_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="section_title">
                        <h3>Job Listing</h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="brouse_job text-right">
                        <a href="jobs.html" class="boxed-btn4">Browse More Job</a>
                    </div>
                </div>
            </div>
            <div class="job_lists">
                <div class="row">
                    @if(isset($jobList))
                        @foreach($jobList as $jobsList)
                            <div class="col-lg-12 col-md-12">
                                <div class="single_jobs white-bg d-flex justify-content-between">
                                    <div class="jobs_left d-flex align-items-center">
                                        <div class="thumb">
                                            <img src="img/svg_icon/1.svg" alt="">
                                        </div>
                                        <div class="jobs_conetent">
                                            <a href="job_details.html"><h4>{{$jobsList->jobTitle}}</h4></a>
                                            <div class="links_locat d-flex align-items-center">
                                                <div class="location">
                                                    <p> <i class="fa fa-map-marker"></i> {{$jobsList->Location}}</p>
                                                </div>
                                                <div class="location">
                                                    <p> <i class="fa fa-clock-o"></i> {{$jobsList->jobHours}} Hours</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jobs_right">
                                        <div class="apply_now">
                                            <a class="heart_mark" href="#"> <i class="ti-heart"></i> </a>
                                            <a href="/job_detail/{{$jobsList->jobId}}" class="boxed-btn3">Apply Now</a>
                                        </div>
                                        <div class="date">
                                            <p>Apply before: {{$jobsList->applyBefore}}</p>
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
    <!-- job_listing_area_end  -->

@endsection
<b></b>
