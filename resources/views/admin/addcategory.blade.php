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
                    <div class="panel-heading">Edit Category</div>
                    <div class="panel-body">
                        <form id="EditCategory" class="form-horizontal" role="form">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$category->id}}">
                            <div class="form-group{{ $errors->has('category_name') ? ' has-error' : '' }}">
                                <label for="category_name" class="col-md-3 control-label">Category Name </label>
                                <div class="col-md-9">
                                    <input id="category_name" type="text" name="category_name" class="form-control"  value="{{ $category->category_name }}" placeholder="Enter  Category Name">
                                     @if ($errors->has('category_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('category_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('category_order') ? ' has-error' : '' }}">
                                <label for="category_order" class="col-md-3 control-label">Category Order </label>
                                <div class="col-md-9">
                                    <input id="category_order" type="number" name="category_order" class="form-control"  value="{{ $category->category_order }}"  placeholder="Enter Category Order">
                                     @if ($errors->has('category_order'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('category_order') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('category_status') ? ' has-error' : '' }}">
                                <label for="category_status" class="col-md-3 control-label">Category Status </label>
                                <div class="col-md-9">
                                    <select id="category_status" name="category_status" class="select form-control">
                                        <option value="">Select Status</option>
                                        <option value="active" @if($category->status=='active') selected @endif >Active</option>
                                        <option value="inactive" @if($category->status=='inactive') selected @endif >Inactive</option>
                                    </select>
                                     @if ($errors->has('category_status'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('category_status') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-9 col-md-offset-4">
                                    <button type="button" class="btn btn-primary sett" onclick="EditCategory();">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @else
                    <div class="panel-heading">Add New Category</div>
                    <div class="panel-body">
                        <form id="AddCategory" class="form-horizontal" role="form">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('category_name') ? ' has-error' : '' }}">
                                <label for="category_name" class="col-md-3 control-label">Category Name </label>
                                <div class="col-md-9">
                                    <input id="category_name" type="text" name="category_name" class="form-control" placeholder="Enter Category Name">
                                     @if ($errors->has('category_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('category_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('category_order') ? ' has-error' : '' }}">
                                <label for="category_order" class="col-md-3 control-label">Category Order </label>
                                <div class="col-md-9">
                                    <input id="category_order" type="number" name="category_order" class="form-control"  value="" placeholder="Enter Category Order">
                                     @if ($errors->has('category_order'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('category_order') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('category_status') ? ' has-error' : '' }}">
                                <label for="category_status" class="col-md-3 control-label">Category Status </label>
                                <div class="col-md-9">
                                    <select id="category_status" name="category_status" class="select form-control">
                                        <option value="">Select Status</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                     @if ($errors->has('category_status'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('category_status') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-9 col-md-offset-4">
                                    <button type="button" class="btn btn-primary sett" onclick="AddCategory();">
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