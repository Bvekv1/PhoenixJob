
<div class="header-area">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid ">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-3 col-lg-2">
                                <div class="navbar navbar-expand-lg navbar-light">
                                    <a style="color: white;" class="navbar-brand" href="{{ route('home')}}">
                                        Job Portal
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-7">
                                <div class="main-menu d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="{{route('home')}}">home</a></li>
                                            <li><a href="#">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                                <div class="Appointment">
                                    @if(!session()->has('usertoken'))
                                    <div class="phone_num d-none d-xl-block">
                                        <a href="/login"> <button class="boxed-btn3">Log in</button></a>
                                    </div>
                                    @else
                                        <div>
                                            <ul class="navbar-nav ml-auto ml-md-0">
                                                <li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle text-light text-uppercase" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Account</a>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                                        <a class="dropdown-item" href="/editProfile/{userId}">View profile</a>
                                                        <a class="dropdown-item" href="{{route('get_applied_job')}}">Applied Job</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
