 @extends('layouts.frontend')
@section('page-style')
<style>
    #message{
        height:130px;
    }
</style>
@endsection

@section('content')
 <div class="main-content">

  

        <section id="most-popular">

            <div class="container">
                <div class="main-most-popular">
                    <h2 class="browse-bikes-head">
                        Contact Us

                    </h2>

                    <div class="main-most-popular-bikebikroy box-without-tab">
                        <div class="contact-box">
                            @include('partial.formerror')
                           
                            <div class="row">
                                <div class="col-md-6">
                                    {!! Form::open(array('url' => 'contact','method'=>'POST')) !!}
                                   
                                    <div class="form-floating mb-3">
                                        {!!Form::text('name',null, array('id'=>'name','required','class'=>'form-control'))!!}
                                        @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                                        <label for="name">Name *</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                         {!!Form::email('email',null, array('id'=>'email','required','class'=>'form-control'))!!}
                                        @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                                        <label for="email">Email Address *</label>
                                    </div>
                                     <div class="form-floating mb-3">
                                         {!!Form::text('subject',null, array('id'=>'subject','class'=>'form-control'))!!}
                                        @if ($errors->has('subject')) <p class="help-block">{{ $errors->first('subject') }}</p> @endif
                                        <label for="subject">Subject</label>
                                    </div>
                                   
                                    <div class="form-floating mb-3">
                                        {!!Form::textarea('message',null, array('id'=>'message','required','class'=>'form-control'))!!}
                                        <label for="message">Message</label>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    {!! Form::close() !!}

                                </div>
                                <div class="col-md-6">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d233667.82238876776!2d90.2792362344559!3d23.78088745825361!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2z4Kai4Ka-4KaV4Ka-!5e0!3m2!1sbn!2sbd!4v1645670187513!5m2!1sbn!2sbd" width="600" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                <div class="address">
                                    <h3 class="mb-0">
                                        Office Address
                                    </h3>
                                    <p class="mb-0">
                                       Dhaka – Bangladesh
                                    </p>
                                    
                                    <div><strong>Email:</strong> <a href="mailto:admin@bikebikroy.com">admin@bikebikroy.com</a></div>
                                  
                                </div>

                                </div>
                            </div>

                        </div>

                    </div>


                </div>
            </div>

        </section>

        <!--    contact-->

<!-- Messenger Chat plugin Code -->
<div id="fb-root"></div>

<!-- Your Chat plugin code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>


    </div>
    @endsection
    @section('page-script')
  
    <script>
        $(document).ready(function () {
            var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "102392852423371");
        chatbox.setAttribute("attribution", "biz_inbox");
            window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v13.0'
          });
        };
      
        (function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
            });
        </script>
     @endsection