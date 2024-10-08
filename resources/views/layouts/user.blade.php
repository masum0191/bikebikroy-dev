<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Seo Data -->
    <title>@yield('title')</title>
    <!-- CSRF Token -->
    <style>
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 36px;
        }

        span.select2.select2-container.select2-container--default.select2-container--focus {
            height: 100%;
        }

        .selection {
            height: 100%;
        }

        .select2-container--default .select2-selection--single {
            height: 100%;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            height: 100%;
        }
    </style>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BikeBikroy') }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @yield('page-style')
</head>

<body>
    <section id="menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand py-0 me-0" href="{{ url('/') }}">
                    <img src="{{ asset('assets/images/bikebikroy-logo-1.png') }}" alt="" class="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="ps-0 me-auto mb-0 logo-side">

                        <li class="">
                            <a class="" href="{{ url('/bikesale') }}">All Ads</a>
                        </li>
                        <!--<li class="{{ url('/bn') }}">-->
                        <!--    <button>বাংলা</button>-->
                        <!--</li>-->

                    </ul>
                    <ul class="navbar-nav ms-auto">

                        <!--<li class="nav-item">-->
                        <!--    <a class="nav-link" href="{{ url('user/chats') }}"><i class="fas fa-comments"></i> Chat</a>-->
                        <!--</li>-->
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="/user/dashboard">Dashboard</a>
                            </li>
                        @endauth
                        @guest

                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('login') }}"> <i class="fas fa-user"></i> Login</a>
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
                            <a href="#"><i class="fab fa-facebook-square"></i> Like us on facebook</a>
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
                                    <li><a href="{{ url('user/membership') }}">Membership</a></li>
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
                            &copy; 2021, BikeBikroy.Com, All Rights Reserved
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

    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    {{-- <script src="{{asset('assets/js/custom.js')}}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script type="text/javascript">
        // alert(55);

        $('.js-example-basic-single').select2();
        var url = "{{ URL::to('/') }}";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            $('#Posting').click(function() {
                window.location.href = url + '/user/addposting';
            });
            $('#PostingQuickuser').click(function() {
                window.location.href = url + '/user/quick-sale';
            });
            $('#Postingguest').click(function() {
                window.location.href = url + '/quick-ads';
            });
        });
    </script>
    @yield('page-script')
</body>

</html>
