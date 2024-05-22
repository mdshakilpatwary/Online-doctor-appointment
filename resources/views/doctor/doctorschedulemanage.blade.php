@extends('layouts.admin.app')

{{-- @section('link')
    <x-vendor.bootstrap_css />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
@endsection --}}



@section('content')
<div class="container px-4">
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
        <div class="alert alert-warning alert-dismissible show fade">
                              <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                  <span>×</span>
                                </button>
                                {{ session('error')}}
                              </div>
         </div>
        </div>
        
        @endif
            <h2 class="text-center text-danger pb-5">Doctor Schedule </h2>
        <div class="col-md-12 col-sm-12 col-12 col-lg-12 col-xl-12   rounded py-3 " style="box-sizing: border-box; ">
            @if(count($scheduleData) > 0)

            @php
              $sl = 1;
              @endphp
                <table id="dataTable" class="table table-bordered dataTable" style="width:100%">
                    <thead>
                        <tr>
                            <th>#Sl</th>
                            <th>Schedule Date</th>
                            <th>Department</th>
                            <th>time</th>
                            <th>patient quantity</th>
                            <th>Fee</th>
                            <th>Specialist</th>
                            <th>meet link</th>
                            <th>Description</th>
                            <th>status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($scheduleData as $data)
                       <tr>
                        <td>{{$sl++}}</td>
                        <td>{{$data->set_date}}</td>
                        <td>{{$data->department->doctor_department}}</td>
                        <td>
                            @foreach(explode("|",$data->set_time) as $tdata)
                            <span class="btn border-info btn-sm ">{{$tdata}}</span>
                            @endforeach

                        </td>
                        <td>{{$data->patient_qty}}</td>
                        <td>{{$data->patient_fee}}</td>
                        <td>{{$data->specialist}}</td>
                        <td>{{$data->meeting_link}}</td>
                        <td>{{$data->description}}</td>
                        <td>
                            @if($data->status == 1)
                            <a href="{{route('doctor.schedule.status', $data->id)}}" class="badge badge-success badge-shadow" style="text-decoration: none;">Active</a>
                            @else
                            <a href="{{route('doctor.schedule.status', $data->id)}}" class="badge badge-danger badge-shadow" style="text-decoration: none;">Inactive</a>

                            @endif
                        </td>
                        <td>
                            <a href="{{route('doctor.schedule.delete',$data->id)}}" class="btn btn-sm btn-danger text-white "><i class="fa fa-trash"></i></a>
                            <a href="{{route('doctor.schedule.edit',$data->id)}}" class="btn btn-sm btn-info text-white"><i class="fa fa-edit"></i></a>
                           
                        </td>
                    </tr>
                       @endforeach
         
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#Sl</th>
                            <th>Schedule Date</th>
                            <th>Department</th>
                            <th>time</th>
                            <th>patient quantity</th>
                            <th>Fee</th>
                            <th>Specialist</th>
                            <th>meet link</th>
                            <th>Description</th>
                            <th>status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>




            @else
            <h3>No Schedule Set</h3>
            @endif 

        </div>

            <h4 class="display-5 text-gray bg-info py-1">Patient Appointment list</h4>

            <div class="col-md-12 col-sm-12 col-12 col-lg-12 col-xl-12   rounded py-3 " style="box-sizing: border-box; ">
                @if(count($patientData) > 0)
    
                @php
                  $sl = 1;
                  @endphp
                    <table id="dataTable" class="table table-bordered dataTable" style="width:100%">
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
                                <th>Meet link</th>
                                <th>Rating</th>
                                <th>Status</th>
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
                                <a href="{{$data->doctorSchedule->meeting_link}}" target="blank">Meeting Link</a>
                            </td>
                            <td>
                                @if($data->appointment_rating !=null)
                                {{$data->appointment_rating}}
                                @else
                                <span>Value is null</span>
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
                                <a href="{{route('doctor.patient_appointment.view', $data->id)}}" class="btn btn-sm btn-success text-white"><i class="fa fa-eye"></i></a>
                            </td>
                            </tr>
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
                                <th>Meet link</th>
                                <th>Rating</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
    
    
    
    
                @else
                <h3>No patient Appointment </h3>
                @endif 
    
            </div>



    </div>
</div>



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


