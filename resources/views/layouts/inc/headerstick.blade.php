<!-- Header Stick -->
<header class="header-stick header-stick--dark">
    <div class="container clearfix">
        <h1 class="logo pull-left">
            <a href="{{ url('/') }}">
                <img alt="Logo" src="{{ url('img/logo-white.png') }}" />
            </a>
        </h1>
        <nav class="menu-desktop pull-right">
            <ul class="ul--inline ul--no-style">
                <li class="li-has-sub">
                    <a href="{{ url('/') }}"> Home </a>
                </li>
                <li class="li-has-sub">
                    <a href="{{ url('products') }}"> Products </a>
                </li>
                <li class="li-has-sub">
                    <a href="{{ url('services') }}"> Services </a>
                </li>
                <li class="li-has-sub">
                    <a href=""> About </a>
                </li>
                <li class="li-has-sub">
                    <a href="{{ url('inspirations') }}"> Inspirations </a>
                </li>
                <li class="li-has-sub">
                    <a href="{{ url('projects') }}"> Projects </a>
                </li>
                <li>
                    <a href="{{ url('contact') }}"> Contact </a>
                </li>
            </ul>
        </nav>
    </div>
</header>
<!-- End Header Stick -->
