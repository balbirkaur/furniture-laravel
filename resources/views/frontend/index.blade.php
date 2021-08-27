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
    @include('layouts.inc.desktopnavbar')
    <!-- revolution slider begin -->
    <div class="rev_slider_wrapper">
        <div id="revolution-slider3" class="rev_slider" data-version="5.4.5" style="display: none">
            <ul>
                @foreach($data['sliders'] as $key =>$sliderdata)
                <li @if ($key%2==0) data-transition="incube" @elseif ($key%3==0) data-transition="slidedown" @else
                    data-transition="fade" @endif data-slotamount="7" data-masterspeed="2000">
                    <!--  BACKGROUND IMAGE -->
                    <img src="{{ url("uploads/slider/",$sliderdata['sliderpic']) }}" alt="{{$sliderdata['title']}}" />
                    <div class="tp-caption" data-x="center" data-y="['300','190','190','160']" data-whitespace="no-wrap"
                        data-frames='[{"delay":0,"speed":4500,"frame":"0","from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'>
                        <div class="slide-title slide-title-3">
                            {!!$sliderdata['description']!!}
                            make your
                            <br />
                            dream <span class="sliderspan">workspace</span> now
                        </div>
                    </div>
                    <a href="{{url('/aboutus')}}"
                        class="tp-caption au-btn au-btn--big au-btn--pill au-btn--gray-1 au-btn--slide" data-x="center"
                        data-y="['466','350','350','280']"
                        data-frames='[{"delay":2200,"speed":1000,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'>
                        get a quote
                    </a>
                </li>
                @endforeach
                <li data-transition="incube" data-slotamount="7" data-masterspeed="2000">
                    <!--  BACKGROUND IMAGE -->
                    <img src="{{ url('img/slide-07.jpg') }}" alt="Slide 1" />
                    <div class="tp-caption" data-x="center" data-y="['300','190','190','160']" data-whitespace="no-wrap"
                        data-frames='[{"delay":1000,"speed":2500,"frame":"0","from":"y:bottom;rX:-20deg;rY:-20deg;rZ:0deg;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'>
                        <div class="slide-title slide-title-3">
                            make your
                            <br />
                            dream <span>workspace</span> now
                        </div>
                    </div>
                    <a href="{{url('/aboutus')}}"
                        class="tp-caption au-btn au-btn--big au-btn--pill au-btn--gray-1 au-btn--slide" data-x="center"
                        data-y="['466','350','350','280']"
                        data-frames='[{"delay":2200,"speed":1000,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'>
                        get a quote
                    </a>
                </li>
                <li data-transition="slidedown" data-slotamount="7" data-masterspeed="2000" data-delay="5000">
                    <!--  BACKGROUND IMAGE -->
                    <img src="{{ url('img/slide-08.jpg') }}" alt="Slide 1" />
                    <div class="tp-caption" data-x="center" data-y="['300','190','190','160']" data-whitespace="no-wrap"
                        data-frames='[{"delay":1600,"speed":1000,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'>
                        <div class="slide-title slide-title-3">
                            make your
                            <br />
                            dream <span>workspace</span> now
                        </div>
                    </div>
                    <a href="{{url('/aboutus')}}"
                        class="tp-caption au-btn au-btn--big au-btn--pill au-btn--gray-1 au-btn--slide" data-x="center"
                        data-y="['466','350','350','280']"
                        data-frames='[{"delay":2200,"speed":1000,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'>
                        get a quote
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- revolution slider end -->
    <!-- Service -->
    <section class="service">
        <div class="service-wrap">
            <div class="service__item service__intro" style="background-image: url('img/service-01.jpg')">
                <div class="service__item-inner">
                    <h3>
                        <span>Newvo Custom</span>
                        <br />
                        your best solution
                    </h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                        do eiusmod tempor.
                        <br />
                        Ut enim ad minim veniam, quis nostrud exercitat ullamco
                        laboris nisi ut aliquip ex ea com consequat realzonal.
                    </p>
                    <div>
                        <a href="{{url('/aboutus')}}"
                            class="au-btn au-btn--big au-btn--pill au-btn--white au-btn--border au-btn--big">See
                            more</a>
                    </div>
                </div>
            </div>
            <!-- end service intro -->
            <div class="service__item" style="background-image: url('img/service-02.jpg')">
                <div class="service__item-inner">
                    <span class="label--service white">AGENCY INTERIOR</span>
                </div>
            </div>
            <!-- end service item -->
            <div class="service__item" style="background-image: url('img/service-03.jpg')">
                <div class="service__item-inner">
                    <span class="label--service white">Large Office Interior</span>
                </div>
            </div>
            <!-- end service item -->
            <div class="service__item" style="background-image: url('img/service-04.jpg')">
                <div class="service__item-inner">
                    <span class="label--service white">Custom Office Interior</span>
                </div>
            </div>
            <!-- end service item -->
        </div>
    </section>
    <!-- End service -->
