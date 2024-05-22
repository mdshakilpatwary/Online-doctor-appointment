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
            <div class="col-md-5 col-sm-12 col-12 col-lg-3 col-xl-3   rounded py-3 " style="box-sizing: border-box; ">
                
                <form action="{{route('doctor.department.add')}}" method="POST">
                    @csrf
                    <div class="form-group ">
                        <label for="doctor_department">If don't match your department enter here and add new </label>
                        <input type="text" name="doctor_department" class="form-control" id="" value="{{ old('doctor_department') }}" placeholder=" Add your department">
                        @error('doctor_department')
                            <p class="text-danger ">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="text-right">
                        <button class="btn btn-sm btn-success">Add</button>

                    </div>
                </form>
            </div>
            <div class="col-12 col-md-1 col-xl-1 col-lg-1"></div>
            <div class=" col-md-6 col-sm-12 col-12 col-lg-8 col-xl-8  bg-gray rounded py-3" style="border: 1px solid #ddd">
                
                <form action="{{route('doctor.schedule.add')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group ">
                                <label for="set_date">Select Your Date</label>
                                <input type="date" name="set_date" class="form-control" id="" value="{{ old('set_date') }}">
                                @error('set_date')
                                    <p class="text-danger ">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group ">
                                <label for="department_id">Select Your Department</label>
                                <select name="department_id" id="" class="form-control form-select" >
                                    <option value="{{old('department_id')}}"  selected>----Select Size-----</option>
                                    @foreach ($department as $item)
                                    <option value="{{$item->id}}">{{$item->doctor_department}}</option>                                       
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

                                <div class="checkbox_item pb-3 " style="display: flex; justify-content: space-around;">
                                    <div class="form-check">
                                        <input name="set_time[]" class="form-check-input" type="checkbox" value="10-11 AM" {{ in_array('10-11 AM', old('set_time', [])) ? 'checked' : '' }} id="set_time_1" />
                                        <label class="form-check-label" for="set_time_1"><span class="btn border-info btn-sm">10-11 AM</span></label>
                                    </div>
                                    <div class="form-check">
                                        <input name="set_time[]" class="form-check-input" type="checkbox" value="11-12 PM" {{ in_array('11-12 PM', old('set_time', [])) ? 'checked' : '' }} id="set_time_2" />
                                        <label class="form-check-label" for="set_time_2"><span class="btn border-info btn-sm">11-12 PM</span></label>
                                    </div>
                                    <div class="form-check ">
                                        <input name="set_time[]" class="form-check-input" type="checkbox" value="12-01 PM" {{ in_array('12-01 PM', old('set_time', [])) ? 'checked' : '' }} id="set_time_3" />
                                        <label class="form-check-label" for="set_time_3"><span class="btn border-info btn-sm">12-01 PM</span></label>
                                    </div>
                                </div>
                                <div class="checkbox_item pb-3 " style="display: flex; justify-content: space-around;">
                                    <div class="form-check">
                                        <input name="set_time[]" class="form-check-input" type="checkbox" value="01-02 PM" {{ in_array('01-02 PM', old('set_time', [])) ? 'checked' : '' }} id="set_time_4" />
                                        <label class="form-check-label" for="set_time_4"><span class="btn border-info btn-sm">01-02 PM</span></label>
                                    </div>
                                    <div class="form-check">
                                        <input name="set_time[]" class="form-check-input" type="checkbox" value="02-03 PM" {{ in_array('02-03 PM', old('set_time', [])) ? 'checked' : '' }} id="set_time_5" />
                                        <label class="form-check-label" for="set_time_5"><span class="btn border-info btn-sm">02-03 PM</span></label>
                                    </div>
                                    <div class="form-check ">
                                        <input name="set_time[]" class="form-check-input" type="checkbox" value="03-04 PM" {{ in_array('03-04 PM', old('set_time', [])) ? 'checked' : '' }} id="set_time_6" />
                                        <label class="form-check-label" for="set_time_6"><span class="btn border-info btn-sm">03-04 PM</span></label>
                                    </div>
                                </div> 
                                <div class="checkbox_item " style="display: flex; justify-content: space-around;">
                                    <div class="form-check">
                                        <input name="set_time[]" class="form-check-input" type="checkbox" value="04-05 PM" {{ in_array('04-05 PM', old('set_time', [])) ? 'checked' : '' }} id="set_time_7" />
                                        <label class="form-check-label" for="set_time_7"><span class="btn border-info btn-sm">04-05 PM</span></label>
                                    </div>
                                    <div class="form-check">
                                        <input name="set_time[]" class="form-check-input" type="checkbox" value="05-06 PM" {{ in_array('05-06 PM', old('set_time', [])) ? 'checked' : '' }} id="set_time_8" />
                                        <label class="form-check-label" for="set_time_8"><span class="btn border-info btn-sm">05-06 PM</span></label>
                                    </div>
                                    <div class="form-check ">
                                        <input name="set_time[]" class="form-check-input" type="checkbox" value="06-07 PM" {{ in_array('06-07 PM', old('set_time', [])) ? 'checked' : '' }} id="set_time_9" />
                                        <label class="form-check-label" for="set_time_9"><span class="btn border-info btn-sm">06-07 PM</span></label>
                                    </div>
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
                                <input type="floatval" value="{{old('patient_qty')}}" class="form-control" name="patient_qty" id="patient_qty" placeholder="Enter your patient quantity">
                                @error('patient_qty')
                                    <p class="text-danger ">{{$message}}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group ">
                                <label for="patient_fee">Fee</label>
                                <input type="floatval" class="form-control" value="{{old('patient_fee')}}" name="patient_fee" id="patient_fee" placeholder="Enter your fee ">
                                @error('patient_fee')
                                    <p class="text-danger ">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group ">
                                <label for="specialist">Specialist</label>
                                <input type="text" class="form-control" value="{{old('specialist')}}" name="specialist" id="specialist" placeholder="Enter your speciality ">
                                @error('specialist')
                                    <p class="text-danger ">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="form-group ">
                                <label for="meeting_link">Meeting Link(Optional)</label>
                                <input type="text" class="form-control" value="{{old('meeting_link')}}" name="meeting_link" id="meeting_link" placeholder="Enter your Meeting link ">
                                @error('meeting_link')
                                <p class="text-danger ">{{$message}}</p>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="form-group ">
                                <label for="description">Short Description(Optional)</label>
                                <textarea name="description" class="form-control" id="description" cols="10" rows="4" placeholder="Enter your short description">{{old('description')}}</textarea>
                
                            </div>
                        </div>

                    </div>
                    
                    <div class="">
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <button class="btn btn-lg btn-success">Submit Your Schedule</button>

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
