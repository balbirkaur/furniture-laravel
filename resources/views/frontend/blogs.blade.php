@extends('layouts.frontend')
@section('title')
Furniture Blogs
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
        style=" background-image: url({{asset('uploads/banner/'.$blogsall['bannerlist']->bannerpic)}});">
        <div class="container clearfix">
            <div class="row">
                <div class="col-md-12">
                    <h2>
                        {{$blogsall['bannerlist']->title}}
                    </h2>
                    <ul class="breadcrumbs ul--inline ul--no-style">
                        <li>
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        <span>/</span>
                        <li class="active">
                            {{$blogsall['bannerlist']->title}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Navigation -->

<!-- Blog List -->
<section class="blog-list-wrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-7">
                <div class="blog-list">
                    @foreach($blogsall['allblogs'] as $key =>$blogdata)
                    <div class="blog-item">
                        <div class="img-blog">
                            <a href="{{ url('/inspirations/'.$blogdata->id) }}">
                                <img alt="Blog 1" src="{{ url("uploads/blog/",$blogdata['blogpic']) }}">
                                <div class="date date--big">
                                    <div class="date__inner">
                                        <span class="day">{{date("d", strtotime($blogdata['created_at']))}}</span>
                                        <span class="month">{{date("M", strtotime($blogdata['created_at']))}}</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="blog-content">
                            <h4 class="blog-title">

                                <a href="{{ url('/inspirations/'.$blogdata->id) }}">{{$blogdata['title']}}</a>
                            </h4>
                            <!-- <p class="author">
                                <em>By AThony Lee</em>
                            </p>-->
                            <p>
                                {!!$blogdata['excerpt']!!} ....
                            </p>
                        </div>
                        <div class="see-more see-more--left">
                            <a href="{{ url('/inspirations/'.$blogdata->id) }}"
                                class="au-btn au-btn--big au-btn--pill au-btn--yellow au-btn--white">See More</a>
                        </div>
                    </div>
                    @endforeach
                    <!-- end blog item -->

                </div>
                <!-- End blog list -->
            </div>
            <div class="col-lg-4 col-md-5">
                @include('layouts.inc.blogsidebar')
            </div>
        </div>
    </div>
</section>
<!-- End Blog List -->

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
