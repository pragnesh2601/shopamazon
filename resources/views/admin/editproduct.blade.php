@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
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
                    <div class="panel-heading">Edit Product</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/products') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                                <label for="category" class="col-md-3 control-label">Category: </label>
                                <div class="col-md-9">
                                    <select id="category" class="select form-control">
                                        <option value="">Select Your Category</option>
                                        <option value="{{ $user['category'] }}">{{ $user['category'] }}</option>
                                    </select>
                                    <!-- <input id="category" type="text" name="category" class="form-control"  value="{{ $user['category'] }}" placeholder="Enter Your Category"> -->
                                     @if ($errors->has('category'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('category') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('asin') ? ' has-error' : '' }}">
                                <label for="asin" class="col-md-3 control-label">Product Asin</label>

                                <div class="col-md-9">
                                    <input id="asin" type="text" class="form-control" name="asin" value="">
                                    @if ($errors->has('asin'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('asin') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-9 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary sett" value="1" name="productupdate">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection