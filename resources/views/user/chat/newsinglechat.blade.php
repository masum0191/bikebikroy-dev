@extends('layouts.user')
@section('page-style')
<style>

    </style>
@endsection
@section('content')
<section id="chat-section">
    <div class="container">
        <div class="main-chat">
            <div class="chat_box">
          <div class="head">
              <div class="user">
                  <div class="avatar">
                      <img src="https://picsum.photos/g/40/40" />
                  </div>
                  <div class="name">{{Auth::user()->fullname}}</div>
              </div>
              <ul class="bar_tool">

                  <li><span class="alink"><i class="fas fa-ellipsis-v"></i></span></li>
              </ul>
          </div>
          <div class="body chat-body">
              @foreach (@$Chatinfo as $chat)

             @if (Auth::id() !==@$chat->user_id)
              <div class="incoming">
                <div class="bubble">
                    <p class="mb-0" title="{{@$chat->messageby}}">{{@$chat->message}}</p>
                </div> <br>
            </div>

           @else
              <div class="outgoing">
                  <div class="bubble">
                      <p class="mb-0" title="{{@$chat->messageby}}">{{@$chat->message}}</p>
                  </div> <br>
              </div>

              @endif
              @if($loop->first)

              <input type="hidden" id="chatuser_id" value="{{@$chat->chatuser_id}}">
              @else
              <input type="hidden" id="chatuser_id" value="{{@$chat->chatuser_id}}">

               @endif
              @endforeach


          <div class="foot">
            <input type="text" placeholder="Type message here.." class="form-control message mb-0" id="message">
                <button type="button" id="Reply" ><i class="fas fa-paper-plane"></i></button>
          </div>
      </div>
        </div>
    </div>
</section>



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

                    url: url + '/user/newtext',
                    method: "POST",
                    type: "POST",
                    data: {
                        message: $("#message").val(),
                        id: $("#chatuser_id").val(),
                    },
                    success: function(d) {

                        if (d) {
                            $("#message").focus();
                          location.reload();

                        } else {
                            $.each(d.errors, function(key, value) {
                                $("#collection").focus();
                                toastr.warning(value);
                            });
                        }

                    },
                    error: function(d) {

                        alert('Message Not Send');
                    }
                });

  }
});
        $("#Reply").on('click', function() {
                   if ($("#message").val() == '') {
                  alert('Please Type some Text');
                    $("#message").focus();
                    return false;

                }
                $.ajax({

                    url: url + '/user/newtext',
                    method: "POST",
                    type: "POST",
                    data: {
                        message: $("#message").val(),
                        id: $("#chatuser_id").val(),
                    },
                    success: function(d) {

                        if (d) {
                            $("#message").focus();
                             location.reload();

                        } else {
                            $.each(d.errors, function(key, value) {
                                $("#collection").focus();
                                toastr.warning(value);
                            });
                        }

                    },
                    error: function(d) {

                        alert('Message Not Send');
                    }
                });

            });


});


</script>
@endsection

