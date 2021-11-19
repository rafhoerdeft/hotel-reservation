<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tag -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <!-- ==== Document Meta ==== -->
    <meta name="author" content="erdevapp">
    <meta name="robots" content="index, follow">
    <meta name="keywords"
        content="{{ isset($meta) ? $meta['title'] . ', sadewa, homestay, reservation' : 'loftcity, homestay, reservation' }}">
    <meta name="og:description" content="{{ isset($meta) ? $meta['description'] : 'Homestay Reservation' }}">
    <meta property="og:url"
        content="<?= $full_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>" />
    <meta property="og:site_name" content="sadewahomestay.com" />
    <meta property="og:title" content="{{ isset($meta) ? $meta['title'] : 'Sadewa | Homestay Reservation' }}" />
    <meta property="og:image" content="{{ isset($meta) ? $meta['image'] : base_url('assets/img/logo/logo.png') }}" />

    <meta name="twitter:title" content="{{ isset($meta) ? $meta['title'] : 'Sadewa | Homestay Reservation' }}" />
    <meta name="twitter:description" content="{{ isset($meta) ? $meta['description'] : 'Homestay Reservation' }}" />
    <meta name="twitter:image" content="{{ isset($meta) ? $meta['image'] : base_url('assets/img/logo/logo.png') }}" />


    <title>Sadewa | Homestay Reservation</title>

    <!-- Favicons -->
    <link href="{{ base_url('assets/img/icon-profil/s.jpg') }}" rel="icon">
    <link href="{{ base_url('assets/img/icon-profil/s.jpg') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700|Raleway:100,200,300,400,500,600,700,800,900"
        rel="stylesheet">

    <!-- Vendor CSS File -->
    <link href="{{ assets_front }}vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ assets_front }}vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ assets_front }}vendor/slick/slick.css" rel="stylesheet">
    <link href="{{ assets_front }}vendor/slick/slick-theme.css" rel="stylesheet">
    <link href="{{ assets_front }}vendor/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Main Stylesheet File -->
    <link href="{{ assets_front }}css/hover-style.css" rel="stylesheet">
    <link href="{{ assets_front }}css/style-new.css" rel="stylesheet">

    <!-- Plugin CSS tambahan -->
    @stack('css_plugin')

    <!-- Style CSS tambahan -->
    @stack('css_style')

    <style>
        .loadingers {
            text-align: center;
            z-index: 10000;
            width: 100%;
            height: 100%;
            position: fixed;
            background: #000719e3;
            /* display: none; */
        }

    </style>
</head>

<body>

    <div class="loadingers" id="loading-show">
        <div style="top: 40%; position: relative; z-index: 1100">
            @include('template.loading')
        </div>
    </div>

    <!-- Header -->
    @include('template/header')

    <!-- Content -->
    @yield('content')

    <!-- Modal -->
    @stack('modal')

    <!-- Footer -->
    @include('template/footer')
    <!-- End Footer -->

    <!-- Button back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- Vendor JavaScript File -->
    <script src="{{ assets_front }}vendor/jquery/jquery.min.js"></script>
    <script src="{{ assets_front }}vendor/jquery/jquery-migrate.min.js"></script>
    <script src="{{ assets_front }}vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ assets_front }}vendor/easing/easing.min.js"></script>
    <script src="{{ assets_front }}vendor/stickyjs/sticky.js"></script>
    <script src="{{ assets_front }}vendor/superfish/hoverIntent.js"></script>
    <script src="{{ assets_front }}vendor/superfish/superfish.min.js"></script>
    <script src="{{ assets_front }}vendor/wow/wow.min.js"></script>
    <script src="{{ assets_front }}vendor/slick/slick.min.js"></script>
    <script src="{{ assets_front }}vendor/tempusdominus/js/moment.min.js"></script>
    <script src="{{ assets_front }}vendor/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="{{ assets_front }}vendor/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Booking Javascript File -->
    {{-- <script src="{{ assets_front }}js/booking.js"></script> --}}
    <script src="{{ assets_front }}js/jqBootstrapValidation.min.js"></script>

    <!-- Main Javascript File -->
    <script src="{{ assets_front }}js/main.js"></script>

    <script src="{{ base_url('assets/js/block.js') }}"></script>

    <!-- Plugin JS tambahan -->
    @stack('js_plugin')

    <!-- Script JS tambahan -->
    @stack('js_script')

    <script type="text/javascript">
        $(document).ready(function() {
            $('#alts').fadeTo(3000, 500).slideUp(500);
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#loading-show").fadeTo(1000, 500).fadeOut();
        })
    </script>

</body>

</html>
