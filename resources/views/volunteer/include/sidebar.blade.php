<div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa-solid fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3 ">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Konfiguracja panelu</h5>
          <p>Dostosuj panel pod siebie</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0 overflow-auto">
        <!-- Sidebar Backgrounds -->
        <div>
          <h5 class="mb-3">{{ __('main.lang') }}</h5>
        </div>
        <div class="">
            <div class="mb-2">
                <a class="border-radius-md @if (session('locale') == 'pl') bg-gray-200 @endif" href="{{ route('language', ['pl']) }}">
                  <div class="d-flex py-1">
                    <div class="my-auto">
                      <img src="https://cdn.jsdelivr.net/npm/round-flag-icons/flags/pl.svg" class="avatar me-3">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="font-weight-normal mb-1"><span>{{ __('main.langlist.current.polish') }}</span></h6>
                      <p class="text-xs text-secondary mb-0">{{ __('main.langlist.foreign.polish') }}</p>
                    </div>
                  </div>
                </a>
              </div>
              <div class="mb-2">
                <a class="border-radius-md @if (session('locale') == 'en') bg-gray-200 @endif" href="{{ route('language', ['en']) }}">
                  <div class="d-flex py-1">
                      <div class="my-auto">
                          <img src="https://cdn.jsdelivr.net/npm/round-flag-icons/flags/gb.svg" class="avatar me-3">
                        </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="font-weight-normal mb-1"><span>{{ __('main.langlist.current.english') }}</span></h6>
                      <p class="text-xs text-secondary mb-0">{{ __('main.langlist.foreign.english') }}</p>
                    </div>
                  </div>
                </a>
              </div>
              <div>
                  <a class="border-radius-md @if (session('locale') == 'uk') bg-gray-200 @endif" href="{{ route('language', ['uk']) }}">
                    <div class="d-flex py-1">
                        <div class="my-auto">
                            <img src="https://cdn.jsdelivr.net/npm/round-flag-icons/flags/ua.svg" class="avatar me-3">
                          </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="font-weight-normal mb-1"><span>{{ __('main.langlist.current.ukrainian') }}</span></h6>
                        <p class="text-xs text-secondary mb-0">{{ __('main.langlist.foreign.ukrainian') }}</p>
                      </div>
                    </div>
                  </a>
                </div>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <hr class="horizontal dark my-sm-4">
        <div class="mt-3">
            <h5 class="mb-0">Tryb wyglądu</h5>
          </div>
        <div class="mt-2 mb-5 d-flex d-none">
            <h6 class="mb-0">Jasny / Ciemny</h6>
            <div class="form-check form-switch ps-0 ms-auto my-auto">
              <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
            </div>
        </div>
        <a class="btn bg-gradient-dark w-100" href="https://www.creative-tim.com/product/argon-dashboard">{{ __('volunteer.menu.dropdown.settings') }}</a>
      </div>
    </div>
  </div>
