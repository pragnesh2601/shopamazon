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
                    <div class="panel-heading">View All Users <a href="{{ url('/admin/signup') }}" class="pull-right btn-primary">Add New user</a></div>
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Profile Picture</th>
                                    <th>Username</th>
                                    <th>Full Name</th>
                                    <th>E-mail</th>
                                    <th>Mobile</th>
                                    <th>City</th>
                                    <th>Role</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td><img class="img-circle" src="{{ $user->getPhoto(35, 35) }}" alt="" /></td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->mobile }}</td>
                                    <td>{{ $user->current_city }}</td>
                                    <td>{{ $user->role }}</td>
                                    <!-- <td><a href="{{ url('/admin/editcategory/'. $category->id) }}">Edit</a> | <a href="{{ url('/admin/deletecategory/'. $category->id) }}">Delete</a></td> -->
                                </tr>
                                @endforeach
                            </tbody>
                            <!-- <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Profile Picture</th>
                                    <th>Username</th>
                                    <th>Full Name</th>
                                    <th>E-mail</th>
                                    <th>Mobile</th>
                                    <th>City</th>
                                    <th>Role</th>
                                </tr>
                            </tfoot> -->
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection