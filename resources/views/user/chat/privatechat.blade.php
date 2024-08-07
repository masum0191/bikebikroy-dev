@extends('layouts.user')
@section('title','Private Chat')
@section('page-style')

<style>


    </style>
@endsection
@section('content')

    <!-- Content wrapper start -->
    <div class="content-wrapper">

        <!-- Row start -->
        <div class="row gutters">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                <div class="card m-0">

                    <!-- Row start -->
                    <div class="row no-gutters">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-3">
                            <div class="users-container">
                                <div class="chat-search-box">
                                    <div class="input-group">
                                        <input class="form-control" placeholder="Search">
                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-info">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <ul class="users chat-users">
                                    @foreach (@$Chatinfo  as $chats)
                                    @if (Auth::id()!=$chats->user_id)
                                  <li class="person" data-chat="person{{$loop->index}}">
                                        <a href="{{url('user/privatechat/'.$chats->user_id)}}">
                                            @php
                                            $userinfos=\App\Models\User::select('photo','path','fullname')->find(@$chats->user_id);
                                                  @endphp

                                        <div class="user">
                                            <img src="{{url('storage/app/files/shares/uploads/'.@$userinfos->path.'/'.@$userinfos->photo)}}" alt="no photo">
                                            <span class="status busy"></span>
                                        </div>
                                        <p class="name-time">
                                            <span class="name">{{@$userinfos->fullname}}</span>
                                           </p>
                                        </a>
                                    </li>
                                    @else
                                    <li class="person" data-chat="person{{$loop->index}}">
                                        <a href="{{url('user/privatechat/'.$chats->chatuser_id)}}">
                                            @php
                                            $userinfos=\App\Models\User::select('photo','path','fullname')->find(@$chats->chatuser_id);
                                                  @endphp

                                        <div class="user">
                                            <img src="{{url('storage/app/files/shares/uploads/'.@$userinfos->path.'/'.@$userinfos->photo)}}" alt="no photo">
                                            <span class="status busy"></span>
                                        </div>
                                        <p class="name-time">
                                            <span class="name">{{@$userinfos->fullname}}</span>
                                           </p>
                                        </a>
                                    </li>
                                    @endif
                                   
                                    @endforeach

                                </ul>
                            </div>
                        </div>

                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-9 col-9">
                       <div class="chat-container">
                                <ul class="chat-box chatContainerScroll">
                                    @foreach (@$AllChats as $chat)
                                    @if (Auth::id() !==@$chat->user_id)
                                    <li class="chat-left">
                                        <div class="chat-avatar">
                                         @php
                                       $userinfo=\App\Models\User::select('photo','path')->find(@$chat->user_id);
                                             @endphp
                                             <img src="{{url('storage/app/files/shares/uploads/'.@$userinfo->path.'/'.@$userinfo->photo)}}" alt="Retail Admin">
                                            <div class="chat-name">{{@$chat->messageby}}</div>
                                        </div>
                                        <div class="chat-text">{{$chat->message}}</div>
                                        <div class="chat-hour">{{ \Carbon\Carbon::parse($chat->created_at)->diffForHumans() }} <span class="fa fa-check-circle"></span></div>
                                    </li>
                                    @else
                                    <li class="chat-right">
                                        <div class="chat-hour">{{ \Carbon\Carbon::parse($chat->created_at)->diffForHumans() }} <span class="fa fa-check-circle"></span></div>
                                        <div class="chat-text">{{$chat->message}}</div>
                                        <div class="chat-avatar">
                                            <img src="{{url('storage/app/files/shares/uploads/'.@Auth::user()->path.'/'.@Auth::user()->photo)}}" alt="Retail Admin">
                                            <div class="chat-name">{{@$chat->messageby}}</div>
                                        </div>
                                    </li>
                                    @endif
                                    @endforeach

                                </ul>
                                <div class="form-group mt-3 mb-0">
                                    <textarea class="form-control"  id="message" rows="1" placeholder="Type your message here..."></textarea>
                                </div>
                               {{-- <div class="send-btn mt-2 text-end">
                                    <button type="button" class="btn btn-primary" id="Reply">Send</button>
                               </div> --}}
                            </div> 
                        </div>

                    </div>
                    <!-- Row end -->
                </div>

            </div>

        </div>
        <!-- Row end -->

    </div>

@endsection
@section('page-script')
<script>
         $(document).ready(function () {
              $("#message").focus();
        $('#message').keypress((e) => {
    if (e.which === 13) {
    if ($("#message").val() == '') {
                  alert('Please Type some Text');
                    $("#message").focus();
                    return false;

                }
                $.ajax({

                    url: url + '/user/chattext',
                    method: "POST",
                    type: "POST",
                    data: {
                        message: $("#message").val(),
                        chatuser_id: '{{Request::segment(3)}}',
                    },
                    success: function(d) {

                        if (d) {
                            $("#message").focus();
                           location.reload();

                        } else {
                            $.each(d.errors, function(key, value) {
                               cosole.log(value)
                            });
                        }

                    },
                    error: function(d) {

                        alert('Message Not Send');
                    }
                });

  }
});
      
});


</script>
@endsection

