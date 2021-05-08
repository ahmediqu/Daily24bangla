@extends('layouts.auth_app')
@section('content')
    <div class="">
        <div class="row no-gutters">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-8">
                <div class="back-image" style="background-image: url({{ url('images/accounting.jpg') }})"></div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 pl-md-0">
                <div class="login-form d-flex align-items-center shadow">
                    <form method="POST" action="{{ route('login') }}" class="sign-in-sign-up-form w-100">
                        @csrf
                        <div class="form-group col-12">
                            <h3 class="text-center mb-0">Daily24Bangla.</h3>
                            <label class="text-center d-block">Login to your dashboard</label>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-0">
                                <div class="">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-12">
                                    <p class="text-center mt-5 footer-copy">
                                        Copyright @ 2021 by Devcity
                                    </p>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
