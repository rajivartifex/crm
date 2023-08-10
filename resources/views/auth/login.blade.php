<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    <!-- Google Font: Source Sans Pro -->
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
</head>

<?php $login_image = \App\Models\LoginImage::first(); ?>

<body class="hold-transition login-page"
    @if ($login_image) style="background-image:url({{ asset('storage/login_image/' . $login_image->login_image) }});" @else style="background-image:url({{ asset('assets/img/login-bg.jpg') }});" @endif>

    <body class="hold-transition login-page" style="background-image:url({{ asset('assets/img/login-bg.jpg') }});">
        <div class="login-box">
            {{-- <h4 class="logo-text mb-15">Welcome to <strong>CRM</strong></h4> --}}
            <h4 class="logo-text mb-15"><img src="{{ asset('assets/img/logo.png') }}"></h4>
            <br />
            {{-- <p class="mb-4">Admin Login to CRM dashboard</p> --}}
            <form action="{{ route('login.custom') }}" method="post">
                @csrf
                <div class=" mb-3">
                    <div class="input-group">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <div class="input-group">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="row mb-3">
                    <div class="col-12 mb-3">
                        <div class="icheck-primary d-flex justify-content-between align-items-center">
                            <input type="checkbox" id="remember">
                            <label for="remember" class="text-muted">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                </div>
            </form>
            <div class="social-auth-links text-center mt-4">
                {{-- <p class="redirect-link" style="margin-bottom:0;">Don't have an account yet? <a
                    href="{{ route('register') }}">
                    Sign Up
                </a>
            </p> --}}

            </div>
        </div>
        <!-- /.login-box -->

        <!-- jQuery -->
        <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
    </body>

</html>
