<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use Hash;
use View;
use Response;
use Session;
use AmazonProduct;
use App\User;
use App\Categories;
use App\SubCategories;
use App\Products;
use App\Settings;
use ApaiIO\Operations\Search;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Settings::find(1);
        return view('auth.login')->with('setting',$setting);
    }

    public function dashboard()
    {
        $setting = Settings::find(1);
        return view('admin.dashboard')->with('setting',$setting)->with('user',Auth::user());
    }


    public function profile()
    {
        $settings = Settings::find('1');
        return view('admin.profile')->with('setting',$settings)->with('user', Auth::user());

    }

    public function userprofile()
    {
        $settings = Settings::find('1');
        return view('profile')->with('setting',$settings)->with('user', Auth::user());

    }

    public function settings()
    {
        $settings = Settings::find('1');
        return view('admin.settings')->with('setting', $settings)->with('user', Auth::user());
    }
    public function users()
    {
        $users = User::all();
        $settings = Settings::find('1');
        return view('admin.viewusers')->with('setting', $settings)->with('users', $users)->with('user', Auth::user());   
    }
    public function signup()
    {
        //$users = User::all();
        $settings = Settings::find('1');
        return view('admin.signup')->with('setting', $settings)->with('user', Auth::user());   
    }

    public function uploadProfilePhoto(Request $request, $username){
        $response = array();
        $response['code'] = 400;
        if (!$this->secure($username, true)) return Response::json($response);

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
                $this->user->profile_path = $file_name;
                $this->user->save();
                $response['image_big'] = $this->user->getPhoto();
                $response['image_thumb'] = $this->user->getPhoto(200, 200);
            }else{
                $response['code'] = 400;
                $response['message'] = "Something went wrong!";
            }
        }
        return Response::json($response);
    }

    public function postupdateProfile(Request $request){
        $data = $request->all();
        $data = json_decode($data['data']);
        $retval = array();
        $retval['code'] = 400;
        $retval['message'] = 'Something Went Wrong!';

        $username = $data->username;
        $first_name = $data->first_name;
        $last_name =  $data->last_name;
        $email =  $data->email;
        $mobile = $data->mobile;
        $current_city = $data->current_city;

        $user = User::find($data->id);
        $user->username = $username;
        $user->first_name = $first_name;
        $user->last_name = $last_name; 
        $user->email = $email;
        $user->mobile = $mobile;
        $user->current_city = $current_city;
        $user->save();
        $retval['code'] = 200;
        $retval['message'] = 'User Profile Updated Successfully';

        return Response::json($retval);
        
    }

    public function postupdatePassword(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
        ]);
        $settings = Settings::find('1');
        $user = User::find(Auth::id());
        $hashedPassword = $user->password;
        //dd(Hash::check($request->current_password , $hashedPassword));
 
        if (Hash::check($request->current_password, $hashedPassword)) {
            //Change the password
            $user->fill([
                'password' => Hash::make($request->password)
            ])->save();
 
            $request->session()->flash('success', 'Your password has been changed.');
 
            return back()->with('setting', $settings);
        }
 
        $request->session()->flash('failure', 'Your password has not been changed.');
 
        return back()->with('setting', $settings);
 
 
    }
    /*public function postupdatePassword(Request $request){*/

        /*$this->validate($request, [
        'current_password'     => 'required',
        'password'     => 'required|min:6',
        'password_confirmation' => 'required|same:new_password',
    ]);
    $data = $request->all();
    $user = User::find($data->id);
    //$user = User::find(auth()->user()->id);
    if(!Hash::check($data['current_password'], $user->password)){
            $retval['code'] = 300;
                $retval['message'] = "Your current password does not matches with the password you provided. Please try again.";
            /*return back()
                    ->with('error','The specified password does not match the database password');*/
    /*}else{
       // write code to update password
        $user->password = $data['password'];
        $user->save();
        $retval['code'] = 200;
        $retval['message'] = 'New Password Updated Successfully';
    }*/

        /*if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
 
        if(strcmp($request->get('current_password'), $request->get('password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
 
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
 
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
 
        return redirect()->back()->with("success","Password changed successfully !");
 
    }*/
        //dd($request->all());
        /*$data = $request->all();
        $current_password = \Hash::make($request->get('current_password'));
        $password = \Hash::make($request->get('password'));
        $data = json_decode($data['data']);
        
        $retval = array();
        $retval['code'] = 400;
        $retval['message'] = 'Something Went Wrong!';
        $user = User::find($data->id);

        if ($user->id) {
            if (!(Hash::check($current_password, Auth::user()->password))) {
                // The passwords matches
                $retval['code'] = 300;
                $retval['message'] = "Your current password does not matches with the password you provided. Please try again.";
            }
            if(strcmp($request->get('current_password'), $request->get('password')) == 0){
                //Current password and new password are same
                $retval['code'] = 500;
                $retval['message'] = "New Password cannot be same as your current password. Please choose a different password.";
            }

            /*$validator = Validator::make($request->all(),[
                'current_password' => 'required|passcheck',
                'password' => 'required|min:6|confirmed'
            ]);*/
            /*$validator = Validator::make($request->all(),[
                'current_password' => 'required',
                'password' => 'required|string|min:6|confirmed',
            ]);
            if ($validator->fails()) {
                $save = false;
                $retval['code'] = 500;
                $retval['message'] = 'Password Not Match !';
            } else {
                Auth::user()->password = $password;
                Auth::user()->save();
                $retval['code'] = 200;
                $retval['message'] = 'New Password Updated Successfully';
            }
        }*/

       /* return Response::json($retval);
    }*/
}
