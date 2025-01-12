@extends('main')

@section('layout-content')
    <div class="authentication-wrapper authentication-cover authentication-bg">
        <div class="text-center">
            <a href="/" class="auth-cover-brand d-flex align-items-center gap-2 justify-content-center">
                <span class="app-brand-text demo menu-text fw-semibold ms-2">{{ config('app.name') }}</span>
            </a>
        </div>
        <div class="authentication-inner row">
            <!-- /Left Text -->
            <div class="col-md-6">
                <div class="app-brand-logo justify-content-center d-flex">
                    <img src="{{ asset('assets/img/illustrations/auth-register-illustration-light.png') }}" width="500" alt="System Logo">
                </div>
            </div>

            <!-- /Left Text -->

            <!-- Login -->
            <div class="d-flex col-md-6 align-items-center p-sm-5 p-4">
                @livewire('login-form-component')
            </div>
            <!-- /Login -->
        </div>
    </div>
@endsection
{{--Assets--}}
@section('vendor-style')
    <!-- Vendor -->
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}"/>
@endsection

@section('page-style')
    <!-- Page -->
    <link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection

@section('vendor-script')
    <script src="{{asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')}}"></script>
@endsection

@section('page-script')
    <script src="{{asset('assets/js/pages-auth.js')}}"></script>
@endsection
