<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    {{-- Dashboard Logo --}}
    <div class="app-brand demo">
        <a href="{{route('home')}}" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bold ms-2">Dev Al-Amin</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    {{-- Menu Start --}}
    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item {{request()->routeIs('backend.dashboard') ? 'active' : ''}}">
            <a href="{{route('backend.dashboard')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboards">Dashboard</div>
                {{-- <div class="badge bg-danger rounded-pill ms-auto">5</div> --}}
            </a>
        </li>


        <!-- Home -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Home</span></li>
        <!-- User interface -->
        <li class="menu-item {{request()->routeIs('backend.dashboard.banner.index') ? 'active' : ''}}">
            <a href="{{route('backend.dashboard.banner.index')}}" class="menu-link">
                <i class='menu-icon tf-icons bx bx-image'></i>
                <div data-i18n="Banner">Banner</div>
            </a>
        </li>

        {{-- Social Icons --}}
        <li class="menu-item {{request()->routeIs('backend.dashboard.socialLink.index') ? 'active' : ''}}">
            <a href="{{route('backend.dashboard.socialLink.index')}}" class="menu-link">
                <i class='menu-icon tf-icons bx bx-image'></i>
                <div data-i18n="Social Icon">Social Icon</div>
            </a>
        </li>


        {{--
        <!-- Components -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Home</span></li>
        <!-- User interface -->
        <li class="menu-item">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div data-i18n="User interface">Banner</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="" class="menu-link">
                        <div data-i18n="Accordion">Accordion</div>
                    </a>
                </li>
            </ul>
        </li> --}}

    </ul>
</aside>