<?php

namespace App\Http\Controllers;

use Auth;
use Response;
use DB;
use AmazonProduct;
use App\Categories;
use App\SubCategories;
use App\Products;
use App\Settings;
use Illuminate\Http\Request;
use ApaiIO\Operations\Search;
use Illuminate\Support\Facades\Input;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $setting = Settings::find(1);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Settings::find(1);
        return view('welcome')->with('setting',$setting);
    }
    public function guestindex(Request $request)
    {
        # Dynamic setting for site settings
        $setting = Settings::find(1);
        if($request->has('searchindex'))
            $category = $request->get('searchindex');
        else
            $category = 'All';

        if($request->has('searchterm') && $request->get('searchterm') != '')
            $keyword = $request->get('searchterm');
        else
            $keyword = $request->get('searchterm') ?: $category;
        if($request->has('page'))
            $page= $request->get('page');
        else
            $page= 1;
        try{
            # string $category, string $keyword, int $page = 1
            $response = AmazonProduct::search($category, $keyword, $page);
            $requests = $response['Items'];
            $items = $response['Items']['Item'];
        }
        catch (\Exception $e) {
            $result['message'] = 'Unable To Fetch Products !';
            $items=null;
            $requests=null;

        }
        return view('index')->with('setting',$setting)->with('requests',$requests)->with('items',$items)->with('slug',$keyword)->with('page',$page);
    }

    public function home()
    {
        return view('home');
    }
    public function cart(Request $request){
        $setting = Settings::find(1);

        # Amazon Cart use code
        /*if($request->session()->has('CartId') && $request->session()->has('HMAC')){
            $cart_id = session('CartId');
            $hmac = session('HMAC');
            $response = AmazonProduct::cartGet($cart_id ,$hmac);
        }elseif(Auth::check()){
            $cart_id = Auth::user()->cart_id;
            $hmac = Auth::user()->hmac;
            $response = AmazonProduct::cartGet($cart_id ,$hmac);
        }else{
            $response = null;
            $image = null;

        }

        if($response && count($response['Cart']['CartItems']['CartItem']) > 0){
            if(isset($response['Cart']['CartItems']['CartItem']['ASIN'])){
                $asin[] = $response['Cart']['CartItems']['CartItem']['ASIN'];
            }else{
                foreach ($response['Cart']['CartItems']['CartItem'] as $key => $item) {
                    $asin[] = $item['ASIN'];
                }
            }
            $image = AmazonProduct::items($asin);
        }*/
        # End Amazon Cart use code
        return view('cartpage')->with('setting',$setting);
    }

    public function subpage($id){
        $asin = $id;
        $setting = Settings::find(1);
        $item = Products::where('asin','=',$asin)->first();
        
        # Fetch Subpage details from Amazon
        /*$client = new \GuzzleHttp\Client;
        try{
            # string $category, string $keyword, int $page = 1
            $response = AmazonProduct::item($asin);
            $item = $response['Items']['Item'];
        }
        catch (\Exception $e) {
            $result['message'] = 'Unable To Fetch Products !';
            $items=null;
        }*/
        # End code Fetch Subpage details from Amazon

        return view('subpage')->with('setting',$setting)->with('item',$item);
    }
    public function categories($slug){
        $category = Categories::where('category_slug',$slug)->pluck('id')->first();
        $setting = Settings::find(1);
        $product_per_page = $setting->json->per_page_product;
        $items = Products::where('category_id',$category)->paginate($product_per_page);
        return view('category')->with('setting',$setting)->with('items',$items)->with('category',$category)->with('slug',$keyword)->with('page',$page);
    }
    public function subCategories($category, $slug){
        $category = Categories::where('category_slug',$slug)->pluck('id')->first();
        $subcategory = SubCategories::where('sub_category_slug',$slug)->pluck('id')->first();
        $setting = Settings::find(1);
        $product_per_page = $setting->json->per_page_product;
        $items = Products::where('category_id',$category)->orWhere('sub_category_id',$subcategory)->paginate($product_per_page);
        //dd($items);
        return view('category')->with('setting',$setting)->with('items',$items)->with('category',$category)->with('slug',$slug)->with('page',$page);
    }
}
