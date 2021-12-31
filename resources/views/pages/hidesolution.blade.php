@extends('layouts.index')

@section('content')


    <section class="pt-5 bg-light-v2 paddingBottom-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8 bg-white rounded" style="border: 4px solid #00cb54!important;">
                    <form>
                        <div class="input-group bg-white p-1">
                            <input type="text" class="form-control border-white"
                                placeholder="Find solutions for your homework" required="">
                            <div class="input-group-append">
                                <button class="btn btn-primary rounded" type="submit"> Search
                                    <i class="ti-angle-right small"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-2"></div>

            </div>
        </div>
    </section>


    <section class="padding-y-80 flex-center bg-center ">

        <div class="container col-lg-8 mx-auto mt-8">
            <div style="padding: 40px; border: 1px solid #dee0e1; ">
                <div class="row align-items-center col-12">
                    <!-- <div ="classmargin-y-40"> -->
                    <h3>Question:</h3>
                    <div class="qa-section">
                        <a href="#">
                            {{ $question_data->question }}
                        </a>
                    </div>
                </div>

                <div class="width-4rem height-10 bg-primary rounded mt-2 marginBottom-20 mr-auto"></div>

                <div class="row align-items-center col-12">
                    <h3>Experts Answer:</h3>
                </div>

                <div class="container-section padding-y-120 mt-8"
                    style="background: url({{ URL::asset('img/bg/QnA.jpg') }}) no-repeat">

                    <div class="col-lg-5 text-center mx-auto padding-y-60 border bg-white rounded">
                        <button class="btn btn-info" type="submit" style="
              background-color: #00A544 !important;
              border-color: #00A544 !important;
              border-radius: 50px;
              width: 230px;
            ">
                            <a href="{{ url('/login') }}">See Answer</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END container-->
    </section>

@stop
