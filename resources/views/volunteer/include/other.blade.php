<li class="nav-item mt-3">
    <h6 class="ps-3 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">{{ __('volunteer.sidebar.other') }}</h6>
  </li>
  <li class="nav-item ps-1 pt-1">
    <a class="nav-link" href="{{ route('v.calendar') }}">
        <i class="fa-solid fa-calendar-days text-primary text-sm opacity-10"></i>
      <span class="nav-link-text ms-1">{{ __('volunteer.sidebar.calendar') }}</span>
    </a>
  </li>
  <li class="nav-item ps-1 pt-1">
    <a class="nav-link " href="{{ route('v.settings') }}">
        <i class="fa-solid fa-cog text-primary text-sm opacity-10"></i>
      <span class="nav-link-text ms-1">{{ __('volunteer.menu.dropdown.settings') }}</span>
    </a>
  </li>
  <li class="nav-item ps-1 pt-1">
    <a class="nav-link " href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fa-solid fa-arrow-right-from-bracket text-primary text-sm opacity-10"></i>
      <span class="nav-link-text ms-1">{{ __('main.logout') }}</span>
    </a>
  </li>
