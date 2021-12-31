@extends('layouts.index')

@section('content')   
        
        <div
			class="padding-y-80 bg-cover"
			data-dark-overlay="6"
			style="background: url({{ URL::asset('img/1920x800/breadcrumb-bg.jpg')}}) no-repeat"
		>
			<div class="container">
				<h2 class="text-white text-center"> Subscription Details </h2>
			</div>
		</div>

		<section class="padding-y-100 border-bottom border-light bg-light">
			<div class="container">
				<div class="row">

                    <div class="col-10 mt-5 mx-auto ">
						<!-- <div class="card shadow-v2 z-index-5" data-offset-top-xl="-160"> -->
                        <div>
							<div class="card-header bg-primary text-white border-bottom-0">
                                <h2 class="text-white text-center"> Subscription Details </h2>
							</div>

							<div class="p-4 border bg-white" style="display: flex;">
                                <div class="col-6" >
                                    <h6 class="mb-1">Membership Level</h6>
                                </div>
                                <div class="col-6">
                                    <a href="#">
                                        Standard 3 months
                                        </a>
                                </div>	
							</div>

                            <div class="p-4 border bg-white" style="display: flex;">
                                <div class="col-6" >
                                    <h6 class="mb-1">Membership Status</h6>
                                </div>
                                <div class="col-6">
                                    <a href="#">
                                        Active 
                                        </a>
                                </div>	
							</div>

                            <div class="p-4 border bg-white" style="display: flex;">
                                <div class="col-6" >
                                    <h6 class="mb-1">Member Since</h6>
                                </div>
                                <div class="col-6">
                                    <a href="#">
                                        24 august, 2020 
                                        </a>
                                </div>	
							</div>

                            <div class="p-4 border bg-white" style="display: flex;">
                                <div class="col-6" >
                                    <h6 class="mb-1">Membership Expiry on</h6>
                                </div>
                                <div class="col-6">
                                    <a href="#">
                                        25 august, 2021 
                                        </a>
                                </div>	
							</div>
                            
						</div>
					</div>
				</div>
				<!-- END row-->
			</div>
			<!-- END container-->
		</section>



        @stop