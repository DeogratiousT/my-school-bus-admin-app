<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <script src="{{ asset('js/creative.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Mdi -->
    {{-- <link rel="stylesheet" href="//cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css"> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/creative.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/icons-creative.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <!-- Datatables css -->
    <link href="{{ asset('css/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />

</head>

<body data-layout="detached">

    <!-- Navbar -->
    <div id="app">
        @include('includes.nav')  
    </div>
    <!-- End Navbar -->
    
    <!-- Start Content-->
    <div class="container-fluid mm-active">

        <!-- Begin page -->
        <div class="wrapper mm-show">

            <!-- Left Sidebar Start -->
            @if (Auth::user())
                @include('includes.sidebar')
            @endif
        
            <!-- Left Sidebar End -->

            <!-- Main Content -->
            <div class="content-page">
                <div class="content">
                    @include('includes.messages')
                    @yield('content')
                </div>
            </div>

            <!-- End Content -->

            <!-- Footer Start -->
                @include('includes.footer')
            <!-- end Footer -->

        </div> 
        <!-- content-page -->

    </div>
     <!-- end Container-->
</body>