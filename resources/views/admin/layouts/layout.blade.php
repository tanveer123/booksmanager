<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Books Manager</title>

    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content=""/>

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700"/>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300"/>

    <link rel="stylesheet" href="{{ asset('public/vendors/font-awesome/css/font-awesome.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('public/vendors/bootstrap/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('public/css/admin-style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('public/css/style-responsive.css') }}"/>

  </head>
  <body class="">
    <div>    

    <!--BEGIN TOPBAR-->
    <div id="header-topbar-option-demo" class="page-header-topbar">
        <nav id="topbar" role="navigation" style="margin-bottom: 0; z-index: 2;"
             class="navbar navbar-default navbar-static-top">
            <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target=".sidebar-collapse" class="navbar-toggle"><span
                        class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span
                        class="icon-bar"></span><span class="icon-bar"></span></button>
                <a id="logo" href="index.html" class="navbar-brand"><span class="fa fa-rocket"></span><span
                        class="logo-text">BooksMan</span><span style="display: none" class="logo-text-icon">BM</span></a>
            </div>
            <div class="topbar-main">

            </div>
        </nav>        
        </div>
    <!--END TOPBAR-->
    <div id="wrapper">
        <!--BEGIN SIDEBAR MENU-->
        <nav id="sidebar" role="navigation" class="navbar-default navbar-static-side">
            <div class="sidebar-collapse menu-scroll">
                <ul id="side-menu" class="nav">
                    <li class="user-panel">
                        <div class="info"><p><strong>{{ Auth::guard('admins')->user()->name }}</strong></p></div>
                        <div class="clearfix"></div>
                    </li>
                    <li class="@yield('home-active')"><a href="{{ url("admin/home") }}"><i class="fa fa-tachometer fa-fw">
                        <div class="icon-bg bg-orange"></div>
                    </i><span class="menu-title">Dashboard</span></a></li>
                    <li class="@yield('racks-active')"><a href="{{ url("admin/racks") }}"><i class="fa fa-bullhorn fa-fw">
                        <div class="icon-bg bg-orange"></div>
                    </i><span class="menu-title">Racks</span></a>
                    </li>
                    <li class="@yield('books-active')"><a href="{{ url("admin/books") }}"><i class="fa fa-bullhorn fa-fw">
                                <div class="icon-bg bg-orange"></div>
                            </i><span class="menu-title">Books</span></a>
                    </li>
                    <li class="@yield('logout-active')"><a href="{{ url("admin/logout") }}"><i class="fa fa-bullhorn fa-fw">
                                <div class="icon-bg bg-orange"></div>
                            </i><span class="menu-title">Log Out</span></a>
                    </li>
                </ul>
            </div>
        </nav>
        <!--END SIDEBAR MENU-->
        <!--BEGIN PAGE WRAPPER-->
        <div id="page-wrapper">
            <!--BEGIN TITLE & BREADCRUMB PAGE-->
            <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                <div class="page-header pull-left">
                    <div class="page-title">@yield('page-title')</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a href="{{ url("admin/home") }}">Home</a>&nbsp;&nbsp;<i
                            class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                    <li class="hidden"><a href="#">@yield('page-title')</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
                    </li>
                    <li class="active">@yield('page-title')</li>
                </ol>                

                <div class="clearfix"></div>
            </div>
            <!--END TITLE & BREADCRUMB PAGE-->
            <!--BEGIN CONTENT-->
            <div class="page-content">
                @yield('content')
            </div>
            <!--END CONTENT-->
        </div>
        <!--BEGIN FOOTER-->
        <div id="footer">
            <div class="copyright">2017 © Books Manager</div>
        </div>
        <!--END FOOTER--><!--END PAGE WRAPPER-->
    </div>
</div>
<script src="{{ asset('public/js/libraries/jquery-1.10.2.min.js') }}"></script>
<script src="{{ asset('public/vendors/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/js/libraries/html5shiv.js') }}"></script>

<script src="{{ asset('public/js/app.js') }}"></script>

@yield('scripts')

  </body>
</html>
