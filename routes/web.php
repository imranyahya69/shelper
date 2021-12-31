<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (session('token')) {
        return redirect('/home');
    }


    return view('pages.login');
});

Route::get('/home', function () {
    // if(!session('token')){
    //     return redirect('/login');
    // }

    return view('pages.home');
})->name('home_page');

Route::get('/subscription', function () {
    return view('pages.pagesubscription');
})->name('subscription_page');


Route::get('/subscriptiondetails', function () {
    return view('pages.subscriptiondetails');
})->name('subscription_details');

Route::get('/hidesolution', function () {
    return view('pages.hidesolution');
})->name('hide_solution');

Route::get('/topexpert', function () {
    return view('pages.topexperts');
})->name('top_expert');

Route::get('/updatesubscription', function () {
    return view('pages.updatesubscription');
})->name('update_subscription');


Route::get('/ordersucess', function () {
    return view('pages.ordersucess');
})->name('order_sucess');

Route::resource('/solution', 'SolutionController');//

Route::get('/login', function () {
    if (session('token')) {
        return redirect('/home');
    }
    return view('pages.login');
});

Route::get('/register', function () {
    if (session('token')) {
        return redirect('/home');
    }
    return view('pages.register');
});


Route::post('/register', 'SolutionController@register')->name('register_student');
Route::post('/login', 'SolutionController@login');

Route::get('/questionstatus', 'SolutionController@questionStatus')->name('question_status');
Route::get('/show_question/{id}', 'SolutionController@SingleQuestion');

Route::group(['middleware' => 'checkSession'], function () {

    Route::get('/get_profile', 'SolutionController@profile');
    Route::post('/updateProfile', 'SolutionController@updateProfile');
    Route::post('/updateEducation', 'SolutionController@updateEducation');
    Route::post('/updateProfilePic', 'SolutionController@updateProfilePic');
    Route::get('/logout', function () {session()->flush(); return redirect('/login');});
    
    Route::get('/unanswered_question_page', 'SolutionController@unanswered_question_page')->middleware('checkRole');
    Route::get('/post_question_page', 'SolutionController@post_question_page');
    Route::post('/post_question', 'SolutionController@post_question');

    Route::get('/solutionpage', function () { return view('pages.solutionpage');})->name('solution_page');
    Route::get('/post_answer_page/{q_id}', 'SolutionController@post_answer_page')->middleware('checkRole');
    Route::post('/post_answer', 'SolutionController@post_answer')->middleware('checkRole');

    Route::post('/like_dislike', 'SolutionController@like_dislike');
    Route::post('/comment_reply', 'SolutionController@comment_reply');
    Route::post('/remove_comment', 'SolutionController@remove_comment'); 
});