</section>
<!-- End Slider -->
<!-- Our process -->
<section class="our-process">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-12">
                <h2 class="title">
                    our
                    <span> process </span>
                </h2>
                <p class="title-detail">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
                <div class="our-process__item our-process__item--l-b">
                    <h3>
                        <i class="zmdi zmdi-accounts-alt"></i>
                        meet
                    </h3>
                    <p>
                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                        accuntium.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="our-process__item our-process__item--l-t">
                    <h3>
                        <i class="zmdi zmdi-library"></i>
                        discussion
                    </h3>
                    <p>
                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                        accuntium.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="our-process__item our-process__item--l-b">
                    <h3>
                        <i class="zmdi zmdi-puzzle-piece"></i>
                        ideal
                    </h3>
                    <p>
                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                        accuntium.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="our-process__item">
                    <h3>
                        <i class="zmdi zmdi-city-alt"></i>
                        construct
                    </h3>
                    <p>
                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                        accuntium.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End our process -->
<!-- Menu Canvas -->
<div id="menu-canvas" class="menu-canvas--hidden">
    <div class="menu-canvas__inner">
        <div class="close-menu-canvas">
            <i class="zmdi zmdi-close" id="btn-close"></i>
        </div>
        <h1 class="logo">
            <a href="index.html">
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
<section class="latest-project">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-12">
                <h2 class="title">
                    latest
                    <span> project </span>
                </h2>
                <p class="title-detail">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor
                </p>
            </div>
        </div>
    </div>
    <div class="row no-gutters">
        <div class="col-lg-3 col-md-6">
            <div class="latest__item">
                <img alt="Project 1" src="{{ url('img/latest-project-01.jpg') }}" />
                <a href="{{ url('img/latest-project-01.jpg') }}" data-lightbox="Lastest Project"
                    class="overlay overlay--invisible overlay--p-15">
                    <div class="overlay--border"></div>
                </a>
                <div class="latest__item--content">
                    <div class="latest__item--inner">
                        <h3>Piety Spire</h3>
                        <div class="cat-name">
                            <a href="">
                                <em>Bed room</em>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="latest__item">
                <img alt="Project 2" src="{{ url('img/latest-project-02.jpg') }}" />
                <a href="{{ url('img/latest-project-02.jpg') }}" data-lightbox="Lastest Project"
                    class="overlay overlay--invisible overlay--p-15">
                    <div class="overlay--border"></div>
                </a>
                <div class="latest__item--content">
                    <div class="latest__item--inner">
                        <h3>Monster Den</h3>
                        <div class="cat-name">
                            <a href="">
                                <em>Drawing room</em>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="latest__item">
                <img alt="Project 3" src="{{ url('img/latest-project-03.jpg') }}" />
                <a href="{{ url('img/latest-project-03.jpg') }}" data-lightbox="Lastest Project"
                    class="overlay overlay--invisible overlay--p-15">
                    <div class="overlay--border"></div>
                </a>
                <div class="latest__item--content">
                    <div class="latest__item--inner">
                        <h3>Mystery Stream</h3>
                        <div class="cat-name">
                            <a href="">
                                <em>Living room</em>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="latest__item">
                <img alt="Project 4" src="{{ url('img/latest-project-04.jpg') }}" />
                <a href="{{ url('img/latest-project-04.jpg') }}" data-lightbox="Lastest Project"
                    class="overlay overlay--invisible overlay--p-15">
                    <div class="overlay--border"></div>
                </a>
                <div class="latest__item--content">
                    <div class="latest__item--inner">
                        <h3>Au guest</h3>
                        <div class="cat-name">
                            <a href="">
                                <em>Guest Room</em>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="latest__item">
                <img alt="Project 5" src="{{ url('img/latest-project-05.jpg') }}" />
                <a href="{{ url('img/latest-project-05.jpg') }}" data-lightbox="Lastest Project"
                    class="overlay overlay--invisible overlay--p-15">
                    <div class="overlay--border"></div>
                </a>
                <div class="latest__item--content">
                    <div class="latest__item--inner">
                        <h3>Au Music</h3>
                        <div class="cat-name">
                            <a href="">
                                <em>Music Room</em>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="latest__item">
                <img alt="Project 6" src="img/latest-project-06.jpg" />
                <a href="img/latest-project-06.jpg" data-lightbox="Lastest Project"
                    class="overlay overlay--invisible overlay--p-15">
                    <div class="overlay--border"></div>
                </a>
                <div class="latest__item--content">
                    <div class="latest__item--inner">
                        <h3>Au Resting</h3>
                        <div class="cat-name">
                            <a href="">
                                <em>Bed room</em>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="latest__item">
                <img alt="Project 7" src="img/latest-project-07.jpg" />
                <a href="img/latest-project-07.jpg" data-lightbox="Lastest Project"
                    class="overlay overlay--invisible overlay--p-15">
                    <div class="overlay--border"></div>
                </a>
                <div class="latest__item--content">
                    <div class="latest__item--inner">
                        <h3>Skyline</h3>
                        <div class="cat-name">
                            <a href="">
                                <em>Dressing room</em>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="see-more project-home">
        <a href="{{ url('projects') }}" class="au-btn au-btn--big au-btn--pill au-btn--yellow au-btn--white">See
            More</a>
    </div>
