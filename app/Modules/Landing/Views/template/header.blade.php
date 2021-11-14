<!-- Header Section Start -->
<header id="header">
    <a href="index.html" class="logo"><img src="{{ base_url('assets/img/logo/logo.png') }}" alt="logo"></a>
    <div class="phone"><a href="tel:+12345678900" class="text-white"><i class="fa fa-phone"></i>+1 234 567
            8900</a></div>
    <div class="mobile-menu-btn"><i class="fa fa-bars"></i></div>
    <nav class="main-menu top-menu">
        <ul>
            <li class="menu-item {{ !isset($menu_link) ? 'active' : '' }}">
                <a href="{{ isset($menu_link) ? base_url('/') : '' }}#homes">Home</a>
            </li>
            {{-- <li><a href="about.html">About Us</a></li> --}}
            <li class="menu-item">
                <a href="{{ isset($menu_link) ? base_url('/') : '' }}#amenities">Amenities</a>
            </li>
            <li class="menu-item">
                <a href="{{ isset($menu_link) ? base_url('/') : '' }}#rooms">Rooms</a>
            </li>
            {{-- <li><a href="#booking">Booking</a></li> --}}
            <li class="menu-item">
                <a href="{{ isset($menu_link) ? base_url('/') : '' }}#call-us">Contact Us</a>
            </li>
            <li><a href="login.html">Login</a></li>
        </ul>
    </nav>
</header>
<!-- Header Section End -->
