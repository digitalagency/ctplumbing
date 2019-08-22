<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.SITE_TITLE','CT Plumbing') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/animate-css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet"
        href="{{ asset('assets/vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/chartist/css/chartist.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css') }}">

    <!-- MAIN CSS -->
    @stack('css')
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/color_skins.css') }}">


    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
</head>

<body>

    <body class="theme-blue">

        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="m-t-30"><img src="{{ asset('frontend/images/logo.png') }}" width="48" height="48"
                        alt="Mplify"></div>
                <p>Please wait...</p>
            </div>
        </div>
        <!-- Overlay For Sidebars -->
        <div class="overlay" style="display: none;"></div>

        <div id="wrapper">

            <nav class="navbar navbar-fixed-top">
                <div class="container-fluid">

                    <div class="navbar-brand">
                        <a href="{{URL(config('app.ADMIN_URL'))}}">
                            {{-- <img src="{{ asset('frontend/images/logo.png') }}" alt="Logo" class="img-responsive
                            logo"> --}}
                            <span class="name">{{ config('app.SITE_ADMIN_BAR','') }}</span>
                        </a>
                    </div>

                    <div class="navbar-right">
                        <ul class="list-unstyled clearfix mb-0">
                            <li>
                                <div class="navbar-btn btn-toggle-show">
                                    <button type="button" class="btn-toggle-offcanvas"><i
                                            class="lnr lnr-menu fa fa-bars"></i></button>
                                </div>
                                <a href="javascript:void(0);" class="btn-toggle-fullwidth btn-toggle-hide"><i
                                        class="fa fa-bars"></i></a>
                            </li>

                            <li>
                                <div id="navbar-menu">
                                    <ul class="nav navbar-nav">
                                        <li class="dropdown">
                                            <a href="javascript:void(0);" class="dropdown-toggle icon-menu"
                                                data-toggle="dropdown">
                                                <img type="file" class="rounded-circle"
                                                    src="{{ asset('uploads/feature_images/'.Auth::user()->feature_image) }}" width="30"
                                                    alt="">
                                                {{ Auth::user()->name }}
                                            </a>
                                            <div class="dropdown-menu animated flipInY user-profile">
                                                <div class="d-flex p-3 align-items-center">
                                                    <div class="drop-left m-r-10">
                                                        <img type="file" class="rounded-circle"
                                                            src="{{ asset('uploads/feature_images/'.Auth::user()->feature_image) }}"
                                                            width="30" alt="">
                                                    </div>
                                                    <div class="drop-right">
                                                        <h4> {{ Auth::user()->name }}</h4>
                                                        <p class="user-name"> {{ Auth::user()->email }}</p>
                                                    </div>
                                                </div>
                                                <div class="m-t-10 p-3 drop-list">


                                                    <ul class="list-unstyled">
                                                       
                                                        <li><a href="{{url('admin/changeusers/')}}"><i
                                                                    class="icon-settings"></i>Change profile</a></li>
                                                        <li class="divider"></li>
                                                        <li> <a href="{{ route('logout') }}"
                                                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                                <i class="icon-power"></i>{{ __('Logout') }}</a>
                                                            <form id="logout-form" action="{{ route('logout') }}"
                                                                method="POST" style="display: none;">
                                                                @csrf
                                                            </form>
                                                        </li>
                                                    </ul>

                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div id="leftsidebar" class="sidebar">
                <div class="sidebar-scroll">
                    <nav id="leftsidebar-nav" class="sidebar-nav">
                        <ul id="main-menu" class="metismenu">
                            <li class="heading">Main</li>
                            <li class="{{ Nav::isRoute('dashboard.index') }}"><a
                                    href="{{ route('dashboard.index') }}"><i
                                        class="icon-home"></i><span>Dashboard</span></a></li>
                            <li class="heading">Content</li>

                            <li class="{{ Nav::isResource('slider') }} ">
                                <a href="#Blog" class="has-arrow"><i class="icon-doc"></i><span>Slider</span></a>
                                <ul>
                                    <li class="{{ Nav::isRoute('indexSlider') }}"><a href="{{ route('indexSlider') }}">All
                                    Slider</a></li>
                                    <li class="{{ Nav::isRoute('createSlider') }}"><a
                                            href="{{ route('createSlider') }}">New Slider</a></li>
                                </ul>
                            </li>
                            <li class="{{ Nav::isResource('product') }} {{ Nav::isResource('category') }}">
                                <a href="#Blog" class="has-arrow"><i class="icon-globe"></i><span>Products
                                        </span></a>
                                <ul>
                                    <li class="{{ Nav::isRoute('product.index') }}"><a href="{{ route('product.index') }}">All
                                            Products</a></li>
                                    <li class="{{ Nav::isRoute('chooseCategory') }}"><a
                                            href="{{ route('chooseCategory') }}">New Product</a></li>

                                    <li class="{{ Nav::isRoute('indexCategory') }}"><a
                                            href="{{ route('indexCategory') }}">Categories</a></li>

                                     <li class="{{ Nav::isRoute('indexProperty') }}"><a
                                       href="{{ route('indexProperty') }}">Properties</a></li>
                                </ul>
                            </li>

                              <li class="{{ Nav::isResource('page') }} ">
                                <a href="#Blog" class="has-arrow"><i class="icon-doc"></i><span>Page</span></a>
                                <ul>
                                    <li class="{{ Nav::isRoute('page.index') }}"><a href="{{ route('page.index') }}">All
                                            page</a></li>
                                    <li class="{{ Nav::isRoute('page.create') }}"><a
                                            href="{{ route('page.create') }}">New page</a></li>

                                </ul>
                            </li>


                            <li class="{{ Nav::isResource('menu') }} ">
                                <a href="#Blog" class="has-arrow"><i class="fa fa-bars"></i><span>Menu</span></a>
                                <ul>
                                    <li class="{{ Nav::isRoute('menu.index') }}"><a href="{{ route('menu.index') }}">All
                                            menu</a></li>

                                </ul>
                            </li> 

                            <li class="{{ Nav::isResource('testimonial') }} ">
                                <a href="#Blog" class="has-arrow"><i
                                        class="fa fa-address-card"></i><span>Testimonial</span></a>
                                <ul>
                                    <li class="{{ Nav::isRoute('testimonial.index') }}"><a
                                            href="{{ route('testimonial.index') }}">All testimonial</a></li>
                                    <li class="{{ Nav::isRoute('testimonial.create') }}"><a
                                            href="{{ route('testimonial.create') }}">New testimonial</a></li>

                                </ul>
                            </li>

                            <li class="{{ Nav::isResource('partners') }} ">
                                <a href="#Blog" class="has-arrow"><i
                                        class="fa fa-address-card"></i><span>Partners</span></a>
                                <ul>
                                    <li class="{{ Nav::isRoute('indexPartners') }}"><a
                                            href="{{ route('indexPartners') }}">All Partners</a></li>
                                    <li class="{{ Nav::isRoute('createPartners') }}"><a
                                            href="{{ route('createPartners') }}">New Partners</a></li>

                                </ul>
                            </li>
                            
                            <li class="heading">Setting</li>
                            <li class="{{ Nav::isRoute('option.index') }}"><a href="{{ route( 'option.index' ) }}"><i
                                        class="fa fa-cogs"></i><span>Site Setting</span></a></li>
                            <li class="{{ Nav::isRoute('cmsoption.index') }}"><a
                                    href="{{ route( 'cmsoption.index' ) }}"><i
                                        class="icon-settings"></i><span>Options</span></a></li> 


                            <li class="heading">User</li>
                            <li class="{{ Nav::isResource('user') }}"><a href="{{ route('user.index')}}"><i
                                        class="icon-users"></i><span>Users</span></a></li>

                            <li><a href="{{ route('contact.index') }}"><i
                             class="icon-envelope-open"></i><span>Contacts</span></a></li>
                           


                        </ul>
                    </nav>
                </div>
            </div>


            <div id="main-content">
                <div class="container-fluid">

                    @yield('content')
                </div>
            </div>
        </div>

        </div>

        <!-- Javascript -->
        <script src="{{ asset('bundles/libscripts.bundle.js') }}"></script>
        <script src="{{ asset('bundles/vendorscripts.bundle.js') }}"></script>

        <script src="{{ asset('bundles/chartist.bundle.js') }}"></script>
        <script src="{{ asset('bundles/knob.bundle.js') }}"></script> <!-- Jquery Knob-->
        <script src="{{ asset('bundles/flotscripts.bundle.js') }}"></script> <!-- flot charts Plugin Js -->
        <script src="{{ asset('assets/vendor/flot-charts/jquery.flot.selection.js') }}"></script>

        <script src="{{ asset('bundles/mainscripts.bundle.js') }}"></script>

        @stack('scripts')




    </body>

</html>
