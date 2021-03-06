@extends('layouts.templatepublic')

@section('content')

    <div class="col-md-6">
        {{ Session::get('ket') }}
        <form method="POST" action="{{ route('action.userlogin') }}" data-toggle="md-validator">
            @csrf
            <h3 class="text-center">Login </h3>
            <div class="login-form">
                <div class="form-group">
                    <label for="username" class="placeholder"><b>Username</b></label>
                    <input id="username" name="username" value="{{ old('email') }}" type="text" class="form-control"
                        required>
                    @if ($errors->has('username'))
                        <b>
                            <strong style="color: red">{{ $errors->first('username') }}</strong>
                        </b>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password" class="placeholder"><b>Password</b></label>
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

                    </div>
                    <button href="#" class="btn btn-primary">Sign
                        In</button>
                </div>
                <div class="login-account">
                </div>
            </div>


        </form>

    </div>

@endsection
