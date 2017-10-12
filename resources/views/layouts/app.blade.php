<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Books Manager') }} - @yield('title')</title>

    <!--Loading bootstrap css-->
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Sans">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('public/vendors/bootstrap/css/bootstrap.min.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('public/vendors/font-awesome/css/font-awesome.min.css') }}" />
    <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/admin-style.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/style_responsive.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body id="@yield('page_id')" data-spy="scroll" data-target=".navbar-custom" class="frontend-one-page">
    <!--BEGIN CONTENT-->
    <header>
        <div class="bg-overlay pattern">
            <nav role="navigation" class="navbar navbar-custom navbar-fixed-top">
                <div class="top-navbar">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-5 align-left" style="padding-top: 5px;">
                                    @if(Auth::user())
                                    <strong>Logged in as:</strong> {{ Auth::user()->name }}
                                    @endif
                            </div>
                            <div class="col-sm-7">
                                <ul>
                            @if(Auth::guest())
                                <li><i></i><a href="{{ url('/login')  }}" style="margin-right: 10px;">Login</a></li>
                            @endif

                            @if(Auth::user())
                            <li class="logout"><a href="{{ url('/logout')  }}"><i class="fa fa-sign-in"></i>Logout</a></li>
                            @endif
                        </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    @yield('content')

    <footer id="footer">
        <div class="copyright">
            <div class="container">
                <div class="col-sm-2"></div>
                <div class="col-sm-5"><p class="text-center">Copyright © 2017 </p></div>
                <div class="col-sm-3"><p class="text-center">Powered by: Books Manager</p></div>
                <div class="col-sm-2"></div>
            </div>
        </div>
    </footer>
    <!-- Scripts -->
    <script src="{{ asset('public/js/libraries/jquery-1.10.2.min.js') }}"></script>
    <script src="{{ asset('public/vendors/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/js/libraries/html5shiv.js') }}"></script>

    @yield('scripts')

</body>
</html>