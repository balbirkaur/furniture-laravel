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
        style=" background-image: url({{asset('uploads/banner/'.$servicepost['bannerlist']->bannerpic)}});">
        <div class="container clearfix">
            <div class="row">
                <div class="col-md-12">
                    <h2>
                        {{$servicepost['bannerlist']->title}}
                    </h2>
                    <ul class="breadcrumbs ul--inline ul--no-style">
                        <li>
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        <span>/</span>
                        <li class="active">
                            {{$servicepost['bannerlist']->title}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Navigation -->
<!-- Service Content -->
<section class="service-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="service-tab">
                    <ul class="ul--no-style">
                        @foreach($servicepost['servicelist'] as $key =>$servicedata)
                        <li class="active">
                            <a href="{{ url('services/'.$servicedata->id) }}">
                                {{$servicedata->title }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="service-text">
                    <h5>{{$servicepost['allservices']->title}}</h5>
                    <div class="col-md-12">
                        <p class="m-b-40">
                            <img alt="Portfolio {{$servicepost['allservices']->id}}"
                                src="{{asset('uploads/service/'.$servicepost['allservices']->servicepic)}}">
                        </p>
                        {{$servicepost['allservices']->description}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Service Content -->
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
