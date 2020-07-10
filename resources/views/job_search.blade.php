@extends('layout.mainlayout')
@section('content')

   <!-- bradcam_area  -->
   <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>4536+ Jobs Available</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

    <!-- job_listing_area_start  -->
    <div class="job_listing_area plus_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="job_filter white-bg">
                        <div class="form_inner white-bg">
                            <h3>Filter</h3>
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="single_field">
                                            <input type="text" placeholder="Search keyword">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single_field">
                                            <select class="wide">
                                                <option data-display="Location">Location</option>
                                                <option value="1">Ktm</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single_field">
                                            <select class="wide">
                                                <option data-display="Job Title">Job Title</option>
                                                <option value="1">Job title 1</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                        <div class="range_wrap">
                            <label for="amount">Price range:</label>
                            <div id="slider-range"></div>
                            <p>
                                <input type="text" id="amount" readonly style="border:0; color:#7A838B; font-size: 14px; font-weight:400;">
                            </p>
                        </div>
                        <div class="reset_btn">
                            <button  class="boxed-btn3 w-100" type="submit">Reset</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="recent_joblist_wrap">
                        <div class="recent_joblist white-bg ">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h4>Search result</h4>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="job_lists m-0">
                        @if(isset($result))
                            @foreach($result as $results)
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="single_jobs white-bg d-flex justify-content-between">
                                            <div class="jobs_left d-flex align-items-center">
                                                <div class="jobs_conetent">
                                                    <a href="job_details.html"><h4>{{$results->jobTitle}}</h4></a>
                                                    <div class="links_locat d-flex align-items-center">
                                                        <div class="location">
                                                            <p> <i class="fa fa-map-marker"></i> {{$results->Location}}</p>
                                                        </div>
                                                        <div class="location">
                                                            <p> <i class="fa fa-clock-o"></i> {{$results->jobHours}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="jobs_right">
                                                <div class="apply_now">
                                                    <a class="heart_mark" href="#"> <i class="fa fa-heart"></i> </a>
                                                    <a href="/job_detail/{{$results->jobId}}" class="boxed-btn3">Apply Now</a>
                                                </div>
                                                <div class="date">
                                                    <p>Apply before: {{$results->applyBefore}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="pagination_wrap">
                                            <ul>
                                                <li><a href="#"> <i class="ti-angle-left"></i> </a></li>
                                                <li><a href="#"><span>01</span></a></li>
                                                <li><a href="#"><span>02</span></a></li>
                                                <li><a href="#"> <i class="ti-angle-right"></i> </a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                        @else
                            <h2 class="text-center">!!Job not found!!</h2>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- job_listing_area_end  -->




@endsection
