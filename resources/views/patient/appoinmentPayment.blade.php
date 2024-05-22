@extends('layouts.app')

@section('title') Doctor Appointment @endsection

@section('banner')
    <div class="banner ">
        <h1 class="banner__title">Doctor Appointment</h1>
        <img class="banner__img" src="{{asset('images/banner/banner3.jpg')}}" alt="{{__('Community Forum')}}">
    </div>
@endsection

@section('content')
@if ($data->payment_status == 'unpaid' && $data->doctorSchedule->patient_qty >0 )

    

<section class="segment-margin">
    <div class="container">

        <div class="row ">
 
            @if(session('success'))
    
            <div class="container alertsuccess">
            <div class="alert alert-success alert-dismissible show fade">
                                  <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                      <span>×</span>
                                    </button>
                                    {{ session('success')}}
                                  </div>
             </div>
            </div>
            @elseif(session('error'))
            <div class="container alerterror">
            <div class="alert alert-success alert-dismissible show fade">
                                  <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                      <span>×</span>
                                    </button>
                                    {{ session('error')}}
                                  </div>
             </div>
            </div>
            
            @endif
                <h2 class="text-center text-gray pb-5">Pay Online method</h2>


            <div class=" col-md-6 col-sm-12 col-12 offset-md-3  bg-gray rounded py-3 " style="border: 1px solid #ddd">
                    <h5 class="text-center text-gray ">Total Fee : &#2547;{{$data->fee}}</h5>
                    
                <form action="{{route('patient.appointment.payment.update',$data->id)}}" method="POST">
                        @csrf
                    <div class="payment-method">
                        {{-- <div class="input-radio">
                            <input type="radio" name="payment_method" id="payment-1" value="cash">
                            <label for="payment-1">
                                <span></span>
                                Cash on 
                            </label>
                            <div class="caption">
                                <p>You can aslo select cash on method</p>
                            </div>
                        </div> --}}
                        <div class="input-radio">
                            <input type="radio" name="payment_method" id="payment-2" value="bkash">
                            <label for="payment-2">
                                <span></span>
                                Bkash
                            </label>
                            <div class="caption">
                                <p>Bkash No: 01585556654</p>
                            </div>
                        </div>
                        <div class="input-radio">
                            <input type="radio" name="payment_method" id="payment-3" value="nagod">
                            <label for="payment-3">
                                <span></span>
                                Nagod
                            </label>
                            <div class="caption">
                                <p>Nagod No: 01858545615</p>
                            </div>
                        </div>
                        <div class="input-radio">
                            <input type="radio" name="payment_method" id="payment-4" value="roket">
                            <label for="payment-4">
                                <span></span>
                                Roket
                            </label>
                            <div class="caption">
                                <p>Roket No: 01858545615</p>
                            </div>
                        </div>
                        @error('payment_method')
                                    <p class="text-danger pt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="input-checkbox">
                        <input type="checkbox" id="terms" name="tarms_checbox">
                        <label for="terms" class="text-primary">
                            <span></span>
                            I've read and accept the <a href="#">terms & conditions</a>
                        </label>
                        @error('tarms_checbox')
                        <p class="text-danger pt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <input type="hidden" name="scheduleId" id="" value="{{$data->doctor_schedule_id}}">
                    <div class="submit-button text-center pt-5">
                        <button class="btn btn-primary btn-lg ">Pay Now</button>
    
                    </div>
                </form>
                </div>
    
    
        </div>
        
    </div>

    
<section>

@elseif($data->doctorSchedule->patient_qty == 0)

<h4 class="text-center py-5">Time exfire and quantity limit full</h4>

<script type="text/javascript">
    // Hide the template after a few seconds
    setTimeout(function () {

        window.location.href = '/patient/patient/appointment/'; 
    }, 2000); 
</script>

@else
<h4 class="text-center py-5">Your payment already paid</h4>

<script type="text/javascript">
    // Hide the template after a few seconds
    setTimeout(function () {

        window.location.href = '/patient/patient/appointment/'; 
    }, 2000); 
</script>
@endif
@endsection

<script>
    // alert message show hide part js 

setTimeout(function() {
    $('.alertsuccess').slideUp(1000);
 },5000);


setTimeout(function() {
    $('.alerterror').slideUp(1000);
 },5000);
</script>
