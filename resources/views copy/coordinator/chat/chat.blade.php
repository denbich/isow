@extends('layouts.app')

@section('title')
{{ __('Chat') }}
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
            <li class="nav-item active">
                <a class="nav-link active" href="{{ route('c.chat') }}">
                    <i class="fas fa-comments text-primary"></i>
                    <span class="nav-link-text">Czat</span>
                </a>
            </li>

            @include('coordinator.include.send-mail')
          </ul>
          <hr class="my-3">
        <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">{{ __('Moduły') }}</span>
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
              <h6 class="h2 text-white d-inline-block mb-0">Czat</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{ route('c.dashboard') }}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Czat</li>
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
                    <h3 class="mb-0">Czat </h3>
                  </div>
                </div>
              </div>
                <div class="card-body">
                    <h1 class="text-center text-danger d-none">Czat jest niedostępny! Spróbuj później</h1>
                    <div class="row rounded-lg overflow-hidden shadow">
                        <!-- Users box-->
                        <div class="col-5 px-0">
                          <div class="bg-white">

                            <div class="bg-gray px-4 py-2 bg-light">
                              <p class="h5 mb-0 py-1">Recent</p>
                            </div>

                            <div class="messages-box">
                              <div class="list-group rounded-0">
                                <a class="list-group-item list-group-item-action active text-white rounded-0">
                                  <div class="media"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                                    <div class="media-body ml-4">
                                      <div class="d-flex align-items-center justify-content-between mb-1">
                                        <h6 class="mb-0">Jason Doe</h6><small class="small font-weight-bold">25 Dec</small>
                                      </div>
                                      <p class="font-italic mb-0 text-small">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                                    </div>
                                  </div>
                                </a>

                                <a href="#" class="list-group-item list-group-item-action list-group-item-light rounded-0">
                                  <div class="media"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                                    <div class="media-body ml-4">
                                      <div class="d-flex align-items-center justify-content-between mb-1">
                                        <h6 class="mb-0">Jason Doe</h6><small class="small font-weight-bold">14 Dec</small>
                                      </div>
                                      <p class="font-italic text-muted mb-0 text-small">Lorem ipsum dolor sit amet, consectetur. incididunt ut labore.</p>
                                    </div>
                                  </div>
                                </a>



                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Chat Box-->
                        <div class="col-7 px-0">
                          <div class="px-4 py-5 chat-box bg-white">
                            <!-- Sender Message-->
                            <div class="media w-50 mb-3"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                              <div class="media-body ml-3">
                                <div class="bg-light rounded py-2 px-3 mb-2">
                                  <p class="text-small mb-0 text-muted">Test which is a new approach all solutions</p>
                                </div>
                                <p class="small text-muted">12:00 PM | Aug 13</p>
                              </div>
                            </div>

                            <!-- Reciever Message-->
                            <div class="media w-50 ml-auto mb-3">
                              <div class="media-body">
                                <div class="bg-primary rounded py-2 px-3 mb-2">
                                  <p class="text-small mb-0 text-white">Test which is a new approach to have all solutions</p>
                                </div>
                                <p class="small text-muted">12:00 PM | Aug 13</p>
                              </div>
                            </div>

                            <!-- Sender Message-->
                            <div class="media w-50 mb-3"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                              <div class="media-body ml-3">
                                <div class="bg-light rounded py-2 px-3 mb-2">
                                  <p class="text-small mb-0 text-muted">Test, which is a new approach to have</p>
                                </div>
                                <p class="small text-muted">12:00 PM | Aug 13</p>
                              </div>
                            </div>

                            <!-- Reciever Message-->
                            <div class="media w-50 ml-auto mb-3">
                              <div class="media-body">
                                <div class="bg-primary rounded py-2 px-3 mb-2">
                                  <p class="text-small mb-0 text-white">Apollo University, Delhi, India Test</p>
                                </div>
                                <p class="small text-muted">12:00 PM | Aug 13</p>
                              </div>
                            </div>

                            <!-- Sender Message-->
                            <div class="media w-50 mb-3"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                              <div class="media-body ml-3">
                                <div class="bg-light rounded py-2 px-3 mb-2">
                                  <p class="text-small mb-0 text-muted">Test, which is a new approach</p>
                                </div>
                                <p class="small text-muted">12:00 PM | Aug 13</p>
                              </div>
                            </div>

                            <!-- Reciever Message-->
                            <div class="media w-50 ml-auto mb-3">
                              <div class="media-body">
                                <div class="bg-primary rounded py-2 px-3 mb-2">
                                  <p class="text-small mb-0 text-white">Apollo University, Delhi, India Test</p>
                                </div>
                                <p class="small text-muted">12:00 PM | Aug 13</p>
                              </div>
                            </div>

                          </div>

                          <!-- Typing area -->
                          <form action="#" class="bg-light">
                            <div class="input-group">
                              <input type="text" placeholder="Type a message" aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 bg-light">
                              <div class="input-group-append">
                                <button id="button-addon2" type="submit" class="btn btn-link"> <i class="fa fa-paper-plane"></i></button>
                              </div>
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

@section('script')

