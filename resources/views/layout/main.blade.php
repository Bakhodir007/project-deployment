@extends('core::layout.app')

@section('layout-content')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('core::layout._partials.sidebar')
            <div class="layout-page">
                @include('core::layout._partials.navbar')
                <div class="content-wrapper">
                    <div class="container-fluid flex-grow-1 container-p-y">
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
