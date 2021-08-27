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
        style=" background-image: url({{asset('uploads/banner/'.$projectsall['bannerlist']->bannerpic)}});">
        <div class="container clearfix">
            <div class="row">
                <div class="col-md-12">
                    <h2>
                        {{$projectsall['bannerlist']->title}}
                    </h2>
                    <ul class="breadcrumbs ul--inline ul--no-style">
                        <li>
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        <span>/</span>
                        <li class="active">
                            {{$projectsall['bannerlist']->title}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Navigation -->
<!-- Project 4 -->
<section class="project4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div id="filter-wrap">
                    <ul id="filter" class="ul--no-style ul--inline">
                        <li class="active">
                            <span data-filter="*">All</span>
                        </li>
                        @foreach($projectsall['projectcategory'] as $data)
                        <li>
                            <span data-filter=".{{ $data->project_slug}}">{{ $data->project_name}}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div id="isotope-grid" class="project--zoom clearfix">
            @foreach($projectsall['allprojects'] as $projectdata)
            <div class="col-md-4 col-sm-12 item {{ $projectdata->category->project_slug}}">
                <div class="project__item">
                    <div class="pro__img">
                        <a href="{{ url("projects",$projectdata['id']) }}">
                            <img alt="Project 1" src="{{ url("uploads/project/",$projectdata['projectpic']) }}">
                        </a>
                    </div>
                    <div class="pro__text">
                        <h4 class="company">
                            {{$projectdata['title']}}
                        </h4>
                        <p class="cat-name">
                            <em>
                                {{$projectdata->category->project_name}}
                            </em>
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>
<!-- End Project 4 -->

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
