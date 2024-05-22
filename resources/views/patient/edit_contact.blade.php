@extends('layouts.app')

@section('title')
    Profile
@endsection

@section('banner')
    <div class="banner ">
        <h1 class="banner__title">{{ __('Edit Contact Info') }}</h1>
        <img class="banner__img" src="{{ asset('images/banner/banner3.jpg') }}" alt="{{ __('User Profile') }}">
    </div>
@endsection
@php
    $country_phone = json_decode(file_get_contents(public_path('data/countries.json')), true);
@endphp

@section('content')
    <main class="main">
        <section class="profile segment-margin">

            <div class="row  justify-content-center">
                <div class="col-md-8 col-lg-8">
                    <form method="POST" action="{{ route('patient.profile.update', [$user, 'form' => 'contact_info']) }}"
                        class="row g-3 needs-validation" novalidate>
                        @csrf
                        @method('PUT')

                        <div class="col-12 col-lg-3 col-xl-3 col-xxl-3">
                            <label for="phone_code" class="form-label">Phone Code</label>
                            <select name="phone_code" id="phone_code" class="form-select"
                                aria-label="Default select example" required>
                                <option value="" disabled @selected($user?->phone_code == null)>Select One</option>

                                @foreach ($country_phone as $data)
                                    <option @selected($user?->phone_code == $data['num_code']) value="{{ $data['num_code'] }}">
                                        {{ $data['num_code'] }}</option>
                                @endforeach


                            </select>
                            @error('phone_code')
                                <span class="text-danger">{{ $message }}</span>
                            @else
                                <div class="invalid-feedback">
                                    Enter you contact no here.
                                </div>
                            @enderror

                        </div>

                        <div class="col-md-9 col-lg-9">
                            <label for="phone" class="form-label">Contact No</label>
                            <input type="text" name="phone" class="form-control" id="phone"
                                value="{{ $user?->phone }}" required>


                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @else
                                <div class="invalid-feedback">
                                    Enter you contact no here.
                                </div>
                            @enderror


                        </div>


                        <div class="col-12 col-lg-3 col-xl-3 col-xxl-3">
                            <label for="additional_phone_code" class="form-label">Phone Code</label>
                            <select name="additional_phone_code" id="additional_phone_code" class="form-select" required
                                aria-label="Default select example">
                                <option value="" disabled @selected($user?->additional_phone_code == null)>Select One</option>

                                @foreach ($country_phone as $data)
                                    <option @selected($user?->additional_phone_code == $data['num_code']) value="{{ $data['num_code'] }}">
                                        {{ $data['num_code'] }}</option>
                                @endforeach


                            </select>
                            @error('additional_phone_code')
                                <span class="text-danger">{{ $message }}</span>
                            @else
                                <div class="invalid-feedback">
                                    Select your  phone code
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-9 col-lg-9">
                            <label for="additional_phone" class="form-label">Emmergency No</label>
                            <input type="text" name="additional_phone" class="form-control" id="additional_phone"
                                value="{{ $user?->additional_phone }}" required>

                            @error('additional_phone')
                                <span class="text-danger">{{ $message }}</span>
                            @else
                                <div class="invalid-feedback">
                                    Enter you emmergency contact no here.
                                </div>
                            @enderror
                        </div>





                        <div class="d-grid col-6 mx-auto">
                            <button class="btn btn-danger" type="button">Cancel</button>
                        </div>
                        <div class="d-grid col-6 mx-auto">
                            <input value="Update" class="btn btn-primary" type="submit">
                        </div>
                    </form>

                    {{-- <form action="{{ route('patient.profile.update', [$user, 'form' => 'contact_info']) }}"
                        class="row g-3 needs-validation" novalidate>
                        @csrf
                        @method('PUT')

                        <div class="col-12 col-lg-3 col-xl-3 col-xxl-3">
                            <label for="additional_phone_code" class="form-label">Phone Code</label>
                            <select name="additional_phone_code" id="additional_phone_code" class="form-select"
                                aria-label="Default select example" required>
                                <option value="" disabled @selected($user?->additional_phone_code == null)>Select One</option>

                                @foreach ($country_phone as $data)
                                    <option @selected($user?->additional_phone_code == $data['num_code']) value="{{ $data['num_code'] }}">
                                        {{ $data['num_code'] }}</option>
                                @endforeach


                            </select>
                        </div>

                        <div class="col-md-9 col-lg-9">
                            <label for="phone" class="form-label">Contact No</label>
                            <input type="text" name="phone" class="form-control" id="phone"
                                value="{{ $user?->phone }}" required>

                            <div class="invalid-feedback">
                                @error('phone')
                                    {{ $message }}
                                @else
                                    Enter you contact no here.
                                @enderror
                            </div>
                        </div>


                        <div class="col-12 col-lg-3 col-xl-3 col-xxl-3">
                            <label for="additional_phone_code" class="form-label">Phone Code</label>
                            <select name="additional_phone_code" id="additional_phone_code" class="form-select" required
                                aria-label="Default select example">
                                <option value="" disabled @selected($user?->additional_phone_code == null)>Select One</option>

                                @foreach ($country_phone as $data)
                                    <option @selected($user?->additional_phone_code == $data['num_code']) value="{{ $data['num_code'] }}">
                                        {{ $data['num_code'] }}</option>
                                @endforeach


                            </select>
                        </div>

                        <div class="col-md-9 col-lg-9">
                            <label for="additional_phone" class="form-label">Emmergency No</label>
                            <input type="text" name="additional_phone" class="form-control" id="additional_phone"
                                value="{{ $user?->additional_phone }}" required>

                            <div class="invalid-feedback">
                                @error('additional_phone')
                                    {{ $message }}
                                @else
                                    Enter you contact no here.
                                @enderror
                            </div>
                        </div>


                        <div class="d-grid col-6 mx-auto">
                            <button class="btn btn-danger" type="button">Cancel</button>
                        </div>
                        <div class="d-grid col-6 mx-auto">
                            <input value="Update" class="btn btn-primary" type="submit">
                        </div>
                    </form> --}}
                </div>

            </div>
        </section>
    </main>
@endsection

@section('scripts')
    <script src="{{ asset('js/form_validation.js') }}"></script>
@endsection
