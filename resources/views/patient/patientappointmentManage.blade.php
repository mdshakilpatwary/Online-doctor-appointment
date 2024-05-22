<?php
use Carbon\Carbon;

?>
@extends('layouts.app')

@section('title') My Appointment @endsection

@section('banner')
    <div class="banner ">
        <h1 class="banner__title">My Appointment</h1>
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
                <h2 class="text-center text-gray pb-5"></h2>

                <div class="col-md-12 col-sm-12 col-12 col-lg-12 col-xl-12   rounded py-3 " style="box-sizing: border-box; ">
                    @if(count($patientData) > 0)
        
                    @php
                      $sl = 1;
                      @endphp
                        <table id="dataTable" class="table responsive table-bordered dataTable" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#Sl</th>
                                    <th>Name</th>
                                    <th>Schedule Date</th>
                                    <th>Department</th>
                                    <th>time</th>
                                    <th>Fee</th>
                                    <th>Payment Method</th>
                                    <th>Payment Status</th>
                                    <th>meet link</th>
                                    <th>Rating</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($patientData as $data)
                               <tr>
                                <td>{{$sl++}}</td>
                                <td>{{$data->patient_name}}</td>
                                <td>{{$data->appointment_date}}</td>
                                <td>{{$data->department}}</td>
                                <td><span class="btn border-info btn-sm ">{{$data->time}}</span></td>
                                <td>&#2547;{{$data->fee}}</td>
                                <td>{{$data->payment_method}}</td>
                                <td>{{$data->payment_status}}</td>
                                <td>
                                    @php
                                       $dateToCheck = Carbon::parse($data->appointment_date); 
                                    @endphp

                                    @php
                                    // Time convert my table system
                                    $currentTime = date('h');
                                    $newTime = $currentTime + 1;
                                    $AppointmentTime =date('h-').$newTime.date(' A');
                                    $currentDate = Carbon::now();
                                    $currentDate = $currentDate->format('Y-m-d');

                                    @endphp
                                    @if($data->appointment_date .' '.$data->time == $currentDate.' '.$AppointmentTime)

                                    <div class="text-center">
                                        <a href="{{$data->doctorSchedule->meeting_link}}" target="blank">Meeting Link</a>
                                    </div>
                                        
                                    @elseif($dateToCheck->isPast())

                                        @if($data->appointment_rating == null)
                                          <div class="text-center">
                                            <button data-bs-toggle="modal" data-bs-target="#appointmentRating_{{$data->id}}"  class="btn btn-info btn-sm ">Click For Rating</button>
                                          </div>
                                        @else
                                        <p class="text-gray text-center">Link Expired</p>

                                        @endif
                                        
                                    @else

                                    <span>Meeting link will open according to your schedule date</span>
                                    
                                    @endif
                                </td>

                                <td>

                                                                     
                                    {{$data->appointment_rating}}
                                
                                    @if($data->appointment_rating == null)
                                    <span>no rating</span>
                                    @endif
                                







                                </td>
                                

                           
                                <td>
                                    @if($data->status == 1)
                                    <span  class="bg-success p-1 " style="text-decoration: none; pointer-events: none; ">Active</span>
                                    @else
                                    <span href="" class="bg-warning p-1" style="text-decoration: none; pointer-events: none;">Inactive</span>
        
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('patient.patient_appointment.delete', $data->id)}}" class="btn btn-sm btn-danger text-white "><i class="fa fa-trash"></i></a>
                                    <a href="{{route('patient.patient_appointment.edit', $data->id)}}" class="btn btn-sm btn-primary text-white"><i class="fa fa-edit"></i></a>
                                    <a href="{{route('patient.patient_appointment.view', $data->id)}}" class="btn btn-sm btn-success text-white"><i class="fa fa-eye"></i></a>



                                </td>
                                </tr>



                    <!--Appointment rating  Modal -->
                    <div class="modal fade" id="appointmentRating_{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Appointment Rating (10/?)</h5>
                              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="{{route('patient.rating.update', $data->id)}}" method="POST">
                              @csrf
                      
                            <div class="modal-body ">
                                <div class="form-group ">
                                    <label for="appointment_rating">Appointment Rating </label>
                                    <input type="text" class="form-control" value="{{old('appointment_rating')}}" name="appointment_rating" id="appointment_rating" placeholder="Enter Your Appointment Rating ">
                                    @error('appointment_rating')
                                        <p class="text-danger ">{{$message}}</p>
                                    @enderror
                                </div>                                
                              
                              
                              
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
                              <button class="btn btn-info">Rating Submit</button>
                            </div>
                          </form>
                          </div>
                        </div>
                      </div>
                               @endforeach
                 
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#Sl</th>
                                    <th>Name</th>
                                    <th>Schedule Date</th>
                                    <th>Department</th>
                                    <th>time</th>
                                    <th>Fee</th>
                                    <th>Payment Method</th>
                                    <th>Payment status</th>
                                    <th>meet link</th>
                                    <th>Rating</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
        
        
        
        
                    @else
                    <h3>No Schedule Set</h3>
                    @endif 
        
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
