@extends('layouts.app')

@section('title')
{{ __('lista kategorii') }}
@endsection

@section('content')

<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        @include('coordinator.include.logo')
      <div class="navbar-inner">
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            @include('coordinator.include.dashboard')
        </ul>
        <hr class="my-3">
        <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Ogólne</span>
        </h6>
        <ul class="navbar-nav">
            @include('coordinator.include.volunteer')
            @include('coordinator.include.chat')
            @include('coordinator.include.send-mail')
          </ul>
          <hr class="my-3">
        <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Moduły</span>
        </h6>
          <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link active" href="#forms" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="forms">
                  <i class="fas fa-clipboard-list text-primary"></i>
                  <span class="nav-link-text">Formularze</span>
                </a>
                <div class="collapse show" id="forms">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('c.form.list') }}">
                        <span class="sidenav-normal"> Lista </span>
                      </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('c.form.archive') }}">
                          <span class="sidenav-normal"> Archiwum </span>
                        </a>
                      </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('c.form.create') }}">
                        <span class="sidenav-normal"> Utwórz nowy </span>
                      </a>
                    </li>
                    <li class="nav-item active">
                        <a href="{{ route('c.formcategory.list') }}" class="nav-link">
                          <span class="sidenav-normal"> Kategorie </span>
                        </a>
                      </li>
                  </ul>
                </div>
              </li>
              @include('coordinator.include.posts')
            @include('coordinator.include.prizes')
            @include('coordinator.include.sponsors')
          </ul>
          <hr class="my-3">

          <ul class="navbar-nav mb-md-3">
            @include('coordinator.include.other')
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <div class="main-content" id="panel">

    @include('coordinator.include.nav')

    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Lista kategorii</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{ route('c.dashboard') }}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item" aria-current="page">Kategorie</li>
                  <li class="breadcrumb-item active"><a href="{{ route('c.formcategory.list') }}">Lista</a></li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
                <a class="btn btn-icon btn-neutral mb-2" href="{{ route('c.formcategory.create') }}">
                    <span class="btn-inner--icon"><i class="fa-solid fa-plus"></i></span>
                    <span class="btn-inner--text">Utwórz nową kategorię</span>
                </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Page content -->

    <div class="container-fluid mt--6">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-8">
                    <h3 class="mb-0">Lista</h3>
                  </div>
                </div>
              </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <form action="{{ route('c.formcategory.list') }}" method="get">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="q" placeholder="Szukaj kateogrii" aria-label="Szukaj kateogrii" aria-describedby="button-addon2" value="@isset($_GET['q']){{ $_GET['q'] }}@endisset">
                                    <div class="input-group-append">
                                      <button class="btn btn-outline-primary" type="submit" id="button-addon2">
                                        <i class="fas fa-search"></i>
                                      </button>
                                    </div>
                                  </div>
                            </form>
                            @isset($_GET['q']) <h2 class="text-center">Ilość znalezionych kateogrii: {{ count($categories) }}</h2> @endisset
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light text-center">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nazwa</th>
                                    <th scope="col">Ilość formularzy</th>
                                    <th scope="col">Opcje</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @forelse ($categories as $category)
                                <tr>
                                    <th scope="row" class="text-center"><span class="name mb-0 text-sm">{{ $category->id }}</span></th>
                                    <td class="text-center">
                                        <span>{{ $category->form_category_translate->name }}</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="name mb-0 text-sm badge badge-primary">{{ $category->form_count }}</span>
                                    </td>
                                    <td class="text-center text-xl">
                                        <h4>
                                            <a class="mx-1" href="{{ route('c.formcategory.show', [$category->ivid]) }}">
                                                <i class="fas fa-search"></i>
                                            </a>
                                            <a class="mx-1" href="{{ route('c.formcategory.edit', [$category->ivid]) }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a class="mx-1" href="#deletemodal{{ $category->id }}" data-toggle="modal" data-target="#deletemodal{{ $category->id }}">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </h4>
                                        <div class="modal fade" id="deletemodal{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="Modal{{ $category->id }}Label" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="Modal{{ $category->id }}Label">Usuń kategorię</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                  <h3 class="w-100 text-wrap">Czy jesteś pewnien, że chcesz usunąć kategorię "{{ "" }}"?</h3>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
                                                  <form action="{{ route('c.form.destroy', [$category->ivid]) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger">Usuń</button>
                                                  </form>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                    </td>
                                </tr>

                                @empty <h2 class="text-center text-danger">Brak kategorii!</h2> @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        @yield('coordinator.include.footer')
      </div>
  </div>

@endsection

@section('script')
@if (session('delete_category') == true)
<script>
    Swal.fire({
        icon: 'success',
        title: 'Sukces!',
        text: 'Kategoria została usunięta pomyślnie!',
        showConfirmButton: false,
        //confirmButtonClass: "btn btn-primary btn-lg",
        timer: 4000,
        /*customClass: {
            confirmButton: 'btn btn-primary btn-lg',
            cancelButton: 'btn btn-danger btn-lg',
            loader: 'custom-loader'
        },*/
    });
</script>
@endif
@endsection






