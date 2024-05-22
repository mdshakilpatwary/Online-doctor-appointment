@extends('layouts.app')

@section('title') Registration Form @endsection

@section('banner')
    <div class="banner ">
        <h1 class="banner__title">User Registration</h1>
        <img class="banner__img" src="{{asset('images/banner/banner3.jpg')}}" alt="{{__('Register')}}">
    </div>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card m-5">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" novalidate class="needs-validation" action="{{ route('register') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Select Account Type') }}</label>

                            <div class="col-md-7">
                                <input type="radio" required class="btn-check @error('role') is-invalid @enderror" name="role" value="{{__('Patient')}}" id="patient" autocomplete="off" {{ old('role') == 'Patient' ? 'checked' : '' }} >
                                <label class="btn btn-outline-success" for="patient">Patient</label>

                                <input type="radio" required class="btn-check @error('role') is-invalid @enderror" name="role" value="{{__('Doctor')}} {{-- old('Doctor') --}}" id="doctor" autocomplete="off" {{ old('role') == 'Doctor' ? 'checked' : '' }} >
                                <label class="btn btn-outline-success" for="doctor">Doctor</label>

                                <input type="radio" required class="btn-check @error('role') is-invalid @enderror" name="role" value="{{__('Counselor')}} {{-- old('Counselor') --}}" id="counselor" autocomplete="off" {{ old('role') == 'Counselor' ? 'checked' : '' }}>
                                <label class="btn btn-outline-success" for="counselor">Counselor</label>

                                <div class="invalid-feedback">
                                    @error('role')
                                        {{ $message }}
                                    @else
                                        Please choose a who you are.
                                    @enderror

                                </div>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-7">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">


                                <div class="invalid-feedback">
                                    @error('email')
                                        {{ $message }}
                                    @else
                                        Please Provide your email.
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-7">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="New Password">


                                <div class="invalid-feedback">
                                    @error('password')
                                        {{ $message }}
                                    @else
                                        Please create a password.
                                    @enderror
                                </div>


                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-7">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                <div class="invalid-feedback">
                                    Password doesn't match with confirm password.
                                </div>
                            </div>
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button class="btn btn-success" type="submit">Sign Up</button>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{asset('js/form_validation.js')}}"></script>
@endsection
