<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

    <!-- ! Hide app brand if navbar-full -->

    <div class="app-brand demo">
        <a href="{{ url('/') }}" class="app-brand-link">
      <span class="app-brand-logo demo">
          <img src="{{ asset('assets/img/favicon/favicon.ico') }}" alt="Logo" height="25">
      </span>
            <span class="app-brand-text demo menu-text fw-bold">{{config('app.name')}}</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>


    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-item">
            <a href="{{ route('product.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-box"></i>
                <div>Products </div>
            </a>
        </li>
        <li class="menu-item" id="people">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-circle"></i>
                <div>Entities</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('category.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-car"></i>
                        <div>Categories </div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('category-specification.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-car"></i>
                        <div>Category Specifications</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="{{ route('user.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div>Users </div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('lot.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-gift"></i>
                <div>Lots </div>
            </a>
        </li>
    </ul>
</aside>
