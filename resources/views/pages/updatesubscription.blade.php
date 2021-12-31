@extends('layouts.index')

@section('content')


<section class="padding-y-100 bg-light-v2">
			<div class="container">
				<div class="row">
					<div class="col-12 text-left">
						<h2>Manage Subscription</h2>
						<div
							class="width-4rem height-4 bg-primary my-2 rounded " >
                        </div>
                        <div class="col-lg-12 my-2 ">
                            <p class="font-size-18 my-4">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                eiusmod tempor incididunt ut labore et dolore magna aliqua.                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                Lorem ipsum dolor sit amet, ut labore et dolore magna aliqua.
                            </p>
                            <button class="btn btn-primary mr-2 mb-3">Update</button>
                            <button
                                type="button"
                                data-toggle="modal"
                                data-target="#cancel-subscription"
                                class="btn btn-outline-primary mr-2 mb-3">
                                Cancel Subscription
                            </button>
                        </div>                   
					</div>
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
								<button class="btn btn-block btn-primary btn-xs mr-3 mb-3">Upgrade Plan</button>							</div>
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
								<button class="btn btn-block btn-light btn-xs mr-3 mb-3"> Current </button>							</div>
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
								<button class="btn btn-block btn-primary btn-xs mr-3 mb-3">Upgrade Plan</button>							</div>
						</div>
					</div>

				</div>
				<!-- END row-->
			</div>
			<!-- END container-->
		</section>


        		<!-- Modal default-->
		<div
        class="modal fade"
        id="cancel-subscription"
        tabindex="-1"
        role="dialog"
        aria-labelledby="modal__Vertically-centered"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Cancel Subscription </h5>
                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close"
                    >
                        <i class="ti-close font-size-14"></i>
                    </button>
                </div>
                <div class="modal-body py-4">Are you sure you want to cancel the subscription? </div>
                <div class="modal-footer py-4">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">
                        No
                    </button>
                    <button type="button" class="btn btn-success">Yes</button>
                </div>
            </div>
        </div>
        </div>
            	<!-- End Modal-->


		@stop
