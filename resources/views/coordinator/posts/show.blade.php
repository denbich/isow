
@extends('layouts.app')

@section('title') {{ __('Post') }} @endsection

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
        @include('coordinator.include.forms')
        <li class="nav-item ps-1 pt-1">
            <a data-bs-toggle="collapse" href="#posts" class="nav-link active py-2" aria-controls="posts" role="button" aria-expanded="true">
                    <i class="fa-solid fa-table text-primary text-sm opacity-10"></i>
                <span class="nav-link-text ms-1">{{ __('Posty') }}</span>
            </a>
            <div class="collapse show" id="posts">
                <ul class="nav ms-4">
                    <li class="nav-item">
                        <a href="{{ route('c.post.list') }}" class="nav-link active">
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
              <li class="breadcrumb-item text-sm text-white" aria-current="page">{{ __('Posty') }}</li>
              <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ __('Post') }}</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">{{ $post->post_translate->title }}</h6>
          </nav>
          @include('coordinator.include.nav')
        </div>
      </nav>

    <div class="container-fluid py-4 min-vh-100">
        <div class="row">
            <div class="col-lg-6 col-12 d-flex ms-auto">
               <a href="{{ route('c.post.list') }}" class="btn btn-icon bg-gradient-dark ms-auto">
                <span class="btn-inner--icon me-2"><i class="fa-solid fa-arrow-left"></i></span>
               <span class="btn-inner--text">{{ __('Powrót') }}</span>
            </a>
            </div>
         </div>

        <div class="row">
            <div class="col-lg-3 order-lg-2 my-2">
                <div class="card h-100">
                    <div class="card-header pb-0">
                        <h5 class="mb-0 text-capitalize">{{ __('Opcje') }}</h5>
                    </div>
                    <div class="card-body pt-0">
                        <a href="{{ route('c.post.edit', [$post->ivid]) }}" class="btn btn-success w-100 my-2 text-white">{{ __('Edytuj post') }}</a>
                        <button class="btn btn-danger w-100 my-2" data-bs-toggle="modal" data-bs-target="#deletemodal">{{ __('Usuń post') }}</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 order-lg-1 my-2">
                <div class="card h-100">
                    <div class="card-header"><h5 class="mb-0">{{ __('Opublikowany:') }} {{ date('d.m.Y H:i', strtotime($post->created_at)) }}</h5>
                    <h6 class="mb-0">{{ __('Autor:') }} {{ $post->author->firstname." ".$post->author->lastname }}</h6></div>
                      <div class="card-body">
                            {!! $post->post_translate->content !!}
                      </div>
                  </div>
            </div>
        </div>
      @include('coordinator.include.footer')
    </div>
  </main>

  <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel">{{ __('Usuń post') }}</h5>
        </div>
        <div class="modal-body">
          <h4 class="w-100 text-wrap text-center">{{ __('Czy jesteś pewnien, że chcesz usunąć post') }} "{{ $post->post_translate->title  }}"?</h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('main.cancel') }}</button>
          <form action="{{ route('c.post.destroy', [$post->ivid]) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">{{ __('Usuń') }}</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
@if (session('create_post'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Post został utworzony pomyślnie!',
    showConfirmButton: false,
    timer: 3000
})
</script>
@endif
@endpush