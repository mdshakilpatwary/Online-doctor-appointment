<div>
    <div class="row justify-content-center">
        @if ($user->is_active == 1)

            <div class="alert alert-success" role="alert">
                <span>Account Status : <span class="strong">Active <i class="fa-solid fa-circle-check"></i></span></span>
            </div>
        @else
            <div class="alert alert-danger" role="alert">
                <span>Account Status : <span class="strong">Blocked <i class="fa-solid fa-lock"></i></span></span>
            </div>
        @endif


        <div class="col-md-3 col-lg-3 align-self-center">
            @isset($user->pp_name)
                <img src="{{ asset($user->pp_location . '/' . $user->pp_name) }}" class="img-fluid rounded" alt="...">
            @else
                <img src="{{ asset('images/profile_pic/blank-profile-picture.png') }}" class="img-fluid rounded"
                    alt="...">
            @endisset
            {{-- <p class="text-center"><a href="#" data-bs-toggle="modal" data-bs-target="#user_profile_image">Upload Photo</a></p> --}}
        </div>
        <h3 class="text-muted text-center pt-2">{{ $user?->expert?->doc_title }}
            {{ $user?->first_name . ' ' . $user?->last_name }}</h3>


        <div class="accordion" id="accordionPanelsStayOpenExample">
            <h2 class="">Personal Information</h2>
            {{-- Basic Information --}}
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                        aria-controls="panelsStayOpen-collapseOne">
                        Basic Information
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                    <div class="accordion-body">
                        <form method="POST" id="basicInfo" action="{{-- route('patient.edit',['user'=>$user->id]) --}}">
                            @csrf

                            <div class="row g-3">
                                <div class="col-6">
                                    <label class="text-muted">Full Name: </label>
                                    <span><strong> {{ $user?->first_name . ' ' . $user?->last_name }}</strong></span>
                                </div>
                                <div class="col-6">
                                    <label class="text-muted">Role: </label>
                                    <span><strong> {{ $user->getRoleNames()[0] }}</strong></span>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <label class="text-muted">Date Of Birth: </label>
                                    <span>{{ $user->date_of_birth }}</span>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <label class="text-muted">Sex: </label>
                                    <span>{{ ucfirst($user->gender) }}</span>
                                </div>

                                {{-- <div class="col-md-6 col-lg-6">
                                    <label class="text-muted">blood group : </label>
                                    <span>{{$user?->bloodGroup?->group}}</span>

                                </div>

                                <div class="col-md-6 col-lg-6">
                                    <label class="text-muted">Religion: </label>
                                    <span>{{ucfirst($user?->religion) }}</span>
                                </div> --}}

                                <div class="col-md-6 col-lg-6">
                                    <label class="text-muted">Nationality: </label>
                                    <span>{{ $user->nationality }}</span>
                                </div>

                                <div class="col-md-6 col-lg-6">
                                    <label class="text-muted">Language Preference: </label>
                                    <span>{{ $user?->language }}</span>
                                </div>

                            </div>
                            <div class="d-grid pt-2 col-6 mx-auto">
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            {{-- Address Information --}}
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseTwo">
                        Address
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <div class="row g-2">
                            <div class="col-md-6 col-lg-6">
                                <label class="text-muted">Address: </label>
                                <span>{{ $user?->address?->address }}</span>
                            </div>

                            <div class="col-md-6 col-lg-6">
                                <label class="text-muted">Address 2: </label>
                                <span>{{ $user?->address?->address2 }}</span>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <label class="text-muted">City :</label>
                                <span>{{ $user?->address?->city }}</span>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <label class="text-muted">State: </label>
                                <span>{{ $user?->address?->state }}</span>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <label class="text-muted">Zip-Code: </label>
                                <span>{{ $user->address?->zip_code }}</span>
                            </div>


                            <div class="col-md-6 col-lg-6">
                                <label class="text-muted">Country: </label>
                                <span>{{ $user->address?->country }}</span>
                            </div>

                            <div class="col-md-6 col-lg-6">

                            </div>
                        </div>



                        <div class="d-grid pt-2 col-6 mx-auto">
                        </div>

                    </div>
                </div>
            </div>

            {{-- contact information --}}
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseThree">
                        Contact Info
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <div class="row g-2">

                            <div class="col-md-6 col-lg-6">
                                <label class="text-muted">Mobile: </label>
                                <span>{{ $user?->phone_code }} {{ $user?->phone }}</span>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <label class="text-muted">Email Address: </label>
                                <span>{{ $user->email }}</span>
                            </div>
                            @isset($user->additional_phone)
                                <div class="col-md-6 col-lg-6">
                                    <label class="text-muted">Mobile: </label>
                                    <span>{{ $user?->additional_phone_code }} {{ $user?->additional_phone }}</span>
                                </div>
                            @endisset

                            <div class="col-md-6 col-lg-6">
                                <label class="text-muted"></label>
                                <span></span>
                            </div>

                            <div class="col-md-6 col-lg-6">
                                <label class="text-muted"></label>
                                <span></span>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <label class="text-muted"></label>
                                <span></span>
                            </div>

                            <div class="col-md-6 col-lg-6">
                                <label class="text-muted"></label>
                                <span></span>
                            </div>

                            <div class="col-md-6 col-lg-6">
                                <label class="text-muted"></label>
                                <span></span>
                            </div>

                        </div>
                        {{-- <div class="d-grid pt-2 col-6 mx-auto">
                            <button class="btn btn-primary" type="button">Edit</button>
                        </div> --}}
                    </div>
                </div>
            </div>

        </div>


        @if ($user->getRoleNames()[0] != 'Patient')
            <div class="accordion" id="accordionPanelsStayOpenExampleOne">


                <h2 class="pt-5">Skills and Experiences</h2>

                {{-- education  --}}
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#education" aria-expanded="false" aria-controls="education">
                            Education
                        </button>
                    </h2>
                    <div id="education" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <div class="row g-2">

                                @foreach ($user->education as $education)
                                    <div class="col-md-12 col-lg-12">
                                        <label class="text-muted">Certificate Title: </label>
                                        <strong>{{ $education->edu_doc_title }}</strong>
                                    </div>
                                    <div class="col-md-12 col-lg-12">
                                        <label class="text-muted">Institute: </label>
                                        <span>{{ $education->institute }}</span>
                                    </div>
                                    <div class="col-md-12 col-lg-12">
                                        <label class="text-muted">Specialization/Subject: </label>
                                        <span>{{ $education->specialization }}</span>
                                    </div>
                                    <div class="col-md-12 col-lg-12">
                                        <label class="text-muted">Passing Year: </label>
                                        <span>{{ $education->passing_year }}</span>
                                    </div>

                                    <hr>
                                @endforeach

                            </div>

                        </div>
                    </div>
                </div>

                {{-- training  --}}
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#training" aria-expanded="false" aria-controls="training">
                            Trainings and Skills
                        </button>
                    </h2>
                    <div id="training" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <div class="row g-2">

                                @foreach ($user->training as $data)
                                    <div class="col-md-12 col-lg-12">
                                        <label class="text-muted">Training Title: </label>
                                        <strong>{{ $data->training_title }}</strong>
                                    </div>
                                    <div class="col-md-12 col-lg-12">
                                        <label class="text-muted">Institute: </label>
                                        <span>{{ $data->institute }}</span>
                                    </div>
                                    <div class="col-md-12 col-lg-12">
                                        <label class="text-muted">Specialization/Topic: </label>
                                        <span>{{ $data->specialization }}</span>
                                    </div>
                                    <div class="col-md-12 col-lg-12">
                                        <label class="text-muted">Start Date: </label>
                                        <span>{{ $data->from_date }}</span>
                                    </div>
                                    <div class="col-md-12 col-lg-12">
                                        <label class="text-muted">End Date: </label>
                                        <span>{{ $data->to_date }}</span>
                                    </div>

                                    <hr>
                                @endforeach

                            </div>
                            {{-- <div class="d-grid pt-2 g-3 col-6 mx-auto">
                        <button class="btn btn-primary" type="button">Edit</button>
                       </div> --}}
                        </div>
                    </div>
                </div>

                {{-- experiences  --}}
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#experience" aria-expanded="false" aria-controls="experience">
                            Experiences
                        </button>
                    </h2>
                    <div id="experience" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <div class="row g-2">
                                @foreach ($user->experience as $data)
                                    <div class="col-md-12 col-lg-12">
                                        <label class="text-muted">Organization: </label>
                                        <span>{{ $data->org_name }}</span>
                                    </div>


                                    <div class="col-md-12 col-lg-12">
                                        <label class="text-muted">Designation/ Position: </label>
                                        <span>{{ $data->position }}</span>
                                    </div>
                                    <div class="col-md-12 col-lg-12">
                                        <label class="text-muted">Department: </label>
                                        <strong>{{ $data->department }}</strong>
                                    </div>
                                    <div class="col-md-12 col-lg-12">
                                        <label class="text-muted">{{ $data->from_date }} - {{ $data?->to_date }}
                                            @if ($data?->job_status)
                                                {{ __('Present') }}
                                            @endif
                                        </label>
                                        {{-- <span>{{$data->from_date}}</span> --}}
                                    </div>
                                    <hr>
                                @endforeach

                            </div>
                            {{-- <div class="d-grid pt-2 g-3 col-6 mx-auto">
                        <button class="btn btn-primary" type="button">Edit</button>
                       </div> --}}
                        </div>
                    </div>
                </div>

            </div>
        @else
            <div class="accordion" id="accordionPanelsStayOpenExampleOne">
                <h2 class="pt-5 ms-3">Appointments And Reports Info</h2>
                {{-- education  --}}
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#education" aria-expanded="false" aria-controls="education">
                            Reports
                        </button>
                    </h2>
                    <div id="education" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <div class="row g-2">

                                previous reporst goes here
                            </div>

                        </div>
                    </div>
                </div>

                {{-- training  --}}
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#training" aria-expanded="false" aria-controls="training">
                            Current Appointments
                        </button>
                    </h2>
                    <div id="training" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <div class="row g-2">

                                Appointments goes here

                            </div>
                            {{-- <div class="d-grid pt-2 g-3 col-6 mx-auto">
                    <button class="btn btn-primary" type="button">Edit</button>
                   </div> --}}
                        </div>
                    </div>
                </div>

                {{-- experiences  --}}
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#experience" aria-expanded="false" aria-controls="experience">
                            Past Appointments
                        </button>
                    </h2>
                    <div id="experience" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <div class="row g-2">

                                past appointments goes here

                            </div>
                            {{-- <div class="d-grid pt-2 g-3 col-6 mx-auto">
                    <button class="btn btn-primary" type="button">Edit</button>
                   </div> --}}
                        </div>
                    </div>
                </div>

            </div>
        @endif

        @if ($user->getRoleNames()[0] == 'Doctor')
            <div class="accordion" id="accordionPanelsStayOpenExampleTwo">
                <h2 class="pt-5 ">Appointments Schadule</h2>
                {{-- schedule  --}}
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#schadule" aria-expanded="false" aria-controls="schadule">
                            Schadule Info
                        </button>
                    </h2>
                    <div id="schadule" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <div class="row g-2">

                                Schadule Info goes here
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        @endif

        @if ($user->getRoleNames()[0] != 'Patient')
            <div class="accordion" id="accordionPanelsStayOpenExampleThree">
                <h2 class="pt-5 ">User Feedback</h2>
                {{-- schedule  --}}
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#user_feedback" aria-expanded="false" aria-controls="user_feedback">
                            User Feedback
                        </button>
                    </h2>
                    <div id="user_feedback" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <div class="row g-2">

                                Feedback Info goes here
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        @endif





    </div>
</div>
