@extends('layouts.app')

@section('title') Profile @endsection

@section('banner')
    <div class="banner ">
        <h1 class="banner__title">{{__("Edit Address")}}</h1>
        <img class="banner__img" src="{{asset('images/banner/banner3.jpg')}}" alt="{{__('User Profile')}}">
    </div>
@endsection
{{--country info--}}
@php
    $country_phone = json_decode(file_get_contents(public_path('data/countries.json')), true);
@endphp

@section('content')

    <main class="main">
        <section class="profile segment-margin">

            <div class="row  justify-content-center">
                <div class="col-md-8 col-lg-8">
                    <form method="POST" action="{{route('patient.profile.update',[$user,'form'=>'address'])}}" class="row g-3 needs-validation" novalidate>
                        @csrf
                        @method('PUT')
                        <div class="col-md-6 col-lg-6">
                            <label for="validationCustom01" class="form-label">Address Line 1</label>
                            <input type="text" name="address" class="form-control" id="validationCustom01" value="{{$user?->address?->address}}" required>

                            <div class="invalid-feedback">
                                @error('address')
                                {{ $message }}
                                @else
                                    Please enter address here
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6">
                            <label for="address2" class="form-label">Address Line 2(Optional)</label>
                            <input type="text" name="address2" class="form-control" id="address2" value="{{$user?->address?->address2}}">

                            <div class="invalid-feedback">
                                @error('address2')
                                {{ $message }}
                                @else
                                    Please enter address here
                                    @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6">
                            <label for="validationCustom02" class="form-label">City</label>
                            <input type="text" name="city" class="form-control" id="validationCustom02" value="{{$user?->address?->city}}" required>
                            <div class="invalid-feedback">
                                @error('city')
                                {{ $message }}
                                @else
                                    Please enter your city name
                                    @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6">
                            <label for="state" class="form-label">State</label>
                            <input type="text" name="state" class="form-control" id="state" value="{{$user?->address?->state}}" required>
                            <div class="invalid-feedback">
                                @error('state')
                                {{ $message }}
                                @else
                                    Please enter your state name
                                    @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6">
                            <label for="zip_code" class="form-label">Zip/Postcode</label>
                            <input type="text" name="zip_code" class="form-control" id="zip_code" value="{{$user?->address?->zip_code}}">
                        </div>

                        {{-- <div class="col-md-6 col-lg-6">
                            <label for="country"  class="form-label">Country</label>
                            <select name="country" id="country" class="form-select" aria-label="Default select example">
                                <option value="null">None</option>
                                <option value="null">BD</option>
                                <option value="null">UK</option>
                                <option value="null">USA</option>

{{--                                @foreach ($blood_groups as $group)--}}
{{--                                    <option value="{{$group->id}}"--}}
{{--                                            @isset($user->bloodGroup->id)--}}
{{--                                                @if($user->bloodGroup->id == $group->id)--}}
{{--                                                    selected--}}
{{--                                        @endif--}}
{{--                                        @endisset--}}
{{--                                    >{{$group->group}}</option>--}}
{{--                                @endforeach--}}


{{--
                            </select>
                            <div class="invalid-feedback">
                                @error('password')
                                {{ $message }}
                                @else
                                    Select Your Country
                                    @enderror
                            </div>
                        </div> --}}

                        <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                            <label for="country" class="form-label">Country</label>
                            <select class="form-select" aria-label="Default select example" name="country" id="country"
                                required>
                                <option value="" disabled @selected($user?->address?->country == null)>Select One</option>

                                @foreach ($country_phone as $data)
                                    <option @selected($user?->address?->country == $data['en_short_name']) value="{{ $data['en_short_name'] }}">
                                        {{ $data['en_short_name'] }}</option>
                                @endforeach
                            </select>
                        </div>



                        <input type="hidden" name="user_id" value="{{$user?->id}}">



                        <div class="d-grid col-6 mx-auto">
                            <button  class="btn btn-danger" type="button" >Cancel</button>
                        </div>
                        <div class="d-grid col-6 mx-auto">
                            <input value="Update" class="btn btn-primary" type="submit" >
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </main>
@endsection

@section('scripts')
    <script src="{{asset('js/form_validation.js')}}"></script>
@endsection


