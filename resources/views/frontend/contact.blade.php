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
        style=" background-image: url({{asset('uploads/banner/'.$contactall['bannerlist']->bannerpic)}});">
        <div class="container clearfix">
            <div class="row">
                <div class="col-md-12">
                    <h2>
                        {{$contactall['bannerlist']->title}}
                    </h2>
                    <ul class="breadcrumbs ul--inline ul--no-style">
                        <li>
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        <span>/</span>
                        <li class="active">
                            {{$contactall['bannerlist']->title}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Navigation -->

<!-- Contact content -->
<section class="contact-content">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="m-t-40">
                    {!!$contactall['contact']->address_map!!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-contact-wrap m-t-40">
                    <h4>Send us a message</h4>
                    @if ( session('success'))
                    <div class="alert alert-warning" role="alert">{{ session('success') }}</div>
                    @endif
                    <form class="form-contact" role="form" method="post" action="{{ route('contact.store') }}">

                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <input class="{{ $errors->has('name') ? 'error' : '' }}" type="text" name="name"
                                    required placeholder="Your Name*">
                                <!-- Error -->
                                @if ($errors->has('name'))
                                <div class="error">
                                    {{ $errors->first('name') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-md-6 col-12">
                                <input class="{{ $errors->has('email_id') ? 'error' : '' }}" type="email"
                                    name="email_id" required placeholder="Your Email*">
                                @if ($errors->has('email_id'))
                                <div class="error">
                                    {{ $errors->first('email_id') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-md-12">
                                <textarea name="message" class="message {{ $errors->has('message') ? 'error' : '' }}"
                                    placeholder="Your Message"></textarea>
                                @if ($errors->has('message'))
                                <div class="error">
                                    {{ $errors->first('message') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="au-btn au-btn--pill au-btn--yellow au-btn--big">Contact
                                Us</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Contact Content -->
<!-- Contact Info -->
<section class="contact-info">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <h4 class="p-t-30">Contact info</h4>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="p-t-30">
                    <i class="fa fa-home m-r-8"></i>
                    {{$contactall['contact']->address}}
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="p-t-30">
                    <i class="fa fa-phone m-r-8"></i>
                    {{$contactall['contact']->phone_number}}
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="p-t-30">
                    <i class="fa fa-envelope m-r-8"></i>
                    {{$contactall['contact']->email_id}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Contact Info -->
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
