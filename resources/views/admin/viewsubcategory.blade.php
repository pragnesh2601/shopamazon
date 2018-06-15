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
                    <div class="panel-heading">View All Sub Category <a href="{{ url('/admin/addsubcategory') }}" class="pull-right btn-primary">Add New SubCategory</a></div>
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th>Sub ID</th>
                <th>Category Name</th>
                <th>Sub Category Name</th>
                <th>Sub Category Slug</th>
                <th>Sub Category Order</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subcategories as $subcategory)
            <tr>
                <td>{{ $subcategory->id }}</td>
                <td>{{ $subcategory->category->category_name }}</td>
                <td>{{ $subcategory->sub_category_name }}</td>
                <td>{{ $subcategory->sub_category_slug }}</td>
                <td>{{ $subcategory->sub_category_order }}</td>
                <td>{{ $subcategory->status }}</td>
                <td><a href="{{ url('/admin/editsubcategory/'. $subcategory->id) }}">Edit</a> | <a href="{{ url('/admin/deletesubcategory/'. $subcategory->id) }}">Delete</a></td>
            </tr>
            @endforeach
            
        </tbody>
        <tfoot>
            <tr>
                <th>Sub ID</th>
                <th>Category Name</th>
                <th>Sub Category Name</th>
                <th>Sub Category Slug</th>
                <th>Sub Category Order</th>
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