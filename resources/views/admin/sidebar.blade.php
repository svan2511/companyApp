  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/')}}" target="_blank" class="brand-link">
      <img src="{{ asset('admin_assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Pannel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('storage/admin_assets/users/profile.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Welcome Admin</a><a href="{{url('admin/logout')}}" class="btn btn-block btn-success btn-sm">LOGOUT</a>
        </div>
      </div>

    
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
		   <li class="nav-item">
            <a href="{{ url('admin/dashboard') }}" class="nav-link @yield('select_dash')">
             <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{ url('admin/users') }}" class="nav-link @yield('select_user')">
           
            <i class="nav-icon fas fa-solid fa-users"></i>
              <p>
                Manage Users
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{ url('admin/apps') }}" class="nav-link @yield('select_app')">
           
            <i class="nav-icon fas fa-solid fa-list"></i>
              <p>
                Manage Apps
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <style>
    body:not(.layout-fixed) .main-sidebar .sidebar {
    overflow-y: unset;
}
    </style>