<!DOCTYPE html>
<html
    lang="{{ session()->get('locale') ?? app()->getLocale() }}"
    class="light-style layout-menu-fixed layout-navbar-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="{{ asset('/assets') . '/' }}"
    data-base-url="{{url('/')}}"
    data-framework="laravel"
    data-template="vertical-menu-theme-default-light"
>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>

    <title>@yield('title') | {{ config('app.name') }}</title>
    <meta name="description" content=""/>
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="company" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}"/>

    @include('_partials.style')
</head>
<body>

@yield('layout-content')

@include('_partials.scripts')
</body>

</html>
