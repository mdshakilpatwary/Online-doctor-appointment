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
                    <th>Description</th>
                    <th>status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
               @foreach($scheduleData as $data)
               <tr>
                <td>{{$sl++}}</td>
                <td><a href="{{route('admin.spacific.schedule.appointment', $data->id)}}">{{$data->set_date}}</a></td>
                <td>{{$data->department->doctor_department}}</td>
                <td>
                    @foreach(explode("|",$data->set_time) as $tdata)
                    <span class="btn border-info btn-sm ">{{$tdata}}</span>
                    @endforeach

                </td>
                <td>{{$data->patient_qty}}</td>
                <td>&#2547;{{$data->patient_fee}}</td>
                <td>{{$data->specialist}}</td>
                {{-- <td>{{$data->meeting_link}}</td> --}}
                <td>{{$data->description}}</td>
                <td>
                    @if($data->status == 1)
                    <a href="{{route('admin.schedule.status', $data->id)}}" class="badge badge-success badge-shadow" style="text-decoration: none;">Active</a>
                    @else
                    <a href="{{route('admin.schedule.status', $data->id)}}" class="badge badge-danger badge-shadow" style="text-decoration: none;">Inactive</a>

                    @endif
                </td>
                <td>
                    <a href="{{route('admin.schedule.delete',$data->id)}}" class="btn btn-sm btn-danger text-white "><i class="fa fa-trash"></i></a>                   
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
