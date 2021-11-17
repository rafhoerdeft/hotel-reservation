<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta name="description" content="">
    <meta name="author" content="erdevapp">
    <title>Login Admin</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ base_url('assets/img/icon-profil/s.jpg') }}">

    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ assets_url . 'app-assets/css/vendors.css' }}">
    <link rel="stylesheet" type="text/css" href="{{ assets_url . 'app-assets/vendors/css/extensions/toastr.css' }}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{ assets_url . 'app-assets/css/app.css' }}">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ assets_url . 'app-assets/css/core/menu/menu-types/vertical-menu-modern.css' }}">
    <link rel="stylesheet" type="text/css"
        href="{{ assets_url . 'app-assets/css/core/colors/palette-gradient.css' }}">
    <link rel="stylesheet" type="text/css" href="{{ assets_url . 'app-assets/css/plugins/extensions/toastr.css' }}">
    <!-- END Page Level CSS-->

    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ base_url('theme/login/external/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ base_url('theme/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ base_url('theme/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ base_url('theme/login/external/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ base_url('theme/login/external/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    {{-- <link rel="stylesheet" type="text/css" href="{{ base_url('theme/login/external/select2/select2.min.css') }}"> --}}
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ base_url('theme/login/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ base_url('theme/login/css/main.css') }}">
    <!--===============================================================================================-->
    <link href="{{ base_url('assets/css/loading.css') }}" type="text/css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

</head>

<body>
    <div class="loading-page" style="display: none;"></div>
    <style>
        .triangle-up {
            width: 0;
            height: 0;
            border-left: 55px solid transparent;
            border-right: 55px solid transparent;
            border-bottom: 50px solid #ffffff78;
        }

        .box-form {
            background-color: #343c46ad;
            padding: 35px;
            border-radius: 5px;
            box-shadow: 5px 5px 10px #0a28364a;
        }

        .logo-icon {
            font-size: 100px;
            margin: auto;
        }

    </style>
    <div class="limiter">
        <div class="container-login100"
            style="background-image: url('{{ base_url('assets/img/background/star-sky.jpg') }}');">
            {{-- <div class="triangle-up"></div> --}}
            <div class="wrap-login100 box-form">
                {!! form_open(base_url('auth/check'), 'id="loginform" class="login100-form validate-form"') !!}
                <div class="logo-icon m-b-25 text-info">
                    <i class="icon ion-ios-locked-outline"></i>
                </div>
                <span class="login100-form-title p-b-25">
                    Admin Panel
                </span>

                <div id="alert_login" class="alert alert-danger alert-dismissible"
                    style="width: 100%; border-radius: 50px; text-align: center; display: none;">
                    {{-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> --}}
                    <h4><i class="icon fa fa-ban"></i> Login Gagal!</h4>
                    Username atau Password salah!
                </div>

                <div class="wrap-input100 validate-input m-b-10" data-validate="Username is required">
                    <input class="input100" type="text" id="username" name="username" placeholder="Username">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-user"></i>
                    </span>
                </div>

                <style>
                    .show-pass {
                        font-size: 18px;
                        color: #999999;
                        cursor: pointer;
                        display: inline;
                        position: absolute;
                        margin-top: 16px;
                        right: 15px;
                    }

                </style>

                <div class="wrap-input100 validate-input m-b-10" data-validate="Password is required">
                    <i class="fa fa-eye-slash show-pass" id="cek_pass"></i>
                    <input class="input100" type="password" id="password" name="password" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock"></i>
                    </span>
                </div>

                <div class="container-login100-form-btn p-t-10">
                    <button class="login100-form-btn" type="submit">
                        Login
                    </button>
                </div>

                {!! form_close() !!}
            </div>
        </div>
    </div>



    <!-- BEGIN VENDOR JS-->
    <script src="{{ assets_url . 'app-assets/vendors/js/vendors.min.js' }}" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{ assets_url . 'app-assets/vendors/js/extensions/toastr.min.js' }}" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN MODERN JS-->
    <script src="{{ assets_url . 'app-assets/js/core/app-menu.js' }}" type="text/javascript"></script>
    <script src="{{ assets_url . 'app-assets/js/core/app.js' }}" type="text/javascript"></script>
    <!-- END MODERN JS-->
    <!--===============================================================================================-->
    <script src="{{ base_url('theme/login/external/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ base_url('theme/login/external/bootstrap/js/popper.js') }}"></script>
    <script src="{{ base_url('theme/login/external/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    {{-- <script src="{{ base_url('theme/login/external/select2/select2.min.js') }}"></script> --}}
    <!--===============================================================================================-->
    <script src="{{ base_url('theme/login/js/main.js') }}"></script>

    <script src="{{ base_url('assets/js/auth_log.js') }}"></script>
    <script src="{{ base_url('assets/js/block.js') }}"></script>


    <script>
        $('#cek_pass').on('click', function() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
                $(this).removeClass('fa-eye-slash').addClass('fa-eye');
            } else {
                x.type = "password";
                $(this).removeClass('fa-eye').addClass('fa-eye-slash');
            }
        });
    </script>


</body>

</html>
