<!-- Header Desktop -->
<header class="header-desktop header1">
    <div class="container clearfix">
        <h1 class="logo pull-left">
            <a href="{{ url('/') }}">
                <img alt="Logo" src="{{ url('img/logo-black.png') }}" />
            </a>
        </h1>

        <div class="header-button pull-right clearfix">
            <!-- <div class="canvas-menu-button pull-right">
                <a href="#" onclick="return false;">
                    <i class="zmdi zmdi-menu"></i>
                </a>
            </div>
            <div class="mini-cart pull-right">

            </div>
            <div class="search-button pull-right clearfix">
                <a class="search-button__btn" href="#" onclick="return false;">
                    <i class="zmdi zmdi-search"></i>
                </a>
                <form class="form form-header pull-left" role="form">
                    <input type="text" id="header-input" class="form__input form__input--hidden"
                        placeholder="Search here...">
                </form>
            </div>-->
        </div>
        <nav class="menu-desktop menu-desktop--show pull-right">
            <ul class="ul--inline ul--no-style">
                <li class="li-has-sub">
                    <a href="{{ url('/') }}">
                        Home
                    </a>

                </li>
                <li class="li-has-sub">
                    <a href="{{ url('products') }}">
                        Products
                    </a>

                </li>

                <li class="li-has-sub">
                    <a href="{{ url('services') }}">
                        Services
                    </a>

                </li>
                <li class="li-has-sub">
                    <a href="{{ url('aboutus') }}">
                        About
                    </a>

                </li>
                <li class="li-has-sub">
                    <a href="{{ url('inspirations') }}">
                        Inspirations
                    </a>
                </li>
                <li class="li-has-sub">
                    <a href="{{ url('projects') }}">
                        Projects
                    </a>

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
<!-- End Header Desktop -->
