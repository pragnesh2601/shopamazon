<?php

namespace App\Http\Controllers;
use Auth;
use Hash;
use DB;
use View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Categories;
use App\SubCategories;
use App\Products;
use App\Settings;
use Session;
use Response;

class SettingsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        if (Session::has('user')){
            $user = Session::get('user');
        }else{
            $user = Auth::user();
        }
        $settings = Settings::find('1');
        return view('admin.settings')->with('setting', $settings)->with('user', Auth::user());
    }

    public function uploadProfilePhoto(Request $request){
        $response = array();
        $response['code'] = 400;
        
        $messages = [
            'image.required' => trans('validation.required'),
            'image.mimes' => trans('validation.mimes'),
            'image.max.file' => trans('validation.max.file'),
        ];
        
        $validator = Validator::make(array('image' => $request->file('image')), [
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:2048'
        ], $messages);

        if ($validator->fails()) {
            $response['code'] = 400;
            $response['message'] = implode(' ', $validator->errors()->all());
        }else{
            $file = $request->file('image');

            $file_name = md5(uniqid() . time()) . '.' . $file->getClientOriginalExtension();
            if ($file->storeAs('public/uploads/profile_photos', $file_name)){
                $response['code'] = 200;
                Auth::User()->profile_pic = $file_name;
                Auth::User()->save();
                $response['image_big'] = Auth::User()->getPhoto();
                $response['image_thumb'] = Auth::User()->getPhoto(200, 200);
            }else{
                $response['code'] = 400;
                $response['message'] = "Something went wrong!";
            }
        }
        return Response::json($response);
    }

    public function uploadLogo(Request $request){
        $response = array();
        $response['code'] = 400;
        $messages = [
            'image.required' => trans('validation.required'),
            'image.mimes' => trans('validation.mimes'),
            'image.max.file' => trans('validation.max.file'),
        ];
        $validator = Validator::make(array('image' => $request->file('image')), [
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:2048'
        ], $messages);

        if ($validator->fails()) {
            $response['code'] = 400;
            $response['message'] = implode(' ', $validator->errors()->all());
        }else{
            $file = $request->file('image');
            $file_name = md5(uniqid() . time()) . '.' . $file->getClientOriginalExtension();
            if ($file->storeAs('public/uploads/logo', $file_name)){
                $settings = Settings::find(1);
            
            if(!$settings){
                return Response::json($response);
            }
                unset($json->_token);
                $settings->logo = $file_name;
                $settings->save();
                $response['image_big'] = $settings->getLogo();
                $response['image_thumb'] = $settings->getLogo(50, 50);
                $response['code'] = 200;
                $response['message'] = "Logo saved successfully!";
            }else{
                $response['code'] = 400;
                $response['message'] = "Something went wrong!";
            }
        }
        return Response::json($response);
    }

    public function uploadFooterLogo(Request $request){
        $response = array();
        $response['code'] = 400;
        $messages = [
            'image.required' => trans('validation.required'),
            'image.mimes' => trans('validation.mimes'),
            'image.max.file' => trans('validation.max.file'),
        ];
        $validator = Validator::make(array('image' => $request->file('image')), [
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:2048'
        ], $messages);

        if ($validator->fails()) {
            $response['code'] = 400;
            $response['message'] = implode(' ', $validator->errors()->all());
        }else{
            $file = $request->file('image');
            $file_name = md5(uniqid() . time()) . '.' . $file->getClientOriginalExtension();
            if ($file->storeAs('public/uploads/footerlogo', $file_name)){
                $settings = Settings::find(1);
            
            if(!$settings){
                return Response::json($response);
            }
                unset($json->_token);
                $settings->footer_logo = $file_name;
                $settings->save();
                $response['image_big'] = $settings->getFooterLogo();
                $response['image_thumb'] = $settings->getFooterLogo(50, 50);
                $response['code'] = 200;
                $response['message'] = "Footer Logo saved successfully!";
            }else{
                $response['code'] = 400;
                $response['message'] = "Something went wrong!";
            }
        }
        return Response::json($response);
    }

    public function uploadFavicon(Request $request){
        $response = array();
        $response['code'] = 400;
        $messages = [
            'image.required' => trans('validation.required'),
            'image.mimes' => trans('validation.mimes'),
            'image.max.file' => trans('validation.max.file'),
        ];
        $validator = Validator::make(array('image' => $request->file('image')), [
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:2048'
        ], $messages);

        if ($validator->fails()) {
            $response['code'] = 400;
            $response['message'] = implode(' ', $validator->errors()->all());
        }else{
            $file = $request->file('image');
            $file_name = md5(uniqid() . time()) . '.' . $file->getClientOriginalExtension();
            if ($file->storeAs('public/uploads/favicon', $file_name)){
                $settings = Settings::find(1);
            
            if(!$settings){
                return Response::json($response);
            }
                unset($json->_token);
                $settings->favicon = $file_name;
                $settings->save();
                $response['image_big'] = $settings->getFavicon();
                $response['image_thumb'] = $settings->getFavicon(50, 50);
                $response['code'] = 200;
                $response['message'] = "Favicon saved successfully!";
            }else{
                $response['code'] = 400;
                $response['message'] = "Something went wrong!";
            }
        }
        return Response::json($response);
    }

    public function saveSiteSettings(Request $request){

        $data = $request->all();
        $json = json_decode($data['data']);
        unset($data['data']);
        $response = array();
        $response['code'] = 400;
        $response['message'] = "Something went wrong!";


        if(Auth::User()){
            $settings = Settings::find(1);
            
            if(!$settings){
                return Response::json($response);
            }
            unset($json->_token);
            $settings->json = json_encode($json);
            $settings->save();
            $response['code'] = 200;
            $response['message'] = "Settings saved successfully!";
        }else{
            $response = array();
            $response['code'] = 400;
            $response['message'] = "You are not authorized!";
        }
        return Response::json($response);
    }
}