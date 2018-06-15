<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Response;
use DB;
use View;
use AmazonProduct;
use App\Categories;
use App\SubCategories;
use App\Products;
use App\Settings;
use Illuminate\Http\Request;
use ApaiIO\Operations\Search;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        $this->middleware('guest')->except('logout');
    }

    public function redirectPath()
    {
            if(Auth::user()->role == 'User'){
                return '/';
            }else{
                return '/admin/dashboard';
            }

    }
}
