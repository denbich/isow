<li class="nav-item ps-1 pt-1">
    <a data-bs-toggle="collapse" href="#sponsors" class="nav-link collapsed py-2" aria-controls="sponsors" role="button" aria-expanded="false">
            <i class="fa-solid fa-hand-holding-dollar text-primary text-sm opacity-10"></i>
        <span class="nav-link-text ms-1">{{ __('Sponsorzy nagród') }}</span>
    </a>
    <div class="collapse" id="sponsors">
        <ul class="nav ms-4">
            <li class="nav-item">
                <a href="{{ route('c.sponsor.search') }}" class="nav-link">
                  <span class="sidenav-normal"> {{ __('Szukaj') }} </span>
                </a>
              </li>
            <li class="nav-item">
              <a href="{{ route('c.sponsor.list') }}" class="nav-link">
                <span class="sidenav-normal"> {{ __('Lista') }} </span>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('c.sponsor.create') }}" class="nav-link">
                <span class="sidenav-normal"> {{ __('Utwórz nowy') }} </span>
              </a>
            </li>
        </ul>
    </div>
</li>
