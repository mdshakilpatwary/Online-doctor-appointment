@extends('layouts.app')

@section('title')
    Profile
@endsection

@section('banner')
    <div class="banner ">
        <h1 class="banner__title">{{ __('Edit Basic Info') }}</h1>
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
                    <form method="POST" action="{{ route('patient.profile.update', [$user, 'form' => 'basic_info']) }}"
                        class="row g-3 needs-validation" novalidate>
                        @csrf
                        @method('PUT')
                        <div class="col-md-6 col-lg-6">
                            <label for="validationCustom01" class="form-label">First name</label>
                            <input type="text" name="first_name" class="form-control" id="validationCustom01"
                                value="{{ $user->first_name }}" required>

                            <div class="invalid-feedback">
                                @error('first_name')
                                    {{ $message }}
                                @else
                                    Please enter your first name
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <label for="validationCustom02" class="form-label">Last name</label>
                            <input type="text" name="last_name" class="form-control" id="validationCustom02"
                                value="{{ $user->last_name }}" required>
                            <div class="invalid-feedback">
                                @error('last_name')
                                    {{ $message }}
                                @else
                                    Please enter your last name
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6  col-lg-6">
                            <label for="gender" class="col-form-label text-md-end">{{ __('Sex') }}</label>

                            <div id="gender" class="">
                                <input type="radio" required @checked($user->gender == 'male')
                                    class="form-check-input @error('gender')
                                        is-invalid
                                    @enderror" name="gender"
                                    value="{{ __('male') }}" id="male" autocomplete="off"
                                    {{ old('gender') == 'male' ? 'checked' : '' }}>
                                <label class="form-check-label" for="male">Male</label>

                                <input type="radio" required @checked($user->gender == 'female')
                                    class="form-check-input @error('gender')
                                        is-invalid
                                    @enderror" name="gender"
                                    value="{{ __('female') }}  old('Doctor') " id="female" autocomplete="off"
                                    {{ old('gender') == 'female' ? 'checked' : '' }}>
                                <label class="form-check-label" for="female">female</label>

                                <input type="radio" required @checked($user->gender == 'other')
                                    class="form-check-input @error('gender')
                                        is-invalid
                                    @enderror" name="gender"
                                    value="{{ __('other') }}  old('Counselor') " id="counselor" autocomplete="off"
                                    {{ old('gender') == 'Counselor' ? 'checked' : '' }}>
                                <label class="form-check-label" for="counselor">others</label>

                                <div class="invalid-feedback">
                                    @error('gender')
                                        {{ $message }}
                                    @else
                                        Please choose your gender
                                    @enderror

                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6">

                            <label for="date_of_birth" class="form-label">Date Of Birth</label>
                            <input type="date" name="date_of_birth" class="form-control" id="date_of_birth"
                                value="{{ $user->date_of_birth }}" required>

                            <div class="invalid-feedback">
                                @error('date_of_birth')
                                    {{ $message }}
                                @else
                                    Please provide your date of birth
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6">
                            <label for="blood_group" class="form-label">Blood Group</label>
                            <select name="blood_group_id" id="blood_group" class="form-select"
                                aria-label="Default select example">
                                <option value="null">None</option>

                                @foreach ($blood_groups as $group)
                                    <option value="{{ $group->id }}"
                                        @isset($user->bloodGroup->id)
                                            @if ($user->bloodGroup->id == $group->id)
                                                selected
                                            @endif
                                        @endisset>
                                        {{ $group->group }}</option>
                                @endforeach



                            </select>
                            <div class="invalid-feedback">
                                @error('password')
                                    {{ $message }}
                                @else
                                    Select Your Blood Group
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6">
                            <label for="religion" class="form-label">Religion</label>
                            <input type="text" name="religion" class="form-control" id="religion"
                                value="{{ $user->religion }}">
                        </div>



                        <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                            <label for="nationality" class="form-label">Nationality</label>
                            <select name="nationality" id="nationality" required class="form-select"
                                aria-label="Default select example">
                                <option value="" disabled @selected($user?->nationality == null)>Select One</option>
                                @foreach ($country_phone as $data)
                                    <option @selected($user?->nationality == $data['nationality']) value="{{ $data['nationality'] }}">
                                        {{ $data['nationality'] }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="col-md-6 col-lg-6">
                            <label for="religion" class="form-label">Language</label>
                            <input readonly type="text" name="" class="form-control" id="religion"
                                value="English">
                        </div>






                        <div class="d-grid col-6 mx-auto">
                            <button class="btn btn-danger" type="button">Cancel</button>
                        </div>
                        <div class="d-grid col-6 mx-auto">
                            <input value="Update" class="btn btn-primary" type="submit">
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </main>
@endsection

@section('scripts')
    <script src="{{ asset('js/form_validation.js') }}"></script>
@endsection
