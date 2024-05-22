<?php
use App\Models\DoctorAppointment;
?>
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
                <h2 class="text-center text-gray pb-5">Input your Appointmet details</h2>

                <div class=" col-md-6 col-sm-12 col-12 offset-md-3  bg-gray rounded py-3" style="border: 1px solid #ddd">
                    
                    <form action="{{route('patient.appointment.add')}}" method="POST">
                        @csrf
                        <div class="col-md-6 col-12 pb-3">
                            <div class="form-group text-center bg-info py-2 ">
                                <h4>Fee &#2547;{{ $doctorSchedule->patient_fee }}</h4>
                                <p>Pay Online payment method </p>
                            </div>
                            
                            <input type="hidden" name="doctor_id" value="{{ $doctorSchedule->doctor->id }}">
                            <input type="hidden" name="doctor_schedule_id" value="{{ $doctorSchedule->id }}">
                            <input type="hidden" name="patient_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="fee" value="{{ $doctorSchedule->patient_fee }}">
                        </div>
                        
                        <div class="row">
                            
                            <div class="col-md-6 col-12 pb-3">
                                <div class="form-group ">
                                    <label for="appointment_date">Your Appointment Date</label>
                                    <input type="date" name="" disabled class="form-control" id="" value="{{ $doctorSchedule->set_date }}">
                                    <input type="hidden" name="appointment_date"  class="form-control" id="" value="{{ $doctorSchedule->set_date }}">
                
                                </div>
                            </div>
                            <div class="col-md-6 col-12 pb-3">
                                <div class="form-group ">
                                    <label for="department">Doctors department</label>
                                    <input type="text" name="" disabled class="form-control" id="" value="{{ $doctorSchedule->department->doctor_department }}">
                                    <input type="hidden" name="department"   id="" value="{{ $doctorSchedule->department->doctor_department }}">
                
                                </div>
                            </div>
                            <div class="col-md-6 col-12 pb-3">
                                <div class="form-group ">
                                    <span class="d-block">Select Your Time</span>
                                   
                                     <!-- Checked checkbox -->
                                     @php
                                        $sl = 1;
                                            
                                    @endphp

                                 
                                 <div class="radio_item pb-3 flex-wrap pt-2 " style="display: flex; ">
                                    @foreach(explode("|",$doctorSchedule->set_time) as $tdata)


                                        <div class="form-radio mr-1 "  >
                                            <input name="time" class="form-radio-input" type="radio"  value="{{$tdata}}" {{ old('time') == $tdata ? 'checked' : '' }}  id="time_{{$ts=$sl++}}" {{DoctorAppointment::where('appointment_date', $doctorSchedule->set_date )->where('time',$tdata)->where('patient_id', Auth::user()->id)->first()  ? 'disabled ' : ''}}/>
                                            <label  class="form-radio-label " for="time_{{$ts}}"><span class="btn border-info btn-sm  {{DoctorAppointment::where('appointment_date', $doctorSchedule->set_date )->where('time',$tdata)->where('patient_id', Auth::user()->id)->first()  ? 'btn-danger ' : ''}}">{{$tdata}}</span></label>

                                        </div>
                                    @endforeach
                                      <!-- Checked checkbox -->
                                                                      
                                    @error('time')
                                        <p class="text-danger ">{{$message}}</p>
                                    @enderror
                                 </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12 pb-3">
                                <div class="form-group ">
                                    <label for="patient_name">Patient Name</label>
                                    <input type="text" value="{{old('patient_name')}}" class="form-control" name="patient_name" id="patient_name" placeholder="Enter your patient name">
                                    @error('patient_name')
                                        <p class="text-danger ">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6 col-12 pb-3">
                                <div class="form-group ">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" value="{{old('email')}}" name="email" id="email" placeholder="Enter your email ">
                                    @error('email')
                                    <p class="text-danger ">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6 col-12 pb-3">
                                <div class="form-group ">
                                    <label for="phone">Phone</label>
                                    <input type="phone" class="form-control" value="{{old('phone')}}" name="phone" id="phone" placeholder="Enter your phone ">
                                    @error('phone')
                                        <p class="text-danger ">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12 pb-3">
                                <div class="form-group ">
                                    <label for="age">Age</label>
                                    <input type="text" class="form-control" value="{{old('age')}}" name="age" id="age" placeholder="Enter patient age ">
                                    @error('age')
                                        <p class="text-danger ">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6 col-12 pb-3">
                                <div class="form-group ">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" value="{{old('address')}}" name="address" id="specialist" placeholder="Enter your speciality ">
                                    @error('address')
                                        <p class="text-danger ">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12 pb-3">
                                <div class="form-group ">
                                    <label for="patient_problem">Patient Problem (Optional)</label>
                                    <input type="text" class="form-control" value="{{old('patient_problem')}}" name="patient_problem" id="patient_problem" placeholder="Enter patient problem ">
                                    @error('patient_problem')
                                        <p class="text-danger ">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-12 pb-3">
                                
                            </div>
                            <div class="col-md-12 col-12 pb-3">
                                <div class="form-group ">
                                    <label for="description">Short Description(Optional)</label>
                                    <textarea name="description" class="form-control" id="description" cols="10" rows="4" placeholder="Enter your short description">{{old('description')}}</textarea>
                    
                                </div>
                            </div>
    
                        </div>
                        
                        <div class="">
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            @if($doctorSchedule->patient_qty >0)
                            <button class="btn btn-lg btn-success">Submit Your Schedule</button>
                            @else
                            <h4 class="btn btn-warning">Patient appointment Limit fill up</h4>
                            @endif

    
                        </div>
                    </form>
                </div>
    
    
        </div>
        
    </div>
<section>
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
