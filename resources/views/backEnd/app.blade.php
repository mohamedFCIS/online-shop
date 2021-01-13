<!doctype html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        Admin | @yield('title')
    </title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="/backEnd/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/backEnd/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/backEnd/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="/backEnd/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="/backEnd/vendors/selectFX/css/cs-skin-elastic.css">
{{--    <link rel="stylesheet" href="/backEnd/vendors/jqvmap/dist/jqvmap.min.css">--}}

    <link rel="stylesheet" href="/backEnd/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>







<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  @yield('script')


</head>

<body>


<!-- Left Panel -->

{{--active panel--}}
@php
    function is_active(string $routeName){
return null !== request()->segment(2) && request()->segment(2) == $routeName ? 'active' : '' ;
}
@endphp
{{--end active panel--}}

<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                    aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

@foreach ($sites as $site)
{{-- {{dd($sites->logo_image)}} --}}
<a class="navbar-brand" href="#"><img src="{{ $site->logo_image}}" alt="{{ $site->logo_name }}"class="w-100 object-cover"    > </a>
    @if ($site->logo_image !="")
        @break
    @endif
@endforeach

            <a class="navbar-brand " href="#"><img src="{{asset('storage/backEnd_images/logo.png')}}" alt="Logo"></a>

        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">

                <li class="{{is_active('home')}}">
                    <a href="{{route('admin')}}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>


                <li class="{{is_active('users')}}">
                    <a href="{{ route('users.index') }}"> <i class="menu-icon fa fa-male"></i>Users</a>

                </li>
                <li class="{{is_active('category')}}">
                    <a href="/admin/category"> <i class="menu-icon fa fa-list-alt"></i>Categories</a>
                </li>
                <li class="{{is_active('product')}}">
                    <a href="/admin/product"> <i class="menu-icon fa fa-product-hunt"></i>Products</a>
                </li>
                <li class="{{is_active('trashed')}}">
                    <a href="/admin/trashed"> <i class="menu-icon fa fa-trash"></i>Trash Product</a>
                </li>

                <li class="{{is_active('orders')}}">
                    <a href="{{route('orders.index')}}"> <i class="menu-icon fa fa-first-order"></i>Orders</a>

                <li class="{{is_active('contact')}}">
                    <a href="/admin/contact"> <i class="menu-icon fa fa-envelope"></i>messages</a>
                </li>
                 <li class="{{is_active('sites')}}">
                    <a href="/admin/sites"> <i class="menu-icon fa fa-cogs"></i>system</a>
                </li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->

<!-- Left Panel -->

<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!-- Header-->
    <header id="header" class="header">

        <div class="header-menu">

            <div class="col-sm-7">

                <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                <div class="header-left">
                    <a href="{{ url('/home') }}"
                    class="btn btn-secondary btn-lg">To User Web</a>



                </div>
            </div>

            <div class="col-sm-5">

                <div class="user-area dropdown float-right">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">
                         <img class="h-10 w-50 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="" />

                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle float-md-right" width="50" height="50"  src="{{ asset('storage/' . Auth::user()->profile_photo_path)}}" alt="{{ Auth::user()->name }}" />




                    </a>

                    <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="#"><i class="fa fa-user"></i> My Profile</a>

                        <a class="nav-link" href="{{ route('profile.show') }}"><i class="fa fa-cog"></i> Profile</a>


                        <form method="POST" action="{{ route('logout') }}">

                            @csrf

                            <a href="#" onclick="this.parentNode.submit()"><i class="fa fa-power-off"></i> Logout</a>

                        </form>

                    </div>

                </div>



            </div>
        </div>

    </header><!-- /header -->
    <!-- Header-->

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">

                    @yield('header')

                    <h1>@yield('dashboard')</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">@yield('dashboard')</li>
                    </ol>

                </div>
            </div>
        </div>

    </div>

    <div class="content mt-3">
        @yield('content')

    </div> <!-- .content -->
</div><!-- /#right-panel -->

<!-- Right Panel -->

<script src="/backEnd/vendors/jquery/dist/jquery.min.js"></script>
<script src="/backEnd/vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="/backEnd/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/backEnd/assets/js/main.js"></script>




</body>

</html>
