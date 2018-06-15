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

class ProductsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addproduct()
    {
        $settings = Settings::find(1);
        $cat = Categories::all();
        $subcat = SubCategories::all();
        $product =  null;
        $editing = false;

        return view('admin.addproduct')->with('setting',$settings)->with('user', Auth::user())->with('editing', $editing)->with('categories',$cat)->with('subcategories', $subcat)->with('product',$product);
    }
    
    public function editproduct($id)
    {
        $settings = Settings::find(1);
        $product= Products::find($id);
        $subcat = SubCategories::all();
        $cat = Categories::all();
        $editing = true;
        $asin= $product->asin;
        $client = new \GuzzleHttp\Client;
        try{
            # string $category, string $keyword = null, int $page = 1
            $response = AmazonProduct::item($asin);
            //dd($response);
            $item = $response['Items']['Item'];
            $retval['code'] = 200;
       }
        catch (\Exception $e) {
            $retval['message'] = 'Unable To Fetch Products !';
        }
        return view('admin.addproduct')->with('setting',$settings)->with('item',$item)->with('user', Auth::user())->with('editing', $editing)->with('categories',$cat)->with('subcategories',$subcat)->with('product',$product);
    }

    public function postaddproduct(Request $request)
    {

        $data = $request->all();
        $data = json_decode($data['data']);
        $asin= $data->asin;
        $retval = array();
        $retval['code'] = 400;
        
        $client = new \GuzzleHttp\Client;
        try{
            # string $category, string $keyword = null, int $page = 1
            $response = AmazonProduct::item($asin);
            //dd($response);
            $item = $response['Items']['Item'];
            $retval['code'] = 200;
            //dd($item);
            $html = View::make('admin.viewproduct')->with('setting',$settings)->with('item',$item)->with('data',$data)->render();
            $retval['html'] = $html;
        }
        catch (\Exception $e) {
            $retval['message'] = 'Unable To Fetch Products !';
        }
        return Response::json($retval);
        dd($item);
    }
    public function saveproduct(Request $request){

        $data = $request->all();
        $data = json_decode($data['data']);
        //dd($data);
        $retval = array();
        $retval['code'] = 400;
        $retval['message'] = 'Something Went Wrong!';
        //dd($data->category_id);
        $asin = $data->asin;
        $json = json_encode(unserialize($data->json));
        $category_id = $data->category_id;
        $sub_category_id = $data->sub_category_id;
        $is_featured = $data->is_featured;
        $display_home =  $data->display_home;
        $status =  $data->product_status;

        if(isset($data->id)){
            //dd($data);
            $product = Products::find($data->id);
            //$subcat->delete();
            $product->asin = $asin;
            $product->json = $json;
            $product->category_id = $category_id;
            $product->sub_category_id = $sub_category_id;
            $product->is_featured = $is_featured;
            $product->display_home = $display_home;
            $product->status = $status;
            //dd($product);
            $product->save();
            $retval['code'] = 200;
            $retval['message'] = 'Product Updated Successfully';
        }else{
            $product = new Products();
            $product->asin = $asin;
            $product->json = $json;
            //dd($product->json);
            $product->category_id = $category_id;
            $product->sub_category_id = $sub_category_id;
            $product->is_featured = $is_featured;
            $product->display_home = $display_home;
            $product->status = $status;
            //dd($product);
            $product->save();
            $retval['code'] = 200;
            $retval['message'] = 'Product Added Successfully';
        }
        return Response::json($retval);
    }

    public function deleteproduct($id){
        $settings = Settings::find(1);
        $product = Products::find($id);
        $product->delete();
        return redirect('/admin/viewproducts')->with('setting',$settings)->with('alert-success', 'Product Deleted Successfully!');
    }

    public function viewproducts()
    {
        $settings = Settings::find(1);
        $products = Products::all();
        //$asins = Products::pluck('asin')->toArray();
        //$Amazonresponse = AmazonProduct::items($asins);
        //$amazon = $Amazonresponse['Items']['Item']->with('amazon',$amazon);
        return view('admin.viewproducts')->with('setting',$settings)->with('user', Auth::user())->with('products',$products);
    }
}
