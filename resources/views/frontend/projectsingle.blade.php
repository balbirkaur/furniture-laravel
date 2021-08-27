@extends('layouts.frontend')
@section('title')
Furniture Projects
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
        style=" background-image: url({{asset('uploads/banner/'.$projectpost['bannerlist']->bannerpic)}});">
        <div class="container clearfix">
            <div class="row">
                <div class="col-md-12">
                    <h2>
                        {{$projectpost['bannerlist']->title}}
                    </h2>
                    <ul class="breadcrumbs ul--inline ul--no-style">
                        <li>
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        <span>/</span>
                        <li class="active">
                            {{$projectpost['bannerlist']->title}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Navigation -->
<!-- Portfolio 1 -->
<section class="port1">
    <div class="container">
        <div class="port1-wrap">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="port1__big-img">
                        <img alt="Portfolio 1"
                            src="{{asset('uploads/project/'.$projectpost['allprojects']->projectpic)}}">
                    </div>

                    <div class="port1__img-wrap">
                        @foreach($projectpost['allimages'] as $key=>$value)
                        <div class="port1-img">
                            <a href="{{asset('uploads/project/'.$value->projectpic)}}" data-lightbox="portfolio">
                                <img alt="Portfolio Small 1" src="{{asset('uploads/project/'.$value->projectpic)}}">
                            </a>
                        </div>
                        @endforeach

                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="port__text">
                        <h3>{{$projectpost['allprojects']->title}}</h3>
                        <p class="m-b-20">
                            {{$projectpost['allprojects']->description}}
                        </p>

                    </div>
                    <div class="port__info">
                        <ul class="port__info-list clearfix ul--no-style">
                            @if ($projectpost['allprojects']->client)
                            <li>
                                <span class="port__info-title">Client</span>
                                <span class="port__info-value">{{$projectpost['allprojects']->client}}</span>
                            </li>
                            @endif
                            @if ($projectpost['allprojects']->acreage)
                            <li>
                                <span class="port__info-title">Acreage</span>
                                <span class="port__info-value">{{$projectpost['allprojects']->acreage}} m</span>
                            </li>
                            @endif
                            @if ($projectpost['allprojects']->project_date)
                            <li>
                                <span class="port__info-title">Date</span>
                                <span class="port__info-value">{{$projectpost['allprojects']->project_date}}</span>
                            </li>
                            @endif
                        </ul>

                    </div>
                    <!-- End Port Info -->
                </div>
            </div>
        </div>
        <!-- End Item -->

    </div>

</section>
<!-- End Portfolio 1 -->

@endsection

@section('frontjs')
<!-- =================== PLUGIN JS ==================== -->
<script src="{{ asset('vendor/lightbox2/src/js/lightbox.js') }}" type="text/javascript"></script>
<!-- Light Box -->
<script type="text/javascript">
    $(document).ready(function () {
    lightbox.option({
      'resizeDuration': 200,
      'wrapAround': false,
      'alwaysShowNavOnTouchDevices': true,
    });
  });
</script>
<script src="{{ asset('vendor/isotope/isotope.pkgd.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/owl-carousel/owl.carousel.min.js') }}" type="text/javascript"></script>
@endsection
@section('frontmainjs')
<!-- =================== CUSTOM JS ==================== -->
<script type="text/javascript" src="{{ asset('js/isotope-custom.js') }}"></script>
@endsection
