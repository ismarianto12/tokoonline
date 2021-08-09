<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Login</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="https://themekita.com/demo-atlantis-bootstrap/livepreview/examples/assets/img/icon.ico"
        type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="{{ asset('assets') }}/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands", "simple-line-icons"
                ],
                urls: ['{{ asset('assets') }}/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/atlantis.css">
</head>

<body class="login">
    <div class="wrapper wrapper-login wrapper-login-full p-0">
        <div class="login-aside w-50 d-flex flex-column align-items-center justify-content-center text-center" style="
            background: url('{{ asset('assets/img/spk.jpg') }}');
            background-size: cover;
            background-position: bottom center;
            ">
            <div style="">
                <h2 class="title fw-bold text-black mb-3" style="
                margin-top: -60px;
                color: #fff;
            ">Login aplikasi</h2>
            </div>
        </div>
        <div class="login-aside w-50 d-flex align-items-center justify-content-center bg-white">
            <form method="POST" action="{{ route('loginact') }}" data-toggle="md-validator">
                @csrf
                <div class="container container-login container-transparent animated fadeIn">
                    <h3 class="text-center">Login Aplikasi</h3>
                    <div class="login-form">
                        <div class="form-group">
                            <label for="username" class="placeholder"><b>Username</b></label>
                            <input id="username" name="username" value="{{ old('email') }}" type="text"
                                class="form-control" required>
                            @if ($errors->has('username'))
                                <b>
                                    <strong style="color: red">{{ $errors->first('username') }}</strong>
                                </b>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password" class="placeholder"><b>Password</b></label>
                            <a href="#" class="link float-right">Lupa password ?</a>
                            <div class="position-relative">
                                <input id="password" name="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" required>
                                @if ($errors->has('password'))
                                    <b>
                                        <strong style="color: red">{{ $errors->first('password') }}</strong>
                                    </b>
                                @endif
                                <div class=" show-password">
                                    <i class="icon-eye"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-action-d-flex mb-3">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label m-0" for="rememberme">Remember Me</label>
                            </div>
                            <button href="#" class="btn btn-secondary col-md-5 float-right mt-3 mt-sm-0 fw-bold">Sign
                                In</button>
                        </div>
                        <div class="login-account">
                            {{-- <span class="msg">Don't have an account yet ?</span> --}}
                            {{-- <a href="#" id="show-signup" class="link">Sign Up</a> --}}
                        </div>
                    </div>
                </div>
            </form>
            {{-- <div class="container container-signup container-transparent animated fadeIn">
                <h3 class="text-center">Sign Up</h3>
                <div class="login-form">
                    <div class="form-group">
                        <label for="fullname" class="placeholder"><b>Fullname</b></label>
                        <input id="fullname" name="fullname" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="placeholder"><b>Email</b></label>
                        <input id="email" name="email" type="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="passwordsignin" class="placeholder"><b>Password</b></label>
                        <div class="position-relative">
                            <input id="passwordsignin" name="passwordsignin" type="password" class="form-control"
                                required>
                            <div class="show-password">
                                <i class="icon-eye"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="confirmpassword" class="placeholder"><b>Confirm Password</b></label>
                        <div class="position-relative">
                            <input id="confirmpassword" name="confirmpassword" type="password" class="form-control"
                                required>
                            <div class="show-password">
                                <i class="icon-eye"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row form-sub m-0">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="agree" id="agree">
                            <label class="custom-control-label" for="agree">I Agree the terms and conditions.</label>
                        </div>
                    </div>
                    <div class="row form-action">
                        <div class="col-md-6">
                            <a href="#" id="show-signin" class="btn btn-danger btn-link w-100 fw-bold">Cancel</a>
                        </div>
                        <div class="col-md-6">
                            <a href="#" class="btn btn-secondary w-100 fw-bold">Sign Up</a>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    <script src="{{ asset('assets') }}/js/core/jquery.3.2.1.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="{{ asset('assets') }}/js/core/popper.min.js"></script>
    <script src="{{ asset('assets') }}/js/core/bootstrap.min.js"></script>
    <script src="{{ asset('assets') }}/js/atlantis.min.js"></script>
</body>

</html>
