<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>{{ get_settings('system_name') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('backend/images/favicon.ico') }}">

        <!-- App css -->
        <link href="{{ asset('backend/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/css/app.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/css/main.css') }}" rel="stylesheet" type="text/css" />

    </head>

    <body class="auth-fluid-pages pb-0">

        <div class="auth-fluid">
            <!--Auth fluid left content -->
            <div class="auth-fluid-form-box">
                <div class="align-items-center d-flex h-100">
                    <div class="card-body">

                        <!-- Logo -->
                        <div class="auth-brand text-center text-lg-left">
                            <a href="index.html">
                                <span><img src="{{'backend/images/logo-dark.png'}}" alt="" height="50"></span>
                            </a>
                        </div>

                        <!-- title-->
                        <h4 class="mt-0">Sign In</h4>
                        <p class="text-muted mb-4">{{ translate('enter_your_email_address_and_password_to_access_account') }}.</p>

                        <!-- form -->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">
                                <label for="emailaddress">Email</label>
                                <input class="form-control" type="email" id="emailaddress" required="" placeholder="Enter your email" name="email">
                            </div>
                            <div class="form-group">
                                <a href="{{ route('password.request') }}" class="text-muted float-right"><small>Forgot your password?</small></a>
                                <label for="password">Password</label>
                                <input class="form-control" type="password" required="" id="password" placeholder="Enter your password" name="password">
                                @if ($errors->has('email'))
                                <span class = "error"> {{ $errors->first('email') }} </span>
                            @endif
                            </div>
                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-primary btn-block" type="submit"><i class="mdi mdi-login"></i> Log In </button>
                            </div>
                        </form>
                        <!-- end form-->
                    </div> <!-- end .card-body -->
                </div> <!-- end .align-items-center.d-flex.h-100-->
            </div>
            <!-- end auth-fluid-form-box-->

            <!-- Auth fluid right content -->
            <div class="auth-fluid-right text-center">
            </div>
            <!-- end Auth fluid right content -->
        </div>
        <!-- end auth-fluid-->

        <!-- App js -->
        <script src="{{ asset('backend/js/app.min.js') }}"></script>

    </body>

</html>
