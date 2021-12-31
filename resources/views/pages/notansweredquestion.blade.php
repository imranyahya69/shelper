@extends('layouts.index')

@section('content')


    <section class="pt-5 bg-light-v2">
        <div class="container">
            <div class="row">
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
                <div class="col-lg-4"></div>

            </div>
        </div>
    </section>

    <section class=" paddingBottom-100 bg-light-v2">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 bg-white marginTop-40">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="mt-3">
                                        <span style="font-size: 24px;">
                                            <b>Questions for you </b>
                                        </span>
                                        <div class="width-3rem bg-primary height-3 mt-3"></div>
                                    </th>
                                    <!-- <th scope="col">First</th>
                                                            <th scope="col">Last</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @php($count = 0)
                                @if ($questions_data)
                                    @foreach ($questions_data as $value)
                                        @if (!$value->is_answered)
                                            @php($count++)
                                            <tr>
                                                <td scope="row" style="width: 60%;">
                                                    <a class="mb-0"
                                                        href="{{ url('post_answer_page', [$value->id]) }}">
                                                        {{ $value->question }}
                                                    </a>
                                                </td>
                                                <td style="width: 20%;">
                                                    <i class="fa fa-circle" aria-hidden="true" style="font-size: 10px;
                                                            color: #FF0000"></i>
                                                    <span>Not Answered</span></br>
                                                </td>
                                                <td style="width: 20%;">{{ $value->date }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    @if ($count == 0)
                                        <tr>
                                            <td scope="row" style="width: 60%;">
                                                <a class="mb-0" href="#">
                                                    No Unanswered Question Found
                                                </a>
                                            </td>
                                        </tr>
                                    @endif

                                @else
                                    <tr>
                                        <td scope="row" style="width: 60%;">
                                            <a class="mb-0" href="#">
                                                No Question Posted Yet
                                            </a>
                                        </td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- END col-lg-9 -->

                <aside class="col-lg-4 order-2 order-lg-1">
                    <div class="card px-4 marginTop-40 py-5  shadow-v1">
                        <h5 class="modal-title text-black text-center">Related Questions</h5>
                        <div class="width-80rem height-1 rounded marginBottom-10 mx-auto"
                            style="background-color: #dee0e1;"></div>
                        <div class="mb-3 mt-3 ml-3 mr-3">
                            <strong>Q:</strong>
                            <a href="#"> Lorem ipsum dolor sit amet...</a>
                            <br>
                            <div class="d-flex">
                                <div>
                                    <strong>A:</strong>
                                    <a href="#" class="text-primary"> View Answer </a>
                                </div>
                                <p class="mb-0 ml-2 text-gray align-items-center" style="font-size: 14px;">
                                    <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                                    <span>100%</span> <span>(2 ratings)</span>
                                </p>
                            </div>

                            <div class="width-80rem height-1 rounded marginBottom-10 mx-auto mt-2"
                                style="background-color: #dee0e1;"></div>
                            <div>
                                <strong>Q:</strong>
                                <a href="#"> Lorem ipsum dolor sit amet...</a>
                                <br>
                                <div class="d-flex">
                                    <div>
                                        <strong>A:</strong>
                                        <a href="#" class="text-primary"> View Answer </a>
                                    </div>
                                    <p class="mb-0 ml-2 text-gray align-items-center" style="font-size: 14px;">
                                        <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                                        <span>100%</span> <span>(2 ratings)</span>
                                    </p>
                                </div>
                                <div class="width-80rem height-1 rounded marginBottom-10 mx-auto mt-2"
                                    style="background-color: #dee0e1;"></div>

                                <div>
                                    <span>
                                        <strong>Q:</strong>
                                        <a href="#"> Lorem ipsum dolor sit amet...</a>
                                        <br>
                                        <div class="d-flex">
                                            <div>
                                                <strong>A:</strong>
                                                <a href="#" class="text-primary"> View Answer </a>
                                            </div>
                                            <p class="mb-0 ml-2 text-gray align-items-center" style="font-size: 14px;">
                                                <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                                                <span>100%</span> <span>(1 ratings)</span>
                                            </p>
                                        </div>
                                </div>
                                <div class="width-80rem height-1 rounded marginBottom-10 mx-auto mt-2"
                                    style="background-color: #dee0e1;"></div>
                                <div>
                                    <strong>Q:</strong>
                                    <a href="#"> Lorem ipsum dolor sit amet...</a>
                                    <br>
                                    <div class="d-flex">
                                        <div>
                                            <strong>A:</strong>
                                            <a href="#" class="text-primary"> View Answer </a>
                                        </div>
                                        <p class="mb-0 ml-2 text-gray align-items-center" style="font-size: 14px;">
                                            <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                                            <span>100%</span> <span>(5 ratings)</span>
                                        </p>
                                    </div>
                                </div>

                                <div class="text-center mt-5 mb-5">
                                    <a href="#" class="btn btn-icon btn-outline-primary">
                                        <i class="ti-reload mr-2"></i> Load More
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- END widget-->

                </aside>
                <!-- END col-lg-3 -->
            </div>
            <!-- END row-->
        </div>
        <!-- END container-->
    </section>


@stop
