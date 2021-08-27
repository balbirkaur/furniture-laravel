@extends('layouts.frontendhome')
@section('title')
Furniture
@endsection
@section('frontcss')
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/owl-carousel/animate.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/owl-carousel/owl.carousel.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/owl-carousel/owl.theme.default.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/revolution/settings.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/revolution/navigation.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/revolution/layers.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/lightbox2/src/css/lightbox.css') }}" />
@endsection


@section('content')

<!-- Slider -->
<section class="slide">
    <!-- Header Desktop -->
    @include('layouts/inc/desktopnavbar')
    <!-- End Header Desktop -->
    <!-- revolution slider begin -->
    @include('layouts/inc/homeslider')

    <!-- revolution slider end -->
    <!-- Service -->
    @include('layouts/inc/home/homeservices')
    <!-- End service -->
</section>
<!-- End Slider -->
<!-- Our process -->
@include('layouts/inc/home/homeprocess')

<!-- End our process -->
<!-- Menu Canvas -->
<div id="menu-canvas" class="menu-canvas--hidden">
    <div class="menu-canvas__inner">
        <div class="close-menu-canvas">
            <i class="zmdi zmdi-close" id="btn-close"></i>
        </div>
        <h1 class="logo">
            <a href="{{ url('/') }}">
                <img alt="Logo" src="{{ url('img/logo-white.png') }}" />
            </a>
        </h1>

        <div class="menu-canvas-slide">
            <div class="menu-canvas__image">
                <div id="sync1" class="owl-carousel owl-theme">
                    <div class="item">
                        <img alt="Product 1" src="{{ url('img/item-menu-canvas-01.jpg') }}" />
                    </div>
                    <div class="item">
                        <img alt="Product 2" src="{{ url('img/item-menu-canvas-02.jpg') }}" />
                    </div>
                </div>
            </div>

            <div id="sync2" class="owl-carousel owl-theme">
                <p class="item menu-canvas__detail">
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                    accusantium doloremque la udantium
                </p>
                <p class="item menu-canvas__detail">
                    Loren son perspiciatis unde omgi iste natus error sit voluptmen
                    accusantium doloremque la udantium
                </p>
            </div>
        </div>
        <div class="social">
            <a href="" class="social__item">
                <i class="zmdi zmdi-facebook"></i>
            </a>
            <a href="" class="social__item">
                <i class="zmdi zmdi-dribbble"></i>
            </a>
            <a href="" class="social__item">
                <i class="zmdi zmdi-google"></i>
            </a>
            <a href="" class="social__item">
                <i class="zmdi zmdi-twitter"></i>
            </a>
            <a href="" class="social__item">
                <i class="zmdi zmdi-instagram"></i>
            </a>
        </div>
    </div>
</div>
<!-- End Menu Canvas -->
<!-- Latest Project -->
@include('layouts/inc/home/homeproject')

<!-- End Latest Prject -->

<!-- blog -->
<section class="blog blog-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="title title-3">Ideas & Inspirations</h2>
            </div>
        </div>
        <div class="row">
            @foreach($data['blogs'] as $key =>$blogdata)
            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="blog-item blog-item-3">
                    <div class="img-blog img-blog-3">
                        <a href="{{ url('/inspirations/'.$blogdata->id) }}">
                            <img alt="blog 1" src="{{ url("uploads/blog/",$blogdata['blogpic']) }}" />
                        </a>
                        <div class="date--blog3">
                            <p class="date--blog3__inner">
                                <span class="day">{{date("d", strtotime($blogdata['created_at']))}}</span>
                                <span class="month">{{date("M", strtotime($blogdata['created_at']))}}</span>
                            </p>
                        </div>
                    </div>
                    <div class="blog-content">
                        <h4 class="blog-title m-b-20">
                            <a href="{{ url('/inspirations/'.$blogdata->id) }}" class="sbold">
                                {{$blogdata['title']}}
                            </a>
                        </h4>
                        <p>
                            {!!$blogdata['excerpt']!!} ....
                        </p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<!-- End blog -->
<!-- Contact -->
<section class="contact">
    <div class="parallax parallax--contact">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="contact__inner clearfix">
                        <p class="contact__content">
                            {!!$data['homesettings'][0]->contact_text!!}
                        </p>

                    </div>
                </div>
                <div class="col-md-3"> <a href="{{ url('/contact') }}"
                        class="au-btn au-btn--big au-btn--pill au-btn--dark">Contact
                        Now</a></div>
            </div>
        </div>
    </div>
</section>
<!-- End Contact -->
@endsection
@section('frontjs')
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
<script type="text/javascript" src="{{ asset('vendor/revolution/local/revolution.extension.carousel.min.js') }}">
</script>
<script type="text/javascript" src="{{ asset('vendor/revolution/local/revolution.extension.kenburn.min.js') }}">
</script>
<script type="text/javascript" src="{{ asset('vendor/revolution/local/revolution.extension.layeranimation.min.js') }}">
</script>
<script type="text/javascript" src="{{ asset('vendor/revolution/local/revolution.extension.navigation.min.js') }}">
</script>
<script type="text/javascript" src="{{ asset('vendor/revolution/local/revolution.extension.parallax.min.js') }}">
</script>
<script type="text/javascript" src="{{ asset('vendor/revolution/local/revolution.extension.slideanims.min.js') }}">
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

@endsection
@section('frontjs')
@endsection
@section('frontmainjs')
<script type="text/javascript" src="{{ asset('js/revo-custom.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/wow-custom.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/count.js') }}"></script>
@endsection
