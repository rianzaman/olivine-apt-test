<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <div class="app-sidebar__user">
    <img class="app-sidebar__user-avatar" src="{{ isset(Auth::user()->image)?asset(Auth::user()->image):'https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg' }}" alt="User Image" style="max-height: 48px;max-width: 48px;">
    <div>
      <p class="app-sidebar__user-name">{{ Auth::user()->name ?? 'John Doe' }}</p>
      <p class="app-sidebar__user-designation">{{ Auth::user()->type ?? 'User' }}</p>
    </div>
  </div>
  <ul class="app-menu">
    {{-- Dashboard navigation starts here --}}
    {{-- <li>
      <a class="app-menu__item {{ Request::is('admin/dashboard')?'active':'' }}" href="{{ route('admin.dashboard') }}">
        <i class="app-menu__icon icofont-dashboard-web"></i>
        <span class="app-menu__label">Dashboard</span>
      </a>
    </li> --}}
    {{-- Dashboard navigation ends here --}}

    {{-- Application settings navigation starts here --}}
    <li>
      <a class="app-menu__item {{ Request::is('to-dos*')?'active':'' }}" href="{{ route('to-dos.index') }}">
        <i class="app-menu__icon far fa-list-alt"></i>
        <span class="app-menu__label">To-dos</span>
      </a>
    </li>
    {{-- Application settings navigation ends here --}}
  </ul>
</aside>