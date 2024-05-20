@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
    $userType = Session::get('Admin_UserType');
@endphp

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
        <span class="app-brand-logo demo">
            LOGO
        </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        @if ($route=="Dashboard.index")
            <li class="menu-item active">
        @else
            <li class="menu-item">
                @endif
                <a href="{{url('Dashboard')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Dashboard</div>
                </a>
            </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Setup or Config</span>
        </li>
        @if ($route=="UserInfo.index")
            <li class="menu-item active">
        @else
            <li class="menu-item">
                @endif
                <a href="{{url('UserInfo')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">User Info</div>
                </a>
            </li>
        @if ($route=="ServiceInfo.index")
            <li class="menu-item active">
        @else
            <li class="menu-item">
                @endif
                <a href="{{url('ServiceInfo')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Service Info</div>
                </a>
            </li>
        @if ($route=="CustomerInfo.index")
            <li class="menu-item active">
        @else
            <li class="menu-item">
                @endif
                <a href="{{url('CustomerInfo')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Customer Info</div>
                </a>
            </li>

        <!-- Misc -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Support Contact</span></li>
        <li class="menu-item">
            <a href="#" class="menu-link">
                <i class="menu-icon tf-icons bx bx-support"></i>
                <div data-i18n="Support">Support</div>
            </a>
        </li>
    </ul>
</aside>
<!-- / Menu -->
