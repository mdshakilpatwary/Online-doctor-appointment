@extends('layouts.app')

@section('title') Doctor Appointment @endsection

@section('banner')
    <div class="banner ">
        <h1 class="banner__title">Doctor Appointment</h1>
        <img class="banner__img" src="{{asset('images/banner/banner3.jpg')}}" alt="{{__('Community Forum')}}">
    </div>
@endsection

@section('content')
<section class="segment-margin">
    <div class="container">

        <div class="row">
            <div class="col-md-3"></div>
                <div class="col-md-6">
                <div class="alert alert-success" role="alert" style="">
                    <h3 class="alert-heading" style="text-align: center;">Well Done!</h3>
                    <h4 style="text-align: center;">You have successfully Doctor appointment</h4>

                    <hr>
                    <p class="mb-0" style="text-align: center;">We will contact you soon.</p>
                </div>
                </div>
                <div class="col-md-3"></div>
        </div>
        
    </div>
<section>
@endsection

<script type="text/javascript">
    // Hide the template after a few seconds
    setTimeout(function () {

        window.location.href = '/'; 
    }, 5000); 
</script>
