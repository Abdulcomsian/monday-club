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
                    <div class="container">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert" id="error-alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                    </div>
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
