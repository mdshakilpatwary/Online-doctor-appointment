<div class="row justify-content-between">
    <!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->
    <div class="col-10">
        <h4 class="small font-weight-bold">Account Setup <span
                class="float-right">{{$progress}}</span></h4>
        <div class="progress">
            <div class="progress-bar bg-success" role="progressbar" style="width: {{$progress}}"
                 aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>
    <div class="col-2">
        <a href="
        @role('Counselor')
        {{route('counselor.counselor_form')}}
        @endrole
        @role('Doctor')
        {{route('doctor.doctor_form')}}
        @endrole

        " class="btn btn-primary btn-icon-split">
            <span class="text">Edit Profile</span>
        </a>
    </div>

</div>



