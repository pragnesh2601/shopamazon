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
                    <div class="panel-heading">Account Settings</div>
                    <div class="panel-body">
                        <div class="profile-image @if($user->sex == 1){{ 'female' }}@endif">
                        @if($user)
                        <div class="loading-image">
                            <img src="{{ asset('images/rolling.gif') }}" alt="">
                        </div>
                        <form id="form-upload-profile-photo" enctype="multipart/form-data">
                            <div class="change-image">
                                <a href="javascript:;" class="upload-button" onclick="uploadProfilePhoto()" style="height: 100%;"><i class="fa fa-upload"></i> Upload Photo</a>
                                <input type="file" accept="image/*" name="profile-photo" class="profile_photo_input">
                            </div>
                        </form>
                        @endif
                        <a data-fancybox="group" href="{{ $user->getPhoto() }}">
                            <img class="image-profile" src="{{ $user->getPhoto(200, 200) }}" alt="" />
                        </a>
                    </div>
                        <form id="UpdateProfile" class="form-horizontal" role="form">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$user['id']}}">
                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="username" class="col-md-3 control-label">Username:</label>

                                <div class="col-md-9">
                                    <input id="username" type="text" class="form-control" name="username" value="{{ $user['username'] }}">
                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                <label for="first_name" class="col-md-3 control-label">First Name:</label>

                                <div class="col-md-9">
                                    <input id="first_name" type="text" class="form-control" name="first_name" value="{{ $user['first_name'] }}">
                                    @if ($errors->has('first_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('first_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <label for="last_name" class="col-md-3 control-label">Last Name:</label>

                                <div class="col-md-9">
                                    <input id="last_name" type="text" class="form-control" name="last_name" value="{{ $user['last_name'] }}">
                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-3 control-label">E-Mail Address:</label>
                                <div class="col-md-9">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ $user['email'] }}">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                                <label for="mobile" class="col-md-3 control-label">Mobile: </label>
                                <div class="col-md-9">
                                    <input id="mobile" type="text" name="mobile" class="form-control"  value="{{ $user['mobile'] }}" placeholder="Enter your Mobile No.">
                                     @if ($errors->has('mobile'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('mobile') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                             <div class="form-group{{ $errors->has('current_city') ? ' has-error' : '' }}">
                                <label for="current_city" class="col-md-3 control-label">Current City: </label>
                                <div class="col-md-9">
                                    <input id="current_city" type="text" name="current_city" class="form-control"  value="{{ $user['current_city'] }}" placeholder="Enter Your City Name">
                                     @if ($errors->has('current_city'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('current_city') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                                <label for="role" class="col-md-3 control-label">Account Type: </label>
                                <div class="col-md-9">
                                    <label class="checkbox-inline">{{$user->role}}</label>
                                     @if ($errors->has('role'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('role') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-9 col-md-offset-4">
                                    <button type="button" class="btn btn-primary sett" onclick="UpdateProfile()">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-6 col-md-offset-3">
                @if(Session::has('success'))
                    <div class="alert alert-success"><i class="fa fa-check" aria-hidden="true"></i> <strong>{!! Session::get('success') !!}</strong></div>
                @endif
                @if(Session::has('failure'))
                    <div class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i> <strong>{!! Session::get('failure') !!}</strong></div>
                @endif
            </div>
            <hr>
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">Password Settings</div>
                    <div class="panel-body">
                        <form id="UpdatePassword" action="{{ route('updatePassword') }}" class="form-horizontal" method="post" role="form">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$user['id']}}">
                            <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
                                <label for="current_password" class="col-md-4 control-label">Current Password</label>
                                <div class="col-md-6">
                                    <input id="current_password" type="password" class="form-control" name="current_password" required="required">
                                    @if ($errors->has('current_password'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('current_password') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">New Password</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required="required">
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation" class="col-md-4 control-label">Confirm New Password</label>
                                <div class="col-md-6">
                                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary sett">
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