<footer class="site-footer">
			<div class="footer-top bg-dark text-white-0_6 pt-5 paddingBottom-100">
				<div class="container">
					<div class="row">
						<div class="col-lg-4 col-md-6 mt-5">
							<img src="{{asset ('img/Xelpr-final-logo-white.png')}}" alt="Logo" style="max-width: 170px !important"/>
							<div class="margin-y-40">
								<p>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit,
									sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
								</p>
							</div>
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="iconbox bg-white-0_2 hover:primary" href=""
										><i class="fa fa-facebook"> </i
									></a>
								</li>
								<li class="list-inline-item">
									<a class="iconbox bg-white-0_2 hover:primary" href=""
										><i class="fa fa-twitter"> </i
									></a>
								</li>
								<li class="list-inline-item">
									<a class="iconbox bg-white-0_2 hover:primary" href=""
										><i class="fa fa-linkedin"> </i
									></a>
								</li>
							</ul>
						</div>

						<div class="col-lg-4 col-md-6 mt-5">
							<h4 class="h5 text-white">Contact Us</h4>
							<div class="width-3rem bg-primary height-3 mt-3"></div>
							<ul class="list-unstyled marginTop-40">
								<li class="mb-3">
									<i class="fa fa-headphones mr-3"></i
									><a href="tel:#">923000000000 </a>
								</li>
								<li class="mb-3">
									<i class="fa fa-envelope-o mr-3"></i
									><a href="mailto:#">admin@xelper.com</a>
								</li>
								<li class="mb-3">
									<div class="media">
										<i class="fa fa-map-marker mt-2 mr-3"></i>
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

		<!-- <script src="assets/js/vendors.bundle.js"></script> -->
		<!-- <script src="assets/js/app.min.js"></script> -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script type="text/javascript" src="{{ asset('js/vendors.bundle.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

		@yield ('scripts')
		
	</body>
</html>
