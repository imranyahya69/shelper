@extends('layouts.index')


@section('content')

    <section class="padding-y-100 bg-light">
        <div class="container">


            <section class="padding-y-60 border-bottom border-light bg-white">

                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center mb-5">
                            <h2>Post Your Answer Here</h2>
                            <div class="width-4rem height-4 bg-primary my-2 mx-auto rounded"></div>
                        </div>
                        <div class="col-10 mx-auto">
                            <ul class="nav nav-tabs nav-fill" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active text-left" data-toggle="tab" href="#Tabs_11-1" role="tab"
                                        aria-selected="true">
                                        <h4 class="mb-4 text-primary ml-3">Post an Answer</h4>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="Tabs_11-1" role="tabpanel">
                                    <div class="border border-top-0 p-3">
                                        <div class="col-md-12 my-2">
                                            <div id="accordion-4_1" class="list-group accordion-style-4_1">
                                                <div class="align-items-center col-12 mt-4">
                                                    <h3>Question:</h3>
                                                    <div class="qa-section">
                                                        <input type="hidden" id="question_id" value="{{ $question_id }}">
                                                        <a href="#">{{ $answer_data->question }}</a>
                                                    </div>
                                                </div>

                                                <div class="accordion-item list-group-item p-0">
                                                    <a href="#acc4_4" class="accordion__title h6 mb-0 p-3"
                                                        data-toggle="collapse" aria-expanded="true">
                                                        Answer the Question given Above
                                                        <span class="accordion__icon float-right small mt-1">
                                                            <i class="ti-angle-down"></i>
                                                            <i class="ti-angle-up"></i>
                                                    </a>

                                                        <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                                                        <div id="acc4_4" class="collapse show"
                                                            data-parent="#accordion-4_1">
                                                            <div id="toolbar"></div>
                                                            <div class="p-4" id="editor-textarea"
                                                                style="border: none !important;">
                                                            </div>
                                                            <input type="hidden" name="question_id" value="5">
                                                            <div class="text-right mr-3 mb-3">
                                                                <button onclick="postAnswer()"
                                                                    class="btn btn-outline-primary border-3 "
                                                                    style="padding: 2px 25px;">
                                                                    Post Answer
                                                                </button>
                                                            </div>
                                                        </div>

                                                </div>
                                                <!-- END accordion-item-->
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

@endsection


@section('styles')

    <!-- Editor -->

    <link href="//cdnjs.cloudflare.com/ajax/libs/KaTeX/0.7.1/katex.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/monokai-sublime.min.css" rel="stylesheet">
    <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">


@endsection

@section('scripts')


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

            quill.on('text-change', function(delta, oldDelta, source) {
                $("#ans_area").val($(".ql-editor").html());

            });


        });

        function postAnswer() {
                let solution;
                let question_id;

                //get the solution using dom
                solution = $('#editor-textarea .ql-editor p').html();

                //get the solution id using dom
                question_id = $('#question_id').val();

                console.log(solution);

                // ajax call
                var settings = {
                    "url": "/post_answer",
                    "method": "POST",
                    "timeout": 0,
                    "headers": {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    "data": {
                        "solution": solution,
                        "method": question_id,
                    }
                };

                $.ajax(settings).done(function(response) {
                    // console.log(response);
                    // $('#modal__Vertically-centered'). modal('hide');
                    location.reload(true);
                });

            }


    </script>

@endsection
