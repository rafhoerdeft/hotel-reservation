<!-- Header Section Start -->
<header id="header">
    <div class="logo">SADEWA</div>
    <div class="logo-sm">HOMESTAY</div>
    <div class="phone">
        <a href="tel:+12345678900" class="text-white">
            <i class="fa fa-phone"></i>+1 234 567 8900
        </a>
    </div>
    <div class="mobile-menu-btn"><i class="fa fa-bars"></i></div>
    <nav class="main-menu top-menu">
        <ul>
            @foreach ($menu as $nav)
                <li
                    class="{{ strpos($nav['url'], '#') !== false ? 'menu-item' : '' }} 
                    {{ !isset($menu_link) ? ($nav['index'] == 1 ? 'active' : '') : (isset($active) && $nav['index'] == $active ? 'active' : '') }}">
                    <a
                        href="{{ strpos($nav['url'], '#') !== false ? (isset($menu_link) ? base_url('/') : '') : '' }}{{ $nav['url'] }}">
                        {{ $nav['title'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
</header>
<!-- Header Section End -->
