<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-topbar="light" data-sidebar="dark"
    data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
    <meta charset="utf-8" />
    <title>Fund Raisig - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel= "stylesheet"
        href= "https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
    {{-- <link rel="shortcut icon" href="{{ URL::asset('build/images/favicon.ico')}}"> --}}
    @include('layouts.head-css')
    @stack('page-css')
</head>

@section('body')

    <body>
    @show
    <div id="layout-wrapper">
        @include('layouts.topbar')
        @if (Auth::user()->is_admin == 1)
            @include('layouts.admin_sidebar')
        @else
            @include('layouts.user_sidebar')
        @endif
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
    @include('layouts.scripts')
    @stack('page-script')
</body>

</html>
