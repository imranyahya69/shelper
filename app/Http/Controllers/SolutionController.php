<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SolutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $api = new ApiController;
        $data = $api->getAllQuestions($request->only(['search']));//it contains json decoded response
        return view('pages.solutionpage', get_defined_vars());
    }

    public function questionStatus(Request $request)
    {
        //Object of API controller;
        $api = new ApiController;

        //it contains json decoded response for questions
        $question_array = $api->getAllQuestions();
        $questions_data = $question_array->data;

        //it contains json decoded response for categories
        $category_array = $api->getAllCategories();
        $cat_data = $category_array->data->data;

        return view('pages.questionstatus', compact("cat_data", "questions_data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //Get All Data using API
        $api = new ApiController;
        $api->postQuestions($request);//it contains json decoded response
        // return view ('pages.solutionpage',get_defined_vars());
        return redirect('postquestion')->with('success', 'Question Posted Successfully');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function SingleQuestion($question_id)
    {
        $api = new ApiController;
        $category_array = $api->getAllCategories();
        $cat_data = $category_array->data->data;
        if (!session('token')) {
            $single_question = $api->getSingleQuestion($question_id);
            $question_data = $single_question->data;
            return view('pages.hidesolution', compact("question_data"));
        } else {
            $single_answer = $api->getSingleAnswer($question_id);
            $answer_data = $single_answer->data;
            return view('pages.solutionpage', compact("answer_data", "cat_data", "question_id"));
        }
    }

    public function like_dislike(Request $request)
    {
        $api = new ApiController;
        $api->likesDislikes($request->request);
        return response('Success');
    }
    
    public function comment_reply(Request $request)
    {
        $api = new ApiController;
        $api->comment_reply($request->request);
        return response('Success');
    }

    public function post_question_page()
    {
        $api = new ApiController;
        $question_array = $api->getAllQuestions();
        $questions_data = $question_array->data;
        $category_array = $api->getAllCategories();
        $cat_data = $category_array->data->data;
        return view('pages.postquestion', compact("cat_data", "questions_data"));
    }

    public function post_question(Request $request)
    {
        $api = new ApiController;
        $api->postQuestion($request->request);
        return response('Success');
    }

    public function unanswered_question_page()
    {
        $api = new ApiController;
        $question_array = $api->getAllQuestions();
        $questions_data = $question_array->data;
        $category_array = $api->getAllCategories();
        $cat_data = $category_array->data->data;
        return view('pages.notansweredquestion', compact("cat_data", "questions_data"));
    }

    public function post_answer_page($question_id)
    {
        $api = new ApiController;
        $category_array = $api->getAllCategories();
        $cat_data = $category_array->data->data;
        $single_answer = $api->getSingleAnswer($question_id);
        $answer_data = $single_answer->data;
        return view('pages.postanswer', compact("answer_data", "cat_data", "question_id"));
    }

    public function post_answer(Request $request)
    {
        $api = new ApiController;
        $api->postAnswer($request->request);
        return response('Success');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function register(Request $request)
    {
        if (session('token')) {
            return redirect('/home');
        }
        $user['name'] = $request->full_name;
        $user['email'] = $request->email;
        $user['role'] = 'user';
        $user['status'] = 'active';
        $user['password'] = $request->password;
        $user['password_confirmation'] = $request->password_confirmation;

        $register = new ApiController;
        $response =  $register->registerUser($user);
        if ($response) {
            return view('pages.login', compact('response'));
        }
    }
 
    public function login(Request $request)
    {
        if (session('token')) {
            return redirect('/home');
        }
        $user['email'] = $request->email;
        $user['password'] = $request->password;
 
        $login = new ApiController;
        $response =  $login->loginUser($user);
        if ($response) {
            $profile = new ApiController;
            $profile->getProfile();
            return redirect('/home');
        }
    }
    
    public function profile()
    {
        $profile = new ApiController;
        $response = $profile->getProfile();
        $my_profile = $response->data;
        $api = new ApiController;
        $question_array = $api->getAllQuestions();
        $questions_data = $question_array->data;
        return view('pages.studentProfile', compact('my_profile', 'questions_data'));
    }

    public function updateProfile(Request $request)
    {
        $data_array = array();
        $data = json_decode($request->request->get('data'));
        foreach ($data as $value) {
            $data_array[$value->name] = $value->value;
        }
        $update_profile = new ApiController;
        $update_profile->updateProfile(json_encode($data_array));
        return response('Success');
    }

    public function updateEducation(Request $request)
    {
        $education = new ApiController;
        $education->updateEducation(json_encode($request->all()));
        return response('Success');
    }

    public function updateProfilePic(Request $request)
    {
        $profile_pic = new ApiController;
        $profile_pic->updateProfilePic($request->request->get('data'));
        return response('Success');
    }
    public function remove_comment(Request $request)
    {
        $remove_comment = new ApiController;
        $remove_comment->remove_comment($request->all());
        return response('Success');
    }
}
