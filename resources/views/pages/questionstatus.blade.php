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
                                            <b>Questions & Answers </b>
                                        </span>
                                        <div class="width-3rem bg-primary height-3 mt-3"></div>
                                    </th>
                                    <!-- <th scope="col">First</th>
                                            <th scope="col">Last</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @if ($questions_data)
                                    @foreach ($questions_data as $value)
                                        @if ($value->is_answered)

                                            <tr>
                                                <td scope="row" style="width: 60%;">
                                                    <a class="mb-0"
                                                        href="{{ url('show_question', [$value->id]) }}">
                                                        {{ $value->question }}
                                                    </a>
                                                </td>
                                                <td style="width: 20%;">
                                                    <i class="fa fa-circle" aria-hidden="true" style="font-size: 10px;
                                                    color: #00CB54;"></i>
                                                    <span>Answered</span></br>
                                                    {{-- <span style="font-size: 12px; padding-left: 17px;">{{ $value->date}}</span> --}}
                                                    {{-- <i class="fa fa-circle" aria-hidden="true" style="font-size: 10px;
                                                color: #FF0000"></i>
                                                <span>Not Answered</span></br> --}}
                                                </td>
                                                <td style="width: 20%;">{{ $value->date }}</td>
                                            </tr>
                                        @endif

                                    @endforeach
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

                    <div class="card px-4 marginTop-40 py-5 text-center shadow-v1">
                        <p class="mb-4 text-primary">Search Your Answers Here</p>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter Questions">
                        </div>
                        <button class="btn btn-block btn-primary">Post Question</button>
                    </div>

                    <div class="card marginTop-30 shadow-v1">
                        <h4 class="card-header bg-primary border-bottom mb-0 h6">Choose Category</h4>
                        <ul class="card-body list-unstyled mb-0">
                            @if (!empty($cat_data))
                                @if (count($cat_data) > 1)
                                    <li class="mb-2"><a href="">All Courses</a></li>
                                @endif
                                @foreach ($cat_data as $value)
                                    <li class="mb-2"><a href="">{{ $value->name }}</a></li>
                                @endforeach
                            @else
                                <li class="mb-2"><a href="#">No Category Added Yet</a></li>
                            @endif
                        </ul>
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
