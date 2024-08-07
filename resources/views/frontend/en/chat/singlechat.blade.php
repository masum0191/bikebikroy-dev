@extends('layouts.frontend')
@section('page-style')
<link href="{{asset('assets/css/lightbox.min.css')}}" rel="stylesheet" type="text/css">
<style>
     #social-links {
        display: inline-block;

    }


    #social-links ul {
        margin-bottom: 0 !important;
        padding-left: 0 !important;
        margin-right: 10px;
    }

    #social-links ul li {
        list-style: none;
    }

    #social-links ul li a span {
        font-size: 22px;
        color: #fff;
    }

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
                  <div class="name">Zahid Vai</div>
              </div>
              <ul class="bar_tool">

                  <li><span class="alink"><i class="fas fa-ellipsis-v"></i></span></li>
              </ul>
          </div>
          <div class="body chat-body">
              <div class="incoming">
                  <div class="bubble">
                      <p class="mb-0">Hi...</p>
                  </div> <br>
                  <div class="bubble">
                      <p class="mb-0">How r u?</p>
                  </div>
              </div>
              <div class="outgoing">
                  <div class="bubble lower">
                      <p class="mb-0">I'm fine</p>
                  </div> <br>
                  <div class="bubble">
                      <p class="mb-0">You?</p>
                  </div>
              </div>
                  <div class="incoming">
                  <div class="bubble">
                      <p class="mb-0">Hi...</p>
                  </div> <br>
                  <div class="bubble">
                      <p class="mb-0">How r u?</p>
                  </div>
              </div>
              <div class="outgoing">
                  <div class="bubble lower">
                      <p class="mb-0">I'm fine</p>
                  </div> <br>
                  <div class="bubble">
                      <p class="mb-0">You?</p>
                  </div>
              </div>
                  <div class="incoming">
                  <div class="bubble">
                      <p class="mb-0">Hi...</p>
                  </div> <br>
                  <div class="bubble">
                      <p class="mb-0">How r u?</p>
                  </div>
              </div>
              <div class="outgoing">
                  <div class="bubble lower">
                      <p class="mb-0">I'm fine</p>
                  </div> <br>
                  <div class="bubble">
                      <p class="mb-0">You?</p>
                  </div>
              </div>
                  <div class="incoming">
                  <div class="bubble">
                      <p class="mb-0">Hi...</p>
                  </div> <br>
                  <div class="bubble">
                      <p class="mb-0">How r u?</p>
                  </div>
              </div>
              <div class="outgoing">
                  <div class="bubble lower">
                      <p class="mb-0">I'm fine</p>
                  </div> <br>
                  <div class="bubble">
                      <p class="mb-0">You?</p>
                  </div>
              </div>
              <div class="typing">
                  <div class="bubble">
                      <div class="ellipsis dot_1"></div>
                      <div class="ellipsis dot_2"></div>
                      <div class="ellipsis dot_3"></div>
                  </div>
              </div>
          </div>
          <div class="foot">
              <input type="text" class="msg" placeholder="Type a message..." />
              <button type="submit"><i class="fas fa-paper-plane"></i></button>
          </div>
      </div>
        </div>
    </div>
</section>

  <section id="quick-link">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <p class="category-tittle mb-0">
                      Quick links
                  </p>
              </div>
          </div>
          <div class="row">
              <div class="col-md-3">
                  <div class="ql-card">
                      <h3 class="ql-head">
                          63,209 ads in Electronics
                      </h3>
                      <a href="#">Computers</a>|<a href="#">Laptops</a>|<a href="#">TVs</a>|<a href="#">Cameras, Camcorders & Accessories</a>|<a href="#">Desktop Computers</a>|<a href="#">Audio & Sound Systems</a>
                  </div>
              </div>
              <div class="col-md-3">
                  <div class="ql-card">
                      <h3 class="ql-head">
                          63,209 ads in Electronics
                      </h3>
                      <a href="#">Computers</a>|<a href="#">Laptops</a>|<a href="#">TVs</a>|<a href="#">Cameras, Camcorders & Accessories</a>|<a href="#">Desktop Computers</a>|<a href="#">Audio & Sound Systems</a>
                  </div>
              </div>
              <div class="col-md-3">
                  <div class="ql-card">
                      <h3 class="ql-head">
                          63,209 ads in Electronics
                      </h3>
                      <a href="#">Computers</a>|<a href="#">Laptops</a>|<a href="#">TVs</a>|<a href="#">Cameras, Camcorders & Accessories</a>|<a href="#">Desktop Computers</a>|<a href="#">Audio & Sound Systems</a>
                  </div>
              </div>
              <div class="col-md-3">
                  <div class="ql-card">
                      <h3 class="ql-head">
                          63,209 ads in Electronics
                      </h3>
                      <a href="#">Computers</a>|<a href="#">Laptops</a>|<a href="#">TVs</a>|<a href="#">Cameras, Camcorders & Accessories</a>|<a href="#">Desktop Computers</a>|<a href="#">Audio & Sound Systems</a>
                  </div>
              </div>
          </div>
      </div>
  </section>

@endsection
@section('page-script')
<script src="{{asset('assets/js/lightbox.min.js')}}"></script>
<script>
      $(document).ready(function () {
       $('#Hidephone').click(function(){
        $('#Hidephone').addClass('d-none');
        $('#Showphone').removeClass('d-none');
       });

});


</script>
@endsection

