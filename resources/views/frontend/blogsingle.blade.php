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

<!-- Blog Detail -->
<section class="blog-detail">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-7">
                <div class="blog-thumb">
                    <img alt="{{$blogsall['allblogs']->title}}"
                        src="{{asset('uploads/blog/'.$blogsall['allblogs']->blogpic)}}">
                </div>
                <h4 class="blog-title">
                    {{$blogsall['allblogs']->title}}
                </h4>
                <p class="blog-meta">
                    <!-- <em class="author">By AThony Lee</em> -->
                    <em class="cate">{{$blogsall['allblogs']->category->blog_cat_title}}</em>
                    <em class="time">{{date("M d,Y", strtotime($blogsall['allblogs']->created_at))}}</em>
                </p>
                <div class="blog-content">
                    <p class="m-t-20">
                        {!!$blogsall['allblogs']->description!!}
                    </p>

                </div>



            </div>
            <div class="col-lg-4 col-md-5">
                @include('layouts.inc.blogsidebar')
            </div>
        </div>
    </div>
</section>
<!-- End Blog Detail -->




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
