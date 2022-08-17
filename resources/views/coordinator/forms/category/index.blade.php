
@extends('layouts.app')

@section('title') {{ __('Lista formularzy') }} @endsection

@section('body') bg-gray-100 @endsection

@section('content')
<div class="min-height-300 bg-primary position-absolute w-100" id="background-color-div"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header" style="min-height: 170px;">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      @include('coordinator.include.logo')
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto h-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        @include('coordinator.include.dashboard')
        @include('coordinator.include.volunteer')
        @include('coordinator.include.chat')
        @include('coordinator.include.send_mail')
        <li class="nav-item mt-3">
            <h6 class="ps-3 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">{{ __('Moduły') }}</h6>
          </li>
          <li class="nav-item ps-1 pt-1">
            <a data-bs-toggle="collapse" href="#forms" class="nav-link active py-2" aria-controls="forms" role="button" aria-expanded="true">
                    <i class="fa-solid fa-clipboard-list text-primary text-sm opacity-10"></i>
                <span class="nav-link-text ms-1">{{ __('Formularze') }}</span>
            </a>
            <div class="collapse show" id="forms">
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
                      <li class="nav-item active">
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
        @include('coordinator.include.posts')
        @include('coordinator.include.prizes')
        @include('coordinator.include.sponsors')
        <li class="nav-item mt-3">
            <h6 class="ps-3 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">{{ __('Inne') }}</h6>
          </li>
          @include('coordinator.include.other')
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
              <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('c.dashboard') }}"><i class="fa-solid fa-house"></i></a></li>
              <li class="breadcrumb-item text-sm text-white" aria-current="page">{{ __('Formularze') }}</li>
              <li class="breadcrumb-item text-sm text-white" aria-current="page">{{ __('Kategorie') }}</li>
              <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ __('Lista') }}</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">{{ __('Lista kategorii formularzy') }}</h6>
          </nav>
          @include('coordinator.include.nav')
        </div>
      </nav>

    <div class="container-fluid py-4 min-vh-100">
        <div class="row">
            <div class="col-lg-6 col-12 d-flex ms-auto">
               <a href="{{ route('c.formcategory.create') }}" class="btn btn-icon bg-gradient-dark ms-auto">
                <span class="btn-inner--icon me-2"><i class="fa-solid fa-plus"></i></span>
               <span class="btn-inner--text">{{ __('Nowa kategoria') }}</span>
            </a>
            </div>
         </div>

         <div class="card">
            <div class="card-header"><h5 class="mb-0">{{ __('Lista') }}</h5></div>
              <div class="card-body pt-0">
                  <div class="row justify-content-center">
                      <div class="col-lg-6">
                          <form action="{{ route('c.formcategory.list') }}" method="get">
                              <div class="input-group mb-3">
                                  <input type="text" class="form-control" name="q" placeholder="Szukaj kateogrii" aria-label="Szukaj kateogrii" aria-describedby="button-addon2" value="@isset($_GET['q']){{ $_GET['q'] }}@endisset">
                                    <button class="btn btn-primary mb-0" type="submit" id="button-addon2">
                                      <i class="fas fa-search"></i>
                                    </button>
                                </div>
                          </form>
                          @isset($_GET['q']) <h4 class="text-center">{{ __('Ilość znalezionych kateogrii:') }} {{ count($categories) }}</h4> @endisset
                      </div>
                  </div>
                  <div class="table-responsive">
                      <table class="table align-items-center table-flush">
                          <thead class="thead-light text-center">
                              <tr>
                                  <th scope="col">{{ __('ID') }}</th>
                                  <th scope="col">{{ _('Nazwa') }}</th>
                                  <th scope="col">{{ __('Ilość formularzy') }}</th>
                                  <th scope="col">{{ __('Opcje') }}</th>
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
                                      <span class="name mb-0 badge-sm badge badge-primary">{{ $category->form_count }}</span>
                                  </td>
                                  <td class="text-center text-sm">
                                      <h4>
                                          <a class="mx-1" href="{{ route('c.formcategory.show', [$category->ivid]) }}">
                                              <i class="fa-solid fa-search"></i>
                                          </a>
                                          <a class="mx-1" href="{{ route('c.formcategory.edit', [$category->ivid]) }}">
                                              <i class="fa-solid fa-edit"></i>
                                          </a>
                                          <a class="mx-1" href="#deletemodal{{ $category->id }}" data-bs-toggle="modal" data-bs-target="#deletemodal{{ $category->id }}">
                                              <i class="fa-solid fa-trash-alt"></i>
                                          </a>
                                      </h4>
                                      <div class="modal fade" id="deletemodal{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="Modal{{ $category->id }}Label" aria-hidden="true">
                                          <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="Modal{{ $category->id }}Label">{{ __('Usuń kategorię') }}</h5>
                                              </div>
                                              <div class="modal-body">
                                                <h4 class="w-100 text-wrap">{{ __('Czy jesteś pewnien, że chcesz usunąć kategorię') }} "{{ $category->form_category_translate->name }}"?</h4>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('main.cancel') }}</button>
                                                <form action="{{ route('c.formcategory.destroy', [$category->ivid]) }}" method="post">
                                                  @csrf
                                                  @method('delete')
                                                  <button type="submit" class="btn btn-danger">{{ __('Usuń') }}</button>
                                                </form>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                  </td>
                              </tr>

                              @empty <h4 class="text-center text-danger">{{ __('Brak kategorii!') }}</h4> @endforelse
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>

      @include('coordinator.include.footer')
    </div>
  </main>
@endsection

@push('scripts')
@if (session('delete_category'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Kategoria została usunięta pomyślnie!',
    showConfirmButton: false,
    timer: 3000
})
</script>
@endif
@endpush
