
            <li class="nav-item">
                <a class="nav-link collapsed" href="#form-category" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="form-category">
                  <i class="fas fa-sitemap text-primary"></i>
                  <span class="nav-link-text">Kategorie</span>
                </a>
                <div class="collapse" id="form-category">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a href="{{ route('c.formcategory.search') }}" class="nav-link">
                          <span class="sidenav-normal"> Szukaj </span>
                        </a>
                      </li>
                    <li class="nav-item">
                      <a href="{{ route('c.formcategory.list') }}" class="nav-link">
                        <span class="sidenav-normal"> Lista </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('c.formcategory.create') }}" class="nav-link">
                        <span class="sidenav-normal"> Utwórz nowy </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
