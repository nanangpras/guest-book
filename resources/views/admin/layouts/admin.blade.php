<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ url('template/assets/img/basic/logo_512.png') }}" type="image/x-icon">
    <title>@yield('title')</title>
    <!-- CSS -->
    @include('admin.includes.style')
</head>

<body class="light">
    <!-- Pre loader -->
    @include('admin.includes.loader')
    <div id="app">
        {{-- @section('sidebar') --}}
        <aside class="main-sidebar fixed offcanvas shadow" data-toggle='offcanvas'>
            <section class="sidebar">

                <div class="w-80px mt-3 mb-3 ml-3">
                    <img src="{{ asset('template/assets/img/basic/logo.png') }}" alt="">
                </div>
                <div class="relative">
                    <div class="user-panel p-3 light mb-2">
                        <div>
                            <div class="float-left image">
                                <img class="user_avatar" src="{{ url('template/assets/img/dummy/u1.png') }}"
                                    alt="User Image">
                            </div>
                            <div class="float-left info">
                                <h6 class="font-weight-light mt-2 mb-1">{{Auth::user()->name}}</h6>
                                <a href="#"><i class="icon-circle text-primary blink"></i> Online</a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                @include('admin.includes.sidebar')
            </section>
        </aside>
        <!--Sidebar End-->
        {{-- @show --}}
        <div class="page has-sidebar-left">
            <div class="pos-f-t">
                <div class="collapse" id="navbarToggleExternalContent">
                    <div class="bg-dark pt-2 pb-2 pl-4 pr-2">
                        <div class="search-bar">
                            <input class="transparent s-24 text-white b-0 font-weight-lighter w-128 height-50"
                                type="text" placeholder="start typing...">
                        </div>
                        <a href="#" data-toggle="collapse" data-target="#navbarToggleExternalContent"
                            aria-expanded="false" aria-label="Toggle navigation"
                            class="paper-nav-toggle paper-nav-white active "><i></i></a>
                    </div>
                </div>
            </div>
            <div
                class="navbar navbar-expand d-flex navbar-dark justify-content-between bd-navbar blue accent-3 shadow">
                <div class="relative">
                    <div class="d-flex">
                        <div>
                            <a href="#" data-toggle="push-menu" class="paper-nav-toggle pp-nav-toggle">
                                <i></i>
                            </a>
                        </div>
                        <div class="d-none d-md-block">
                            <h1 class="nav-title text-white">Wedding - Dashboard</h1>
                        </div>
                    </div>
                </div>
                <!--Top Menu Start -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages-->

                        <!-- Right Sidebar Toggle Button -->
                        <!-- User Account-->
                        <li class="dropdown custom-dropdown user user-menu ">
                            <a href="#" class="nav-link" data-toggle="dropdown">
                                <img src="{{ url('template/assets/img/dummy/u1.png') }}" class="user-image"
                                    alt="User Image">
                            </a>
                            
                        </li>

                    </ul>
                </div>
            </div>
                @yield('content')
            
        </div>
        <!-- Right Sidebar -->

        <!-- /.right-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
        <div class="control-sidebar-bg shadow white fixed"></div>
    </div>
    <!--/#app -->
</body>

</html>
@include('admin.includes.script');
@stack('scripts')
