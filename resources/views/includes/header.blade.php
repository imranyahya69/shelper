<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />

    <!-- Title-->
    <title>
        Complete education
    </title>

    <!-- SEO Meta-->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Education" />
    <meta name="keywords" content="HTML5 Education theme, responsive HTML5 theme, bootstrap 4, Clean Theme" />
    <meta name="author" content="education" />

    <!-- viewport scale-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Favicon and Apple Icons-->
    <link rel="icon" type="image/x-icon" href="#" />
    <link rel="shortcut icon" href="#" />
    <link rel="apple-touch-icon-precomposed" href="#" />

    <!--Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Maven+Pro:400,500,700%7CWork+Sans:400,500" />

    <!-- Icon fonts -->
    <script src="https://kit.fontawesome.com/690c596bf5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('fonts/themify-icons/css/themify-icons.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <!-- stylesheet-->
    <!-- <link rel="stylesheet" href="public/css/vendors.bundle.css" />
  <link rel="stylesheet" href="public/css/style.css" />
        <link rel="stylesheet" href="public/css/custom-style.css" /> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors.bundle.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom-style.css') }}">

    <!-- Editor
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
        <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet"> -->
    @yield ('styles')



</head>

<body>
    <header class="site-header bg-dark text-white-0_5">
        <div class="container">
            <div class="row align-items-center justify-content-between mx-0">
                <ul class="list-inline d-none d-lg-block mb-0">
                    <li class="list-inline-item mr-3">
                        <div class="d-flex align-items-center">
                            <i class="ti-email mr-2"></i>
                            <a href="mailto:#">{{ session('email') }}</a>
                        </div>
                    </li>
                    <li class="list-inline-item mr-3">
                        <div class="d-flex align-items-center">
                            <i class="ti-headphone mr-2"></i>
                            <a href="tel:#">+923000000000</a>
                        </div>
                    </li>
                </ul>
                <ul class="list-inline mb-0">
                    <li class="list-inline-item mr-0 p-3 border-right border-left border-white-0_1">
                        <a href="#"><i class="ti-facebook"></i></a>
                    </li>
                    <li class="list-inline-item mr-0 p-3 border-right border-white-0_1">
                        <a href="#"><i class="ti-twitter"></i></a>
                    </li>
                    </li>
                    <li class="list-inline-item mr-0 p-3 border-right border-white-0_1">
                        <a href="#"><i class="ti-linkedin"></i></a>
                    </li>
                </ul>
                @if (!session('token'))
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item mr-0 p-md-3 p-2 border-right border-left border-white-0_1">
                            <a href="{{ url('/login') }}">Login</a>
                        </li>
                        <li class="list-inline-item mr-0 p-md-3 p-2 border-right border-white-0_1">
                            <a href="{{ url('/register') }}">Register</a>
                        </li>
                    </ul>
                @else
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item mr-0 p-md-3 p-2 border-right border-left border-white-0_1">
                            <a href="{{ url('/get_profile') }}">Profile</a>
                        </li>
                        <li class="list-inline-item mr-0 p-md-3 p-2 border-right border-white-0_1">
                            <a href="{{ url('/logout') }}">Logout</a>
                        </li>
                    </ul>

                @endif
            </div>
            <!-- END END row-->
        </div>
        <!-- END container-->

    </header>
    <!-- END site header-->

    <nav class="ec-nav sticky-top bg-white">
        <div class="container">
            <div class="navbar p-0 navbar-expand-lg">
                <div class="navbar-brand">
                    <a class="logo-default" href="{{ url('/') }}">
                        <img alt="LOGO" src="{{ asset('img/Xelpr-final-logo.png') }}"
                            style="max-width: 170px !important" /></a>
                </div>
                <div class="collapse navbar-collapse when-collapsed" id="ec-nav__collapsible">
                    <ul class="nav navbar-nav ec-nav__navbar ml-auto">
                        <!-- <li class="nav-item nav-item__has-megamenu megamenu-col-2"> -->
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('home_page') }}">Home</a>
                        </li>

                        {{-- <li class="nav-item">
								<a
									class="nav-link "
									href="{{route('solution_page')}}"
									>Solutions</a
								>

							</li> --}}

                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('question_status') }}">Questions & Answers</a>
                        </li>
                        @if (!session('token'))
                            {{-- <li class="nav-item">
                                <a class="nav-link " href="{{ url('/login') }}">Login</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link " href="{{ url('/register') }}">Sign Up</a>
                            </li> --}}
                        @else
                            @if (session('role') == 'expert')
                                {{-- <li class="nav-item">
                                    <a class="nav-link " href="{{ url('/post_answer_page') }}">Post a
                                        Solution</a>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link "
                                        href="{{ url('/unanswered_question_page') }}">Unanswered
                                        Questions</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link " href="{{ url('/post_question_page') }}">Post a Question</a>
                            </li>

                        @endif

                        <!-- <li class="nav-item">
        <a
         class="nav-link "
         href="#"
        >
         Logout
        </a>
       </li> -->

                    </ul>
                </div>
                <div class="nav-toolbar">
                    <ul class="navbar-nav ec-nav__navbar">
                        <li class="nav-item">
                            <a class="nav-link site-search-toggler" href="#">
                                <i class="ti-search"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- END container-->
        @if (session()->has('message'))
            <div id="messages" class="alert {{ Session::get('alert-class', 'alert-info') }}">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>
                    {!! session()->get('message') !!}
                </strong>
            </div>
        @endif
        {{-- @if (Session::has('message'))
            <p id="successMessage" class="alert {{ Session::get('alert-class', 'alert-info') }}">
                {{ Session::get('message') }}</p>
        @endif --}}

    </nav>
    <!-- END ec-nav -->

    <div class="site-search">
        <div class="site-search__close bg-black-0_8"></div>
        <form class="form-site-search" action="#" method="POST">
            <div class="input-group">
                <input type="text" placeholder="Search" class="form-control py-3 border-white" required="" />
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="ti-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <!-- END site-search-->
