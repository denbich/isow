
            <li class="nav-item">
                <a class="nav-link collapsed" href="#sponsors" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sponsors">
                  <i class="fas fa-hand-holding-dollar text-primary"></i>
                  <span class="nav-link-text">Sponsorzy</span>
                </a>
                <div class="collapse" id="sponsors">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a href="{{ route('c.sponsor.search') }}" class="nav-link">
                          <span class="sidenav-normal"> Szukaj </span>
                        </a>
                      </li>
                    <li class="nav-item">
                      <a href="{{ route('c.sponsor.list') }}" class="nav-link">
                        <span class="sidenav-normal"> Lista </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('c.sponsor.create') }}" class="nav-link">
                        <span class="sidenav-normal"> Utwórz nowy </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
