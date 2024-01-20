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
              </div>
          </div>
      </li>
      <!-- Heading -->
      <div class="sidebar-heading">
          Data Master
      </div>
      <li class="nav-item">
          <a class="nav-link {{ request()->segment(1) == 'data-master' ? '' : 'collapsed' }}" href="#"
              data-toggle="collapse" data-target="#data-master" aria-expanded="true" aria-controls="data-master">
              <i class="fa-solid fa-server"></i>
              <span>Data Master</span>
          </a>
          <div id="data-master" class="{{ request()->segment(1) == 'data-master' ? 'collapse show' : 'collapse' }}"
              aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner" style="border-right: 2px solid slategray">
                  <a class="{{ request()->segment(2) == 'sayuran' ? 'active' : '' }}  collapse-item"
                      href="{{ route('sayuran.index') }}">Data Sayuran</a>
                  <a class="{{ request()->segment(2) == 'kriteria-lahan' ? 'active' : '' }}  collapse-item"
                      href="{{ route('kriteriaLahan.index') }}">Data kriteria lahan</a>
                  <a class="{{ request()->segment(2) == 'rules' ? 'active' : '' }}  collapse-item"
                      href="{{ route('rules.index') }}">Data Rules</a>
              </div>
          </div>
      </li>


      <div class="sidebar-heading">
          Data Analisis
      </div>
      <li class="nav-item">
          <a class="nav-link {{ request()->segment(1) == 'analisis' ? '' : 'collapsed' }}" href="#"
              data-toggle="collapse" data-target="#analisis" aria-expanded="true" aria-controls="analisis">
              <i class="fa-solid fa-server"></i>
              <span>analisis</span>
          </a>
          <div id="analisis" class="{{ request()->segment(1) == 'analisis' ? 'collapse show' : 'collapse' }}"
              aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner" style="border-right: 2px solid slategray">
                  <a class="{{ request()->segment(2) == 'konsultasi' ? 'active' : '' }}  collapse-item"
                      href="{{ route('konsultasi.index') }}">Konsultasi</a>
              </div>
          </div>
      </li>
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

  </ul>
