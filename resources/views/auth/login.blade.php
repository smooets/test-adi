@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 mt-5">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center mb-4">{{ __('Login') }}</h2>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="{{ __('Username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="{{ __('Password') }}" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-dark float-right">
                                    {{ __('Sign In') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="form-group align-content-center">
                    <div class="col-8 offset-2">
                        <a href="{{ route('auth.google.redirect') }}" class="btn btn-sm btn-danger col-12"><i class="fa fa-google"></i> Google</a>
                    </div>
                </div>
                <div class="form-group align-content-center">
                    <div class="col-8 offset-2">
                        <a href="{{ route('auth.facebook.redirect') }}" class="btn btn-sm btn-primary col-12"><i class="fa fa-facebook"></i> Facebook</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