<script>

        $(document).ready(function() {

            $('.userclass').click(function () {
                $('.userclass').removeClass('activeuser');
                $(this).addClass('activeuser');
                receiver_id = $(this).attr('id');
                $.ajax({
                type:'POST',
                url: "/coordinator/chat/getmessages",
                data: {
                    'receiver_id': receiver_id
                },
                success:function(data) {
                    $('#messagebox').html(data);
                    scrollToBottomFunc();
                    $( ".messagediv" ).removeClass("d-none")
                }
                });
            });
        });

                window.setInterval(function(){
                    $.ajax({
                        type:'POST',
                        url: "/coordinator/chat/getmessages",
                        data: {
                            'receiver_id': receiver_id
                        },
                        success:function(data) {
                            //$('#messagebox').html(data);
                            //scrollToBottomFunc();
                        }
                        });
                }, 10000);

                function scrollToBottomFunc() {
                    $('.messagediv').animate({
                        scrollTop: $('.messagediv').get(0).scrollHeight
                    }, 50);
                    //$( ".messagediv").append(data);
                }

</script>



@endsection

@section('style')

    <style>

        body {
	 -webkit-font-smoothing: antialiased;
	 -moz-osx-font-smoothing: grayscale;
	 text-rendering: optimizeLegibility;
}
 .container {
	 margin: 60px auto;
	 background: #fff;
	 padding: 0;
	 border-radius: 7px;
}
 .profile-image {
	 width: 50px;
	 height: 50px;
	 border-radius: 40px;
}
 .settings-tray {
	 background: #eee;
	 padding: 10px 15px;
	 border-radius: 7px;
}
 .settings-tray .no-gutters {
	 padding: 0;
}
 .settings-tray--right {
	 float: right;
}
 .settings-tray--right i {
	 margin-top: 10px;
	 font-size: 25px;
	 color: grey;
	 margin-left: 14px;
	 transition: 0.3s;
}
 .settings-tray--right i:hover {
	 color: #74b9ff;
	 cursor: pointer;
}
 .search-box {
	 background: #fafafa;
	 padding: 10px 13px;
}
 .search-box .input-wrapper {
	 background: #fff;
	 border-radius: 40px;
}
 .search-box .input-wrapper i {
	 color: grey;
	 margin-left: 7px;
	 vertical-align: middle;
}
 input {
	 border: none;
	 border-radius: 30px;
	 width: 80%;
}
 input::placeholder {
	 color: #e3e3e3;
	 font-weight: 300;
	 margin-left: 20px;
}
 input:focus {
	 outline: none;
}
 .friend-drawer {
	 padding: 10px 15px;
	 display: flex;
	 vertical-align: baseline;
	 background: #fff;
	 transition: 0.3s ease;
}
 .friend-drawer--grey {
	 background: #eee;
}
 .friend-drawer .text {
	 margin-left: 12px;
	 width: 70%;
}
 .friend-drawer .text h6 {
	 margin-top: 6px;
	 margin-bottom: 0;
}
 .friend-drawer .text p {
	 margin: 0;
}
 .friend-drawer .time {
	 color: grey;
}
 .friend-drawer--onhover:hover {
	 background: #5e72e4;
	 cursor: pointer;
}
 .friend-drawer--onhover:hover p, .friend-drawer--onhover:hover h6, .friend-drawer--onhover:hover .time {
	 color: #fff !important;
}
 hr {
	 margin: 5px auto;
	 width: 60%;
}
 .chat-bubble {
	 padding: 10px 14px;
	 background: #eee;
	 margin: 10px 30px;
	 border-radius: 9px;
	 position: relative;
}
 .chat-bubble:after {
	 content: '';
	 position: absolute;
	 top: 50%;
	 width: 0;
	 height: 0;
	 border: 20px solid transparent;
	 border-bottom: 0;
	 margin-top: -10px;
}
 .chat-bubble--left:after {
	 left: 0;
	 border-right-color: #eee;
	 border-left: 0;
	 margin-left: -20px;
}
 .chat-bubble--right:after {
	 right: 0;
	 border-left-color: #5e72e4;
	 border-right: 0;
	 margin-right: -20px;
}
 @keyframes fadeIn {
	 0% {
		 opacity: 0;
	}
	 100% {
		 opacity: 1;
	}
}
 .offset-md-9 .chat-bubble {
	 background: #5e72e4;
	 color: #fff;
}
 .chat-box-tray {
	 background: #eee;
	 display: flex;
	 align-items: baseline;
	 padding: 10px 15px;
	 align-items: center;
	 margin-top: 19px;
	 bottom: 0;
}
 .chat-box-tray input {
	 margin: 0 10px;
	 padding: 6px 2px;
}
 .chat-box-tray i {
	 color: grey;
	 font-size: 30px;
	 vertical-align: middle;
}
 .chat-box-tray i:last-of-type {
	 margin-left: 25px;
}

.activeuser {
	 background: #5e72e4;
	 cursor: pointer;
}
.activeuser p, .activeuser h6, .activeuser .time {
	 color: #fff !important;
}

.messagediv::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	background-color: #F5F5F5;
}

.messagediv::-webkit-scrollbar
{
	width: 8px;
	background-color: #F5F5F5;
}

.messagediv::-webkit-scrollbar-thumb
{
	background-color: #555555;
	border: 2px solid #555555;
}

    </style>
@endsection
