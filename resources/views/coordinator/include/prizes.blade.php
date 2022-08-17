<li class="nav-item ps-1 pt-1">
    <a data-bs-toggle="collapse" href="#prizes" class="nav-link collapsed py-2" aria-controls="prizes" role="button" aria-expanded="false">
            <i class="fa-solid fa-award text-primary text-sm opacity-10"></i>
        <span class="nav-link-text ms-1">{{ __('Nagrody') }}</span>
    </a>
    <div class="collapse" id="prizes">
        <ul class="nav ms-4">
            <li class="nav-item">
                <a href="{{ route('c.prize.search') }}" class="nav-link">
                  <span class="sidenav-normal"> {{ __('Wyszukaj') }} </span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('c.prize.list') }}" class="nav-link">
                  <span class="sidenav-normal"> {{ __('Lista') }} </span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('c.prize.orders') }}" class="nav-link">
                  <span class="sidenav-normal"> {{ __('Lista zamówień') }} </span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('c.prizecategory.list') }}" class="nav-link">
                  <span class="sidenav-normal"> {{ __('Kategorie') }} </span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('c.prize.create') }}" class="nav-link">
                  <span class="sidenav-normal"> {{ __('Utwórz nową') }} </span>
                </a>
              </li>
        </ul>
    </div>
</li>
