@extends('layouts.app')

@section('title')
    {{ __('User Login') }}
@endsection

@section('banner')
    <div class="banner ">
        <h1 class="banner__title">User Login</h1>
        <img class="banner__img" src="{{ asset('images/banner/banner3.jpg') }}" alt="{{ __('Community Forum') }}">
    </div>
@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center m-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" novalidate class="needs-validation" action="{{ route('login') }}">
                            @csrf



                            <div class="row justify-content-center mb-3">
                                {{-- <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> --}}

                                <div class="col-md-8 col-lg-8">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address" autofocus>

                                    <div class="invalid-feedback">
                                        @error('email')
                                            {{ $message }}
                                        @else
                                            Please enter your valid email address.
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center mb-3">
                                {{-- <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label> --}}

                                <div class="col-md-8 col-lg-8">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="password" placeholder="Password">

                                    <div class="invalid-feedback">
                                        @error('password')
                                            {{ $message }}
                                        @else
                                            Please enter your password.
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="row justify-content-center mb-3">
                                <div class="col-md-8 col-lg-8">
                                    <div class="d-grid gap-2">
                                        {{-- <button class="btn btn-primary" type="button">Button</button> --}}
                                        <button class="btn btn-primary" type="submit">Login</button>
                                        @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                    </div>
                                </div>

                            </div>


                            {{-- <div class="row  mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div> --}}
                        </form>

                    </div>
                    <div class="card-footer text-body-secondary">
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button onclick="window.location.href='{{ route('register') }}'" class="btn btn-success" type="button">Create New Account</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/form_validation.js') }}"></script>
@endsection
