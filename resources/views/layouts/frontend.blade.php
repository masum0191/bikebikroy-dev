<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Seo Data -->
    {!! SEO::generate() !!}
    <!-- CSRF Token -->

    <link rel="icon" sizes="512x512" href="{{asset('assets/images/favicon.png')}}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'BikeBikroy - Best Motorcycle Marketplace in Bangladesh') }}</title>
    <link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    
  <link rel="stylesheet" type="text/css" href="{{asset('product/zoom/xzoom.css')}}" media="all" /> 
  <!--<link rel="stylesheet" href="{{asset('product/css/foundation.css')}}" />-->
      <!--<link rel="stylesheet" href="{{asset('product/css/normalize.css')}}" />-->
   
    <!--<link rel="stylesheet" href="{{asset('product/css/demo.css')}}" />-->
  <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  <!--<link type="text/css" rel="stylesheet" media="all" href="{{asset('product/fancybox/source/jquery.fancybox.css')}}" />-->
  <link type="text/css" rel="stylesheet" media="all" href="{{asset('product/magnific-popup/css/magnific-popup.css')}}" />
    @yield('page-style')
    <style>
        #magnific .large-7.column {
    text-align: center;
    background:#cccccc;
}
.xzoom-container .xzoom5 {
    margin-top:20px;
}
    </style>
    <!--Whatsapp-->
<script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
<div class="elfsight-app-955f909a-6cbe-4edd-b841-4a9239a4bd35" data-elfsight-app-lazy></div>
</head>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-5820SH96W4"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-5820SH96W4'); 
</script>

<body>
    <section id="menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand py-0 me-0" href="{{url('/')}}">

                   <img src="{{asset('assets/images/bikebikroy-logo-1.png')}}" alt="bikebikroy" class="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                      <ul class="ps-0 me-auto mb-0 logo-side">

                    <li class="">
                        <a  href="{{url('bikesale')}}">All Ads</a>
                    </li>
                    <li class="{{url('/bn')}}">
                        <button>বাংলা</button>
                    </li>

                </ul>
                    <ul class="navbar-nav ms-auto">

                        <!--<li class="nav-item">-->
                        <!--    <a class="nav-link" href="{{url('/user/chats')}}"><i class="fas fa-comments"></i> Chat</a>-->
                        <!--</li>-->
                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="/user/dashboard">Dashboard</a>
                        </li>
                            @endauth
                            @guest

                            <li class="nav-item">
                                <a class="nav-link" href="{{url('login')}}"> <i class="fas fa-user"></i> Login</a>
                            </li>
                                @endguest

                        <li class="nav-item">
                            <button class="post-ur-ad" id="Posting">POST YOUR AD</button>
                             @auth
                            <button class="post-ur-ad" id="PostingQuickuser">POST QUICK AD</button>
                            @endauth
                            @guest
                            <button class="post-ur-ad" id="Postingguest">POST QUICK AD</button>
                            @endguest
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </section>


      @yield('content')





      <section id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="footer-menu">
                        <p>
                            Our Address
                        </p>
                        <p style="font-weight: 400;">
                            210/2, Elephant Road, <br>
                            Dhaka - 1205
                        </p>

                        <p>
                            Connect with
                        </p>
                        <span class="contact-facebook">
                            <a href="https://www.facebook.com/BikeBikroyBD"><i class="fab fa-facebook-square"></i> Like us on facebook</a>
                        </span>

                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="footer-menu">
                                <p>
                                    More from Us
                                </p>
                                <ul class="ps-0">
                                    <li><a href="#">Sell Fast</a></li>
                                    <li><a href="#">Doorstep Delivery</a></li>
                                    <li><a href="#">Membership</a></li>
                                    <li><a href="#">Banner Ads</a></li>
                                    <li><a href="#">Ad Promotions</a></li>
                                    <li><a href="#">Staffing solutions</a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="footer-menu">
                                <p>
                                    Help & Support
                                </p>
                                <ul class="ps-0">
                                    <li><a href="#">FAQ</a></li>
                                    <li><a href="#">Stay safe</a></li>
                                    <li><a href="#">Contact Us</a></li>


                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="footer-menu">
                                <p>
                                    Follow Us
                                </p>
                                <ul class="ps-0">
                                    <li><a href="#">Blog</a></li>
                                    <li><a href="#">Facebook</a></li>
                                    <li><a href="#">Twitter</a></li>
                                    <li><a href="#">Youtube</a></li>


                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="footer-menu">
                                <p>
                                    About Us
                                </p>
                                <ul class="ps-0">
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Careers</a></li>
                                    <li><a href="#">Terms and Conditions</a></li>
                                    <li><a href="#">Privacy policy</a></li>
                                    <li><a href="#">Sitemap</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copy-right">
                <div class="row">
                    <div class="col-md-6">
                        <p class="mb-0">
                            &copy; <?php echo date("Y"); ?>, BikeBikroy.Com, All Rights Reserved
                        </p>
                    </div>
                    <div class="col-md-6 bkbkry-logo-copy">

                    </div>
                </div>
            </div>
        </div>
    </section>

<!--flash notification-->
@flasher_render
 <!--<script src="{{asset('product/js/vendor/modernizr.js')}}"></script>-->
    <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    {{-- <script src="{{asset('assets/js/custom.js')}}"></script> --}}
     <script type="text/javascript" src="{{asset('product/magnific-popup/js/magnific-popup.js')}}"></script>
    <script type="text/javascript" src="{{asset('product/zoom/xzoom.min.js')}}"></script>
   
   
    
   
    <!--<script src="{{asset('product/js/foundation.min.js')}}"></script>-->
    <script src="{{asset('product/js/setup.js')}}"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <script type="text/javascript">
    
        // alert(55);
        $('.js-example-basic-single').select2();

                var url = "{{URL::to('/')}}";
                $.ajaxSetup({
                              headers: {
                                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                              }
                          });

             $(document).ready(function () {
                 $('#Posting').click(function() {
                    window.location.href = url+'/user/addposting';
             });
             $('#PostingQuickuser').click(function() {
                    window.location.href = url+'/user/quick-sale';
             });
             $('#Postingguest').click(function() {
                    window.location.href = url+'/quick-ads';
             });
             });
              </script>
              <script>
  $(document).ready(function() {
    $('#selectOption').change(function() {
      var selectedOption = $(this).val();
      //alert(selectedOption);
      window.location.href = '/price/'+selectedOption;
    });
$("#load").click(function(){
  $("#load").hide();
});
  });
</script>
                @yield('page-script')
        </body>
        </html>