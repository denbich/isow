<footer class="footer pt-3  ">
    <div class="container-fluid">
      <div class="row align-items-center justify-content-lg-between">
        <div class="col-lg-6 mb-lg-0 mb-4">
          <div class="copyright text-center text-sm text-muted text-lg-start">
            Copyright © 2019 - <script> document.write(new Date().getFullYear()) </script> <a href="https://linktr.ee/denis.bichler" class="font-weight-bold ml-1" target="_blank">Denis Bichler for MOSiR Rybnik</a>
          </div>
        </div>
        <div class="col-lg-6">
          <ul class="nav nav-footer justify-content-center justify-content-lg-end">
            <li class="nav-item">
                <a href="{{ route('regulations') }}" class="nav-link text-muted">{{ __('index.footer.regulations') }}</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('codex') }}" class="nav-link text-muted">{{ __('index.footer.codex') }}</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('privacy_policy') }}" class="nav-link text-muted">{{ __('index.footer.privacypolicy') }}</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
