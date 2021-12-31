@extends('layouts.index')

@section('content')
    <section class="height-90vh padding-y-80 flex-center bg-center bg-cover" data-dark-overlay="5"
        style="background: url({{ URL::asset('img/1920x800/9.jpg') }}) no-repeat">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 mr-auto text-white my-3">
                    <h4 class="font-weight-bold font-primary text-primary text-uppercase wow slideInUp">
                        Learn Online
                    </h4>
                    <h1 class="display-lg-3 font-weight-bold wow slideInUp">
                        Advance Your Career.
                    </h1>
                    <p class="lead wow slideInUp">
                        <span class="text-primary font-weight-semiBold">6,178</span>
                        courses in Business, Technology and Creative Skills taught by
                        industry experts.
                    </p>
                    @if(!session('token'))
                    <a href="{{ url('/register') }}" class="btn btn-primary mt-3 wow slideInUp">
                        Sign Up Now</a>
                    @endif
                    <a href="#" class="btn btn-outline-white mt-3 ml-sm-3 wow slideInUp">
                        Become an Instructor</a>
                </div>
                <div class="col-lg-4 col-md-5 my-3">
                    <div class="card px-4 py-5 text-center">
                        <p class="mb-4 text-primary">Search Your Answers Here</p>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Post Your Question Here">
                        </div>
                        <button type="submit" class="btn btn-block btn-primary">Post Now</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END container-->
    </section>

    <section class="padding-y-80">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center z-index-10" data-offset-top="-115">
                    <ul class="list-inline d-inline-block py-3 px-4 shadow-v3 bg-white rounded-pill">
                        <li class="list-inline-item">
                            Share <span class="d-none d-md-inline-block">this course:</span>
                        </li>
                        <li class="list-inline-item mx-0">
                            <a href="#" class="btn btn-opacity-primary iconbox iconbox-sm">
                                <i class="ti-facebook"></i>
                            </a>
                        </li>
                        <li class="list-inline-item mx-0">
                            <a href="#" class="btn btn-opacity-primary iconbox iconbox-sm">
                                <i class="ti-twitter"></i>
                            </a>
                        </li>
                        <li class="list-inline-item mx-0">
                            <a href="#" class="btn btn-opacity-primary iconbox iconbox-sm">
                                <i class="ti-linkedin"></i>
                            </a>
                        </li>
                        <li class="list-inline-item mx-0">
                            <a href="#" class="btn btn-opacity-primary iconbox iconbox-sm">
                                <i class="ti-google"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-8 mx-auto text-center mt-4">
                    <h2>About The Course</h2>
                    <div class="width-3rem height-4 rounded bg-primary mx-auto mb-4"></div>
                    <p class="font-size-18">
                        Investig ationes demons travg ectores legere lrus quod legunt
                        saepi Investig atio demons travg ectores legere lrus quod legunt
                        lobortis arcu.
                    </p>
                </div>
                <div class="col-lg-6 mt-5 mr-auto">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                        dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                    </p>
                    <ul class="list-unstyled list-style-icon list-icon-check my-4">
                        <li>Focused subject concentrations</li>
                        <li>Usually 3 or more coordinated courses</li>
                        <li>Develop a skill set within a specific area</li>
                    </ul>
                    <a href="" class="btn btn-primary">Start Today</a>
                </div>
                <div class="col-lg-5 mt-5">
                    <div class="position-relative">
                        <img class="rounded w-100" src="{{ asset('img/360x220/course.jpg') }}" alt="" />
                        <!-- <a
            href="https://www.youtube.com/watch?v=7e90gBu4pas"
            data-fancybox=""
            class="iconbox iconbox-lg bg-white position-absolute absolute-center"
           >
            <i class="ti-control-play text-primary"></i>
           </a> -->
                    </div>
                </div>
            </div>
            <!-- END row-->
        </div>
        <!-- END container-->
    </section>

    <section class="paddingTop-50 paddingBottom-100 bg-light">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4 mt-5 wow slideInUp" data-wow-delay=".1s">
                    <span class="iconbox iconbox-xxl bg-primary font-size-24">
                        <i class="ti-cup"></i>
                    </span>
                    <h4 class="my-4">Certificates</h4>
                    <p>
                        Investig ationes demons travg ectores legere lrus quod legunt
                        saepius.
                    </p>
                </div>

                <div class="col-md-4 mt-5 wow slideInUp" data-wow-delay=".2s">
                    <span class="iconbox iconbox-xxl bg-primary font-size-24">
                        <i class="ti-thumb-up"></i>
                    </span>
                    <h4 class="my-4">Expert Instruction</h4>
                    <p>
                        Investig ationes demons travg ectores legere lrus quod legunt
                        saepius.
                    </p>
                </div>

                <div class="col-md-4 mt-5 wow slideInUp" data-wow-delay=".3s">
                    <span class="iconbox iconbox-xxl bg-primary font-size-24">
                        <i class="ti-reload"></i>
                    </span>
                    <h4 class="my-4">Unlimited Access</h4>
                    <p>
                        Investig ationes demons travg ectores legere lrus quod legunt
                        saepius.
                    </p>
                </div>

                <div class="col-md-4 mt-5 wow slideInUp" data-wow-delay=".1s">
                    <span class="iconbox iconbox-xxl bg-primary font-size-24">
                        <i class="ti-heart"></i>
                    </span>
                    <h4 class="my-4">Help & Support</h4>
                    <p>
                        Investig ationes demons travg ectores legere lrus quod legunt
                        saepius.
                    </p>
                </div>

                <div class="col-md-4 mt-5 wow slideInUp" data-wow-delay=".2s">
                    <span class="iconbox iconbox-xxl bg-primary font-size-24">
                        <i class="ti-book"></i>
                    </span>
                    <h4 class="my-4">Effective Lessons</h4>
                    <p>
                        Investig ationes demons travg ectores legere lrus quod legunt
                        saepius.
                    </p>
                </div>

                <div class="col-md-4 mt-5 wow slideInUp" data-wow-delay=".3s">
                    <span class="iconbox iconbox-xxl bg-primary font-size-24">
                        <i class="ti-shine"></i>
                    </span>
                    <h4 class="my-4">Arranged Curriculum</h4>
                    <p>
                        Investig ationes demons travg ectores legere lrus quod legunt
                        saepius.
                    </p>
                </div>
            </div>
            <!-- END row-->
        </div>
        <!-- END container-->
    </section>

    <section class="padding-y-100" style="background: #00A544">
        <!-- # 3b3e79-->
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center text-white">
                    <h2>Meet Our Expert's</h2>
                    <div class="width-3rem height-4 rounded bg-primary mx-auto my-4" style="background: #fff !important">
                    </div>
                    <p class="font-size-18 text-white-0_6">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
                    </p>
                </div>
                <div class="col-12 mt-5">
                    <div class="owl-carousel dots-white" data-items="4" data-dots="true" data-dots-class="mt-5"
                        data-space="30">
                        <div class="card text-center">
                            <img class="card-img-top" src="{{ asset('img/262x230/user 5.jpg') }}" alt="" />
                            <div class="card-body py-4">
                                <h4 class="text-primary h5">Taofiq Hakim</h4>
                                <p class="mb-0">PHP Instructor</p>
                            </div>
                            <ul class="card-footer py-4 mb-0 list-inline">
                                <li class="list-inline-item mx-2">
                                    <a href="#"><i class="ti-facebook"></i></a>
                                </li>
                                <li class="list-inline-item mx-2">
                                    <a href="#"><i class="ti-twitter"></i></a>
                                </li>
                                <li class="list-inline-item mx-2">
                                    <a href="#"><i class="ti-linkedin"></i></a>
                                </li>
                                <li class="list-inline-item mx-2">
                                    <a href="#"><i class="ti-email"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="card text-center">
                            <img class="card-img-top" src="{{ asset('img/262x230/user 6.jpg') }}" alt="" />
                            <div class="card-body py-4">
                                <h4 class="text-primary h5">Leila Shaw</h4>
                                <p class="mb-0">C++ Ninja</p>
                            </div>
                            <ul class="card-footer py-4 mb-0 list-inline">
                                <li class="list-inline-item mx-2">
                                    <a href=""><i class="ti-facebook"></i></a>
                                </li>
                                <li class="list-inline-item mx-2">
                                    <a href=""><i class="ti-twitter"></i></a>
                                </li>
                                <li class="list-inline-item mx-2">
                                    <a href=""><i class="ti-linkedin"></i></a>
                                </li>
                                <li class="list-inline-item mx-2">
                                    <a href=""><i class="ti-email"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="card text-center">
                            <img class="card-img-top" src="{{ asset('img/262x230/user 4.jpg') }}" alt="" />
                            <div class="card-body py-4">
                                <h4 class="text-primary h5">Nam Nai</h4>
                                <p class="mb-0">Kono Instructor</p>
                            </div>
                            <ul class="card-footer py-4 mb-0 list-inline">
                                <li class="list-inline-item mx-2">
                                    <a href=""><i class="ti-facebook"></i></a>
                                </li>
                                <li class="list-inline-item mx-2">
                                    <a href=""><i class="ti-twitter"></i></a>
                                </li>
                                <li class="list-inline-item mx-2">
                                    <a href=""><i class="ti-linkedin"></i></a>
                                </li>
                                <li class="list-inline-item mx-2">
                                    <a href=""><i class="ti-email"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="card text-center">
                            <img class="card-img-top" src="{{ asset('img/262x230/user 2.jpg') }}" alt="" />
                            <div class="card-body py-4">
                                <h4 class="text-primary h5">John Doe</h4>
                                <p class="mb-0">JAVA Instructor</p>
                            </div>
                            <ul class="card-footer py-4 mb-0 list-inline">
                                <li class="list-inline-item mx-2">
                                    <a href=""><i class="ti-facebook"></i></a>
                                </li>
                                <li class="list-inline-item mx-2">
                                    <a href=""><i class="ti-twitter"></i></a>
                                </li>
                                <li class="list-inline-item mx-2">
                                    <a href=""><i class="ti-linkedin"></i></a>
                                </li>
                                <li class="list-inline-item mx-2">
                                    <a href=""><i class="ti-email"></i></a>
                                </li>
                            </ul>
                        </div>

                        <div class="card text-center">
                            <img class="card-img-top" src="{{ asset('img/262x230/user 1.jpg') }}" alt="" />
                            <div class="card-body py-4">
                                <h4 class="text-primary h5">Anna Smith</h4>
                                <p class="mb-0">PHP Instructor</p>
                            </div>
                            <ul class="card-footer py-4 mb-0 list-inline">
                                <li class="list-inline-item mx-2">
                                    <a href=""><i class="ti-facebook"></i></a>
                                </li>
                                <li class="list-inline-item mx-2">
                                    <a href=""><i class="ti-twitter"></i></a>
                                </li>
                                <li class="list-inline-item mx-2">
                                    <a href=""><i class="ti-linkedin"></i></a>
                                </li>
                                <li class="list-inline-item mx-2">
                                    <a href=""><i class="ti-email"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="card text-center">
                            <img class="card-img-top" src="{{ asset('img/262x230/user 3.jpg') }}" alt="" />
                            <div class="card-body py-4">
                                <h4 class="text-primary h5">Alex Labby</h4>
                                <p class="mb-0">C++ Ninja</p>
                            </div>
                            <ul class="card-footer py-4 mb-0 list-inline">
                                <li class="list-inline-item mx-2">
                                    <a href=""><i class="ti-facebook"></i></a>
                                </li>
                                <li class="list-inline-item mx-2">
                                    <a href=""><i class="ti-twitter"></i></a>
                                </li>
                                <li class="list-inline-item mx-2">
                                    <a href=""><i class="ti-linkedin"></i></a>
                                </li>
                                <li class="list-inline-item mx-2">
                                    <a href=""><i class="ti-email"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END row-->
        </div>
        <!-- END container-->
    </section>

    <section class="padding-y-100">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="mb-4">Success Story</h2>
                    <div class="width-3rem height-4 rounded bg-primary mx-auto"></div>
                </div>

                <div class="col-lg-8 mx-auto text-center">
                    <div class="owl-carousel dots-black" data-items-tablet="1" data-items="1" data-dots="true"
                        data-autoplay="false">
                        <div class="item">
                            <img class="iconbox iconbox-xxl mx-auto" src="{{ asset('img/avatar/avatar 2.jpg') }}"
                                alt="" />
                            <h5 class="mt-4">Sagred Al Jubayer</h5>
                            <p>Student</p>
                            <p class="lead">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                        <div class="item">
                            <img class="iconbox iconbox-xxl mx-auto" src="{{ asset('img/avatar/avatar 1.jpg') }}"
                                alt="" />
                            <h5 class="mt-4">Anny</h5>
                            <p>Student</p>
                            <p class="lead">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                        <div class="item">
                            <img class="iconbox iconbox-xxl mx-auto" src="{{ asset('img/avatar/avatar 3.jpg') }}"
                                alt="" />
                            <h5 class="mt-4">Alex</h5>
                            <p>Student</p>
                            <p class="lead">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- END col-12 -->
            </div>
            <!-- END row-->
        </div>
        <!-- END container-->
    </section>

@stop
