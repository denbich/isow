
@extends('layouts.app')

@section('title') {{ __('volunteer.prizes.list.title') }} @endsection
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
        @include('volunteer.include.posts')
        @include('volunteer.include.forms')
        <li class="nav-item ps-1 pt-1">
            <a data-bs-toggle="collapse" href="#prizes" class="nav-link active py-2" aria-controls="prizes" role="button" aria-expanded="true">
                <i class="fa-solid fa-award text-primary text-sm opacity-10"></i>
                <span class="nav-link-text ms-1">{{ __('volunteer.sidebar.prizes.prizes') }}</span>
            </a>
            <div class="collapse show" id="prizes">
                <ul class="nav ms-4">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('v.prize.list') }}">
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
              <li class="breadcrumb-item text-sm text-white" aria-current="page">{{ __('volunteer.prizes.list.title') }}</li>
              <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ __('volunteer.prizes.list.list') }}</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">{{ __('volunteer.prizes.list.title') }}</h6>
          </nav>
          @include('volunteer.include.nav')
        </div>
      </nav>
    <div class="container-fluid py-4 min-vh-100">
        <div class="row">
            <div class="col-lg-6 col-12 d-flex ms-auto">
               <a href="{{ route('v.prize.list') }}" class="btn btn-icon bg-gradient-dark ms-auto">
                <span class="btn-inner--icon me-2"><i class="fa-solid fa-arrow-left"></i></span>
               <span class="btn-inner--text">{{ __('Powrót') }}</span>
               </a>
            </div>
         </div>

         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-body">
                     <h5 class="mb-4">{{ __('Szczegóły produktu') }}</h5>
                     <div class="row">
                        <div class="col-xl-5 col-lg-6 text-center">
                           <img class="w-100 border-radius-lg shadow-lg mx-auto" src="{{ $prize->icon_src }}" alt="chair">
                        </div>
                        <div class="col-lg-5 mx-auto">
                           <h3 class="mt-lg-0 mt-4">{{ $prize->prize_translate->title }}</h3>
                           <h6 class="mb-0 mt-3">{{ __('volunteer.prizes.prize.points') }}</h6>
                           <h5><i class="fa-solid fa-star"></i> {{ $prize->points }}</h5>
                           @if ($prize->quantity > 0 || $prize->combinations->sum('quantity') > 0)
                                @if ($prize->points <= $points)
                                    <span class="badge badge-success">{{ __('Na stanie') }}</span>
                                @else
                                    <span class="badge badge-warning">{{ __('Niewystarczająca ilość punktów') }}</span>
                                @endif
                           @else
                                <span class="badge badge-danger">{{ __('Brak na stanie') }}</span>
                           @endif
                           <br>
                           <label class="mt-4">{{ __('Opis') }}</label>
                           {!! $prize->prize_translate->description !!}
                            <hr>
                           @if ($prize->quantity > 0 || $prize->combinations->sum('quantity') > 0)
                            @if ($prize->points <= $points)
                            <form action="{{ route('v.prize.get', [$prize->ivid]) }}" method="post" role="form" id="order-form">
                                @csrf
                                <div class="row mt-4">
                                    @if ($prize->with_combinations == 1)
                                        <div class="col-lg-7 mt-lg-0 mt-2">
                                            <label for="combination-select">Kombinacja</label>
                                            <select name="combination" id="combination-select" class="form-control">
                                                @foreach ($prize->combinations as $combination)
                                                    @if ($combination->quantity > 0)
                                                        <option value="{{ $combination->ivid }}">{{ $combination->translate->title }}</option>
                                                    @else
                                                        <option value="{{ $combination->ivid }}" disabled>{{ $combination->translate->title }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                  @endif
                                  <div class="@if ($prize->with_combinations == 0) col-lg-12 @else col-lg-5 @endif mt-lg-0 mt-2">
                                     <label>{{ __('volunteer.prizes.prize.modal.info') }}</label>
                                     <textarea id="info" class="form-control" style="resize: none;" name="info" cols="50" rows="2" maxlength="255"></textarea>
                                     <p id="info_count" class="text-sm">0 / 255 {{ __('volunteer.prizes.prize.modal.char') }}</p>
                                  </div>
                               </div>
                               <div class="row mt-4">
                                  <div class="col-lg-7">
                                     <button class="btn btn-primary mb-0 mt-lg-auto w-100" type="submit" name="button">{{ __('volunteer.prizes.prize.modal.collect') }}</button>
                                  </div>
                               </div>
                               </form>
                            @else
                            <h4 class="text-danger text-center">{{ __('volunteer.prizes.prize.text2') }}</h4>
                            @endif
                           @else
                            <h4 class="text-danger text-center">{{ __('volunteer.prizes.prize.text3') }}</h4>
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      @include('volunteer.include.footer')
    </div>
  </main>
@endsection

@push('scripts')
@if ($prize->with_combinations == 1)
<script>
var combination = new Choices(document.getElementById("combination-select"), {
    searchEnabled:false,
    shouldSort: false,
    placeholder: true,
});
</script>
@endif

@if (session('points_order'))
<script>
Swal.fire({
    icon: 'error',
    title: 'Nie masz wystarczającej ilości punktów!',
    showConfirmButton: false,
    timer: 3000
})
</script>
@endif
@endpush
