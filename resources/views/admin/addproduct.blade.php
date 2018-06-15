@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 message">
                @if(Session::has('alert-success'))
                    <div class="alert alert-success"><i class="fa fa-check" aria-hidden="true"></i> <strong>{!! session('alert-success') !!}</strong></div>
                @endif
                @if(Session::has('alert-danger'))
                    <div class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i> <strong>{!! session('alert-danger') !!}</strong></div>
                @endif
            </div>
            <hr>
            <div class="col-md-8 col-md-offset-2" id="mainPanel">
                <div class="panel panel-primary">
                    @if($editing)
                    <div class="panel-heading">Edit Product</div>
                    <div class="panel-body">
                        <form id="EditProduct" class="form-horizontal" role="form">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$product->id}}">
                            <input type="hidden" name="json" value="{{serialize($item)}}">
                            <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                                <label for="category_id" class="col-md-5 control-label">Category: </label>
                                <div class="col-md-7">
                                    <select id="category_id" name="category_id" class="select form-control">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}" @if($product->category_id == $category->id) selected @endif>{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                     @if ($errors->has('category_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('category_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('sub_category_id') ? ' has-error' : '' }}">
                                <label for="sub_category_id" class="col-md-5 control-label">Sub Category: </label>
                                <div class="col-md-7">
                                    <select id="sub_category_id" name="sub_category_id" class="select form-control">
                                        <option value="">Select Sub Category</option>
                                        @foreach($subcategories as $subcategory)
                                        <option value="{{$subcategory->id}}" @if($product->sub_category_id == $subcategory->id) selected @endif>{{$subcategory->sub_category_name}}</option>
                                        @endforeach
                                    </select>
                                     @if ($errors->has('sub_category_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('sub_category_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('asin') ? ' has-error' : '' }}">
                                <label for="asin" class="col-md-5 control-label">Product Asin</label>

                                <div class="col-md-7">
                                    <input id="asin" type="text" class="form-control" placeholder="Enter Product ASIN" name="asin" value="{{$product->asin}}">
                                    @if ($errors->has('asin'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('asin') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('is_featured') ? ' has-error' : '' }}">
                                <label for="is_featured" class="col-md-5 control-label">Set Featured Product </label>
                                <div class="col-md-7">
                                    <select id="is_featured" name="is_featured" class="select form-control">
                                        <option value="">Select Featured Product</option>
                                        <option value="yes" @if($product->is_featured=='yes') selected @endif >Yes</option>
                                        <option value="no" @if($product->is_featured=='no') selected @endif >No</option>
                                    </select>
                                     @if ($errors->has('is_featured'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('is_featured') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('display_home') ? ' has-error' : '' }}">
                                <label for="display_home" class="col-md-5 control-label">Product Display on Home </label>
                                <div class="col-md-7">
                                    <select id="display_home" name="display_home" class="select form-control">
                                        <option value="">Select Home Display Product</option>
                                        <option value="yes" @if($product->display_home == 'yes') selected @endif >Yes</option>
                                        <option value="no" @if($product->display_home == 'no') selected @endif >No</option>
                                    </select>
                                     @if ($errors->has('display_home'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('display_home') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('product_status') ? ' has-error' : '' }}">
                                <label for="product_status" class="col-md-5 control-label">Product Status </label>
                                <div class="col-md-7">
                                    <select id="product_status" name="product_status" class="select form-control">
                                        <option value="">Select Product Status</option>
                                        <option value="active" @if($product->status=='active') selected @endif >Active</option>
                                        <option value="inactive" @if($product->status=='inactive') selected @endif >Inactive</option>
                                    </select>
                                     @if ($errors->has('product_status'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('product_status') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="button" class="btn btn-primary sett" onclick="EditProduct();">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @else
                    <div class="panel-heading">Add New Product</div>
                    <div class="panel-body">
                        <form id="AddProduct" class="form-horizontal" role="form">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                                <label for="category_id" class="col-md-5 control-label">Category: </label>
                                <div class="col-md-7">
                                    <select id="category_id" name="category_id" class="select form-control">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                     @if ($errors->has('category_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('category_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('sub_category_id') ? ' has-error' : '' }}">
                                <label for="sub_category_id" class="col-md-5 control-label">Sub Category: </label>
                                <div class="col-md-7">
                                    <select id="sub_category_id" name="sub_category_id" class="select form-control">
                                        <option value="">Select Sub Category</option>
                                        @foreach($subcategories as $subcategory)
                                        <option value="{{$subcategory->id}}">{{$subcategory->sub_category_name}}</option>
                                        @endforeach
                                    </select>
                                     @if ($errors->has('sub_category_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('sub_category_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('asin') ? ' has-error' : '' }}">
                                <label for="asin" class="col-md-5 control-label">Product Asin</label>

                                <div class="col-md-7">
                                    <input id="asin" type="text" class="form-control" name="asin" placeholder="Enter Product ASIN" value="">
                                    @if ($errors->has('asin'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('asin') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('is_featured') ? ' has-error' : '' }}">
                                <label for="is_featured" class="col-md-5 control-label">Set Featured Product </label>
                                <div class="col-md-7">
                                    <select id="is_featured" name="is_featured" class="select form-control">
                                        <option value="">Select Featured Product</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                     @if ($errors->has('is_featured'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('is_featured') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('display_home') ? ' has-error' : '' }}">
                                <label for="display_home" class="col-md-5 control-label">Product Display on Home </label>
                                <div class="col-md-7">
                                    <select id="display_home" name="display_home" class="select form-control">
                                        <option value="">Select Home Display Product</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                     @if ($errors->has('display_home'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('display_home') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('product_status') ? ' has-error' : '' }}">
                                <label for="product_status" class="col-md-5 control-label">Product Status </label>
                                <div class="col-md-7">
                                    <select id="product_status" name="product_status" class="select form-control">
                                        <option value="">Select Product Status</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                     @if ($errors->has('product_status'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('product_status') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="button" class="btn btn-primary sett" onclick="AddProduct();">
                                        Add Product
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
            <div id="renderCode"></div>
        </div>
    </div>
@endsection