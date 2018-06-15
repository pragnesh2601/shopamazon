<?php

namespace App\Http\Controllers;

use Auth;
use Response;
use Illuminate\Http\Request;
use AmazonProduct;
use App\Categories;
use App\SubCategories;
use App\Products;
use App\Settings;
use ApaiIO\Operations\Search;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function addcategory()
    {
        $settings = Settings::find(1);
        $cat =  null;
        $editing = false;
        return view('admin.addcategory')->with('setting', $settings)->with('user', Auth::user())->with('editing', $editing)->with('category', $cat);
    }

    public function editcategory($id)
    {   
        $settings = Settings::find(1);
        $cat = Categories::find($id);
        $editing = true;
        return view('admin.addcategory')->with('setting', $settings)->with('user', Auth::user())->with('editing', $editing)->with('category', $cat);
    }

    public function postaddcategory(Request $request)
    {

        $data = $request->all();
        $data = json_decode($data['data']);
        $retval = array();
        $retval['code'] = 400;
        $retval['message'] = 'Something Went Wrong!';

        $category_name = $data->category_name;
        $category_slug = str_slug($category_name,'-');
        $category_order =  $data->category_order;
        $status =  $data->category_status;

        if(isset($data->id)){
            $cat = Categories::find($data->id);
            //$cat->delete();

            $cat->category_name = $category_name;
            $cat->category_slug = $category_slug;
            $cat->category_order = $category_order;
            $cat->status = $status;
            $cat->save();
            $retval['code'] = 200;
            $retval['message'] = 'Category Updated Successfully';
        }else{
            $cat = new Categories();
            $cat->category_name = $category_name;
            $cat->category_slug = $category_slug;
            $cat->category_order = $category_order;
            $cat->status = $status;
            $cat->save();
            $retval['code'] = 200;
            $retval['message'] = 'Category Created Successfully';
        }
        return Response::json($retval);
    }

    public function deletecategory($id)
    {
        $settings = Settings::find(1);
        $cat = Categories::find($id);
        $cat->delete();
        return redirect('/admin/viewcategory')->with('setting', $settings)->with('alert-success', 'Category Deleted Successfully!');
    }

    public function viewcategory()
    {
        $cat = Categories::all();
        $settings = Settings::find(1);
        return view('admin.viewcategory')->with('setting',$settings)->with('user', Auth::user())->with('categories',$cat);
    }
}
