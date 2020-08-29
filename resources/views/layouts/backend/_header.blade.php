<header class="app-header">
  <a class="app-header__logo" href="#">Admin panel</a>
  <a class="app-sidebar__toggle" href="javascript:void(0)" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
  <ul class="app-nav">
    <li class="dropdown">
      <a class="app-nav__item" href="javascript:void(0)" data-toggle="dropdown" aria-label="Open Profile Menu">
        <i class="fas fa-user fa-lg"></i>
      </a>
      <ul class="dropdown-menu settings-menu dropdown-menu-right">
        {{-- <li>
          <a class="dropdown-item" href="page-user.html">
            <i class="fas fa-cog fa-lg"></i> Settings
          </a>
        </li> --}}
        <li>
          <a class="dropdown-item" href="{{ route('admin.profile') }}">
            <i class="fas fa-user fa-lg"></i> Profile
          </a>
        </li>
        <li>
          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt fa-lg"></i> Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </li>
      </ul>
    </li>
  </ul>
</header>