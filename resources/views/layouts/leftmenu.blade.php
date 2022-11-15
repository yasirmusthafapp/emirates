<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
          with font-awesome or any other icon font library -->
      <li class="nav-item has-treeview {{ (request()->is('home')) ? 'menu-open' : '' }}">
        <a href="#" class="nav-link {{ (request()->is('home')) ? 'active' : '' }}">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Home
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link {{ (request()->is('home')) ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Dashboard</p>
            </a>
          </li>
        </ul>
      </li>
      @can('user-list')
      <li class="nav-item">
        <a href="{{ route('user.index') }}" class="nav-link {{ (request()->is('user*')) ? 'active' : '' }}">
          <i class="nav-icon fas fa-users"></i>
          <p>
            User Management
          </p>
        </a>
      </li>
      @endcan
      @can('role-list')
      <li class="nav-item">
        <a href="{{ route('role.index') }}" class="nav-link {{ (request()->is('role*')) ? 'active' : '' }}">
          <i class="nav-icon fas fa-user-tag"></i>
          <p>
            Role Management
          </p>
        </a>
      </li>
      @endcan
      <li class="nav-item">
        <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
            <i class="nav-icon far fa-circle text-danger"></i>
            <p class="text">{{ __('Logout') }}</p>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </a>
      </li>
  </ul>
</nav>