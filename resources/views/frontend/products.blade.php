@extends('layouts.frontend')
@section('title')
Furniture Products
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
        style=" background-image: url({{asset('uploads/banner/'.$productsall['bannerlist']->bannerpic)}});">
        <div class="container clearfix">
            <div class="row">
                <div class="col-md-12">
                    <h2>
                        {{$productsall['bannerlist']->title}}
                    </h2>
                    <ul class="breadcrumbs ul--inline ul--no-style">
                        <li>
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        <span>/</span>
                        <li class="active">
                            {{$productsall['bannerlist']->title}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Navigation -->


<!-- Pro List -->
<section class="pro-list-wrap">
    <div class=" section-content section-content--w1140">
        <div class="container">
            <!--<div class="pro-sorting clearfix">
                <div class="sort-left pull-left">
                    show
                    <span id="from">1</span>
                    to
                    <span id="to">10</span>
                    of
                    <span id="all">34</span>
                    result
                </div>
                <div class="sort-right pull-right">
                    <select id="order-by">
                        <option value="default" selected="selected">default sorting</option>
                        <option value="popular">Sort by popularity</option>
                        <option value="rating">Sort by average rating</option>
                        <option value="date">Sort by latest</option>
                        <option value="price">Sort by price: low to high</option>
                        <option value="price-desc">Sort by price: high to low</option>
                    </select>
                </div>
            </div>-->
            <div class="pro-list">
                <div class="row">

                    <div class="col-lg-4 col-md-4">
                        <div class="service-tab">
                            <ul class="ul--no-style">
                                @foreach($productsall['productcategory'] as $key =>$productcatdata)
                                <li class="active">
                                    <a href="{{ url('products/cat-'.$productcatdata->id) }}">
                                        {{$productcatdata->product_name }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8">
                        @foreach($productsall['allproducts'] as $productdata)
                        <div class="pro__item">
                            <div class="pro__img">

                                <img alt="Product 1" src="{{ url("uploads/product/",$productdata['productpic']) }}">
                                <div class="pro-link">
                                    <div class="pro-info pro-info--dark pro-info--center">
                                        <a href="{{ url("products",$productdata['id']) }}"
                                            class="au-btn au-btn--pill au-btn--big au-btn--yellow pro__add">
                                            View Product
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="pro__detail">
                                <h5>
                                    <a href="{{ url("products",$productdata['id']) }}">
                                        {{$productdata['title']}}
                                    </a>
                                </h5>

                                <div class="pro__price">
                                    <!--  <span class="old">
                                        $102.00
                                    </span>-->
                                    <span class="current">
                                        {{$productdata->category->product_name}}
                                    </span>
                                </div>
                                <!--    <div class="pro__star">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                </div>-->
                            </div>
                        </div>
                        @endforeach
                        <!-- End Item -->
                    </div>
                </div>
            </div>
            <!-- <div class="au-pagination clearfix">
                <ul class="page-number-wrap ul--inline ul--no-style pull-right">
                    <li>
                        <span class="page-number current">
                            1
                        </span>
                    </li>
                    <li>
                        <a href="#" class="page-number">
                            2
                        </a>
                    </li>
                    <li>
                        <a href="#" class="page-number">
                            3
                        </a>
                    </li>
                    <li>
                        <a href="#" class="page-number">
                            4
                        </a>
                    </li>
                    <li>
                        <a href="#" class="page-number dots">...</a>
                    </li>
                    <li>
                        <a href="#" class="page-number">
                            20
                        </a>
                    </li>
                    <li>
                        <a href="#" class="page-number">
                            <i class="fa fa-chevron-right" aria-hidden="true"></i>
                        </a>
                    </li>
                </ul>
            </div>-->
        </div>
    </div>
</section>
<!-- End Pro List -->
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
