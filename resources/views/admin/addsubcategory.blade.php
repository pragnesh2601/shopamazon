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
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    @if($editing)
                    <div class="panel-heading">Edit Sub Category</div>
                    <div class="panel-body">
                        <form id="EditSubCategory" class="form-horizontal" role="form">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$subcategory->id}}">
                            <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                                <label for="category_id" class="col-md-4 control-label">Category </label>
                                <div class="col-md-8">
                                    <select id="category_id" name="category_id" class="select form-control">
                                        <option value="">Select Your Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}" @if($category->id == $subcategory->category_id) selected @endif>{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                     @if ($errors->has('category_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('category_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('sub_category_name') ? ' has-error' : '' }}">
                                <label for="sub_category_name" class="col-md-4 control-label">Sub Category Name</label>

                                <div class="col-md-8">
                                    <input id="sub_category_name" type="text" class="form-control" name="sub_category_name" value="{{ $subcategory->sub_category_name }}">
                                    @if ($errors->has('sub_category_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('sub_category_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('sub_category_order') ? ' has-error' : '' }}">
                                <label for="sub_category_order" class="col-md-4 control-label">Category Order </label>
                                <div class="col-md-8">
                                    <input id="category_order" type="number" name="sub_category_order" class="form-control"  value="{{ $subcategory->sub_category_order }}">
                                     @if ($errors->has('sub_category_order'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('sub_category_order') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('sub_category_status') ? ' has-error' : '' }}">
                                <label for="category_status" class="col-md-4 control-label">Category Status </label>
                                <div class="col-md-8">
                                    <select id="sub_category_status" name="sub_category_status" class="select form-control">
                                        <option value="">Select Status</option>
                                        <option value="active" @if($subcategory->status=='active') selected @endif >Active</option>
                                        <option value="inactive" @if($subcategory->status=='inactive') selected @endif >Inactive</option>
                                    </select>
                                     @if ($errors->has('sub_category_status'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('sub_category_status') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-9 col-md-offset-4">
                                    <button type="button" class="btn btn-primary sett" onclick="EditSubCategory();">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @else
                    <div class="panel-heading">Add New Sub Category</div>
                    <div class="panel-body">
                        <form id="AddSubCategory" class="form-horizontal" role="form">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                                <label for="category_id" class="col-md-4 control-label">Category </label>
                                <div class="col-md-8">
                                    <select id="category_id" name="category_id" class="select form-control">
                                        <option value="">Select Your Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                     @if ($errors->has('category_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('category_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('sub_category_name') ? ' has-error' : '' }}">
                                <label for="sub_category_name" class="col-md-4 control-label">Sub Category Name</label>

                                <div class="col-md-8">
                                    <input id="sub_category_name" type="text" class="form-control" name="sub_category_name" value="">
                                    @if ($errors->has('sub_category_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('sub_category_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('sub_category_order') ? ' has-error' : '' }}">
                                <label for="sub_category_order" class="col-md-4 control-label">Sub Category Order </label>
                                <div class="col-md-8">
                                    <input id="sub_category_order" type="number" name="sub_category_order" class="form-control"  placeholder="Enter Sub Category Order">
                                     @if ($errors->has('sub_category_order'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('sub_category_order') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('sub_category_status') ? ' has-error' : '' }}">
                                <label for="sub_category_status" class="col-md-4 control-label">Category Status </label>
                                <div class="col-md-8">
                                    <select id="sub_category_status" name="sub_category_status" class="select form-control">
                                        <option value="">Select Status</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                     @if ($errors->has('sub_category_status'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('sub_category_status') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-9 col-md-offset-4">
                                    <button type="button" class="btn btn-primary sett" onclick="AddSubCategory();">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection