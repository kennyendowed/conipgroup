<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- MINIFIED -->
    {!! SEO::generate(true) !!}
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
 <!-- Favicon and Touch Icons-->
 <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/apple-touch-icon.png') }}">
 <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon-32x32.png') }}">
 <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon-16x16.png') }}">
 <link rel="manifest" href="site.webmanifest">
 <link rel="mask-icon" color="#fe6a6a" href="{{ asset('assets/safari-pinned-tab.svg') }}">
 <meta name="msapplication-TileColor" content="#ffffff">
 <meta name="theme-color" content="#ffffff">
 <!-- Vendor Styles including: Font Icons, Plugins, etc.-->
 <link rel="stylesheet" media="screen" href="{{ asset('assets/vendor/simplebar/dist/simplebar.min.css') }}"/>
 <link rel="stylesheet" media="screen" href="{{ asset('assets/vendor/tiny-slider/dist/tiny-slider.css') }}"/>
 <!-- Main Theme Styles + Bootstrap-->
 <link rel="stylesheet" media="screen" href="{{ asset('assets/css/theme.min.css') }}">
    <link href="{{ asset('assets/sweetalert2/dist2/sweetalert.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/sweetalert2/dist2/sweetalert.js') }}"></script>

    @yield('style')
</head>
 @include('components.messages')