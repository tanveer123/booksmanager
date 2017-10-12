@extends('layouts.app')

@section('title', 'Login')

@section('page_id', 'Login')

@section('login-active', 'active')

@section('content')
    <div class="content">
        <div class="container">
        <div class="row">
            <div class="col-lg-8" style="margin: auto; float: none;">
                <div class="note note-danger" style="{{ (Session('status') == 'wrong') ? 'display:block' : 'display:none' }};">
                <h4 class="box-heading">Error</h4>
                <p style="color: #">{{ Session::get('message') }}</p>
            </div>
            </div>
            <div class="col-md-8 col-md-offset-2 page-form" style="float: none;">
            <form method="POST" action="{{ route('login') }}" class="form">
                        {{ csrf_field() }}
                        <div class="header-content"><h1>Log In</h1></div>
                        <div class="body-content">
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="input-icon right"><i class="fa fa-user"></i><input type="text" placeholder="Email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
                                </div>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="input-icon right"><i class="fa fa-key"></i><input type="password" placeholder="Password" name="password" class="form-control" required>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group pull-right">
                                <button type="submit" class="btn btn-success">Log In
                                    &nbsp;<i class="fa fa-chevron-circle-right"></i></button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
        </div>
        </div>
    </div>
@endsection
