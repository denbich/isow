
@extends('layouts.app')

@section('title') {{ __('volunteer.posts.post.title') }} @endsection
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
              <li class="breadcrumb-item text-sm text-white" aria-current="page">{{ __('volunteer.sidebar.posts') }}</li>
              <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ __('volunteer.posts.post.title') }}</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">{{ $post->post_translate->title }}</h6>
          </nav>
          @include('volunteer.include.nav')
        </div>
      </nav>
    <div class="container-fluid py-4 min-vh-100">
        <div class="row">
            <div class="col-lg-6 col-12 d-flex ms-auto">
               <a href="{{ route('v.post.list') }}" class="btn btn-icon bg-gradient-dark ms-auto">
                <span class="btn-inner--icon me-2"><i class="fa-solid fa-arrow-left"></i></span>
               <span class="btn-inner--text">{{ __('Powrót') }}</span>
               </a>
            </div>
         </div>

        <article>
            <div class="card">
                <div class="card-body container">
                    <div class="text-center">
                        <h2>{{ $post->post_translate->title }}</h2>
                        <p class="text-dark mb-1">{{ date('d.m.Y', strtotime($post->created_at)) }}&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Autor: <a href="#">{{ $post->author->name." (".$post->author->firstname." ".$post->author->lastname.")" }}</a></p>

                            @if ($post->form_id == 0)<span class="badge badge-primary">{{ __('volunteer.posts.post.general') }}</span>

                            @else <a href="{{ route('v.form.show', [$post->form->ivid]) }}"><span class="badge badge-primary">{{ __('volunteer.posts.post.form') }} - {{ $post->form->form_translate->title }}</span></a> @endif

                    </div>
                    <div class="row justify-content-center mt-4">
                        <div class="col-lg-6">
                            {!! $post->post_translate->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </article>


      @include('volunteer.include.footer')
    </div>
  </main>
@endsection
