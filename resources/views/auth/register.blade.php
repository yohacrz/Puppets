<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>PUPPETS</title>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
    <meta content="Themesdesign" name="author" />
    <link rel="shortcut icon" href="{{ asset('img/user/VARIANTE DE LOGOS PUPPETS-02.png') }}">

    <link href="{{ asset('plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/metismenu.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="accountbg"></div>

    <!-- Begin page -->
    <div class="home-btn d-none d-sm-block">
        <a href="{{ url('/') }}" class="text-white"><i class="mdi mdi-home h1"></i></a>
    </div>

    <div class="wrapper-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card card-pages mt-4">
                        <div class="card-body">
                            <div class="text-center mt-0 mb-3">
                                <a href="{{ url('/') }}" class="logo logo-admin">
                                    <img src="{{ asset('img/user/VARIANTE DE LOGOS PUPPETS-05.png') }}" class="mt-3" alt="" height="150">
                                </a>
                                <p class="text-muted w-75 mx-auto mb-4 mt-4">Don't have an account? Create your account, it takes less than a minute</p>
                            </div>

                            <form class="form-horizontal mt-4" method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group">
                                    <div class="col-12">
                                        <label for="email">Email</label>
                                        <input class="form-control" type="email" id="email" name="email" placeholder="Email" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-12">
                                        <label for="username">Username</label>
                                        <input class="form-control" type="text" id="username" name="name" placeholder="Username" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-12">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" id="password" name="password" placeholder="Password" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-12">
                                        <label for="password_confirmation">Confirm Password</label>
                                        <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
                                    </div>
                                </div>


                                <div class="form-group text-center mt-3">
                                    <div class="col-12">
                                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Register</button>
                                    </div>
                                </div>

                                <div class="form-group text-center mt-3 mb-2">
                                    <div class="col-12">
                                        <a href="{{ route('login') }}" class="text-muted">Already have account?</a>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>

    <!-- jQuery and scripts -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/metismenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('assets/js/waves.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>

</html>
