<li class="nav-item mt-3">
    <h6 class="ps-3 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">{{ __('Moduły') }}</h6>
  </li>
<li class="nav-item ps-1 pt-1">
    <a data-bs-toggle="collapse" href="#forms" class="nav-link collapsed py-2" aria-controls="forms" role="button" aria-expanded="false">
            <i class="fa-solid fa-clipboard-list text-primary text-sm opacity-10"></i>
        <span class="nav-link-text ms-1">{{ __('Formularze') }}</span>
    </a>
    <div class="collapse" id="forms">
        <ul class="nav ms-4">
            <li class="nav-item">
                <a href="{{ route('c.form.list') }}" class="nav-link">
                  <span class="sidenav-normal"> {{ __('Lista') }} </span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('c.form.archive') }}">
                  <span class="sidenav-normal"> {{ __('Archiwum') }} </span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('c.formcategory.list') }}" class="nav-link">
                  <span class="sidenav-normal"> {{ __('Kategorie') }} </span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('c.form.create') }}" class="nav-link">
                  <span class="sidenav-normal"> {{ __('Utwórz nowy') }} </span>
                </a>
              </li>
        </ul>
    </div>
</li>
