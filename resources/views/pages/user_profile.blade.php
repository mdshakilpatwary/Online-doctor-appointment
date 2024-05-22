@extends('layouts.app')

@section('title')
    Services
@endsection

@section('banner')
    <div class="banner ">
        <h1 class="banner__title">User Info</h1>
        <img class="banner__img" src="{{ asset('images/banner/banner3.jpg') }}" alt="{{ __('Community Forum') }}">
    </div>
@endsection

@section('content')
<div class="d-flex justify-content-center my-4">
    <div class="col-md-10 col-lg-10">
        <x-user_profile  :user="$user_details"/>
    </div>

</div>

@endsection
