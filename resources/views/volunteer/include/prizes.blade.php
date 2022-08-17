<li class="nav-item ps-1 pt-1">
    <a data-bs-toggle="collapse" href="#prizes" class="nav-link collapsed py-2" aria-controls="prizes" role="button" aria-expanded="false">
            <i class="fa-solid fa-award text-primary text-sm opacity-10"></i>
        <span class="nav-link-text ms-1">{{ __('volunteer.sidebar.prizes.prizes') }}</span>
    </a>
    <div class="collapse" id="prizes" style="">
        <ul class="nav ms-4">
            <li class="nav-item ">
                <a class="nav-link " href="{{ route('v.prize.list') }}">
                    <span class="sidenav-normal"> {{ __('volunteer.sidebar.prizes.list') }} </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('v.prize.orders') }}">
                  <span class="sidenav-normal"> {{ __('volunteer.sidebar.prizes.orders') }} </span>
                </a>
              </li>
        </ul>
    </div>
</li>
