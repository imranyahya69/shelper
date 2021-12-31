@extends('layouts.index')


@section('content')


		<div class="padding-y-80 bg-cover bg-primary">
			<div class="container">
				<h2 class="text-white text-center">Subscription Plan</h2>
			</div>
		</div>

		<section class="padding-y-100">
			<div class="container">
				<div class="row">
					
					<div class="col-md-4 mt-5">
						<div class="card height-100p shadow-v2">
							<img class="card-img-top" src="{{ asset('img/262x230/1.jpg') }}" alt="" />
							<div class="card-body">
								<h4>1 Month</h4>
								<h6 class="text-primary my-3">Lorem Ipsum</h6>
								<p>
									Investig atones demns traivg sed vunt lectoes legere kurus
									quodk
								</p>
								<button class="btn btn-block btn-primary btn-xs mr-3 mb-3">Upgrade Now</button>							</div>
						</div>
					</div>

					<div class="col-md-4 mt-5">
						<div class="card height-100p shadow-v2">
							<img class="card-img-top" src="{{ asset('img/262x230/1.jpg') }}" alt="" />
							<div class="card-body">
								<h4>3 Months</h4>
								<h6 class="text-primary my-3">Lorem Ipsum</h6>
								<p>
									Investig atones demns traivg sed vunt lectoes legere kurus
									quodk
								</p>
								<button class="btn btn-block btn-primary btn-xs mr-3 mb-3">Upgrade Now</button>							</div>
						</div>
					</div>

					<div class="col-md-4 mt-5">
						<div class="card height-100p shadow-v2">
							<img class="card-img-top" src="{{ asset('img/262x230/1.jpg') }}" alt="" />
							<div class="card-body">
								<h4>1 Year</h4>
								<h6 class="text-primary my-3">Lorem Ipsum</h6>
								<p>
									Investig atones demns traivg sed vunt lectoes legere kurus
									quodk
								</p>
								<button class="btn btn-block btn-primary btn-xs mr-3 mb-3">Upgrade Now</button>							</div>
						</div>
					</div>

				</div>
				<!-- END row-->
			</div>
			<!-- END container-->
		</section>

	@stop