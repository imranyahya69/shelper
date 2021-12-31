@extends('layouts.index')


@section('content')


    <section class="padding-y-100 bg-light">
        <div class="container">

            <section class="padding-y-60 border-bottom border-light bg-white">

                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center mb-5">
                            <h2>Search Your Questions Here</h2>
                            <div class="width-4rem height-4 bg-primary my-2 mx-auto rounded"></div>
                        </div>
                        <div class="col-10 mx-auto">
                            <ul class="nav nav-tabs nav-fill" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active text-left" data-toggle="tab" href="#Tabs_11-1" role="tab"
                                        aria-selected="true">
                                        <h4 class="mb-4 text-primary ml-3">Post a question</h4>
                                    </a>
                                </li>
                                <li class="nav-item">
                                </li>
                                <li class="nav-item">
                                </li>
                                <li class="nav-item">
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="Tabs_11-1" role="tabpanel">
                                    <div class="border border-top-0 p-3">
                                        <div class="col-md-12 my-2">
                                            <div id="accordion-4_1" class="list-group accordion-style-4_1">
                                                <div class="accordion-item list-group-item p-0">
                                                    <a href="#acc4_4" class="accordion__title h6 mb-0 p-3"
                                                        data-toggle="collapse" aria-expanded="true">
                                                        What is your Question?
                                                        <span class="accordion__icon float-right small mt-1">
                                                            <i class="ti-angle-down"></i>
                                                            <i class="ti-angle-up"></i>
                                                    </a>
                                                    <div id="acc4_4" class="collapse show" data-parent="#accordion-4_1">
                                                        <div id="toolbar"></div>
                                                        <div class="p-4" id="editor-textarea"
                                                            style="border: none !important;"></div>
                                                        <div class="text-right mr-3 mb-3">
                                                            <button class="btn btn-outline-primary border-3 "
                                                                style="padding: 2px 25px;">
                                                                Continue
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END accordion-item-->

                                                <div class="accordion-item list-group-item p-0">
                                                    <a href="#acc4_5" class="accordion__title h6 mb-0 p-3 collapsed"
                                                        data-toggle="collapse" aria-expanded="true">
                                                        What is your subject?
                                                        <span class="accordion__icon float-right small mt-1">
                                                            <i class="ti-angle-down"></i>
                                                            <i class="ti-angle-up"></i>
                                                        </span>
                                                    </a>
                                                    <div id="acc4_5" class="collapse" data-parent="#accordion-4_1">
                                                        <div class="p-4 border-top">
                                                            <div class="card marginTop-30 ">
                                                                <h3 class=" border-bottom mb-2 ">
                                                                    Choose Category
                                                                </h3>
                                                            </div>
                                                            <div class="row" style="display: flex;">
                                                                @if (!empty($cat_data))
                                                                    <ul class="list-unstyled mb-0 col-lg-4 col-md-6 mt-3">
                                                                        @foreach ($cat_data as $value)
                                                                            <li class="mb-2">
                                                                                <input type="radio" class="category_id"
                                                                                    name="category_id"
                                                                                    value="{{ $value->id }}">{{ $value->name }}
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class=" text-right mb-2 mt-3 mr-3">
                                                            <button class="btn btn-primary " style="padding: 4px 60px;"
                                                                type="button" data-toggle="modal"
                                                                data-target="#modal__Vertically-centered">
                                                                Post Question
                                                            </button>
                                                        </div>
                                                        <div class="text-center float-right mr-5 mb-3"
                                                            style="font-size: 12px;">
                                                            <strong>20</strong>
                                                            questions remaining this<br>
                                                            subscription period.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- END tab-content-->
                                </div>
                                <!-- END col-12 -->
                            </div>
                            <!-- END row-->
                        </div>
                        <!-- END container-->
            </section>
            <!-- END section-->
    </section>

    <div class="modal fade" id="modal__Vertically-centered" tabindex="-1" role="dialog"
        aria-labelledby="modal__Vertically-centered" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="ti-close font-size-14"></i>
                    </button>
                </div>
                <div class="modal-body py-4">
                    <h5 class="modal-title text-center text-black mb-3">Why wait? Your question may already be answered</h5>
                    <div class="width-80rem height-1 rounded marginBottom-10 mx-auto" style="background-color: #dee0e1;">
                    </div>
                    @foreach ($questions_data as $value)
                        <div class="mb-3">
                            <span>
                                <strong>Q:</strong>{{ $value->question }}
                            </span><br>
                            <strong>A:</strong>
                            <a href="{{ url('show_question', [$value->id]) }}" class="text-primary"> View Answer </a>
                        </div>
                        <div class="width-80rem height-1 rounded marginBottom-10 mx-auto"
                            style="background-color: #dee0e1;">
                        </div>
                    @endforeach


                </div>
                <div class="modal-footer py-4 text-center">
                    <button onclick="postQuestion()" type="button" class="btn btn-block btn-primary btn-lg"> I still want to
                        post a new
                        question</button>
                </div>
            </div>
        </div>
    </div>


@endsection


@section('styles')

    <!-- Editor -->
    <!-- <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
                                            <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet"> -->

    <link href="//cdnjs.cloudflare.com/ajax/libs/KaTeX/0.7.1/katex.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/monokai-sublime.min.css" rel="stylesheet">
    <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">


@endsection

@section('scripts')

    <!-- <script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
                                            <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
                                            <script src="//cdn.quilljs.com/1.3.6/quill.core.js"></script> -->


    <script src="//cdnjs.cloudflare.com/ajax/libs/KaTeX/0.7.1/katex.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script> --}}


    <script>
        $(document).ready(function() {
            $("#successMessage").delay(3000).slideUp(300);

            var toolbarOptions = [
                ['bold', 'italic', 'underline', 'strike'], // toggled buttons
                ['blockquote', 'code-block'],

                [{
                    'header': 1
                }, {
                    'header': 2
                }], // custom button values
                [{
                    'list': 'ordered'
                }, {
                    'list': 'bullet'
                }],
                [{
                    'script': 'sub'
                }, {
                    'script': 'super'
                }], // superscript/subscript
                [{
                    'indent': '-1'
                }, {
                    'indent': '+1'
                }], // outdent/indent
                [{
                    'direction': 'rtl'
                }], // text direction

                [{
                    'size': ['small', false, 'large', 'huge']
                }], // custom dropdown
                [{
                    'header': [1, 2, 3, 4, 5, 6, false]
                }],

                [{
                    'color': []
                }, {
                    'background': []
                }], // dropdown with defaults from theme
                [{
                    'font': []
                }],
                [{
                    'align': []
                }],

                ['link', 'image', 'formula'],

                ['clean'] // remove formatting button
            ];

            var quill = new Quill('#editor-textarea', {
                modules: {
                    toolbar: toolbarOptions,
                },
                placeholder: 'Enter Your Question Here...',
                theme: 'snow'
            });
        });

        function postQuestion() {
            let question;
            let category_id;

            //get the question using dom
            question = $('#editor-textarea .ql-editor p').html();

            //get the category using dom
            $(".category_id").each(function() {
                if ($(this).is(":checked")) {
                    category_id = $(this).val();
                }
            });


            // ajax call
            var settings = {
                "url": "/post_question",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "data": {
                    "question": question,
                    "category_id": "61b300db7c7aac02eb0044d2",
                }
            };

            $.ajax(settings).done(function(response) {
                console.log(response);
                // $('#modal__Vertically-centered'). modal('hide');
                // location.reload(true);
                var url = '/questionstatus';
                $(location).attr('href',url);
            });

        }
    </script>

@endsection
