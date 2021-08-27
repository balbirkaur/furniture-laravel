<!-- Header Mobile -->
<header class="header-mobile">
    <div class="container clearfix">
        <h1 class="logo pull-left">
            <a href="{{ url('/') }}">
                <img alt="Logo" src="{{ url('img/logo-black.png') }}" />
            </a>
        </h1>
        <a class="menu-mobile__button">
            <i class="fa fa-bars"></i>
        </a>
        <nav class="menu-mobile hidden">
            <ul class="ul--no-style">
                <li>
                    <i class="fa fa-plus menu-mobile__more"></i>
                    <a href="{{ url('/') }}">
                        Home
                    </a>

                </li>
                <li>
                    <i class="fa fa-plus menu-mobile__more"></i>
                    <a href="{{url('projects')}}">
                        Projects
                    </a>

                </li>
                <li>
                    <i class="fa fa-plus menu-mobile__more"></i>
                    <a href="{{ url('services') }}">
                        Services
                    </a>

                </li>
                <li>
                    <i class="fa fa-plus menu-mobile__more"></i>
                    <a href="portfolio-detail-v1.html">
                        About
                    </a>

                </li>
                <li>
                    <i class="fa fa-plus menu-mobile__more"></i>
                    <a href="{{ url('inspirations') }}">
                        Inspirations
                    </a>
                </li>
                <li>
                    <i class="fa fa-plus menu-mobile__more"></i>
                    <a href="{{ url('products') }}">
                        Shop
                    </a>
                    <ul class="ul--no-style hidden">
                        <li>
                            <a href="product.html">
                                Product
                            </a>
                        </li>
                        <li>
                            <a href="single-product.html">
                                Product Detail
                            </a>
                        </li>
                        <li>
                            <a href="cart.html">
                                Cart
                            </a>
                        </li>
                        <li>
                            <a href="checkout.html">
                                Checkout
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ url('contact') }}">
                        Contact
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</header>
<!-- End Header Mobile -->
