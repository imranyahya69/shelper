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


    <section class="bg-light-v2">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 bg-white marginTop-40">
                    <!-- <div class="container col-lg-8 mt-3 bg-white"> -->
                    <div class="align-items-center col-12 mt-4">
                        <h3>Question:</h3>
                        <div style="float: right">
                            <a href="{{ url('post_answer_page', [$question_id]) }}"
                                class="btn btn-sm btn-success hover:primary">POST SOLUTION</a>
                        </div>
                        <div class="qa-section">
                            <input type="hidden" id="question_id" value="{{ $question_id }}">
                            <a href="#">{{ $answer_data->question }}</a>
                        </div>
                    </div>

                    <div class="width-4rem height-5 bg-primary rounded ml-3 mt-2 marginBottom-20 mr-auto"></div>

                    <div class="align-items-center col-12">
                        <h3>Experts Answer:</h3>
                        <div class=" col-12 mt-3">
                            @foreach ($answer_data->answered_by as $solution)
                                <div class="intro row align-items-center col-12">
                                    <div class="profile-avatar">
                                        <img src="{{ asset('img/avatar/avatar 2.jpg') }}"
                                            class="iconbox iconbox-xxxl mr-3" alt="avatar" />
                                    </div>
                                    <div class="name-date">
                                        <div class="name-about">
                                            <div class="name">
                                                <a href="">{{ $solution->user_id->name }},
                                                    {{ $solution->user_id->role }}</a>
                                            </div>
                                            <div class="about">
                                                <span>{{ $solution->user_id->email }}</span>
                                            </div>
                                        </div>

                                        <div class="date">
                                            <span> <i class="ti-time text-primary mr-1"></i>
                                                {{ date('F j, Y', strtotime($solution->date)) }}</span>
                                        </div>

                                        <div class="notification date">
                                            <a href="#">
                                                <i class="fa fa-bell text-primary mr-1" aria-hidden="true"></i>
                                                Notification To Expert
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="answer">
                                    <p>{{ $solution->solution }}</p>
                                </div>
                            @endforeach
                            <div class="comment-meta edit-input">
                                <div class="my-4">
                                    <?php
                                    $like_flag = false;
                                    $dislike_flag = false;
                                    
                                    foreach ($answer_data->liked_by as $value) {
                                        if (session('_id') == $value->id) {
                                            $like_flag = true;
                                        }
                                    }
                                    
                                    foreach ($answer_data->disliked_by as $value) {
                                        if (session('_id') == $value->id) {
                                            $dislike_flag = true;
                                        }
                                    }
                                    ?>
                                    <a onclick="like_toggle()" class="btn btn-sm btn-light hover:primary m-1">
                                        <i @if ($like_flag == true)class="fa fa-thumbs-up" @else class="fa fa-thumbs-o-up" @endif id="thumb_up_icon" aria-hidden="true"></i>
                                        <span id="likes"
                                            @if ($like_flag == true) value="1" @else value="0" @endif>{{ count($answer_data->liked_by) }}</span>
                                    </a>
                                    <a onclick="dislike_toggle()" class="btn btn-sm btn-light hover:primary m-1">
                                        <i @if ($dislike_flag == true)class="fa fa-thumbs-down" @else class="fa fa-thumbs-o-down" @endif id="thumb_down_icon" aria-hidden="true"></i>
                                        <span id="dislikes"
                                            @if ($dislike_flag == true) value="1" @else value="0" @endif>{{ count($answer_data->disliked_by) }}</span>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-light hover:primary m-1">
                                        <i class="fa fa-commenting-o"
                                            aria-hidden="true"></i>{{ count($answer_data->comments) }}
                                    </a>
                                </div>
                            </div>
                            <!-- comment section -->

                            <div class="border ">
                                <div class=" d-flex align-items-center mt-2">
                                    <div class="input-group-prepend ">
                                        <img src="{{ asset('img/avatar/avatar 1.jpg') }}"
                                            class="iconbox iconbox-sm mr-2 ml-2" alt="">
                                    </div>
                                    <div class="mr-3 ml-3 text-center btn-block">
                                        <input type="hidden" id="commenter_id" value="{{ session('_id') }}">
                                        <input type="hidden" id="commenter_name" value="{{ session('name') }}">
                                        <input type="text" id="new_comment" placeholder="Enter your Comment"
                                            class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="text-right mr-3 mb-2">
                                    <button onclick="comment_reply('comment')" class="btn btn-primary" type="button"
                                        style="padding: 4px 10px;">
                                        Add Comment
                                    </button>
                                </div>
                            </div>

                            <div class="card shadow-v5 border padding-20">
                                <ol class="list-unstyled comments-area" id="comments-area">
                                    @foreach ($answer_data->comments as $comment)
                                        <li class="reply" id="comment-li-{{ $comment->_id }}">
                                            <div class="media mb-2 mt-3">
                                                <img class="iconbox iconbox-lg mr-3"
                                                    src="{{ asset('img/avatar/avatar 1.jpg') }}" alt="" />
                                                <div class="media-body">
                                                    <a onclick="newReply(this)" id="{{ $comment->_id }}"
                                                        class="float-right btn btn-outline-primary btn-pill btn-sm">
                                                        <i class="ti-back-right"></i> REPLY
                                                    </a>
                                                    <h4 class="h5 mb-0">{{ $comment->user_id->name }}</h4>
                                                    <p class="text-gray">
                                                        {{ date('F j, Y', strtotime($comment->date)) }}</p>
                                                    <p>
                                                        {{ $comment->comment }}
                                                        @if ($comment->user_id->id == session('_id') || session('role') == 'admin')
                                                            <button type="button"
                                                                onclick="deleteComment('{{ $comment->_id }}')"
                                                                class="btn btn-outline-danger iconbox iconbox-xs rounded ml-3">
                                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                            </button>
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                            @if ($comment->reply)
                                                @foreach ($comment->reply as $reply)
                                                    <ul>
                                                        <li>
                                                            <div class="media mb-2">
                                                                <img class="iconbox iconbox-lg mr-3"
                                                                    src="{{ asset('img/avatar/avatar 2.jpg') }}"
                                                                    alt="" />
                                                                <div class="media-body">
                                                                    <h4 class="h5 mb-0"
                                                                        id="{{ $reply->user_id }}">
                                                                        Unknown</h4>
                                                                    <p class="text-gray">
                                                                        {{ date('F j, Y', strtotime($reply->date)) }}</p>
                                                                    <p>
                                                                        {{ $reply->comment }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                @endforeach
                                            @endif
                                        </li>
                                    @endforeach
                                    {{-- <li class="text-center mt-5">
                                        <a href="#" class="btn btn-icon btn-outline-primary">
                                            <i class="ti-reload mr-2"></i> Load More
                                        </a>
                                    </li> --}}
                                </ol>
                            </div>
                        </div>
                    </div>

                    <!-- </div> -->

                </div>
                <!-- END col-lg-9 -->

                <aside class="col-lg-4 order-2 order-lg-1">

                    <div class="card px-4 marginTop-40 py-5 text-center shadow-v1">
                        <p class="mb-4 text-primary">Search Your Answers Here</p>
                        <div class="form-group">
                            <input type="text" id="post_question" name="post_question" class="form-control"
                                placeholder="Enter Questions">
                        </div>
                        <button onclick="postQuestion()" class="btn btn-block btn-primary">Post Question</button>
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


    <section class=" bg-light-v2 paddingBottom-100">
        <div class="container ">
            <div class="row">
                <div class="container col-lg-8 mx-auto mt-5  bg-white">
                    <h5 class="modal-title text-black mb-3 mt-5 ml-3 mr-3">Questions viewed by other students</h5>
                    <div class="width-80rem height-1 rounded marginBottom-10 mx-auto" style="background-color: #dee0e1;">
                    </div>
                    <div class="mb-3 mt-3 ml-3 mr-3">
                        <span>
                            <strong>Q:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                            dolor sit amet?
                        </span><br>
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
                    </div>
                    <div class="width-80rem height-1 rounded marginBottom-10 mx-auto" style="background-color: #dee0e1;">
                    </div>
                    <div class="mb-3 mt-3 ml-3 mr-3">
                        <span>
                            <strong>Q:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                            dolor sit amet?
                        </span><br>
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
                    <div class="width-80rem height-1 rounded marginBottom-10 mx-auto" style="background-color: #dee0e1;">
                    </div>
                    <div class="mb-3 mt-3 ml-3 mr-3">
                        <span>
                            <strong>Q:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                            dolor sit amet?
                        </span><br>
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

                <div class="col-lg-4"></div>

            </div>
        </div>
    </section>

@stop
{{-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
crossorigin="anonymous"></script> --}}
<script>
    var reply_counter = 0;

    function like_dislike_ajax(type) {
        let question_id = $('#question_id').val();
        var settings = {
            "url": "/like_dislike",
            "method": "POST",
            "timeout": 0,
            "headers": {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            "data": {
                "method": question_id,
                "data": "{\"is_like\":" + type + "}"
            }
        };

        $.ajax(settings).done(function(response) {
            console.log(response);
        });
    }

    function like_toggle() {
        let flag = $('#likes');
        let count = $('#likes');
        let flag_value = $('#likes').attr('value');
        let count_value = $('#likes').html();

        let dislike_flag = $('#dislikes');
        let dislike_count = $('#dislikes');
        let dislike_flag_value = $('#dislikes').attr('value');
        let dislike_count_value = $('#dislikes').html();


        if (flag_value == 0) {
            like_dislike_ajax('true');
            if (dislike_flag_value == 1) {
                dislike_count_value--;
                dislike_count.html(count_value);
                dislike_flag.attr('value', 0);
                $('#thumb_down_icon').addClass('fa-thumbs-o-down');
                $('#thumb_down_icon').removeClass(' fa-thumbs-down');
            }
            count_value++;
            count.html(count_value);
            flag.attr('value', 1);
            $('#thumb_up_icon').removeClass('fa-thumbs-o-up');
            $('#thumb_up_icon').addClass(' fa-thumbs-up');
        }
    }

    function dislike_toggle() {
        let flag = $('#dislikes');
        let count = $('#dislikes');
        let flag_value = $('#dislikes').attr('value');
        let count_value = $('#dislikes').html();

        let like_flag = $('#likes');
        let like_count = $('#likes');
        let like_flag_value = $('#likes').attr('value');
        let like_count_value = $('#likes').html();

        if (flag_value == 0) {
            like_dislike_ajax('false');
            if (like_flag_value == 1) {
                like_count_value--;
                like_count.html(count_value);
                like_flag.attr('value', 0);
                $('#thumb_up_icon').addClass('fa-thumbs-o-up');
                $('#thumb_up_icon').removeClass(' fa-thumbs-up');
            }
            count_value++;
            count.html(count_value);
            flag.attr('value', 1);
            $('#thumb_down_icon').removeClass('fa-thumbs-o-down');
            $('#thumb_down_icon').addClass(' fa-thumbs-down');
        }
    }


    function comment_reply(type, obj = null) {
        var method = (type == 'comment') ? 'comment' : 'reply';
        var user_text;
        var reference_id;
        if (method == 'comment') {
            user_text = $('#new_comment').val();
            $('#new_comment').val("");
            reference_id = $('#question_id').val();
            var name = $('#commenter_name').val();
            if (!user_text) {
                alert('Please type your comment');
                return false;
            }
        } else {
            user_text = $('#reply' + obj.id + '').val();
            reference_id = obj.id;
            if (!user_text) {
                alert('Please type your reply');
                return false;
            }
        }

        var settings = {
            "url": "/comment_reply",
            "method": "POST",
            "timeout": 0,
            "headers": {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            "data": {
                "method": method,
                "data": "{\"comment\":\"" + user_text + "\", \"id\":\"" + reference_id + "\"}"
            }
        };

        $.ajax(settings).done(function(response) {
            console.log('success');
            var tdate = new Date();
            var dd = tdate.getDate(); //yields day
            var MM = tdate.toLocaleString('default', {
                month: 'long'
            }); //yields month
            var yyyy = tdate.getFullYear(); //yields year
            var currentDate = MM + " " + dd + ", " + yyyy;

            if (method == 'comment') {
                var comment_html =
                    '<li class="reply"><div class="media mb-2 mt-3"><img class="iconbox iconbox-lg mr-3"' +
                    'src="{{ asset('img/Xelpr-final-logo.jpg') }}" alt="" />' +
                    '<div class="media-body"><a onclick="newReply(this)" class="float-right btn btn-outline-primary btn-pill btn-sm">' +
                    '<i class="ti-back-right"></i>REPLY</a><h4 class="h5 mb-0">' + name + '</h4>' +
                    '<p class="text-gray">' + currentDate + '</p>' +
                    '<p>' + user_text + '</p></div></div></li>';
                // $('#comments-area li:nth-last-child(2)').last().append(comment_html);
                $('#comments-area').append(comment_html);
            } else {
                var reply_hmtl = '<ul><li><div class="media mb-2">' +
                    '<img class="iconbox iconbox-lg mr-3"src="{{ asset('img/avatar/avatar 2.jpg') }}"alt="" />' +
                    '<div class="media-body"><h4 class="h5 mb-0" >' + name + '</h4>' +
                    '<p class="text-gray">' + currentDate + '</p>' +
                    '<p>' + user_text + '</p></div></div></li></ul>';
                // console.log($(obj).parent().parent().parent().parent().attr('class'));
                $(obj).parent().parent().parent().parent().append(reply_hmtl);
                $('#div' + obj.id + '').remove();
            }
        });
    }

    function newReply(obj) {
        var input = '<div class="reply_input" id="div' + obj.id +
            '"><input class="form-control form-control-sm" type="text" id="reply' + obj.id + '">' +
            '<button style="padding: 4px 10px;float:right" onclick="postReply(this)" id="' + obj.id +
            '" class="btn btn-sm btn-primary">Reply</button></div>';
        if (reply_counter == 0) {
            reply_counter++;
            $(obj).parent().append(input);
            // $('#div'+obj.id+'').remove();
            $('#reply' + obj.id + '').focus();
        } else {
            $('.reply_input').remove();
            $(obj).parent().append(input);
            $('#reply' + obj.id + '').focus();
        }
    }

    function postReply(obj) {
        comment_reply('reply', obj);
    }

    function deleteComment(comment_id) {
        // console.log(comment_id);
        var settings = {
            "url": "/remove_comment",
            "method": "POST",
            "timeout": 0,
            "headers": {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            "data": {
                "method": comment_id,
            }
        };
        $.ajax(settings).done(function(response) {
            console.log('success');
            $('#comment-li-' + comment_id + '').remove();
        });
    }
</script>
