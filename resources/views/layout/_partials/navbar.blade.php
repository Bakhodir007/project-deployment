    <!-- Navbar -->
<nav
    class="layout-navbar @if(isset($fluid) and $fluid) container-fluid @else container-xxl @endif navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">
    <div
        class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="ti ti-menu-2 ti-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

        <!-- Search -->
        <div class="navbar-nav align-items-center">
            <div class="nav-item navbar-search-wrapper mb-0">
                <a class="nav-item nav-link search-toggler d-flex align-items-center px-0"
                   href="#">
                    <i class="ti ti-search ti-md me-2"></i>
                    {{--                    <span class="d-none d-md-inline-block text-muted">{{ __('action.search') }} (Ctrl+/) {{ __('Тестовый режим') }}--}}
                    {{--                    </span>--}}
                </a>
            </div>
        </div>
        <!-- /Search -->

        <ul class="navbar-nav flex-row align-items-center ms-auto">
{{--                        @livewire('reader::button-component')--}}
            <!-- Language -->
{{--            <li class="nav-item dropdown me-2 me-xl-0">--}}
{{--                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">--}}
{{--                    <i class='fi fi-uk fis rounded-circle me-1 fs-3'></i>--}}
{{--                </a>--}}
{{--            </li>--}}
            <!--/ Language -->

            <!-- Style Switcher -->
            <li class="nav-item me-2 me-xl-0">
                @if(session()->has('layout-skin') and session()->get('layout-skin') == 'dark')
                    <a class="nav-link hide-arrow" href="{{ route('app.layout.skin',['skin' => "light"]) }}">
                        <i class="ti ti-md ti-sun"></i>
                    </a>
                @else
                    <a class="nav-link hide-arrow" href="{{ route('app.layout.skin',['skin' => "dark"]) }}">
                        <i class="ti ti-md ti-moon-stars"></i>
                    </a>
                @endif
            </li>
            <!--/ Style Switcher -->

            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online overflow-hidden d-flex align-items-center">
                        <img
                            src="{{ (auth()->check() and auth()->user()->photo) ? auth()->user()->photo->getAssetUrlAttribute('user') : asset('assets/img/avatars/1.png')  }}"
                            alt="photo"
                            class="h-auto rounded-circle">
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item"
                           href="#">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        @auth
                                            <img
                                                src="{{ (auth()->user()->photo_id) ?  auth()->user()->photo->getAssetUrlAttribute('user') : asset('assets/img/avatars/1.png') }}"
                                                alt class="h-auto rounded-circle">
                                        @else
                                            <img
                                                src="{{ asset('assets/img/avatars/1.png') }}"
                                                alt class="h-auto rounded-circle">
                                        @endauth

                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                  <span class="fw-semibold d-block">
                                      @if (auth()->check())
                                          {{ auth()->user()->name }}<br>
                                          {{ auth()->user()->email }}<br>
                                      @else
                                          Ivan Ivanov <br>
                                          <small class="text-muted">Admin</small>
                                      @endif
                                  </span>

                                </div>
                            </div>
                        </a>
                    </li>
                    {{--                    <li>--}}
                    {{--                        <a class="dropdown-item" href="{{url('app/invoice/list')}}">--}}
                    {{--                  <span class="d-flex align-items-center align-middle">--}}
                    {{--                    <i class="flex-shrink-0 ti ti-credit-card me-2 ti-sm"></i>--}}
                    {{--                    <span class="flex-grow-1 align-middle">Billing</span>--}}
                    {{--                    <span class="flex-shrink-0 badge badge-center rounded-pill bg-label-danger w-px-20 h-px-20">2</span>--}}
                    {{--                  </span> </a>--}}
                    {{--                    </li>--}}
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    @if (auth()->check())
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class='ti ti-logout me-2'></i>
                                <span class="align-middle">Log out</span>
                            </a>
                        </li>
                        <form method="POST" id="logout-form" class="d-none" action="{{ route('logout') }}">
                            @csrf
                        </form>
                    @else
                        <li>
                            <a class="dropdown-item"
                               href="{{ \Illuminate\Support\Facades\Route::has('login') ? route('login') : 'javascript:void(0)' }}">
                                <i class='ti ti-login me-2'></i>
                                <span class="align-middle">Login</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
            <!--/ User -->
        </ul>

    </div>
    <!-- Search Small Screens -->
    {{--    <div class="navbar-search-wrapper search-input-wrapper d-none">--}}
    {{--        <input type="text" class="form-control search-input container-xxl border-0"--}}
    {{--               placeholder="Search..." aria-label="Search...">--}}
    {{--        <i class="ti ti-x ti-sm search-toggler cursor-pointer"></i>--}}
    {{--    </div>--}}
</nav>
<!-- / Navbar -->
