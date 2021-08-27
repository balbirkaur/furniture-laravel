@extends('layouts.frontend')
@section('title')
Furniture Services
@endsection
@section('frontcss')
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/owl-carousel/animate.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/owl-carousel/owl.carousel.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/owl-carousel/owl.theme.default.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/revolution/settings.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/revolution/navigation.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/revolution/layers.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/lightbox2/src/css/lightbox.css') }}" />
<style>
    .parallax--nav {}
</style>
@endsection


@section('content')

<!-- Navigation -->
<section class="navigation">
    <div class="parallax parallax--nav"
        style=" background-image: url({{asset('uploads/banner/'.$aboutall['bannerlist']->bannerpic)}});">
        <div class="container clearfix">
            <div class="row">
                <div class="col-md-12">
                    <h2>
                        {{$aboutall['bannerlist']->title}}
                    </h2>
                    <ul class="breadcrumbs ul--inline ul--no-style">
                        <li>
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        <span>/</span>
                        <li class="active">
                            {{$aboutall['bannerlist']->title}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Navigation -->



<!-- We Are -->
<section class="we-are">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-5 col-md-12 col-12">
                <div class="we-are__left">

                    {!!$aboutall['aboutus']->sub_description!!}
                    <div class="top">
                        <div class="we-are__item">
                            <img alt="We Are 1" src="img/we-are-01.jpg">
                        </div>
                        <div class="we-are__item">
                            <img alt="We Are 2" src="img/we-are-02.jpg">
                        </div>
                    </div>
                    <div class="bottom">
                        <div class="we-are__item">
                            <img alt="We Are 3" src="img/we-are-03.jpg">
                        </div>
                        <div class="we-are__item">
                            <img alt="We Are 4" src="img/we-are-06.jpg">
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-7 col-md-12 col-12">
                <div class="we-are__right">
                    <h2>{{$aboutall['aboutus']->title}}</h2>
                    <h2 class="title--small">{{$aboutall['aboutus']->subtitle}}</h2>
                    {!!$aboutall['aboutus']->description!!}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End we are -->

@if($aboutall['teamlist']->count()>0)
<!-- Our Team 2 -->
<section class="our-team2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="title title-3">
                    our team
                </h2>
            </div>
        </div>
        <div class="owl-carousel owl-theme" id="owl-our-team-2">
            @foreach($aboutall['teamlist'] as $teamdata)
            <div class="our-team2__item item">
                <div class="our-team2__img">
                    <img alt="Our Team 1" src="{{asset('uploads/team/'.$teamdata->teampic)}}" class="img-responsive">
                    <div class="our-team2__link">
                        <div class="pro-info our-team2__info">
                            <div class="our-team2__contact">
                                <a href="{{$teamdata['facebook_link']}}" target="_blank" class="social__item">
                                    <i class="zmdi zmdi-facebook"></i>
                                </a>
                                <a href="{{$teamdata['instagram_link']}}" target="_blank" class="social__item">
                                    <i class="zmdi zmdi-instagram"></i>
                                </a>
                                <a href="{{$teamdata['google_link']}}" target="_blank" class="social__item">
                                    <i class="zmdi zmdi-google"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="our-team2__detail">
                    <h4>
                        {{$teamdata['title']}}
                    </h4>
                    <p>
                        <em>{{$teamdata['position']}}</em>
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Our Team 2 -->
@endif




@endsection

@section('frontjs')
<!-- =================== PLUGIN JS ==================== -->

<script src="{{ asset('vendor/isotope/isotope.pkgd.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/owl-carousel/owl.carousel.min.js') }}" type="text/javascript"></script>
@endsection
@section('frontmainjs')
<!-- =================== CUSTOM JS ==================== -->
<script type="text/javascript" src="{{ asset('js/isotope-custom.js') }}"></script>
@endsection
