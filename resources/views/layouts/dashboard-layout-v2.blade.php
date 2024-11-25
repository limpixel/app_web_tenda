<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard 2</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

  <!-- Data Tables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bo otstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

  @notifyCss

  @yield('head')
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__wobble" src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60"
        width="60">
    </div>

    <!-- Navbar -->
    <nav style="z-index: 0 !important;" class=" main-header navbar navbar-expand navbar-dark">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Website Dashboard</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">User Dashboard</a>
        </li>


      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>

        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <!-- More notifications... -->
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{route('fe.home')}}" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
          class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Dashboard</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar ">
        <!-- Sidebar user panel -->
        <div class="d-flex flex-column">
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block"> {{Auth::user()->name}} </a>

            </div>
          </div>

         

          <div style="border: 2px solid white" class="">
            <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </div>
        </div>

        <!-- Sidebar Menu -->
        
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Dashboard Link -->

            <!-- Tables Link -->
            <li class="nav-header">Product & Contact</li>
            <li class="nav-item">
              <a href="{{route('dashboard.product_web.index')}}" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>Tables Product</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{route('dashboard.contact.index')}}" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>Tables Contact</p>
              </a>
            </li>

            <!-- User Settings -->
            <li class="nav-header">Website Settings</li>
            <li
              class="nav-item {{ request()->routeIs('dashboard.users.*') || request()->routeIs('dashboard.roles.*') ? 'menu-open' : '' }}">
              <a href="#" class="nav-link {{ request()->routeIs('dashboard.users.*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  User Settings
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('dashboard.users.index') }}"
                    class="nav-link {{ request()->routeIs('dashboard.users.index') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Users Pages</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('dashboard.roles.index') }}"
                    class="nav-link {{ request()->routeIs('dashboard.roles.index') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Users Roles</p>
                  </a>
                </li>
              </ul>
            </li>

            {{-- Home Settings --}}
            <li
              class="nav-item {{ request()->routeIs('dashboard.home-hero-section.*') || request()->routeIs('dashboard.home-easy-section.*') ? 'menu-open' : '' }}">
              <a href="#"
                class="nav-link {{ request()->routeIs('dashboard.home-hero-section.*') || request()->routeIs('dashboard.home-easy-section.*')   ? 'active' : '' }}">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Home Settings
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('dashboard.home-hero-section.index') }}"
                    class="nav-link {{ request()->routeIs('dashboard.home-hero-section.index') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Hero Sections</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('dashboard.home-easy-section.index') }}"
                    class="nav-link {{ request()->routeIs('dashboard.home-easy-section.index') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Easy Book Sections</p>
                  </a>
                </li>
              </ul>
            </li>

            {{-- About Settings --}}
            <li
              class="nav-item {{ request()->routeIs('dashboard.about_company_section.*') || request()->routeIs('dashboard.about_hero_section.*') ? 'menu-open' : '' }}">
              <a href="#"
                class="nav-link {{ request()->routeIs('dashboard.about_company_section.*') || request()->routeIs('dashboard.about_hero_section.*')   ? 'active' : '' }}">
                <i class="nav-icon fas fa-circle"></i>
                <p>
                  About Settings
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">

                <li class="nav-item">
                  <a href="{{ route('dashboard.about_hero_section.index') }}"
                    class="nav-link {{ request()->routeIs('dashboard.about_hero_section.index') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>About Hero Section</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{ route('dashboard.about_company_section.index') }}"
                    class="nav-link {{ request()->routeIs('dashboard.about_company_section.index') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>About Company Sections</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('dashboard.about_team.index') }}"
                    class="nav-link {{ request()->routeIs('dashboard.about_team.index') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>About Team Sections</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{ route('dashboard.about_testimoni_section.index') }}"
                    class="nav-link {{ request()->routeIs('dashboard.about_testimoni_section.index') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>About Testimoni Sections</p>
                  </a>
                </li>
                
              </ul>
            </li>

            <li class="nav-item  {{ request()->routeIs('dashboard.blogss.*') ? 'menu-open' : '' }}">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Web Settings
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">

                <li class="nav-item">
                  <a href="pages/forms/advanced.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Product </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/forms/editors.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>About</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{route('dashboard.blogs.index')}}"
                    class="nav-link {{ request()->routeIs('dashboard.blogs.*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Blog</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="pages/forms/editors.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Contact</p>
                  </a>
                </li>

              </ul>
            </li>
            <!-- More items... -->
          </ul>
        </nav>
      </div>
    </aside>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard v2</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v2</li>
              </ol>
            </div>
          </div>
        </div>
      </div>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          @yield('content')
        </div>
      </section>
      <!-- /.content -->
    </div>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark"></aside>

    <!-- Main Footer -->
    <footer class="main-footer">
      <div class="float-right d-none d-sm-inline">Version 3.0</div>
      <strong>Copyright &copy; 2024 <a href="#">Your Company</a>.</strong> All rights reserved.
    </footer>
  </div>

  <!-- REQUIRED SCRIPTS -->
  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('dist/js/adminlte.js') }}"></script>
  @include('notify::components.notify')
  @notifyJs
  @yield('scripts')
</body>

</html>