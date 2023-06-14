  <ul class="navbar-nav bg-white sidebar sidebar-light accordion" id="accordionSidebar"
      style="border-right: 2px solid rgba(0, 0, 0,.2)">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
          <div class="sidebar-brand-icon rotate-n-15">
              <i class="fa-solid fa-chart-bar text-dark"></i>
          </div>
          <div class="sidebar-brand-text mx-3 text-dark">Admin</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item {{ request()->segment(1) == 'dashboard' ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('dashboard') }}">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
          Profile
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
              aria-expanded="true" aria-controls="collapseTwo">
              <i class="fa-solid fa-id-card-clip"></i>
              <span>Profile</span>
          </a>
          <div id="collapseTwo" class="collapse {{ request()->segment(1) == 'profile' ? 'show' : '' }}"
              aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">Profile:</h6>
                  <a class="collapse-item" href="{{ route('profile.edit') }}">Profile</a>
                  {{-- <a class="collapse-item" href="{{ route('kriteria.index') }}">Kriteria</a> --}}
                  {{-- <a class="collapse-item" href="{{ route('langkah.perhitungan.index') }}">Langkah Perhitungan</a> --}}
              </div>
          </div>
      </li>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

  </ul>
