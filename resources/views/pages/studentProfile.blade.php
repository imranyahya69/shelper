@extends('layouts.index')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/croppie.css') }}">
@endsection

@section('content')
    <div class="padding-y-80 bg-cover" data-dark-overlay="6"
        style="background-image: url('{{ asset('img/1920x800/breadcrumb-bg.jpg') }}'); no-repeat">

        <div class="container text-center">
            <h2 class="text-white">Student Profile</h2>
        </div>
    </div>

    <section class="paddingTop-50 paddingBottom-100 bg-light">
        <form id="update_form" action="#">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mt-4">
                        <div class="card shadow-v1">
                            <div class="card-header text-center border-bottom pt-5 mb-4">
                                <img id="profile_image_view" class="rounded-circle mb-4"
                                    src="data:image/jpeg;base64,{{ $my_profile->image }}" width="200" height="200"
                                    alt="" />
                                {{-- <img id="profile_image_view" class="rounded-circle mb-4"
                                @if ($my_profile->image) src="data:image/jpeg;base64,/{{$my_profile->image}}" @else src="{{asset('img/profile.png')}}" @endif
                                 width="200" height="200" alt="" /> --}}

                                <h4>{{ $my_profile->name }}</h4>
                                <p>{{ $my_profile->role }}</p>
                            </div>
                            <div class="card-body border-bottom">
                                <ul class="list-unstyled">
                                    <li class="mb-3">
                                        <span class="d-block">Email address:</span>
                                        <a class="h6" href="#">{{ $my_profile->email }}</a>
                                    </li>
                                    <li class="mb-3">
                                        <span class="d-block">Phone:</span>
                                        <a class="h6" href="#">{{ $my_profile->phone }}</a>
                                    </li>
                                    <li class="mb-3">
                                        <span class="d-block">Location:</span>
                                        <a class="h6" href="#">{{ $my_profile->address }}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer">
                                <p>Social Profile:</p>
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item">
                                        <a href="#" class="btn btn-outline-facebook iconbox iconbox-sm">
                                            <i class="ti-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" class="btn btn-outline-twitter iconbox iconbox-sm">
                                            <i class="ti-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" class="btn btn-outline-google-plus iconbox iconbox-sm">
                                            <i class="ti-google"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" class="btn btn-outline-linkedin iconbox iconbox-sm">
                                            <i class="ti-linkedin"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- END col-md-4 -->
                    <div class="col-lg-8 mt-4">
                        <div class="card padding-30 shadow-v1">
                            <ul class="nav tab-line tab-line border-bottom mb-4" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#Tabs_1-1" role="tab"
                                        aria-selected="true">
                                        About
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#Tabs_1-2" role="tab"
                                        aria-selected="true">
                                        Questions
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#Tabs_1-3" role="tab"
                                        aria-selected="true">
                                        Invoices
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#Tabs_1-4" role="tab"
                                        aria-selected="true">
                                        Setting
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="Tabs_1-1" role="tabpanel">
                                    <div class="col-12">
                                        <div class="edit-input">
                                            <h4 class="mb-4">Education</h4>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#modal-education">
                                                <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                                Add Education</button>
                                        </div>
                                        <?php
                                        $experience = json_decode($my_profile->experience);
                                        ?>
                                        <ul class="ec-timeline-portlet list-unstyled bullet-line-list"
                                            id="ec-timeline-portlet">
                                            <form id="education_form">
                                                @foreach ($experience as $value)
                                                    <li class="ec-timeline-portlet__item">
                                                        <div style="display: flex;">
                                                            <h6 class="experience">{{ $value->experience }}</h6>
                                                            <button type="button" onclick="editEducation(this)"
                                                                class="btn btn-outline-primary iconbox iconbox-xs rounded ml-3"
                                                                data-toggle="modal" data-target="#modal-education">
                                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                                            </button>
                                                            <button type="button" onclick="destroyEducation(this)"
                                                                class="btn btn-outline-danger iconbox iconbox-xs rounded ml-3">
                                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                            </button>

                                                        </div>
                                                        <p class="organization mb-0">{{ $value->organization }}</p>
                                                        <p class="date text-muted" value="{{ $value->date }}">
                                                            {{ date('Y', strtotime($value->date)) }}</p>
                                                    </li>
                                                @endforeach
                                            </form>
                                        </ul>
                                    </div>
                                    <div class="col-12">
                                        <h4>Biography</h4>
                                        <p>
                                            {{ $my_profile->bio }}
                                        </p>
                                    </div>
                                </div>
                                <!-- END tab-pane -->
                                <div class="tab-pane fade" id="Tabs_1-2" role="tabpanel">
                                    <div class="row">
                                        @foreach ($questions_data as $question)
                                            <div class="list-card marginTop-40">
                                                <div class="col-md12 px-md-0">
                                                    <div
                                                        class="card text-gray overflow-hidden height-100p shadow-v1 border">
                                                        <div class="card-body">
                                                            <a href="#" class="h4 mb-3">
                                                                Question:
                                                            </a>
                                                            <a class="mb-0" href="#">
                                                                {{ $question->question }}
                                                            </a>

                                                            <div class="date mt-2">
                                                                <span> <i class="ti-time text-primary mr-1"></i>
                                                                    {{ $question->is_answered ? 'Answered' : 'Not Answered' }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END col-md-8-->
                                            </div>
                                        @endforeach

                                        <div class="col-12 text-center mt-5">
                                            <a href="#" class="btn btn-icon btn-outline-primary">
                                                <i class="ti-reload mr-2"></i>
                                                Load More
                                            </a>
                                        </div>
                                    </div>
                                    <!-- END row-->
                                </div>
                                <!-- END tab-pane -->
                                <div class="tab-pane fade" id="Tabs_1-3" role="tabpanel">
                                    <div class="table-responsive my-4">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Invoices ID</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row" class="text-dark font-weight-semiBold">
                                                        #00004673
                                                    </th>
                                                    <td>01 Aug 2021</td>
                                                    <td>$49</td>
                                                    <td>
                                                        <a href="#" class="btn btn-link">View</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END tab-pane -->
                                <div class="tab-pane fade" id="Tabs_1-4" role="tabpanel">
                                    <div class="border-bottom mb-4 pb-4">
                                        <h4>Upload Avatar</h4>
                                        <div class="media align-items-end mt-4">
                                            <div class="col-md-4 form-group">
                                                <label>Image (optional)</label>
                                                <div id="upload-image"></div>
                                                <input type="file" class="form-control" placeholder="Product Image"
                                                    id="images">
                                                <input type="hidden" name="image_binary" id="imageBinary">
                                                <div class="col-md-4 crop_preview">
                                                    <div id="upload-image-i"></div>
                                                </div>
                                                <input onclick="uploadPicture(this)" class="btn btn-outline-primary"
                                                    value="Upload">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="border-bottom mb-4 pb-4">
                                        <h4 class="mb-4">Manage your Account</h4>

                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label text-dark">Full Name</label>
                                            <div class="col-md-9">
                                                <input type="text" id="full_name" name="name" class="form-control"
                                                    value="{{ $my_profile->name }}" />
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label text-dark">Email</label>
                                            <div class="col-md-9">
                                                <input type="email" name="email" class="form-control"
                                                    value="{{ $my_profile->email }}" />
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label text-dark">Phone</label>
                                            <div class="col-md-9">
                                                <input type="tel" name="phone" class="form-control"
                                                    value="{{ $my_profile->phone }}" />
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label text-dark">Location</label>
                                            <div class="col-md-9">
                                                <input type="tel" name="address" class="form-control"
                                                    value="{{ $my_profile->address }}" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="border-bottom mb-4 pb-4">
                                        <h4 class="mb-4">Security Settings</h4>

                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label text-dark">Current Password</label>
                                            <div class="col-md-9">
                                                <input type="password" name="current_password" class="form-control"
                                                    value="123456" />
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label text-dark">New Password</label>
                                            <div class="col-md-9">
                                                <input type="password" name="new_password" class="form-control"
                                                    placeholder="12345678" />
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label text-dark">Confirm Password</label>
                                            <div class="col-md-9">
                                                <input type="password" name="confirm_password" class="form-control"
                                                    placeholder="12345678" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="border-bottom mb-4 pb-4">
                                        <h4 class="mb-4">Social Account</h4>

                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label text-dark">Facebook</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" value="https://fb.com/jaman57" />
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label text-dark">Twitter</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control"
                                                    value="https://Twitter.com/jaman57" />
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label text-dark">Linkdin</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control"
                                                    value="https://Linkdin.com/jaman57" />
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label text-dark">Google</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control"
                                                    value="https://Google.com/jaman57" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="border-bottom mb-4 pb-4">
                                        <h4 class="mb-4">Biography</h4>
                                        {{-- <textarea rows="6" name="bio" class="form-control"
                                            value="{{ $my_profile->bio }}"></textarea> --}}
                                        <input type="text" name="bio" id="bio" class="form-control"
                                            value="{{ $my_profile->bio }}">
                                    </div>


                                    <div class="my-5">
                                        <button type="submit" class="btn btn-success m-2">Update
                                            Profile</button>
                                        <button class="btn btn-danger m-2">Cancel</button>
                                    </div>
                                </div>
                                <!-- END tab-pane -->
                            </div>
                            <!-- END tab-content-->
                        </div>
                        <!-- END card-->
                    </div>
                    <!-- END col-md-8 -->
                </div>
                <!--END row-->
            </div>
            <!--END container-->
        </form>
    </section>



    <!-- Modal Education-->

    <div class="modal fade" id="modal-education" tabindex="-1" role="dialog"
        aria-labelledby="modal__Vertically-centered" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Education</h5>
                    <button type="button" class="close" onclick="CloseModal(this)" data-dismiss="modal"
                        aria-label="Close">
                        <i class="ti-close font-size-14"></i>
                    </button>
                </div>
                <div class="modal-body py-4">
                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label text-left">Major Subject
                        </label>
                        <div class="row form-group">
                            <div class="col-12">
                                <input class="form-control" type="text" placeholder="Enter Subject"
                                    id="example-text-input-subject">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label text-left">Institute:
                        </label>
                        <div class="row form-group">
                            <div class="col-12">
                                <input class="form-control" type="text" placeholder="Institute Name"
                                    id="example-text-input-institute">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="example-date-input" class="col-form-label text-left">
                            Duration:
                        </label>
                        <div class="row form-group">
                            <div class="col-6">
                                <input class="form-control" type="date" id="example-date-input-from">
                            </div>
                            <div class="col-6">
                                <input class="form-control" type="date" id="example-date-input-to">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer py-4">
                    <button type="button" class="btn btn-danger" onclick="CloseModal(this)" data-dismiss="modal">
                        Close
                    </button>
                    <button type="button" value="0" id="saveEdu" onclick="saveEducation(this)" class="btn btn-success">Save
                        changes</button>
                    <button style="display: none" value="1" type="button" id="updateEdu" onclick="saveEducation(this)"
                        class="btn btn-success">Update
                        changes</button>

                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('js/croppie.min.js') }}"></script>

    <script>
        var edit_obj;

        function getEduData() {
            var org = document.getElementsByClassName('organization');
            var date = document.getElementsByClassName('date');
            var exp = document.getElementsByClassName('experience');
            var arr = [];
            for (var i = 0; i < exp.length; ++i) {
                arr.push({
                    organization: org[i].innerHTML,
                    date: date[i].innerHTML,
                    experience: exp[i].innerHTML,
                    type: "education",
                });
            }
            var new_array = JSON.stringify(arr);
            console.log(new_array);
            return new_array;
        }
        $(document).ready(function() {
            $('.cr-boundary').css('display', 'none');
            $('.cr-slider-wrap').css('display', 'none');
            $("#successMessage").delay(3000).slideUp(300);
            $("#update_form").submit(function() {
                var data = JSON.stringify(jQuery('#update_form').serializeArray());
                // var full_name = $('#full_name').val();
                var settings = {
                    "url": "/updateProfile",
                    "method": "POST",
                    "timeout": 0,
                    "headers": {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    "mimeType": "multipart/form-data",
                    "data": {
                        "data": data
                    },
                };

                $.ajax(settings).done(function(response) {
                    console.log(response);
                    location.reload(true);
                });

            });
        });

        function saveEducation(obj) {
            var add_update_counter = $(obj).attr('value')
            if (add_update_counter == 1) {
                $("#updateEdu").attr("disabled", true);
            } else {
                $("#saveEdu").attr("disabled", true);
            }
            // var array = {!! json_encode($my_profile->experience) !!};
            var major = $('#example-text-input-subject').val();
            var institute = $('#example-text-input-institute').val();
            var from = $('#example-date-input-from').val();
            var to = $('#example-date-input-to').val();
            if (!major && !institute && !from) {
                alert('Major, Institute and Starting date must be filled');
                return false;
            }
            var tdate = new Date(from);
            var from_year = tdate.getFullYear();

            if (to) {
                var tdate = new Date(to);
                var to_year = tdate.getFullYear();
            } else {
                to = 'continue';
            }
            var education_html =
                '<li class="ec-timeline-portlet__item"><div style="display: flex;"><h6 class="experience">' + major +
                '</h6>' +
                '<button onclick="editEducation(this)" type="button" class="btn btn-outline-primary iconbox iconbox-xs rounded ml-3"' +
                'data-toggle="modal" data-target="#modal-education"><i class="fa fa-pencil" aria-hidden="true"></i>' +
                '</button><button type="button" onclick="destroyEducation(this)" class="btn btn-outline-danger iconbox iconbox-xs rounded ml-3">' +
                '<i class="fa fa-trash-o" aria-hidden="true"></i></button>' +
                '</div><p class="organization mb-0">' + institute + '</p>' +
                // '<span class="date text-muted">' + from + '</span></li>';
                '<p class="date text-muted" value="'+from+'">' + from_year + '</p></li>';
            if (add_update_counter == 1) {
                $(edit_obj).parent().parent().remove();
            }
            $('#ec-timeline-portlet').append(education_html);

            var add_data = getEduData();

            var settings = {
                "url": "/updateEducation",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                "data": {
                    "experience": add_data,
                },
                // "data": {
                //     "data": {
                //         'type': "education",
                //         'experience': major,
                //         'organization': institute,
                //         'date': from_year,
                //         // 'to': to_year,
                //     },
                //     "previous": array,
                // },
            };
            $.ajax(settings).done(function(response) {
                $('#modal-education').modal('hide');
                CloseModal(obj);
                // $('#modal-education').on('hidden.bs.modal', function(e) {
                //     $(this)
                //         .find("input,textarea,select")
                //         .val('')
                //         .end();
                // });
                if (add_update_counter == 1) {
                    $("#updateEdu").attr("disabled", false);
                    toggleSave();
                } else {
                    $("#saveEdu").attr("disabled", false);
                }
            });
        }
    </script>
    <script type="text/javascript">
        image = null;
        // image = "data:image/jpeg;base64,{{ $my_profile->image }}";
        // console.log(image);
        if (image == undefined) {
            image = null;
        }
        $image_crop = $("#upload-image").croppie({
            enableExif: true,
            url: image,
            viewport: {
                width: 200,
                height: 200,
                type: "circle"
            },
            boundary: {
                width: 300,
                height: 300
            },
        });
        $("#images").on("change", function() {
            $('.cr-boundary').css('display', 'block');
            $('.cr-slider-wrap').css('display', 'block');

            var reader = new FileReader();
            reader.onload = function(e) {
                $image_crop.croppie("bind", {
                    url: e.target.result,
                }).then(function() {
                    console.log("jQuery bind complete");
                    // $('#profile_image_view').attr('src',imageEncoded);
                    $('#imageBinary').val(e.target.result);
                });
            };
            reader.readAsDataURL(this.files[0]);
        });

        function uploadPicture(obj) {
            var image_binary = $('#imageBinary').val();
            console.log(image_binary);
            var settings = {
                "url": "/updateProfilePic",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                "mimeType": "multipart/form-data",
                "data": {
                    "data": image_binary,
                },
            };
            $.ajax(settings).done(function(response) {
                $('#profile_image_view').attr('src', image_binary);
                // location.reload(true);
            });
        }

        function destroyEducation(obj) {
            $(obj).parent().parent().remove();
            var delete_data = getEduData();
            var settings = {
                "url": "/updateEducation",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                "data": {
                    "experience": delete_data,
                },
            };
            $.ajax(settings).done(function(response) {
                console.log('deleted successfully');
            });
        }

        function editEducation(obj) {
            toggleUpdate();
            var edit_major = $(obj).siblings('h6').text();
            var edit_organization = $(obj).parent().siblings('p').eq(0).text();
            var edit_date = $(obj).parent().siblings('p').eq(1).attr('value');
            edit_obj = obj;

            $('#example-text-input-subject').val(edit_major);
            $('#example-text-input-institute').val(edit_organization);
            $('#example-date-input-from').val(edit_date);
        }

        function CloseModal(obj) {
            $('#modal-education').on('hidden.bs.modal', function(e) {
                $(this)
                    .find("input,textarea,select")
                    .val('')
                    .end();
            });
            toggleSave();
        }

        function toggleSave() {
            $('#updateEdu').css("display", "none");
            $('#saveEdu').css("display", "block");
        }

        function toggleUpdate() {
            $('#updateEdu').css("display", "block");
            $('#saveEdu').css("display", "none");
        }
    </script>

@endsection
