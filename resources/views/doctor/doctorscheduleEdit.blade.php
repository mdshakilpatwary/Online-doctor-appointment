@extends('layouts.admin.app')

{{-- @section('link')
    <x-vendor.bootstrap_css />
    <link rel="stylesheet" href="{{ asset('css/community.css') }}">
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

            <div class="offset-md-3 col-md-6 col-sm-12 col-12  bg-gray rounded py-3" style="border: 1px solid #ddd">
                
                <form action="{{route('doctor.schedule.update', $scheduleData->id)}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group ">
                                <label for="set_date">Select Your Date</label>
                                <input type="date" name="set_date" class="form-control" id="" value="{{ $scheduleData->set_date }}">
                                @error('set_date')
                                    <p class="text-danger ">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group ">
                                <label for="department_id">Select Your Department</label>
                                <select name="department_id" id="" class="form-control form-select" >
                                    @foreach ($department as $item)
                                    <option value="{{$item->id}}" {{ $scheduleData->department->id == $item->id ? 'selected' : '' }}>{{$item->doctor_department}}</option>                                       
                                    @endforeach
                                </select>
                                @error('department_id')
                                    <p class="text-danger ">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group ">
                                <span class="d-block">Select Your Time</span>
                               
                                 <!-- Checked checkbox -->
                                 @php
                                 $sl = 1;
                                     
                                 @endphp
                                 
                                 <div class="checkbox_item pb-3 flex-wrap " style="display: flex; ">
                                    @foreach(explode("|",$scheduleData->set_time) as $tdata)
                                        <div class="form-check mr-1">
                                            <input name="set_time[]" class="form-check-input" type="checkbox" value="{{$tdata}}" checked id="set_time_{{$ts=$sl++}}" />
                                            <label class="form-check-label" for="set_time_{{$ts}}"><span class="btn border-info btn-sm">{{$tdata}}</span></label>
                                        </div>
                                    @endforeach
                                 </div>

                     
                                  <!-- Checked checkbox -->
                                                                  
                                @error('set_time')
                                    <p class="text-danger ">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group ">
                                <label for="patient_qty">Patient quantity limit</label>
                                <input type="floatval" value="{{ $scheduleData->patient_qty }}" class="form-control" name="patient_qty" id="patient_qty" placeholder="Enter your patient quantity">
                                @error('patient_qty')
                                    <p class="text-danger ">{{$message}}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group ">
                                <label for="patient_fee">Fee</label>
                                <input type="floatval" class="form-control" value="{{ $scheduleData->patient_fee }}" name="patient_fee" id="patient_fee" placeholder="Enter your fee ">
                                @error('patient_fee')
                                    <p class="text-danger ">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group ">
                                <label for="specialist">Specialist</label>
                                <input type="text" class="form-control" value="{{ $scheduleData->specialist }}" name="specialist" id="specialist" placeholder="Enter your speciality ">
                                @error('specialist')
                                    <p class="text-danger ">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="form-group ">
                                <label for="meeting_link">Meeting Link(Optional)</label>
                                <input type="text" class="form-control" value="{{ $scheduleData->meeting_link }}" name="meeting_link" id="meeting_link" placeholder="Enter your Meeting link ">
                                @error('meeting_link')
                                <p class="text-danger ">{{$message}}</p>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="form-group ">
                                <label for="description">Short Description(Optional)</label>
                                <textarea name="description" class="form-control" id="description" cols="10" rows="4" placeholder="Enter your short description">{{ $scheduleData->description }}</textarea>
                
                            </div>
                        </div>

                    </div>
                    
                    <div class="">
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <button class="btn btn-lg btn-success">Update Your Schedule</button>

                    </div>
                </form>
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
