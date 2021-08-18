@extends('layouts.templatepublic')

@section('content')

    <!-- row -->
    <div class="row">
        <div class="col-md-6">


            <div class="row">
                {{ Session::get('ket') }}

                <form method="POST" action="{{ route('action.userlogin') }}" data-toggle="md-validator">
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
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>
        <!-- /section title -->

        <!-- Products tab & slick -->

    </div>

@endsection
