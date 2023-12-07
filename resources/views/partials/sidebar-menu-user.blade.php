<!-- BEGIN: Sidebar -->
<div class="sidebar-wrapper group">
    <div id="bodyOverlay" class="w-screen h-screen fixed top-0 bg-slate-900 bg-opacity-50 backdrop-blur-sm z-10 hidden">
    </div>
    <div class="logo-segment">

        <!-- Application Logo -->
        @include('partials.application-logo')

        <!-- Sidebar Type Button -->
        <div id="sidebar_type" class="cursor-pointer text-slate-900 dark:text-white text-lg">
            <iconify-icon class="sidebarDotIcon extend-icon text-slate-900 dark:text-slate-200"
                icon="fa-regular:dot-circle"></iconify-icon>
            <iconify-icon class="sidebarDotIcon collapsed-icon text-slate-900 dark:text-slate-200"
                icon="material-symbols:circle-outline"></iconify-icon>
        </div>
        <button class="sidebarCloseIcon text-2xl inline-block md:hidden">
            <iconify-icon class="text-slate-900 dark:text-slate-200" icon="clarity:window-close-line"></iconify-icon>
        </button>
    </div>
    <div id="nav_shadow"
        class="nav_shadow h-[60px] absolute top-[80px] nav-shadow z-[1] w-full transition-all duration-200 pointer-events-none
      opacity-0">
    </div>
    <div class="sidebar-menus bg-white dark:bg-slate-800 py-2 px-4 h-[calc(100%-80px)] z-50" id="sidebar_menus">
        <ul class="sidebar-menu">
            <li class="sidebar-menu-title">{{ __('MENU') }}</li>
            <li class="{{ \Request::route()->getName() == 'dashboards*' ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}"
                    class="navItem {{ \Request::route()->getName() == 'dashboard' ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="heroicons-outline:home"></iconify-icon>
                        <span>{{ __('Dashboard') }}</span>
                    </span>
                </a>
                {{-- <a href="chat.html" class="navItem">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="heroicons-outline:home"></iconify-icon>
                        <span>Dashboard</span>
                    </span>
                </a> --}}
            </li>
            <!-- Apps Area -->
            <li class="sidebar-menu-title">{{ __('APPS') }}</li>
            <li>
                <a href="{{ route('pinjam-mobil') }}"
                    class="navItem {{ \Request::route()->getName() == 'pinjam-mobil' ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="map:car-rental"></iconify-icon>
                        <span>{{ __('Peminjaman Mobil') }}</span>
                    </span>
                </a>
                {{-- <a href="pinjam-mobil.html" class="navItem">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="map:car-rental"></iconify-icon>
                        <span>Peminjaman Mobil</span>
                    </span>
                </a> --}}
            </li>
            <li>
                <a href="{{ route('balik-mobil') }}"
                    class="navItem {{ \Request::route()->getName() == 'balik-mobil' ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="mdi:car-back"></iconify-icon>
                        <span>{{ __('Pengembalian Mobil') }}</span>
                    </span>
                </a>
                {{-- <a href="balik-mobil.html" class="navItem">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="mdi:car-back"></iconify-icon>
                        <span>Pengembalian Mobil</span>
                    </span>
                </a> --}}
            </li>
        </ul>
    </div>
</div>
<!-- End: Sidebar -->
