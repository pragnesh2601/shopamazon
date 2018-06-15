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
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">View All Products <a href="{{ url('/admin/addproduct') }}" class="pull-right btn-primary">Add New Product</a></div>
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th>ID</th>
                <th>Asin</th>
                <th>Title</th>
                <th>Image</th>
                <th>Category Name</th>
                <th>Sub Category Name</th>
                <th>Is Featured</th>
                <th>Display Home</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $key =>  $product)
            <tr>
                <td class="text-center">{{$product->id}}</td>
                <td class="text-center">{{$product->asin}}</td>
                <td class="text-left">{{$product->json->ItemAttributes->Title}}</td>
                <td class="text-center"><img src="{{$product->json->LargeImage->URL}}" height="50px" alt=""></td>
                <td class="text-center">{{$product->category->category_name}}</td>
                <td class="text-center">{{$product->subcategory->sub_category_name}}</td>
                <td class="text-center">{{$product->is_featured}}</td>
                <td class="text-center">{{$product->display_home}}</td>
                <td class="text-center">{{$product->status}}</td>
                <td class="text-center"><a href="{{url('/admin/editproduct/'.$product->id)}}">Edit</a> | <a href="{{url('/admin/deleteproduct/'.$product->id)}}">Delete</a></td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Asin</th>
                <th>Title</th>
                <th>Image</th>
                <th>Category Name</th>
                <th>Sub Category Name</th>
                <th>Is Featured</th>
                <th>Display Home</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection