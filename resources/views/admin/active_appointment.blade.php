@extends('layouts.admin.app')

@section('link')
    <x-vendor.bootstrap_css />
@endsection

@section('content')
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
                    {{-- <a href="{{route('admin.patient_appointment.delete', $data->id)}}" class="btn btn-sm btn-danger text-white "><i class="fa fa-trash"></i></a> --}}
                    <a href="{{route('admin.patient_appointment.view', $data->id)}}" class="btn btn-sm btn-success text-white"><i class="fa fa-eye"></i></a>
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
@endsection

@section('scripts')
    <script>



    </script>
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
