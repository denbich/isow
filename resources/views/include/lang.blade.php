<li class="nav-item dropdown text-center" data-toggle="tooltip" data-placement="top" title="">
    <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa-solid fa-language text-lg"></i>
    </a>

    <div class="dropdown-menu dropdown-menu-lg  dropdown-menu-right  py-0 overflow-hidden">
        <div class="w-100 text-center mt-2">
            <span class="h4 text-center text-dark w-100">{{ __('main.lang') }}</span>
        </div>
      <div class="row shortcuts px-4 justify-content-center">
        <a href="{{ route('language', ['pl']) }}" class="col-4 my-2 shortcut-item text-center">
          <span class="shortcut-media avatar rounded-circle">
            <img src="https://cdn.jsdelivr.net/npm/round-flag-icons/flags/pl.svg" alt="">
          </span>
          <p class="mb-1">
            @if (session('locale') == 'pl')
            <small class="font-weight-700">{{ __('main.langlist.current.polish') }}</small>
            @else
            <small>{{ __('main.langlist.current.polish') }} ({{ __('main.langlist.foreign.polish') }})</small>
            @endif
          </p>

        </a>
        <a href="{{ route('language', ['en']) }}" class="col-4 my-2 shortcut-item text-center">
          <span class="shortcut-media avatar rounded-circle">
            <img src="https://cdn.jsdelivr.net/npm/round-flag-icons/flags/gb.svg" alt="">
          </span>
          <p class="mb-1">
            @if (session('locale') == 'en')
            <small class="font-weight-700">{{ __('main.langlist.current.english') }}</small>
            @else
            <small>{{ __('main.langlist.current.english') }} ({{ __('main.langlist.foreign.english') }})</small>
            @endif
          </p>
        </a>
        <a href="{{ route('language', ['uk']) }}" class="col-4 my-2 shortcut-item text-center">
            <span class="shortcut-media avatar rounded-circle">
              <img src="https://cdn.jsdelivr.net/npm/round-flag-icons/flags/ua.svg" alt="">
            </span>
            <p class="mb-1">
              @if (session('locale') == 'uk')
              <small class="font-weight-700">{{ __('main.langlist.current.ukrainian') }}</small>
              @else
              <small>{{ __('main.langlist.current.ukrainian') }} ({{ __('main.langlist.foreign.ukrainian') }})</small>
              @endif
            </p>
          </a>
          @if (1 == 0)
          <a href="{{ route('language', ['de']) }}" class="col-4 my-2 shortcut-item text-center">
            <span class="shortcut-media avatar rounded-circle">
              <img src="https://cdn.jsdelivr.net/npm/round-flag-icons/flags/de.svg" alt="">
            </span>
            <p class="mb-1">
              @if (session('locale') == 'de')
              <small class="font-weight-700">{{ __('Niemiecki') }}</small>
              @else
              <small>{{ __('Niemiecki') }} ({{ __('Niemiecki') }})</small>
              @endif
            </p>
          </a>
          <a href="{{ route('language', ['fr']) }}" class="col-4 my-2 shortcut-item text-center">
            <span class="shortcut-media avatar rounded-circle">
              <img src="https://cdn.jsdelivr.net/npm/round-flag-icons/flags/fr.svg" alt="">
            </span>
            <p class="mb-1">
              @if (session('locale') == 'fr')
              <small class="font-weight-700">{{ __('Francuski') }}</small>
              @else
              <small>{{ __('Francuski') }} ({{ __('Francuski') }})</small>
              @endif
            </p>
          </a>
          <a href="{{ route('language', ['es']) }}" class="col-4 my-2 shortcut-item text-center">
            <span class="shortcut-media avatar rounded-circle">
              <img src="https://cdn.jsdelivr.net/npm/round-flag-icons/flags/es.svg" alt="">
            </span>
            <p class="mb-1">
              @if (session('locale') == 'es')
              <small class="font-weight-700">{{ __('Hiszpański') }}</small>
              @else
              <small>{{ __('Hiszpański') }} ({{ __('Hiszpański') }})</small>
              @endif
            </p>
          </a>
          @endif
      </div>
    </div>
  </li>
