<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-simplebar>
      <div class="d-flex mb-4 align-items-center justify-content-between">
          <a href="/landing-page" class="text-nowrap logo-img ms-0 ms-md-1">
            <img src="../assets/images/logos/dark-logo.svg" width="180" alt="">
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
      </div>
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav">
        <ul id="sidebarnav" class="mb-4 pb-2">
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-5"></i>
            <span class="hide-menu">Home</span>
          </li>
          <li class="sidebar-item">
            <a
              class="sidebar-link sidebar-link primary-hover-bg"
              href="/dashboard"
              aria-expanded="false"
            >
              <span class="aside-icon p-2 bg-light-primary rounded-3">
                <i class="ti ti-layout-dashboard fs-7 text-primary"></i>
              </span>
              <span class="hide-menu ms-2 ps-1">Dashboard</span>
            </a>
          </li>
          @if (auth()->user()->ID_JENIS_USER == 1)
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-5"></i>
            <span class="hide-menu">Management</span>
          </li>
          <li class="sidebar-item">
            <a
              class="sidebar-link sidebar-link success-hover-bg"
              href="/users"
              aria-expanded="false"
            >
              <span class="aside-icon p-2 bg-light-success rounded-3">
                <i class="ti ti-mood-happy fs-7 text-success"></i>
              </span>
              <span class="hide-menu ms-2 ps-1">User</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a
              class="sidebar-link sidebar-link danger-hover-bg"
              href="/roles"
              aria-expanded="false"
            >
              <span class="aside-icon p-2 bg-light-danger rounded-3">
                <i class="ti ti-user-plus fs-7 text-danger"></i>
              </span>
              <span class="hide-menu ms-2 ps-1">Role</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a
              class="sidebar-link sidebar-link warning-hover-bg"
              href="/menus"
              aria-expanded="false"
            >
              <span class="aside-icon p-2 bg-light-warning rounded-3">
                <i class="ti ti-article fs-7 text-warning"></i>
              </span>
              <span class="hide-menu ms-2 ps-1">Menu</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a
              class="sidebar-link sidebar-link warning-hover-bg"
              href="/submenus"
              aria-expanded="false"
            >
              <span class="aside-icon p-2 bg-light-warning rounded-3">
                <i class="ti ti-login fs-7 text-warning"></i>
              </span>
              <span class="hide-menu ms-2 ps-1">SubMenu</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a
              class="sidebar-link sidebar-link primary-hover-bg"
              href="/settings"
              aria-expanded="false"
            >
              <span class="aside-icon p-2 bg-light-primary rounded-3">
                <i class="ti ti-aperture fs-7 text-primary"></i>
              </span>
              <span class="hide-menu ms-2 ps-1">Akses Menu</span>
            </a>
          </li>
          {{-- <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-5"></i>
            <span class="hide-menu">Menu</span>
          </li> --}}
          @endif
          {{-- @foreach ($setting_menu_user as $menu)
          @if (auth()->user()->ID_JENIS_USER == $menu->ID_JENIS_USER)
              <li class="sidebar-item">
                  <a
                  class="sidebar-link sidebar-link primary-hover-bg"
                  href="{{ $menu->MENU_LINK }}"
                  aria-expanded="false"
                  >
                  <span class="aside-icon p-2 bg-light-primary rounded-3">
                      <i class="{{ $menu->MENU_ICON }}"></i>
                  </span>
                  <span class="hide-menu ms-2 ps-1">{{ $menu->MENU_NAME }}</span>
                  </a>
              </li>
          @endif
      @endforeach --}}
      </nav>
      <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
  </aside>
