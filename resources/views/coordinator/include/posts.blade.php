<li class="nav-item ps-1 pt-1">
    <a data-bs-toggle="collapse" href="#posts" class="nav-link collapsed py-2" aria-controls="posts" role="button" aria-expanded="false">
            <i class="fa-solid fa-table text-primary text-sm opacity-10"></i>
        <span class="nav-link-text ms-1">{{ __('Posty') }}</span>
    </a>
    <div class="collapse" id="posts">
        <ul class="nav ms-4">
            <li class="nav-item">
                <a href="{{ route('c.post.list') }}" class="nav-link">
                  <span class="sidenav-normal"> {{ __('Lista') }} </span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('c.post.create') }}" class="nav-link">
                  <span class="sidenav-normal"> {{ __('Utwórz nowy') }} </span>
                </a>
              </li>
        </ul>
    </div>
</li>
