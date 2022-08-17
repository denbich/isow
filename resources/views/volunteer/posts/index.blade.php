
@extends('layouts.app')

@section('title') {{ __('volunteer.form.list.title') }} @endsection
@section('body') bg-gray-100 @endsection

@section('content')
<div class="min-height-300 bg-primary position-absolute w-100" id="background-color-div"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header" style="min-height: 170px;">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      @include('volunteer.include.logo')
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto h-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        @include('volunteer.include.dashboard')
        @include('volunteer.include.chat')
        <li class="nav-item ps-1 pt-1">
            <a class="nav-link active" href="{{ route('v.post.list') }}">
                  <i class="fa-solid fa-newspaper text-primary text-sm opacity-10"></i>
                  <span class="nav-link-text ms-1">{{ __('volunteer.sidebar.posts') }}</span>
            </a>
          </li>

        @include('volunteer.include.forms')
        @include('volunteer.include.prizes')
        @include('volunteer.include.other')

      </ul>
    </div>
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
              <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('v.dashboard') }}"><i class="fa-solid fa-house"></i></a></li>
              <li class="breadcrumb-item text-sm text-white" aria-current="page">{{ __('volunteer.sidebar.forms') }}</li>
              <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ __('volunteer.form.name') }}</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">{{ __('volunteer.form.list.title') }}</h6>
          </nav>
          @include('volunteer.include.nav')
        </div>
      </nav>
    <div class="container-fluid py-4 min-vh-100">
        <div class="row">
            @forelse ($posts as $post)
            <div class="card col-lg-3 col-md-6">
                <a href="{{ route('v.post', [$post->ivid]) }}">
                    <div class="card-body pt-2">
                    <span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">@if ($post->form != null) {{ $post->form->form_translate->title }} @endif</span>
                    <h5 class="card-title d-block text-darker">{{ $post->post_translate->title }}</h5>
                    <p class="mb-2"><span class="text-dark">{!! Str::limit(strip_tags($post->post_translate->content), 15) !!}</p>
                    <h6><b>{{ __('Czytaj dalej...') }}</b></h6>
                    <p><i class="fa-solid fa-user text-primary"></i> <span class="badge badge-primary">{{ $post->author->name }}</span></p>
                    <small>{{ __('Opublikowany:') }} {{ date('d.m.Y H:i', strtotime($post->created_at)) }}</small>
                    </div>
                </a>
              </div>
            @empty

            <div class="card col-12 mb-8">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h4 class="text-center text-danger w-100">{{ __('Brak postów!') }}</h4>
                </div>
            </div>
            @endforelse
        </div>


      @include('volunteer.include.footer')
    </div>
  </main>
@endsection
