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

class SubCategoriesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addsubcategory()
    {
        $setting = Settings::find(1);
        $cat = Categories::all();
        $subcat =  null;
        $editing = false;
        return view('admin.addsubcategory')->with('setting',$setting)->with('user', Auth::user())->with('editing', $editing)->with('categories', $cat)->with('subcategories', $subcat);;
    }

    public function editsubcategory($id)
    {   
        $setting = Settings::find(1);
        $subcat = SubCategories::find($id);
        //$cat_id = $subcat->category_id;
    	$cat = Categories::all();
        $editing = true;
        return view('admin.addsubcategory')->with('setting',$setting)->with('user', Auth::user())->with('editing', $editing)->with('categories', $cat)->with('subcategory', $subcat);
    }

    public function postaddsubcategory(Request $request)
    {

        $data = $request->all();
        $data = json_decode($data['data']);
        $retval = array();
        $retval['code'] = 400;
        $retval['message'] = 'Something Went Wrong!';
        //dd($data->category_id);
        $category_id = $data->category_id;
        $sub_category_name = $data->sub_category_name;
        $sub_category_slug = str_slug($sub_category_name,'-');
        $sub_category_order =  $data->sub_category_order;
        $status =  $data->sub_category_status;

        if(isset($data->id)){
            $subcat = SubCategories::find($data->id);
            //$subcat->delete();
            $subcat->category_id = $category_id;
            $subcat->sub_category_name = $sub_category_name;
            $subcat->sub_category_slug = $sub_category_slug;
            $subcat->sub_category_order = $sub_category_order;
            $subcat->status = $status;
            $subcat->save();
            $retval['code'] = 200;
            $retval['message'] = 'Sub Category Updated Successfully';
        }else{
            $subcat = new SubCategories();
            $subcat->category_id = $category_id;
            $subcat->sub_category_name = $sub_category_name;
            $subcat->sub_category_slug = $sub_category_slug;
            $subcat->sub_category_order = $sub_category_order;
            $subcat->status = $status;
            $subcat->save();
            $retval['code'] = 200;
            $retval['message'] = 'Sub Category Created Successfully';
        }
        return Response::json($retval);
    }

    public function deletesubcategory($id)
    {
        $setting = Settings::find(1);
        $subcat = SubCategories::find($id);
        $subcat->delete();
        return redirect('/admin/viewsubcategory')->with('setting',$setting)->with('alert-success', 'Sub Category Deleted Successfully!');
    }

    public function viewsubcategory()
    {
        $setting = Settings::find(1);
        $subcat = SubCategories::all();
        //dump($subcat);
        //dump($subcat->catt);
        //dd($subcat->catt->category_name);
        //$cat_id = $subcat[0]->category_id;
        //$cat = Categories::where('id','1')->get();
        //dd($cat[0]->category_name);
        return view('admin.viewsubcategory')->with('setting',$setting)->with('user', Auth::user())->with('subcategories', $subcat);
    }
}
