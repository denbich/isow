<li class="nav-item ps-1 pt-1">
    <a data-bs-toggle="collapse" href="#volunteers" class="nav-link collapsed py-2" aria-controls="volunteers" role="button" aria-expanded="false">
            <i class="fa-solid fa-users text-primary text-sm opacity-10"></i>
        <span class="nav-link-text ms-1">{{ __('Wolontariusze') }}</span>
    </a>
    <div class="collapse" id="volunteers">
        <ul class="nav ms-4">
            <li class="nav-item">
                <a href="{{ route('c.v.search') }}" class="nav-link">
                  <span class="sidenav-normal"> {{ __('Wyszukaj') }} </span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('c.v.list') }}" class="nav-link">
                  <span class="sidenav-normal"> {{ __('Lista') }} </span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('c.v.active') }}" class="nav-link">
                  <span class="sidenav-normal"> {{ _('Aktywuj') }} </span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('c.v.other') }}" class="nav-link">
                  <span class="sidenav-normal"> {{ __('Inne') }} </span>
                </a>
              </li>
        </ul>
    </div>
</li>
