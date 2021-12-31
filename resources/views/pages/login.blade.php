@extends('layouts.index')
@section('content')

		<div class="site-search">
			<div class="site-search__close bg-black-0_8"></div>
			<form class="form-site-search" action="#" method="POST">
				<div class="input-group">
					<input
						type="text"
						placeholder="Search"
						class="form-control py-3 border-white"
						required=""
					/>
					<div class="input-group-append">
						<button class="btn btn-primary" type="submit">
							<i class="ti-search"></i>
						</button>
					</div>
				</div>
			</form>
		</div>
		<!-- END site-search-->

		<section class="padding-y-100 bg-light">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 mx-auto">
						<div class="card shadow-v2">
							<div class="card-header border-bottom">
								<h4 class="mt-4">Log In to Your Account!</h4>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col my-2">
										<button class="btn btn-block btn-linkedin">
											<i class="ti-linkedin mr-1"></i>
											<span>Linkedin Sign in</span>
										</button>
									</div>
									<div class="col my-2">
										<button class="btn btn-block btn-google-plus">
											<i class="ti-google mr-1"></i>
											<span>Google Sign in</span>
										</button>
									</div>
								</div>
								<p class="text-center my-4">OR</p>
								<form action="{{url('/login')}}" method="POST" class="px-lg-4">
									<input type="hidden" name="_token" value="{{ csrf_token() }}" />

									<div class="input-group input-group--focus mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text bg-white ti-email"></span>
										</div>
										<input
											type="text"
											name="email"
											class="form-control border-left-0 pl-0"
											placeholder="Email"
										/>
									</div>
									<div class="input-group input-group--focus mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text bg-white ti-lock"></span>
										</div>
										<input
											type="password"
											name="password"
											class="form-control border-left-0 pl-0"
											placeholder="Password"
										/>
									</div>
									<div class="d-md-flex justify-content-between my-4">
										<label class="ec-checkbox check-sm my-2 clearfix">
											<input type="checkbox" name="checkbox" />
											<span class="ec-checkbox__control"></span>
											<span class="ec-checkbox__lebel">Remember Me</span>
										</label>
										<a
											href="page-recover-password.html"
											class="text-primary my-2 d-block"
											>Forgot password?</a
										>
									</div>
									<button type="submit" class="btn btn-block btn-primary">Log In</button>
									<p class="my-5 text-center">
										Don’t have an account?
										<a href="{{url('/register')}}" class="text-primary">Register</a>
									</p>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- END row-->
			</div>
			<!-- END container-->
		</section>

		<footer class="site-footer">
			<div class="footer-top bg-dark text-white-0_6 pt-5 paddingBottom-100">
				<div class="container">
					<div class="row">
						<div class="col-lg-4 col-md-6 mt-5">
							<img src="assets/img/white logo.png" alt="Logo" style="max-width: 170px !important"/>
							<div class="margin-y-40">
								<p>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit,
									sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
								</p>
							</div>
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="iconbox bg-white-0_2 hover:primary" href=""
										><i class="ti-facebook"> </i
									></a>
								</li>
								<li class="list-inline-item">
									<a class="iconbox bg-white-0_2 hover:primary" href=""
										><i class="ti-twitter"> </i
									></a>
								</li>
								<li class="list-inline-item">
									<a class="iconbox bg-white-0_2 hover:primary" href=""
										><i class="ti-linkedin"> </i
									></a>
								</li>
							</ul>
						</div>

						<div class="col-lg-4 col-md-6 mt-5">
							<h4 class="h5 text-white">Contact Us</h4>
							<div class="width-3rem bg-primary height-3 mt-3"></div>
							<ul class="list-unstyled marginTop-40">
								<li class="mb-3">
									<i class="ti-headphone mr-3"></i
									><a href="tel:#">923000000000 </a>
								</li>
								<li class="mb-3">
									<i class="ti-email mr-3"></i
									><a href="mailto:#">test@gmail.com</a>
								</li>
								<li class="mb-3">
									<div class="media">
										<i class="ti-location-pin mt-2 mr-3"></i>
										<div class="media-body">
											<span>
												184 Lorem ipsum, Lorem ipsum</span
											>
										</div>
									</div>
								</li>
							</ul>
						</div>

						<div class="col-lg-4 col-md-6 mt-5">
							<h4 class="h5 text-white">Quick links</h4>
							<div class="width-3rem bg-primary height-3 mt-3"></div>
							<ul class="list-unstyled marginTop-40">
								<li class="mb-2"><a href="page-about.html">About Us</a></li>
								<li class="mb-2"><a href="page-contact.html">Contact Us</a></li>
								<li class="mb-2">
									<a href="page-sp-student-profile.html">Students</a>
								</li>
								<li class="mb-2">
									<a href="page-sp-admission-apply.html">Admission</a>
								</li>
								<li class="mb-2"><a href="page-events.html">Events</a></li>
							</ul>
						</div>
<!-- 
						<div class="col-lg-4 col-md-6 mt-5">
							<h4 class="h5 text-white">Newslatter</h4>
							<div class="width-3rem bg-primary height-3 mt-3"></div>
							<div class="marginTop-40">
								<p class="mb-4">
									Subscribe to get update and information. Don't worry, we won't
									send spam!
								</p>
								<form class="marginTop-30" action="#" method="POST">
									<div class="input-group">
										<input
											type="text"
											placeholder="Enter your email"
											class="form-control py-3 border-white"
											required=""
										/>
										<div class="input-group-append">
											<button class="btn btn-primary" type="submit">
												Subscribe
											</button>
										</div>
									</div>
								</form>
							</div>
						</div> -->
					</div>
					<!-- END row-->
				</div>
				<!-- END container-->
			</div>
			<!-- END footer-top-->

			<div class="footer-bottom bg-black-0_9 py-5 text-center">
				<div class="container">
					<p class="text-white-0_5 mb-0">
						&copy; 2021 All rights reserved. Created by
						<a href="http://aspireanalytica.com/" target="_blunk"><b>Aspire</b> Analytica</a>
					</p>
				</div>
			</div>
			<!-- END footer-bottom-->
		</footer>
		<!-- END site-footer -->

		<div class="scroll-top">
			<i class="ti-angle-up"></i>
		</div>

@endsection