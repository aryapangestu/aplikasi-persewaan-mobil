<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr" class="light nav-floating">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sewa Mobil') }}</title>

    <link rel="icon" type="image/png" href="assets/images/logo/favicon.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/rt-plugins.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/app.css') }}">
    <!-- End : Theme CSS-->
    <script src="{{ URL::asset('assets/js/settings.js') }}" sync></script>
</head>

<body class="font-inter dashcode-app" id="body_class">
    <div class="app-wrapper">

        <!-- BEGIN: Sidebar Navigation -->
        @if (Auth::user()->user_type == 'admin')
            @include('partials.sidebar-menu-admin')
        @else
            @include('partials.sidebar-menu-user')
        @endif
        <!-- End: Sidebar -->

        {{-- <!-- BEGIN: Settings -->
        @include('partials.dashboard-settings')
        <!-- End: Settings --> --}}

        <div class="flex flex-col justify-between min-h-screen">
            <div>
                <!-- BEGIN: header -->
                @include('partials.dashboard-header')
                <!-- BEGIN: header -->

                <div class="content-wrapper transition-all duration-150 ltr:ml-[248px] rtl:mr-[248px]"
                    id="content_wrapper">
                    <div class="page-content">
                        <div class="transition-all duration-150 container-fluid" id="page_layout">
                            <div id="content_layout">
                                <!-- Page Content -->
                                @yield('content')
                                <!-- End Page Content -->
                                </main>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- BEGIN: footer -->
        @include('partials.dashboard-footer')
        <!-- BEGIN: footer -->

        <!-- scripts -->
        <script src="{{ URL::asset('assets/js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/rt-plugins.js') }}"></script>
        <script src="{{ URL::asset('assets/js/app.js') }}"></script>
</body>

</html>
