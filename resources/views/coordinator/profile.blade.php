
@extends('layouts.app')

@section('title') {{ __('Profil koordynatora') }} @endsection

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
              <li class="breadcrumb-item text-sm text-white" aria-current="page">{{ __('Koordynator') }}</li>
              <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ __('Profil') }}</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">{{ __('Profil koordynatora') }}</h6>
          </nav>
          @include('coordinator.include.nav')
        </div>
      </nav>

      <div class="container-fluid py-4 min-vh-100">
        <div class="row">
            <div class="col-lg-6 col-12 d-flex ms-auto">
                <a href="{{ route('c.settings') }}" class="btn btn-icon bg-gradient-dark ms-auto">
                    <span class="btn-inner--icon me-2"><i class="fa-solid fa-user-pen"></i></span>
                   <span class="btn-inner--text">{{ __('Edytuj') }}</span>
                </a>
                <button href="{{ "#" }}" class="btn btn-icon bg-gradient-dark ms-3" disabled>
                    <span class="btn-inner--icon me-2"><i class="fa-solid fa-file-lines"></i></span>
                   <span class="btn-inner--text">{{ __('Pokaż ID') }}</span>
                </button>
            </div>
         </div>
        <div class="card shadow-lg mb-4">
        <div class="card-body p-3">
            <div class="row gx-4">
               <div class="col-auto">
                  <div class="avatar avatar-xl position-relative">
                     <img src="{{ url(Auth::user()->photo_src) }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                  </div>
               </div>
               <div class="col-auto my-auto">
                  <div class="h-100">
                     <h5 class="mb-1">{{ Auth::user()->firstname." ".Auth::user()->lastname }}</h5>
                     <p class="mb-0 font-weight-bold text-sm">{{ Auth::user()->name }}</p>
                  </div>
               </div>
               <div class="col-auto my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                <form action="{{ route('c.change.profile') }}" method="post" id="changeprofilephotoform">
                    @csrf
                    <label for="upload_image1" class="w-100">
                        <a class="btn btn-primary btn-icon w-100 text-white m-0">
                            <span class="btn-inner--icon me-1"><i class="far fa-images"></i></span>
                            <span class="btn-inner--text">{{ __('Zmień zdjęcie profilowe') }}</span>
                        </a>
                        <input type="file" name="logo" class="image d-none" id="upload_image1" accept="image/*">
                        <input type="hidden" name="profile" id="profile_photo" value="">
                    </label>
                </form>
           </div>
            </div>
         </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                           <div class="col-md-8 d-flex align-items-center">
                              <h6 class="mb-0">{{ __('Informacje o Tobie') }}</h6>
                           </div>
                        </div>
                     </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label class="form-control-label">{{ __('Numer telefonu') }}</label>
                                <p>{{ Auth::user()->telephone }}</p>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label class="form-control-label">{{ __('Adres email') }}</label>
                                <p>{{ Auth::user()->email }}</p>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                  <label class="form-control-label">{{ __('Płeć') }}</label>
                                  <p>@if (Auth::user()->gender == 'f'){{ __('Kobieta') }}@else{{ __('Mężczyzna') }}@endif</p>
                                </div>
                              </div>
                            <div class="col-lg-6">
                                <label class="form-control-label">{{ __('Data rejestracji') }}</label>
                                  <p>{{ date('d.m.Y h:i', strtotime(Auth::user()->created_at)) }}</p>
                              </div>

                          </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-0">{{ __('Utworzone formularze') }}</h6>
                    </div>
                    <div class="card-body">
                        <ul>
                            @forelse ($forms as $form)
                                <li><a href="{{ route('c.form.show', [$form->ivid]) }}">{{ $form->form_translate->title }}</a></li>
                            @empty
                            <p class="text-center text-danger">{{ __('Nie utworzyłeś żadnego formularza!') }}</p>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
      @include('coordinator.include.footer')
    </div>
  </main>
  <div class="modal fade" id="cropmodal1" tabindex="-1" role="dialog" aria-labelledby="cropmodalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Wytnij zdjęcie</h5>
              </div>
              <div class="modal-body">
                   <div class="img-container">
                       <div class="row">
                           <div class="col-md-8">
                               <img src="" id="sample_image1" class="img-crop"/>
                          </div>
                          <div class="col-md-4">
                              <div class="preview"></div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" id="crop1" class="btn btn-primary">Wytnij</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('main.cancel') }}</button>
              </div>
          </div>
      </div>
  </div>
@endsection

@push('scripts')
<script>
    $(document).ready(function(){
	var $modal1 = $('#cropmodal1');
	var image1 = document.getElementById('sample_image1');
	var cropper1;
	$('#upload_image1').change(function(event){
		var files1 = event.target.files;
		var done1 = function(url){
			image1.src = url;
			$modal1.modal('show');
		};
		if(files1 && files1.length > 0)
		{
			reader1 = new FileReader();
			reader1.onload = function(event)
			{
				done1(reader1.result);
			};
			reader1.readAsDataURL(files1[0]);
		}
	});
	$modal1.on('shown.bs.modal', function() {
		cropper1 = new Cropper(image1, {
			aspectRatio: 1,
			viewMode: 3,
			preview:'.preview'
		});
	}).on('hidden.bs.modal', function(){
		cropper1.destroy();
   		cropper1 = null;
	});
	$('#crop1').click(function(){
		canvas1 = cropper1.getCroppedCanvas({
			width:500,
			height:500
		});
		canvas1.toBlob(function(blob){
			url1 = URL.createObjectURL(blob);
			var reader1 = new FileReader();
			reader1.readAsDataURL(blob);
			reader1.onloadend = function(){
				var base64data1 = reader1.result;
				const time = setInterval(() => {
                    document.getElementById("profile_photo").value = base64data1;
                }, 1);
				document.getElementById("profile_photo").value = base64data1;
				$modal1.modal('hide');
                $( "#changeprofilephotoform" ).submit();
			};
		});
	});
});
</script>

@if (session('change_profile'))
    <script>
    Swal.fire({
        icon: 'success',
        title: 'zdjęcie profilowe zostało zmienione pomyślnie!',
        showConfirmButton: false,
        timer: 3000
    })
    </script>
    @endif
@endpush

