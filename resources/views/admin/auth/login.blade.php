<!DOCTYPE html>
<html lang="en">
  <head>

    <title>Books Manager</title>

    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content=""/>

    <!-- Loading core css-->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700"/>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300"/>
    <link rel="stylesheet" href="{{ asset('public/vendors/jquery-ui-1.10.4.custom/css/ui-lightness/jquery-ui-1.10.4.custom.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('public/vendors/font-awesome/css/font-awesome.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('public/vendors/bootstrap/css/bootstrap.min.css') }}"/>
    <!-- Loading template style-->
    <link rel="stylesheet" href="{{ asset('public/css/admin-style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('public/css/style-responsive.css') }}"/>
    <link rel="stylesheet" href="{{ asset('public/css/jquery-ui-theme/jquery-ui.min.css') }}"/>

  </head>
  <body class="">

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-top: 100px;">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">User Name</label>

                            <div class="col-md-6">
                                <input id="username" type="test" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('public/js/jquery-1.10.2.min.js') }}"></script>
<!--loading bootstrap js-->
<script src="{{ asset('public/vendors/bootstrap/js/bootstrap.min.js') }}"></script>

</body>
</html>

