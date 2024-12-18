<aside class="left-sidebar with-vertical">
    <div class="brand-logo d-flex align-items-center justify-content-between">
        <a href="/" class="text-nowrap logo-img">
          <img src="{{ asset('') }}assets/images/logos/logo-light.svg" class="dark-logo" alt="Logo-Dark" />
          <img src="{{ asset('') }}assets/images/logos/logo-dark.svg" class="light-logo" alt="Logo-light" />
        </a>
        <a href="javascript:void(0)" class="sidebartoggler ms-auto text-decoration-none fs-5 d-block d-xl-none">
          <i class="ti ti-x"></i>
        </a>
      </div>

      <div class="scroll-sidebar" data-simplebar>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
          <ul id="sidebarnav" class="mb-0">

            <!-- ============================= -->
            <!-- Home -->
            <!-- ============================= -->
            <li class="nav-small-cap">
              <iconify-icon icon="solar:menu-dots-bold-duotone" class="nav-small-cap-icon fs-5"></iconify-icon>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link sidebar-link primary-hover-bg" href="/dashboard" aria-expanded="false">
                <span class="aside-icon p-2 bg-primary-subtle rounded-1">
                  <iconify-icon icon="solar:screencast-2-line-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu ps-1">Dashboard</span>
              </a>
            </li>
            @if (auth()->user()->ID_JENIS_USER == 1)
            <li class="nav-small-cap">
              <iconify-icon icon="solar:menu-dots-bold-duotone" class="nav-small-cap-icon fs-5"></iconify-icon>
              <span class="hide-menu">Management</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link sidebar-link success-hover-bg" href="/users" aria-expanded="false">
                <span class="aside-icon p-2 bg-success-subtle rounded-1">
                  <iconify-icon icon="solar:user-plus-broken" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu ps-1">Users</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link sidebar-link success-hover-bg" href="/roles" aria-expanded="false">
                <span class="aside-icon p-2 bg-success-subtle rounded-1">
                    <iconify-icon icon="solar:user-circle-line-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu ps-1">roles</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link sidebar-link success-hover-bg" href="/menus" aria-expanded="false">
                <span class="aside-icon p-2 bg-success-subtle rounded-1">
                    <iconify-icon icon="solar:tablet-line-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu ps-1">menus</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link sidebar-link success-hover-bg" href="/submenus" aria-expanded="false">
                <span class="aside-icon p-2 bg-success-subtle rounded-1">
                    <iconify-icon icon="solar:sidebar-minimalistic-line-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu ps-1">submenus</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link sidebar-link success-hover-bg" href="/settings" aria-expanded="false">
                <span class="aside-icon p-2 bg-success-subtle rounded-1">
                    <iconify-icon icon="solar:settings-line-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu ps-1">Akses Menu</span>
              </a>
            </li>
            @endif
            {{-- <li class="nav-small-cap">
              <iconify-icon icon="solar:menu-dots-bold-duotone" class="nav-small-cap-icon fs-5"></iconify-icon>
              <span class="hide-menu">Unduh Laporan</span>
            </li> --}}
            {{-- <li class="sidebar-item">
              <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                <button id="btnGroupVerticalDrop1" type="button"
                class="btn bg-primary-subtle text-primary  dropdown-toggle" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
            Download
            </button>
            <div class="dropdown-menu" aria-labelledby="downloadDropdown">
            <form action="{{ route('download.stock') }}" method="POST" id="downloadForm">
                @csrf
                <input type="hidden" name="month" value="{{ $selectedMonth }}">
                <input type="hidden" name="format" id="downloadFormat">
                <a class="dropdown-item" href="#" onclick="submitDownload('pdf')">PDF</a>
                <a class="dropdown-item" href="#" onclick="submitDownload('excel')">Excel</a>
                <a class="dropdown-item" href="#" onclick="submitDownload('csv')">CSV</a>
            </form>
            </div>
            </div>
          </li> --}}
          </ul>

        </nav>
        <!-- End Sidebar navigation -->
      </div>


{{-- profile --}}
<div class=" fixed-profile mx-3 mt-3">
<div class="card bg-primary-subtle mb-0 shadow-none">
  <div class="card-body p-4">
    <div class="d-flex align-items-center justify-content-between gap-3">
      <div class="d-flex align-items-center gap-3">
        <img src="{{ asset('') }}assets/images/profile/user-1.jpg" width="45" height="45" class="img-fluid rounded-circle" alt="" />
        <div>
          {{-- <h5 class="mb-1">Mike</h5>
          <p class="mb-0">Admin</p> --}}
        </div>
      </div>
      <form action="/logout" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="btn btn-outline-danger m-1">
                Logout
        </button>
    </form>
    </div>
  </div>
</div>
</div>
</aside>
