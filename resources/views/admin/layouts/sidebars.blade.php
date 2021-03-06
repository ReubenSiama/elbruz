<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Elbruz</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item {{ Request::routeIs('admin.home') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.home') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Items
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item {{ Request::routeIs('admin.items') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.items')}}">
      <i class="fas fa-fw fa-list"></i>
      <span>Items</span>
    </a>
  </li>
  <li class="nav-item {{ Request::routeIs('admin.orders') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.orders') }}">
      <i class="fas fa-fw fa-list"></i>
      <span>Orders</span>
    </a>
  </li>
  <li class="nav-item {{ Request::routeIs('admin.payments') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.payments') }}">
      <i class="fas fa-fw fa-list"></i>
      <span>Payments</span>
    </a>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Settings
  </div>

  <!-- Nav Item - Charts -->
  <li class="nav-item {{ Request::routeIs('admin.users') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.users') }}">
      <i class="fas fa-fw fa-users"></i>
      <span>Users</span>
    </a>
  </li>

  <!-- Nav Item - Tables -->
  <li class="nav-item {{ Request::routeIs('admin.categories') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.categories') }}">
      <i class="fas fa-fw fa-table"></i>
      <span>Categories</span>
    </a>
  </li>
  
  <!-- Nav Item - Tables -->
  <li class="nav-item {{ Request::routeIs('admin.units') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.units') }}">
      <i class="fas fa-fw fa-table"></i>
      <span>Units</span>
    </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->