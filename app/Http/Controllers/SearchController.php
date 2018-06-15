<?php

namespace App\Http\Controllers;

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

class SearchController extends Controller
{
    public function __construct()
    {
        /*$this->middleware('auth');*/
        $setting = Settings::find(1);
        //dd($setting);
    }
    public function index(Request $request)
    {

        $setting = Settings::find(1);
        $product_per_page = $setting->json->per_page_product;

    	if($request->searchindex != 'All'){
        	$category = Categories::where('category_slug',$request->searchindex)->pluck('id')->first();
        	$items = Products::where('category_id',$category)->where('json', 'REGEXP', $request->searchterm)->paginate($product_per_page);
 
        }else{
        	$items = Products::where('json', 'REGEXP', $request->searchterm)->paginate($product_per_page);

        }
        //'"id":"[[:<:]]123[[:>:]]"'
        // $items = Products::where('json', 'REGEXP', '"ItemAttributes":{[^}]"Title":[^}]dell[^}]*}')->paginate($product_per_page);
        
        return view('category')->with('setting',$setting)->with('items',$items->appends(Input::except('page')))->with('category',$category)->with('slug',$keyword)->with('page',$page);
    }

}