</section>
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
            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="blog-item blog-item-3">
                    <div class="img-blog img-blog-3">
                        <a href="blog-detail.html">
                            <img alt="blog 1" src="img/blog-06.jpg" />
                        </a>
                        <div class="date--blog3">
                            <p class="date--blog3__inner">
                                <span class="day">13</span>
                                <span class="month">dec</span>
                            </p>
                        </div>
                    </div>
                    <div class="blog-content">
                        <h4 class="blog-title m-b-20">
                            <a href="blog-detail.html" class="sbold">
                                interior design trend 2020
                            </a>
                        </h4>
                        <p>
                            Sed ut perspiciatis unde omnis iste natus error sit altmonus
                            voluptatem accusantium doloremque laudantium, totamtp rem
                            aperiam, eaque ipsa quae ab .
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="blog-item blog-item-3">
                    <div class="img-blog img-blog-3">
                        <a href="blog-detail.html">
                            <img alt="blog 2" src="img/blog-07.jpg" />
                        </a>
                        <div class="date--blog3">
                            <p class="date--blog3__inner">
                                <span class="day">24</span>
                                <span class="month">dec</span>
                            </p>
                        </div>
                    </div>
                    <div class="blog-content">
                        <h4 class="blog-title m-b-20">
                            <a href="blog-detail.html" class="sbold">
                                from ideal to master piece
                            </a>
                        </h4>
                        <p>
                            Sed ut perspiciatis unde omnis iste natus error sit altmonus
                            voluptatem accusantium doloremque laudantium, totamtp rem
                            aperiam, eaque ipsa quae ab .
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="blog-item blog-item-3">
                    <div class="img-blog img-blog-3">
                        <a href="blog-detail.html">
                            <img alt="blog 3" src="img/blog-08.jpg" />
                        </a>
                        <div class="date--blog3">
                            <p class="date--blog3__inner">
                                <span class="day">22</span>
                                <span class="month">oct</span>
                            </p>
                        </div>
                    </div>
                    <div class="blog-content">
                        <h4 class="blog-title m-b-20">
                            <a href="blog-detail.html" class="sbold">
                                design is thinkng make visual
                            </a>
                        </h4>
                        <p>
                            Sed ut perspiciatis unde omnis iste natus error sit altmonus
                            voluptatem accusantium doloremque laudantium, totamtp rem
                            aperiam, eaque ipsa quae ab .
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End blog -->
<!-- Contact -->
<section class="contact">
    <div class="parallax parallax--contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="contact__inner clearfix">
                        <p class="contact__content">
                            We are the reliable partner to help you complete the work
                        </p>
                        <a href="{{ url('contact') }}" class="au-btn au-btn--big au-btn--pill au-btn--dark">Contact
                            Now</a>
                    </div>
                </div>
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
