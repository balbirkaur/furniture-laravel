<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('title')</title>
    <!-- ================== Font =================== -->
    <link rel="stylesheet" type="text/css" href="{{ asset('font/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('font/mdi-font/css/material-design-iconic-font.min.css') }}" />
    <!-- ================== Vendor CSS =================== -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap4/bootstrap.min.css') }}" />
    @yield('frontcss')
    <!-- Main CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
</head>

<body>
    <!-- Page Loader -->
    <!--   <div id="page-loader">
        <div class="page-loader__inner">
            <div class="page-loader__spin"></div>
        </div>
    </div>-->
    <!-- End Page Loader -->


    <body class="box">

        <!-- End Page Loader -->
        <!-- Page Wrap -->
        <div class="page-wrap">
            @include('layouts.inc.headerstick')
            @include('layouts.inc.mobilenavbar')
            @include('layouts.inc.topcontact')

            @yield('content')
            <!-- Footer -->
            <footer class="footer-3">
                <div class="section-content section-content--w1140">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <h2 class="logo-footer">
                                    <a href="{{ url('/') }}">
                                        <img alt="Logo" src="{{ url('img/logo-white.png') }}" />
                                    </a>
                                </h2>
                                <p>
                                    {{$data['settings'][0]->footer_text }}


                                </p>
                                <h5 class="title-footer">FOLLOW US</h5>
                                <div class="social-footer">
                                    @if(!empty($data['settings'][0]->facebook_link))
                                    <a href="{{$data['settings'][0]->facebook_link }}" target="_blank">
                                        <i class="zmdi zmdi-facebook"></i>
                                    </a>
                                    @endif
                                    @if(!empty($data['settings'][0]->instagram_link))
                                    <a href="{{$data['settings'][0]->instagram_link }}" target="_blank">
                                        <i class="zmdi zmdi-instagram"></i>
                                    </a>
                                    @endif
                                    @if(!empty($data['settings'][0]->dribble_link))
                                    <a href="{{$data['settings'][0]->dribble_link }}" target="_blank">
                                        <i class="zmdi zmdi-dribbble"></i>
                                    </a>
                                    @endif
                                    @if(!empty($data['settings'][0]->google_link))
                                    <a href="{{$data['settings'][0]->google_link }}" target="_blank">
                                        <i class="zmdi zmdi-google"></i>
                                    </a>
                                    @endif
                                    @if(!empty($data['settings'][0]->twitter_link))
                                    <a href="{{$data['settings'][0]->twitter_link }}" target="_blank">
                                        <i class="zmdi zmdi-twitter"></i>
                                    </a>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <h5 class="title-footer m-b-26">contact info</h5>
                                @if(!empty($data['settings'][0]->footer_address ))
                                <p class="con__item">
                                    {{$data['settings'][0]->footer_address}}
                                </p>
                                @endif
                                @if(!empty($data['settings'][0]->footer_phone ))
                                <p class="con__item">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    {{$data['settings'][0]->footer_phone}}
                                </p>
                                @endif
                                @if(!empty($data['settings'][0]->footer_email ))
                                <p class="con__item">
                                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                    {{$data['settings'][0]->footer_email}}
                                </p>
                                @endif
                                @if(!empty($data['settings'][0]->footer_opening_hours ))
                                <p class="con__item">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    {{$data['settings'][0]->footer_opening_hours}}
                                </p>
                                @endif
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <h5 class="title-footer m-b-30">from gallery</h5>
                                <div class="gallery clearfix">
                                    <div class="gallery__item">
                                        <img alt="Gallery 1" src="img/gallery-01.jpg" />
                                        <a href="" class="pro-link">
                                            <div class="overlay overlay--invisible overlay--yellow"></div>
                                        </a>
                                    </div>
                                    <div class="gallery__item">
                                        <img alt="Gallery 2" src="img/gallery-02.jpg" />
                                        <a href="" class="pro-link">
                                            <div class="overlay overlay--invisible overlay--yellow"></div>
                                        </a>
                                    </div>
                                    <div class="gallery__item">
                                        <img alt="Gallery 3" src="img/gallery-03.jpg" />
                                        <a href="" class="pro-link">
                                            <div class="overlay overlay--invisible overlay--yellow"></div>
                                        </a>
                                    </div>
                                    <div class="gallery__item">
                                        <img alt="Gallery 4" src="img/gallery-04.jpg" />
                                        <a href="" class="pro-link">
                                            <div class="overlay overlay--invisible overlay--yellow"></div>
                                        </a>
                                    </div>
                                    <div class="gallery__item">
                                        <img alt="Gallery 5" src="img/gallery-05.jpg" />
                                        <a href="" class="pro-link">
                                            <div class="overlay overlay--invisible overlay--yellow"></div>
                                        </a>
                                    </div>
                                    <div class="gallery__item">
                                        <img alt="Gallery 6" src="img/gallery-06.jpg" />
                                        <a href="" class="pro-link">
                                            <div class="overlay overlay--invisible overlay--yellow"></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Copyright -->
                        <div class="copyright-2">
                            <div>
                                Copyright &copy; 2020
                                <span>Newvo Custome</span>. All rights reserved.
                            </div>
                        </div>
                        <!-- End Copyright -->
                    </div>
                </div>
            </footer>
            <!-- End Footer -->

            <!-- Back to top -->
            <a href="" id="btn-to-top">
                <i class="fa fa-chevron-up"></i>
            </a>
            <!-- End Back to top -->
        </div>
        <!-- End Page Wrap -->
        <!-- =================== PLUGIN JS ==================== -->
        <script src="{{ asset('vendor/jquery-3.5.1.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('vendor/wow/wow.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('vendor/bootstrap4/popper.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('vendor/bootstrap4/bootstrap.min.js') }}" type="text/javascript"></script>

        <script src="{{ asset('vendor/counter-up/jquery.waypoints.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('vendor/counter-up/jquery.counterup.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('vendor/lightbox2/src/js/lightbox.js') }}" type="text/javascript"></script>
        <script src="{{ asset('vendor/owl-carousel/owl.carousel.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('vendor/revolution/jquery.themepunch.revolution.min.js') }}" type="text/javascript">
        </script>
        <script src="{{ asset('vendor/revolution/jquery.themepunch.tools.min.js') }}" type="text/javascript">
        </script>
        <!-- Local Revolution -->
        <!-- <script type="text/javascript" src="{{ asset('vendor/revolution/local/revolution.extension.migration.min.js') }}"></script> -->
        <script type="text/javascript" src="{{ asset('vendor/revolution/local/revolution.extension.actions.min.js') }}">
        </script>
        <script type="text/javascript"
            src="{{ asset('vendor/revolution/local/revolution.extension.carousel.min.js') }}">
        </script>
        <script type="text/javascript" src="{{ asset('vendor/revolution/local/revolution.extension.kenburn.min.js') }}">
        </script>
        <script type="text/javascript"
            src="{{ asset('vendor/revolution/local/revolution.extension.layeranimation.min.js') }}">
        </script>
        <script type="text/javascript"
            src="{{ asset('vendor/revolution/local/revolution.extension.navigation.min.js') }}">
        </script>
        <script type="text/javascript"
            src="{{ asset('vendor/revolution/local/revolution.extension.parallax.min.js') }}">
        </script>
        <script type="text/javascript"
            src="{{ asset('vendor/revolution/local/revolution.extension.slideanims.min.js') }}">
        </script>
        <script type="text/javascript" src="{{ asset('vendor/revolution/local/revolution.extension.video.min.js') }}">
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
         lightbox.option({
         resizeDuration: 200,
         wrapAround: false,
         alwaysShowNavOnTouchDevices: true,
         });
     });
        </script>
        <!-- =================== CUSTOM JS ==================== -->
        <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/revo-custom.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/wow-custom.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/count.js') }}"></script>
    </body>

</html>
