<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Exception;
use Session;

use GuzzleHttp\Psr7;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class ApiController extends Controller
{
    private $client;
    private $question_api_url;
    private $single_question_api_url;
    private $register_api_url;
    private $login_api_url;
    private $like_dislike_api_url;
    private $profile_api_url;
    private $category_api_url;
    private $post_question_api_url;
    private $comment_api_url;
    private $delete_comment_api_url;
    private $update_profile_api_url;
    private $post_answer_api_url;

    //
    public function __construct()
    {
        $url = "https://api.xelpr.com/api/handle"; //backend server url

        $this->client = new Client();

        $this->question_api_url = $url.'/get_question';
        $this->single_question_api_url = $url.'/show_question';
        $this->register_api_url = $url.'/register';
        $this->login_api_url = $url.'/login';
        $this->profile_api_url = $url.'/getprofile';
        $this->category_api_url = $url.'/list_category';
        $this->like_dislike_api_url = $url.'/like';
        $this->post_question_api_url = $url.'/post_question';
        $this->comment_api_url = $url.'/add_comment';
        $this->update_profile_api_url = $url.'/setprofile';
        $this->post_answer_api_url = $url.'/solution';
        $this->delete_comment_api_url = $url.'/remove_comment';
    }

    private function prepare_header()
    {
        $this->header = ['headers'=>['Authorization'=> 'Bearer '.session('token')]];
    }


    public function getAllQuestions()
    {
        try {
            $this->prepare_header();
            //For testing the static data
            // return json_decode(file_get_contents(storage_path('getAllQuestion.json')));
            $data1 = $this->client->request('POST', $this->question_api_url, [$this->header,
            'form_params' => [
                'ignore_user' => true,]
            ]);
            return json_decode($data1->getBody());
        } catch (Exception $e) {
            Session::flash('message', $e->getMessage());
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
        }
    }

    public function getSingleQuestion($id)
    {
        try {
            $this->prepare_header();
            return json_decode(file_get_contents(storage_path('getSingleQuestion.json')));
        } catch (Exception $e) {
            Session::flash('message', $e->getMessage());
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
        }
    }

    public function getSingleAnswer($id)
    {
        try {
            $this->prepare_header();
            $this->header['form_params'] = ['method'=>$id];
            $data = $this->client->request('POST', $this->single_question_api_url, $this->header);
            return json_decode($data->getBody());
        } catch (Exception $e) {
            Session::flash('message', $e->getMessage());
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
        }
    }

    public function getAllCategories()
    {
        try {
            $this->prepare_header();
            // return json_decode(file_get_contents(storage_path('getAllCategories.json')));
            $data = $this->client->request('POST', $this->category_api_url, [$this->header]);
            return json_decode($data->getBody());
        } catch (Exception $e) {
            Session::flash('message', $e->getMessage());
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
        }
    }

    public function postQuestions($request)
    {
        try {
            $this->prepare_header();
            $data = $this->client->request('POST', $this->question_api_url, [$this->header, 'form_params'=>$request->all()]);
            return json_decode($data->getBody());
        } catch (Exception $e) {
            Session::flash('message', $e->getMessage());
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
        }
    }
    public function registerUser($request)
    {
        try {
            $data = $this->client->request('POST', $this->register_api_url, ['form_params'=>$request]);
            return json_decode($data->getBody());
        } catch (Exception $e) {
            Session::flash('message', $e->getMessage());
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
        }
    }
    public function loginUser($request)
    {
        try {
            $data = $this->client->request('POST', $this->login_api_url, ['form_params'=>$request]);
            $logged_data = json_decode($data->getBody());
            session(['token' => $logged_data->access_token]);
            // session(['token' => $logged_data->access_token]);
            return $logged_data;
        } catch (Exception $e) {
            dd($e->getMessage());
            Session::flash('message', $e->getMessage());
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
            // return redirect()->back()->withMessage("error", $e->getMessage());
        }
    }

    public function getProfile()
    {
        try {
            $this->prepare_header();

            $my_profile = $this->client->request('POST', $this->profile_api_url, $this->header);
            $my_profile_data = json_decode($my_profile->getBody());

            foreach ($my_profile_data->data as $key => $value) {
                session([$key => $value]);
            }
            return $my_profile_data;
        } catch (Exception $e) {
            Session::flash('message', $e->getMessage());
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
        }
    }

    public function updateProfile($request)
    {
        $this->prepare_header();
        $this->header['form_params'] = ['data'=>$request];
        try {
            $data = $this->client->request('POST', $this->update_profile_api_url, $this->header);
            Session::flash('message', 'Profile updated successfully!');
            Session::flash('alert-class', 'alert-success');
            return json_decode($data->getBody());
        } catch (Exception $e) {
            Session::flash('message', $e->getMessage());
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
        }
    }

    public function updateEducation($request)
    {
        $this->prepare_header();
        $this->header['form_params'] = ['data'=>$request];
        try {
            $data = $this->client->request('POST', $this->update_profile_api_url, $this->header);
            return json_decode($data->getBody());
        } catch (Exception $e) {
            Session::flash('message', $e->getMessage());
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
        }
    }

    
    public function updateProfilePic($request)
    {
        $this->prepare_header();
        $this->header['form_params'] = ['data'=>'{"image":'."\"".$request."\"".'}'];
        try {
            $data = $this->client->request('POST', $this->update_profile_api_url, $this->header);
            return json_decode($data->getBody());
        } catch (Exception $e) {
            Session::flash('message', $e->getMessage());
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
        }
    }
    public function likesDislikes($request)
    {
        $this->prepare_header();
        $request_method = $request->get('method');
        $request_data = $request->get('data');
        $this->header['form_params'] = ['method'=>$request_method,'data'=>$request_data];
        try {
            $data = $this->client->request('POST', $this->like_dislike_api_url, $this->header);
            return json_decode($data->getBody());
        } catch (Exception $e) {
            Session::flash('message', $e->getMessage());
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
        }
    }
    public function comment_reply($request)
    {
        $this->prepare_header();
        $request_method = $request->get('method');
        $request_data = $request->get('data');
        $this->header['form_params'] = ['method'=>$request_method,'data'=>$request_data];
        try {
            $data = $this->client->request('POST', $this->comment_api_url, $this->header);
            return json_decode($data->getBody());
        } catch (Exception $e) {
            Session::flash('message', $e->getMessage());
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
        }
    }

    public function remove_comment($request)
    {
        $this->prepare_header();
        $this->header['data'] = ['method'=>$request['method'],'signature'=>"59bfd8e9ea89e1eedc5f1c94e61610b4"];
        try {
            $data = $this->client->request('POST', $this->delete_comment_api_url, $this->header);
            return json_decode($data->getBody());
        } catch (Exception $e) {
            Session::flash('message', $e->getMessage());
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
        }
    }
    
    public function postQuestion($request)
    {
        $this->prepare_header();
        $data = array();
        foreach ($request as $key => $value) {
            $data[$key] = $value;
        }
        $this->header['form_params'] = ['data' => json_encode($data)];
        try {
            $data = $this->client->request('POST', $this->post_question_api_url, $this->header);
            Session::flash('message', 'Question posted successfully!');
            Session::flash('alert-class', 'alert-success');
            return json_decode($data->getBody());
        } catch (Exception $e) {
            Session::flash('message', $e->getMessage());
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
            // Session::flash('message', 'An error occured, kindly try again!');
            // Session::flash('alert-class', 'alert-danger');
            // $e->getMessage();
        }
    }

    public function postAnswer($request)
    {
        $this->prepare_header();
        $this->header['form_params'] = ['data' => "{\"solution\":"."\"".$request->get('solution')."\""."}",
        'method' => $request->get('method')];
        try {
            $data = $this->client->request('POST', $this->post_answer_api_url, $this->header);
            Session::flash('message', 'Answer posted successfully!');
            Session::flash('alert-class', 'alert-success');
            return json_decode($data->getBody());
        } catch (Exception $e) {
            Session::flash('message', $e->getMessage());
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
            // Session::flash('message', 'An error occured, kindly try again!');
            // Session::flash('alert-class', 'alert-danger');
            // $e->getMessage();
        }
    }
}