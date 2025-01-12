@extends('layout.app')

@section('layout-content')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('layout._partials.sidebar')
            <div class="layout-page">
                @include('layout._partials.navbar')
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        @includeWhen(isset($breadcrumbs),'core::layout._partials.breadcrumbs')
                        @yield('content')
                    </div>
                    @include('layout._partials.footer')
                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>
        <div class="layout-overlay layout-menu-toggle"></div>
        <div class="drag-target"></div>
    </div>
@endsection
