<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('meta')

    <title>{{ config('app.name', 'Laravel')}}{{ $title ?? '' }}</title>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!--icon-->
    <link href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Ion Slider -->
    <link rel="stylesheet" href="{{asset('/plugins/ion-rangeslider/css/ion.rangeSlider.min.css')}}">
    <!-- bootstrap slider -->
    <link rel="stylesheet" href="{{asset('/plugins/bootstrap-slider/css/bootstrap-slider.min.css')}}">
    <script src="{{asset('/plugins/ckeditor-4-basic/ckeditor.js')}}"></script>
    @yield('link')



</head>
<body class="margin-bottom:50px">

<div id="app">
    @include('host.layouts.navbar')
    <main class="py-4">
        @yield('content')
    </main>
</div>
{{--@include('layouts.footer')--}}

<!-- SweetAlert js -->
@include('sweet::alert')

<!-- JS -->
@yield('script')


</body>
</html>
