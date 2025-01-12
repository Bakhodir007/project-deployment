<!-- BEGIN: Theme CSS-->
<!-- Fonts -->
<link rel="stylesheet" href="{{ asset(('assets/vendor/fonts/fontawesome.css')) }}" />
<link rel="stylesheet" href="{{ asset(('assets/vendor/fonts/tabler-icons.css')) }}" />
<link rel="stylesheet" href="{{ asset(('assets/vendor/fonts/flag-icons.css')) }}" />

<!-- Core CSS -->
@if(session()->has('layout-skin') and session()->get('layout-skin') == 'dark')
    <link rel="stylesheet" href="{{ asset(('assets/vendor/css/rtl/core-dark.css')) }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset(('assets/vendor/css/rtl/theme-default-dark.css')) }}" class="template-customizer-theme-css" />
@else
    <link rel="stylesheet" href="{{ asset(('assets/vendor/css/rtl/core.css')) }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset(('assets/vendor/css/rtl/theme-default.css')) }}" class="template-customizer-theme-css" />
@endif
<link rel="stylesheet" href="{{ asset(('assets/css/demo.css')) }}" />


<link rel="stylesheet" href="{{ asset(('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')) }}" />
<link rel="stylesheet" href="{{ asset(('assets/vendor/libs/node-waves/node-waves.css')) }}" />
<link rel="stylesheet" href="{{ asset(('assets/vendor/libs/typeahead-js/typeahead.css')) }}" />

@livewireStyles
<!-- Vendor Styles -->
<link rel="stylesheet" href="{{asset('assets/vendor/libs/toastr/toastr.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}" />
@yield('vendor-style')


<!-- Page Styles -->
@yield('page-style')

<script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
<script src="{{ asset('assets/js/config.js') }}"></script>


