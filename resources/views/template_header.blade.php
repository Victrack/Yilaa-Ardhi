<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" href="{{ URL::asset('assets/img/log.ico') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ URL::asset('assets/img/ico/apple-touch-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ URL::asset('assets/img/ico/apple-touch-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ URL::asset('assets/img/ico/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" href="{{ URL::asset('assets/img/ico/apple-touch-icon-57x57.png') }}">
    <title>Ardhi-YILAA</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/plugins.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ URL::asset('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('assets/css/pe-icons.css') }}" rel="stylesheet">
    <!-- Nous chargeons les fichiers CDN de Leaflet. Le CSS AVANT le JS -->

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin="" />
    <style>

        #omap{ /* la carte DOIT avoir une hauteur sinon elle n'apparaît pas */
            margin: 0px;
            padding: 0px;
            margin-top: 30px;
            height:900px;
            width: 100%;
        }
    </style>


</head>

<body id="page-top" class="index">

<div class="master-wrapper" >

    <div class="preloader">
        <div class="preloader-img">
            <span class="loading-animation animate-flicker"><img src="{{ URL::asset('assets/img/loading.GIF') }}" alt="loading"/></span>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top fadeInDown" data-wow-delay="0.5s">
        <div class="top-bar smoothie hidden-xs">
            <div class="container">
                <div class="clearfix">
                    <ul class="list-inline social-links wow pull-left">
                        <li>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>

                    <div class="pull-right text-right">
                        <ul class="list-inline">
                            <li>
                                <div><i class="fa fa-envelope-o"></i> contact@yilaa.org</div>
                            </li>
                            <li>
                                <div class="meta-item"><i class="fa fa-mobile"></i> +229 69 70 14 14</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" >
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                {{--<a class="navbar-brand smoothie logo logo-light" href="index.html"><img src="assets/img/logo.png" alt="logo"></a>--}}
                {{--<a class="navbar-brand smoothie logo logo-dark" href="index.html"><img src="assets/img/logo.png" alt="logo"></a>--}}
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="main-navigation" >
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="{{ url('/') }}" ><span class="pe-7s-home"></span> Home</a>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="pe-7s-bookmarks"></span> Projets <span class="pe-7s-angle-down"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('projects') }}">Ongoing Projects</a></li>
                            <li><a href="{{ route('projects_finish') }}"> Finished Projects</a></li>
                            @if (Route::has('login'))
                                @auth
                                    <li><a href="{{route('addProjetForm')}}"> Submit my project</a></li>
                                    {{--<li><a href="header-4.html"> My Projecsts</a></li>--}}
                                @endauth
                            @endif
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="pe-7s-map"></span> OUR LANDS <span class="pe-7s-angle-down"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('terrains') }}"> Free Lands</a></li>
                            <li><a href="{{ route('terre_use') }}">Lands in use</a></li>
                            @if (Route::has('login'))
                                @auth
                                    <li><a href="{{ route('addOwner') }}">Submit my Land</a></li>
                                    {{--<li><a href="header-4.html">My Lands</a></li>--}}
                                @endauth
                            @endif
                        </ul>
                    </li>
                    {{--<li class="dropdown">--}}
                        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <span class="pe-7s-angle-down"></span></a>--}}
                        {{--<ul class="dropdown-menu">--}}
                            {{--<li class="dropdown-submenu">--}}
                                {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages - About Us</a>--}}
                                {{--<ul class="dropdown-menu">--}}
                                    {{--<li><a href="about-us-1.html">About Us - Layout 1</a></li>--}}
                                    {{--<li><a href="about-us-2.html">About Us - Layout 2</a></li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            {{--<li class="dropdown-submenu">--}}
                                {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages - Services</a>--}}
                                {{--<ul class="dropdown-menu">--}}
                                    {{--<li><a href="services-1.html">Services - Layout 1</a></li>--}}
                                    {{--<li><a href="services-2.html">Services - Layout 2</a></li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    @if (Route::has('login'))
                        @auth

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="pe-7s-user"></span> My Account <span class="pe-7s-angle-down"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ route('projects') }}">Profile</a></li>
                                    <li>
                                        <a class="text-sm text-gray-700 underline">
                                            <form method="post" action="{{ route('logout') }}">
                                                @csrf
                                                <button type="submit" style="border:none; background-color: transparent; color: inherit">LOGOUT</button>
                                            </form>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="dropdown">

                                {{--<a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Deconnexion</a>--}}
                            </li>
                            @else
                                <li class="dropdown">
                                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline"><span class="pe-7s-user"></span> Log in</a>
                                </li>
                                <li class="dropdown">
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline"><span class="pe-7s-rocket"></span> Register</a>
                                    @endif
                                </li>
                                @endauth
                            @endif

                            <li><a href="#search"><i class="pe-7s-search"></i></a></li>
                            {{--<li><a href="javascript:void(0);" class="side-menu-trigger hidden-xs"><i class="fa fa-bars"></i></a></li>--}}
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <div id="search-wrapper">
        <button type="button" class="close">×</button>
        <div class="vertical-center text-center">
            <form>
                <select name="context" type="search">
                    <option value="1">All</option>
                    <option value="2">Projects</option>
                    <option value="3">Lands</option>
                    {{--<option value="1">Coordinates</option>--}}
                </select>
                <input type="search" value="" placeholder="Enter Search Term" />
                <button type="submit" class="btn btn-primary btn-white">Search</button>
            </form>
        </div>
    </div>