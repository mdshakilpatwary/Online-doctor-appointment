@extends('layouts.admin.app')

@section('link')
    <x-vendor.bootstrap_css />
@endsection

@section('content')
    <section class="profile segment-margin">

        <div class="d-flex justify-content-center my-4">
            <div class="col-md-10 col-lg-10">
                <x-user_profile :user="$user" />
            </div>

        </div>
@endsection
