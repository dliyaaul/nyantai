<nav class="main-sidebar ps-menu">

    <div class="sidebar-header">
        <div class="text">AR</div>
        <div class="close-sidebar action-toggle">
            <i class="ti-close"></i>
        </div>
    </div>
    <div class="sidebar-content">
        <ul>
            <li class="{{ request()->segment(1) == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class="link">
                    <i class="ti-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="menu-category">
                <span class="text-uppercase">User Table Interface</span>
            </li>
            <li class="{{ request()->segment(1) == 'pages' ? 'active open' : '' }}">
                <a href="#" class="main-menu has-dropdown">
                    <i class="ti-layers-alt"></i>
                    <span>Pages</span>
                </a>
                <ul class="sub-menu {{ request()->segment(1) == 'pages' ? 'expand' : '' }}">
                    <li class="{{ request()->segment(1) == 'pages' && request()->segment(2) == 'portfolio' ? 'active' : '' }}"><a href="{{ route('portfolio.index') }}" class="link"><span>Portfolio</span></a></li>
                </ul>
            </li>
            {{-- @can('read konfigurasi')
            <li class="{{ request()->segment(1) == 'konfigurasi' ? 'active open' : '' }}">
                <a href="#" class="main-menu has-dropdown">
                    <i class="ti-desktop"></i>
                    <span>Konfigurasi</span>
                </a>
                <ul class="sub-menu {{ request()->segment(1) == 'konfigurasi' ? 'expand' : '' }}">
                    @can('read role')
                    <li class="{{ request()->segment(1) == 'konfigurasi' && request()->segment(2) == 'roles' ? 'active' : '' }}"><a href="{{ route('roles.index') }}" class="link"><span>Roles</span></a></li>
                    @endcan
                </ul>
            </li>
            @endcan --}}

            @foreach(getMenus() as $menu)
            @can('read '.$menu->url)
            <li class="{{ request()->segment(1) == $menu->url ? 'active open' : '' }}">
                <a href="#" class="main-menu has-dropdown">
                    <i class="{{$menu->icon}}"></i>
                    <span>{{$menu->name}}</span>
                </a>
                <ul class="sub-menu {{ request()->segment(1) == $menu->url ? 'expand' : '' }}">
                    @foreach($menu->subMenus as $submenu)
                    @can('read '.$submenu->url)
                    <li class="{{ request()->segment(1) == explode('/', $submenu->url)[0] && request()->segment(2) == explode('/', $submenu->url)[1] ? 'active' : '' }}">
                        <a href="{{ url($submenu->url) }}" class="link"><span>{{$submenu->name}}</span></a>
                    </li>
                    @endcan
                    @endforeach
                </ul>
            </li>
            @endcan
            @endforeach
        </ul>
    </div>
</nav>