@extends('layouts.app')

@section('title')
{{ __('Wyślij maila') }}
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
            <li class="nav-item active">
                <a class="nav-link active" href="{{ route('c.mail') }}">
                    <i class="fas fa-paper-plane text-primary"></i>
                    <span class="nav-link-text">Wyślij maila</span>
                </a>
            </li>

          </ul>
          <hr class="my-3">
        <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Moduły</span>
        </h6>
          <ul class="navbar-nav">
            @include('coordinator.include.forms')
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
              <h6 class="h2 text-white d-inline-block mb-0">Wyślij maila</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{ route('c.dashboard') }}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Wyślij maila</li>
                </ol>
              </nav>
            </div>
            @include('coordinator.include.button')
          </div>
        </div>
      </div>
    </div>

    <!-- Page content -->

    <div class="container-fluid mt--6">
            <div class="card">
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col-8">
                    <h3 class="mb-0">Wyślij maila </h3>
                  </div>
                </div>
              </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            @if (session('sent_mail') == true)
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <span class="alert-text"><strong>Sukces!</strong> Mail został wysłany!</span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif
                            <form action="{{ route('c.mail') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <span for="title-mail">Odbiorca</span><br>
                                    <div class="mt-1">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="recivier_radio1" name="recivier_radio" value="all" class="custom-control-input" checked>
                                            <label class="custom-control-label" for="recivier_radio1">Wszyscy wolontariusze</label>
                                          </div>
                                          <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="recivier_radio2" name="recivier_radio" value="choose" class="custom-control-input">
                                            <label class="custom-control-label" for="recivier_radio2">Wybierz odbiorców</label>
                                          </div>
                                    </div>
                                    <div class="mt-1 d-none" id="recivier_div">
                                        <select name="recivier_select[]" id="recivier_select" multiple placeholder="Szukaj wolontariuszy...">
                                            @foreach ($volunteers as $volunteer)
                                                <option value="{{ $volunteer->ivid }}">{{ $volunteer->firstname." ".$volunteer->lastname." (".$volunteer->name.")" }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <span for="title-mail">Tytuł maila</span>
                                    <input type="text" name="title" id="title-mail" class="form-control" maxlength="255" required>
                                    <p id="counter_title" class="text-sm">0 / 255 znaków</p>
                                    @if($errors->has('title'))
                                        <div class="text-danger w-100 d-block">
                                            {{ $errors->first('title') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <span for="content-mail">Treść</span>
                                    <textarea name="content" id="content"></textarea>
                                    @if($errors->has('content'))
                                        <div class="text-danger w-100 d-block">
                                            {{ $errors->first('content') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group d-none">
                                    <span for="content-mail">Załączniki</span>
                                    <input type="file" name="files" id="file-mail" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary w-100">Wyślij</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        @yield('coordinator.include.footer')
      </div>
  </div>

@endsection

@section('style')

<script>

    tinymce.init({
      selector: 'textarea#content',
      skin: 'bootstrap',
      height: 350,
      language: '{{ session("locale") }}',
        plugins: [
            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap',
            'anchor', 'searchreplace', 'visualblocks',
            'insertdatetime', 'media', 'table', 'help', 'wordcount'
        ],
        toolbar: 'undo redo | blocks | ' +
        'bold italic backcolor | alignleft aligncenter ' +
        'alignright alignjustify | bullist numlist outdent indent | ' +
        'removeformat | help',
        font_formats: "Nunito-nunito",
      setup: function (editor) {
      editor.on('init', function (e) {
        editor.setContent("{!! str_replace('"', "'", str_replace('\r\n', '', old('content', ''))) !!}");
        });
        }
    });
  </script>

@endsection

@section('script')

<script>

    var chars = $('#title-mail').val().length;
    $('#counter_title').html(chars +' / 255 znaków');

    $(document).ready(function() {
        $('#title-mail').on('keyup propertychange paste', function(){
            var chars = $('#title-mail').val().length;
            $('#counter_title').html(chars +' / 255 znaków');
        });
    });

</script>

<script>
$('input[type=radio][name=recivier_radio]').change(function() {
    if (this.value == 'all') {
        $('#recivier_div').addClass('d-none');
    }
    else if (this.value == 'choose') {
        $('#recivier_div').removeClass('d-none');
    }
});
</script>

<script>
    new TomSelect("#recivier_select",{
        plugins: {
		remove_button:{
			title:'Remove this item',
		},
	},
	persist: false,
	create: false,
	onDelete: function(values) {
		return confirm(values.length > 1 ? 'Are you sure you want to remove these ' + values.length + ' items?' : 'Are you sure you want to remove "' + values[0] + '"?');
	}
});
</script>

@endsection
