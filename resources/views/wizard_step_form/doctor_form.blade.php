@extends('layouts.admin.app')

@section('link')
    <link rel="stylesheet" href="{{ asset('wizard_form/css/style.css') }} ">
    <link rel="stylesheet" href="{{ asset('wizard_form/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free-6.2.1-web/css/all.css') }}">
    {{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> --}}
    <x-vendor.bootstrap_css />
@endsection

@section('content')
    <div class="">

        <div class="toast-container position-fixed top-0 end-0 p-3">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    {{-- <img src="..." class="rounded me-2" alt="..."> --}}
                    <strong class="me-auto text-danger">Warning!</strong>
                    {{-- <small>11 mins ago</small> --}}
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    <div id="toastContent">
                    </div>
                </div>
            </div>
        </div>
        {{-- toast success --}}
        <div class="toast-container position-fixed top-0 end-0 p-3">
            <div id="toastSuccess" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto text-success">Alert!</strong>
                    {{-- <small>11 mins ago</small> --}}
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    <div id="toastContentSuccess">
                    </div>
                </div>
            </div>
        </div>


        <div class="row justify-content-center " id="doctor_register_container">

            <!-- tab area  -->
            <div class="col-12 col-lg-10 col-xxl-8 col-xl-10 my-4">
                <div class="tab_container">
                    <div class="tab_list" id="tab_personal_info"><span>Personal Info</span></div>
                    <div class="tab_list" id="tab_education"><span>Education</span></div>
                    <div class="tab_list" id="tab_training"><span>Training</span></div>
                    <div class="tab_list" id="tab_xp"><span>Experience</span></div>
                </div>
            </div>
            <!-- personal information step  -->
            <div class="col-12 col-lg-10 col-xxl-8 col-xl-10 form-container" id="personal_info_container">
                <form id="form_personal_info" method="POST" class="row g-3 needs-validation" enctype="multipart/form-data"
                    novalidate>
                    @csrf
                    @method('POST')
                    <div class="col-12">
                        <label for="doc_title" class="form-label">Title</label>

                        <select id="doc_title" name="doc_title" required class="form-select"
                            aria-label="Default select example">
                            {{-- '1=Professor Dr. ,2=Assistant Professor Dr., 3=Associate Professor Dr., 4 = Distinguished Professor Dr., 5 = Dr. ' --}}

                            <option value="" disabled @selected($user?->expert?->doc_title == null)>Select title</option>
                            <option @selected($user?->expert?->doc_title == 1) value="1">Professor Dr.</option>
                            <option @selected($user?->expert?->doc_title == 2) value="2">Assistant Professor Dr.</option>
                            <option @selected($user?->expert?->doc_title == 3) value="3">Associate Professor Dr.</option>
                            <option @selected($user?->expert?->doc_title == 4) value="4">Distinguished Professor Dr.</option>
                            <option @selected($user?->expert?->doc_title == 5) value="5">Dr.</option>
                        </select>
                    </div>

                    <!-- name  -->
                    <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" value="{{ $user->first_name }}" name="first_name"
                            id="first_name" placeholder="First Name" required min="1" max="50">
                        <div class="invalid-feedback">
                            @error('first_name')
                                {{ $message }}
                            @else
                                Please enter your first name
                            @enderror
                        </div>

                    </div>


                    <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" value="{{ $user->last_name }}" name="last_name"
                            id="last_name" placeholder="Last Name" min="1" max="50" required>
                        <div class="invalid-feedback">
                            @error('last_name')
                                {{ $message }}
                            @else
                                Please enter your first name
                            @enderror
                        </div>
                    </div>

                    <!-- gender  -->
                    <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                        <label for="" class="form-label">Gender</label>
                        <div class="input-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" @checked($user->gender == 'male') name="gender"
                                    id="male" value="male" required>
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" @checked($user->gender == 'female')
                                    name="gender" id="female" value="female" required>
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" @checked($user->gender == 'other')
                                    name="gender" id="other" value="other" required>
                                <label class="form-check-label" for="other">Other</label>
                            </div>
                            <div class="invalid-feedback">
                                @error('gender')
                                    {{ $message }}
                                @else
                                    Please choose your gender
                                @enderror

                            </div>
                        </div>
                    </div>

                    <!-- end gender -->
                    <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                        <label for="date_of_birth" class="form-label">Date Of Birth</label>
                        <input type="date" class="form-control" name="date_of_birth"
                            value="{{ $user->date_of_birth }}" id="date_of_birth" placeholder="" required>
                        <div class="invalid-feedback">
                            @error('date_of_birth')
                                {{ $message }}
                            @else
                                Please provide your date of birth
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                        <label for="marital_status" class="form-label">Martial Status(Optional)</label>
                        <select name="marital_status" id="marital_status" required class="form-select"
                            aria-label="Default select example">
                            <option disabled @selected($user?->marital_status == null)>Select One</option>
                            <option @selected($user?->marital_status == 1) value="1">Unmarried</option>
                            <option @selected($user?->marital_status == 2) value="2">Married</option>
                            <option @selected($user?->marital_status == 3) value="3">Divorced</option>
                        </select>

                    </div>

                    <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                        <label for="nationality" class="form-label">Nationality</label>
                        <select name="nationality" id="nationality" required class="form-select"
                            aria-label="Default select example">
                            <option value="" disabled @selected($user?->nationality == null)>Select One</option>
                            @foreach ($country_phone as $data)
                                <option @selected($user?->nationality == $data['nationality']) value="{{ $data['nationality'] }}">
                                    {{ $data['nationality'] }}</option>
                            @endforeach

                        </select>
                    </div>

                    <!-- address  -->
                    <div class="col-12 ">
                        <label for="address_line_1" class="form-label">Address Line 1</label>
                        <input type="text" class="form-control" value='{{ $user?->address?->address }}'
                            name="address" id="address_line_1" placeholder="Street address" max="255" required>
                        <div class="invalid-feedback">
                            @error('address')
                                {{ $message }}
                            @else
                                Please provide your address
                            @enderror
                        </div>

                    </div>
                    <div class="col-12 ">
                        <label for="address_line_2" class="form-label">Address Line 2</label>
                        <input type="text" class="form-control" name="address2"
                            value="{{ $user?->address?->address2 }}" id="address_line_2" max="255"
                            placeholder="Appartment, Unit, Building, Floor etc">
                        <div class="invalid-feedback">
                            @error('address2')
                                {{ $message }}
                            @else
                                Enter your address.
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" value="{{ $user?->address?->city }}" name="city"
                            id="city" placeholder="City" max="50" required>
                        <div class="invalid-feedback">
                            @error('city')
                                {{ $message }}
                            @else
                                Please enter your city name
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                        <label for="state" class="form-label">State</label>
                        <input type="text" class="form-control" value="{{ $user?->address?->state }}" name="state"
                            id="state" placeholder="District/Region/Province" max="50" required>
                        <div class="invalid-feedback">
                            @error('state')
                                {{ $message }}
                            @else
                                Please enter you state
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                        <label for="zip_code" class="form-label">Zip Code</label>
                        <input type="text" class="form-control" value="{{ $user?->address?->zip_code }}"
                            name="zip_code" id="zip_code" placeholder="Postal/Zip Code" max="20" required>
                        <div class="invalid-feedback">
                            @error('zip_code')
                                {{ $message }}
                            @else
                                Please provide your zipcode
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                        <label for="country" class="form-label">Country</label>
                        <select class="form-select" aria-label="Default select example" name="country" id="country"
                            required>
                            <option value="" disabled @selected($user?->address?->country == null)>Select One</option>

                            @foreach ($country_phone as $data)
                                <option @selected($user?->address?->country == $data['en_short_name']) value="{{ $data['en_short_name'] }}">
                                    {{ $data['en_short_name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- end address  -->

                    <!-- contact no  -->
                    <div class="col-12 col-lg-2 col-xl-2 col-xxl-2">
                        <label for="phone_code" class="form-label">Phone Code</label>
                        <select name="phone_code" id="phone_code" required class="form-select"
                            aria-label="Default select example">
                            <option value="" disabled @selected($user?->phone_code == null)>Select One</option>

                            @foreach ($country_phone as $data)
                                <option @selected($user?->phone_code == $data['num_code']) value="{{ $data['num_code'] }}">
                                    {{ $data['num_code'] }}</option>
                            @endforeach


                        </select>
                    </div>
                    <div class="col-12 col-lg-4 col-xl-4 col-xxl-4">
                        <label for="phone" class="form-label">Contact No.</label>
                        <input type="number" class="form-control" value="{{ $user->phone }}" min="8"
                            name="phone" id="phone" data-contact="phone" placeholder="01XXXXXXXXX" required>
                        <div class="invalid-feedback">
                            @error('zip_code')
                                {{ $message }}
                            @else
                                Please provide your phone number
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 col-lg-2 col-xl-2 col-xxl-2">
                        <label for="additional_phone_code" class="form-label">Phone Code</label>
                        <select name="additional_phone_code" id="additional_phone_code" class="form-select"
                            aria-label="Default select example">
                            <option value="" disabled @selected($user?->additional_phone_code == null)>Select One</option>

                            @foreach ($country_phone as $data)
                                <option @selected($user?->additional_phone_code == $data['num_code']) value="{{ $data['num_code'] }}">
                                    {{ $data['num_code'] }}</option>
                            @endforeach


                        </select>
                    </div>

                    <div class="col-12 col-lg-4 col-xl-4 col-xxl-4">
                        <label for="additional_phone" class="form-label">Additional Number</label>
                        <input type="number" class="form-control" value="{{ $user->additional_phone }}"
                            name="additional_phone" id="additional_phone" data-contact="additional_phone"
                            placeholder="01XXXXXXXXX">
                        <div class="invalid-feedback">
                            @error('additional_phone')
                                {{ $message }}
                            @else
                                Enter your additional phone number if any.
                            @enderror
                        </div>
                    </div>


                    <!-- identity -->
                    <div class="col-12 col-lg-2 col-xl-2 col-xxl-2">
                        <label for="identity" class="form-label">Identity</label>
                        <select name="identity_type" id="" required class="form-select">
                            <option @selected($user->identity_type == null) value="" disabled>Select Type</option>
                            <option @selected($user->identity_type == 1) value="1">Passport</option>
                            <option @selected($user->identity_type == 2) value="2">Residential Card</option>
                        </select>
                    </div>

                    <div class="col-12 col-lg-4 col-xl-4 col-xxl-4">
                        <label for="identity" class="form-label">Identity no.</label>
                        <input type="text" class="form-control" value="{{ $user->identity_no }}" name="identity_no"
                            id="identity" placeholder="854XXXXXXXXXXXXXXXX" max="20" min="6" required>
                        <div class="invalid-feedback">
                            @error('identity_no')
                                {{ $message }}
                            @else
                                Please provide your address
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="col-12 col-lg-4 col-xl-4 col-xxl-4">
                        <label for="identity_proof" class="form-label">Identity Proof(img,pdf)</label>
                        <input class="form-control" type="file" name="identity_proof" accept=".pdf,.jpg,.jpeg,.png"
                            id="identity_proof" required>
                        <div class="invalid-feedback">
                            @error('identity_proof')
                                {{ $message }}
                            @else
                                Please upload an attachment of your identity
                            @enderror
                        </div>
                    </div> --}}


                    @isset($user->identity_proof)
                        <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                            <label for="identity_proof" class="form-label">Identity Proof(image/pdf)</label>

                            <div>
                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <a href="#" class="btn btn-outline-secondary btn-sm text-primary">View
                                        attachment</a>
                                    <input value="change file" id="identity_proof" accept=".pdf,.jpg,.jpeg,.png"
                                        name="identity_proof" type="file" class="btn btn-outline-secondary btn-sm"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Change current attachment">
                                </div>
                            </div>

                        </div>
                    @else
                        <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                            <label for="identity_proof" class="form-label">Identity Proof(img,pdf)</label>
                            <input class="form-control" type="file" name="identity_proof" accept=".pdf,.jpg,.jpeg,.png"
                                id="identity_proof" required>
                            <div class="invalid-feedback">
                                @error('identity_proof')
                                    {{ $message }}
                                @else
                                    Please upload an attachment of your identity
                                @enderror
                            </div>
                        </div>
                    @endisset

                    <!-- license  -->

                    <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                        <label for="license_no" class="form-label">License Number</label>
                        <input type="text" class="form-control" value="{{ $user?->expert?->license_no }}"
                            name="license_no" id="license_no" placeholder="1245XXXXXX" max="50" minlength="6"
                            required>
                        <div class="invalid-feedback">
                            @error('license_no')
                                {{ $message }}
                            @else
                                Please enter your license number
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                        <label for="license_attachment" class="form-label">License Attachment</label>
                        <input type="file" class="form-control" name="license_attachment" accept=".pdf,.jpg,.jpeg,.png"
                            id="license_attachment" placeholder="" required>
                        <div class="invalid-feedback">
                            @error('license_attachment')
                                {{ $message }}

                                Please upload you license attachment
                            @enderror
                        </div>
                    </div> --}}
                    @isset($user->expert->license_attachment)
                        <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                            <label for="license_attachment" class="form-label">License Attachment</label>
                            <div>
                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <a href="#" class="btn btn-outline-secondary btn-sm text-primary">View uploaded
                                        license</a>
                                    <input id="license_attachment" name="license_attachment" accept=".pdf,.jpg,.jpeg,.png"
                                        type="file" class="btn btn-outline-secondary btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Change current attachment">
                                </div>
                            </div>

                        </div>
                    @else
                        <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                            <label for="license_attachment" class="form-label">License Attachment</label>
                            <input type="file" class="form-control" name="license_attachment"
                                accept=".pdf,.jpg,.jpeg,.png" id="license_attachment" placeholder="" required>
                            <div class="invalid-feedback">
                                @error('license_attachment')
                                    {{ $message }}

                                    Please upload you license attachment
                                @enderror
                            </div>
                        </div>
                    @endisset


                    {{-- <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="condition_checked"
                                name="terms_condition" id="termsCondition" required>
                            <label class="form-check-label" for="termsCondition">
                                Agree to terms and conditions
                            </label>
                            <div class="invalid-feedback">
                                You must agree before submitting.
                            </div>
                        </div>
                    </div> --}}


                    <div class="col-12 my-4">
                        <div class="text-center">
                            <button class="btn btn-outline-primary" id="btnPersonalInfo" name="btnSaveForm"
                                value="personalInfo" type="submit">Next</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- educational information step   -->

            <div class="col-12 col-lg-8 col-xl-8 col-xxl-8 form-container" id="education_info_container">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Institute</th>
                                <th>Specialization</th>
                                <th>Duration</th>
                                <th>Passing Year</th>
                                <th>Course Title</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($user?->education as $edu)
                                <tr>
                                    <td>{{ $edu?->institute }}</td>
                                    <td>{{ $edu?->specialization }}</td>
                                    <td>{{ $edu?->duration }} Hour</td>
                                    <td>{{ $edu?->passing_year }}</td>
                                    <td>{{ $edu?->edu_doc_title }}</td>
                                    {{-- <td><a class="btn btn-danger" href="{{route('doctor.profile.delete_education')}}"></i></a></td> --}}
                                    <td><button class="btn btn-danger" name="edu_id" value="{{ $edu?->id }}"><i
                                                class="fa-regular fa-trash-can"></button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Educational Information-->
                <form id="form_education" class="needs-validation my-5" enctype="multipart/form-data" novalidate>
                    @csrf
                    @method('POST')
                    <div class="input-edu-container row gy-3 ">
                        <div class="col-12 group-input">
                            <label for="institute" class="form-label">Institute</label>
                            <input type="text" class="form-control form-field" name="institute" id="institute"
                                placeholder="Institute Name" required>
                        </div>


                        @php
                            $specializations = json_decode(file_get_contents(public_path('data/psychology_departments.json')), true);
                        @endphp

                        <div class="col-12 group-input">
                            <label for="specialization" class="form-label">Specialization</label>
                            <select id="specialization" name="specialization" required class="form-select form-field"
                                aria-label="Default select example">
                                <option value="" disabled selected>Select One</option>
                                @foreach ($specializations as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach


                            </select>
                        </div>

                        <div class="col-12 col-lg-6 col-xl-6 col-xxl-6 group-input">
                            <label for="duration" class="form-label">Duration(Total Hour)</label>
                            <input type="number" class="form-control form-field" name="duration" id="duration"
                                min="1" placeholder="Total Month" required>
                        </div>

                        <div class="col-12 col-lg-6 col-xl-6 col-xxl-6 group-input">
                            <label for="passing_year" class="form-label">Passing Year</label>
                            <input type="date" class="form-control form-field" name="passing_year" id="passing_year"
                                placeholder="" required>
                        </div>

                        <div class="col-12 col-lg-6 col-xl-6 col-xxl-6 group-input">
                            <label for="education_certificate" class="form-label">Upload certificate(image/pdf)</label>
                            <input type="file" class="form-control form-field" accept=".pdf,.jpg,.jpeg,.png"
                                name="education_certificate" id="education_certificate" placeholder="" required>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-6 col-xxl-6 group-input">
                            <label for="edu_doc_title" class="form-label">Certificate Title</label>
                            <input type="text" class="form-control form-field" name="edu_doc_title"
                                id="edu_doc_title" placeholder="" required>
                        </div>
                    </div>

                    <div class="col-6 my-3 d-grid mx-auto">
                        <button type="submit" id="btnAddMoreEdu" name="btnSaveForm" value="saveEdu"
                            class="btn btn-outline-success"><span><i class="fa-solid fa-plus"></i> Save & add
                                more</span></button>
                    </div>

                    <div class="col-12 mt-4">
                        <div class="text-center">
                            <button class="btn btn-outline-info" type="button" name="back">Previous</button>
                            <button class="btn btn-outline-primary" id="btnEduNextPage" name="btnSaveEducationInfo"
                                type="button">Next</button>
                        </div>
                    </div>

                </form>
            </div>


            <!-- Training information step   -->
            <div class="col-12 col-lg-8 col-xl-8 col-xxl-8 form-container" id="training_info_container">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTableTraining" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Institute</th>
                                <th>Specialization</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Course Title</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($user?->training as $traingInfo)
                                <tr>
                                    <td>{{ $traingInfo?->institute }}</td>
                                    <td>{{ $traingInfo?->specialization }}</td>
                                    <td>{{ $traingInfo?->from_date }}</td>
                                    <td>{{ $traingInfo?->to_date }}</td>
                                    <td>{{ $traingInfo?->training_title }}</td>
                                    {{-- <td><a class="btn btn-danger" href="{{route('doctor.profile.delete_education')}}"></i></a></td> --}}
                                    <td><button class="btn btn-danger" name="training_id"
                                            value="{{ $traingInfo?->id }}"><i
                                                class="fa-regular fa-trash-can"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <form id="form_training" enctype="multipart/form-data" class="needs-validation" novalidate>

                    <div class="input-train-container row g-3">
                        <div class="col-12">
                            <label for="institute" class="form-label">Institute</label>
                            <input type="text" class="form-control form-field" name="institute" id="institute"
                                placeholder="Institute Name" required>
                        </div>

                        <div class="col-12">
                            <label for="specialization" class="form-label">Specialization</label>
                            <select id="specialization" name="specialization" required class="form-select form-field"
                                aria-label="Default select example">
                                <option value="" disabled selected>Select One</option>
                                @foreach ($specializations as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                            <label for="from_date" class="form-label">From</label>
                            <input type="date" class="form-control form-field" name="from_date" id="from_date"
                                placeholder="" required>
                        </div>

                        <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                            <label for="to_date" class="form-label">To</label>
                            <input type="date" class="form-control form-field" name="to_date" id="to_date"
                                placeholder="" required>
                        </div>

                        <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                            <label for="training_certificate" class="form-label">Upload certificate(image/pdf)</label>
                            <input type="file" class="form-control form-field" name="training_certificate"
                                id="training_certificate" placeholder="" required accept=".pdf,.jpg,.jpeg,.png">
                        </div>
                        <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                            <label for="training_title" class="form-label">Certificate Title</label>
                            <input type="text" class="form-control form-field" name="training_title"
                                id="training_title" placeholder="" required>
                        </div>
                    </div>

                    <div class="col-6 my-3 d-grid mx-auto">
                        <button type="submit" id="btnAddMoreTrain" name="btnSaveForm" value="AddTraining"
                            class="btn btn-outline-success"><span><i class="fa-solid fa-plus"></i> Save & Add
                                More</span></button>
                    </div>

                    <div class="col-12 mt-4">
                        <div class="text-center">
                            <button class="btn btn-outline-info" type="button" name="back">Previous</button>
                            <button class="btn btn-outline-primary" id="btnTrainingNextPage" name="btnSaveTraining"
                                type="button">Next</button>

                        </div>
                    </div>
                </form>
            </div>


            <!-- Experience information step   -->
            <div class="col-12 col-lg-8 col-xl-8 col-xxl-8 form-container" id="experience_container">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTableExperience" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Organization</th>
                                <th>Department</th>
                                <th>Designation</th>
                                <th>Joining Date</th>
                                <th>Resigning Date/Present</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($user?->experience as $xp)
                                <tr>
                                    <td>{{ $xp?->org_name }}</td>
                                    <td>{{ $xp?->department }}</td>
                                    <td>{{ $xp?->position }}</td>
                                    <td>{{ $xp?->from_date }}</td>
                                    <td>

                                        @if ($xp->job_status == 'true')
                                            {{ __('Present') }}
                                        @else
                                            {{ $xp->to_date }}
                                        @endif
                                    </td>
                                    {{-- <td><a class="btn btn-danger" href="{{route('doctor.profile.delete_education')}}"></i></a></td> --}}
                                    <td><button class="btn btn-danger" name="id" value="{{ $xp?->id }}"><i
                                                class="fa-regular fa-trash-can"></button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <form id="form_experience" enctype="multipart/form-data" class="needs-validation" data-form="experience"
                    novalidate>
                    <div class="input-xp-container row g-3">
                        <div class="col-12">
                            <label for="org_name" class="form-label">Organization</label>
                            <input type="text" class="form-control  form-field" name="org_name" id="org_name"
                                placeholder="Institute Name" required>
                        </div>

                        <div class="col-12">
                            <label for="department" class="form-label">Department</label>
                            {{-- <select id="department" name="department" required class="form-select  form-field"
                                aria-label="Default select example">
                                <option value="" disabled selected>Select One</option>
                                <option value="1">Department 1</option>
                                <option value="2">Department 2</option>
                                <option value="3">Department 3</option>
                                <option value="4">Department 4</option>
                            </select> --}}
                            <input type="text" class="form-control  form-field" name="department" id="department"
                                placeholder="Department" required>

                        </div>

                        <div class="col-12">
                            <label for="position" class="form-label">Designation</label>
                            <input type="text" class="form-control  form-field" name="position" id="position"
                                placeholder="" required>
                        </div>

                        <div class="col-12 col-lg-4 col-xl-4 col-xxl-4">
                            <label for="jobJoinDate" class="form-label">From</label>
                            <input type="date" class="form-control  form-field" name="from_date" id="jobJoinDate"
                                placeholder="" required>
                        </div>

                        <div class="col-12 col-lg-4 col-xl-4 col-xxl-4">
                            <label for="jobResignedDate" class="form-label">To</label>
                            <input type="date" class="form-control  form-field" name="to_date" id="jobResignedDate"
                                placeholder="" data-job-condition="resign_date" required>
                        </div>

                        <div class="col-12 col-lg-4 col-xl-4 col-xxl-4">
                            <label class="form-label">Present</label>

                            <div class="form-check">
                                <input class="form-check-input  form-field" type="checkbox" value="checked"
                                    name="job_status" id="job_status" data-job-condition="present">
                                <label class="form-check-label" for="job_status">
                                    Yes
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 my-3 d-grid mx-auto">
                        <button type="submit" id="btnAddMoreExperience" name="btnSaveForm" value="saveExperienceInfo"
                            class="btn btn-outline-success"><span><i class="fa-solid fa-plus"></i>Save & Add
                                More</span></button>
                    </div>


                    <div class="col-12 mt-4">
                        <div class="text-center">
                            <button class="btn btn-outline-info" type="button" name="back">Previous</button>
                            <button class="btn btn-outline-primary" id="btnSubmitExp" name="btnSaveExperience"
                                type="submit">Submit</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- Button trigger modal -->


    <!-- Modal terms and conditions-->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Mental Help And Support Doctor Registration
                        Terms and Conditions</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="closeModalButton"></button>
                </div>
                <div class="modal-body">
                    <ol>
                        <li>
                            <h3 class="h4"> Acceptance of Terms</h3>
                            <p class="text-muted">By registering an account on Mental Help And Support, you agree to comply
                                with and be bound by the terms and conditions outlined herein. If you do not agree with any
                                part of these terms, you may not use our services.</p>
                        </li>
                        <li>
                            <h3 class="h4"> Eligibility</h3>
                            <p>You must be a licensed and qualified healthcare professional in the field of psychology or
                                psychiatry to register on Mental Help And Support. You agree to provide accurate and
                                up-to-date information about your credentials, licensing, and professional qualifications
                                during the registration process.</p>
                        </li>
                        <li>
                            <h3 class="h4"> Professional Conduct</h3>
                            <p>You agree to conduct yourself in a professional manner when using Mental Help And Support.
                                This includes adhering to ethical standards and maintaining the confidentiality and privacy
                                of patient information.</p>
                        </li>
                        <li>
                            <h3 class="h4"> Patient Care</h3>
                            <p>As a registered healthcare professional, you understand and acknowledge that you are solely
                                responsible for the quality and appropriateness of the services you provide to patients on
                                Mental Help And Support.</p>
                        </li>
                        <li>
                            <h3 class="h4"> Compliance with Laws and Regulations</h3>
                            <p>You agree to comply with all applicable international laws and regulations related to your
                                practice and the provision of online psychological services. This includes, but is not
                                limited to, obtaining any necessary licenses or permits required by international law.</p>
                        </li>
                        <li>
                            <h3 class="h4"> User Account Security</h3>
                            <p>You are responsible for maintaining the confidentiality of your account credentials. You
                                agree to notify us immediately of any unauthorized use of your account or any other breach
                                of security.</p>
                        </li>
                        <li>
                            <h3 class="h4"> Termination of Account</h3>
                            <p>We reserve the right to terminate or suspend your account at any time for any reason,
                                including but not limited to a violation of these terms or unethical behavior. Upon
                                termination, you will no longer have access to the platform, and any patient information
                                associated with your account will be handled in accordance with our privacy policy.</p>
                        </li>
                        <li>
                            <h3 class="h4"> Changes to Terms</h3>
                            <p>We reserve the right to update or modify these terms and conditions at any time without prior
                                notice. It is your responsibility to review these terms periodically for changes.</p>
                        </li>
                        <li>
                            <h3 class="h4"> Governing Law</h3>
                            <p>These terms and conditions shall be governed by and construed in accordance with
                                international laws.</p>
                        </li>
                    </ol>

                    <p class="text-muted">
                        By registering on Mental Help And Support, you acknowledge that you have read, understood, and agree
                        to be bound by these terms and conditions.
                    </p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                        id="declineButton">Decline</button>
                    <button type="button" class="btn btn-primary" id="btnAgreedTerms">Understood</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{--          <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> --}}
    {{--          <script src="https://unpkg.com/axios/dist/axios.min.js"></script> --}}
    <x-vendor.bootstrap_bundle_js />
    <script src="{{ asset('vendor/bootstrap-5.3.0-alpha1-dist/js/bootstrap.js') }}"></script>

    <script src="{{ asset('wizard_form/js/wizard_step.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {


            /**
             * Date validation ||||||||||||||||||||||||||||||||||
             */
            //variable section
            let currentDate, minYear;


            // age validation ====================
            const ageGuard = $('#date_of_birth');
            currentDate = new Date();

            // Subtract 10 years from the current date
            currentDate.setFullYear(currentDate.getFullYear() - 20);

            // Get the date part of the ISO string (YYYY-MM-DD)
            minYear = currentDate.toISOString().slice(0, 10);
            ageGuard.attr('max', minYear);

            // education passing year ==================
            const passingYear = $('#passing_year');
            currentDate = new Date();
            // currentDate.setMonth(currentDate.getMonth() - 1);
            currentDate.setDate(currentDate.getDate() - 1);
            minYear = currentDate.toISOString().slice(0, 10);
            passingYear.attr('max', minYear);



            // training ===========================
            const trainingJoinDate = $('#from_date');
            const trainingCompleteDate = $('#to_date');


            currentDate = new Date();
            currentDate.setDate(currentDate.getDate() - 1);
            minYear = currentDate.toISOString().slice(0, 10);
            trainingJoinDate.attr('max', minYear);



            currentDate = new Date();
            currentDate.setDate(currentDate.getDate() - 1);
            minYear = currentDate.toISOString().slice(0, 10);
            trainingCompleteDate.attr('max', minYear);




            trainingJoinDate.on('change', function() {
                trainingCompleteDate.attr('min', this.value);
            });

            trainingCompleteDate.on('change', function() {
                trainingJoinDate.attr('max', this.value);
            });

            // experiences ==========================
            const jobJoinDate = $('#jobJoinDate');
            const jobResignedDate = $('#jobResignedDate');

            currentDate = new Date();
            currentDate.setDate(currentDate.getDate() - 1);
            minYear = currentDate.toISOString().slice(0, 10);
            jobJoinDate.attr('max', minYear);



            currentDate = new Date();
            currentDate.setDate(currentDate.getDate() - 1);
            minYear = currentDate.toISOString().slice(0, 10);
            jobResignedDate.attr('max', minYear);

            jobJoinDate.on('change', function() {
                jobResignedDate.attr('min', this.value);
            });

            jobResignedDate.on('change', function() {
                jobJoinDate.attr('max', this.value);
            });

            /**
             * End date validation ||||||||||||||||||||||||||||
             */




            // form container
            const personalInfoContainer = $("#personal_info_container");
            const educationInfoContainer = $("#education_info_container");
            const trainingInfoContainer = $("#training_info_container");
            const experienceContainer = $("#experience_container");

            // form
            const frmPersonalInfo = $("#form_personal_info");
            const frmEducation = $("#form_education");
            const frmTraining = $("#form_training");
            const frmExperience = $("#form_experience");


            // tab switching
            const tabPersonalInfo = $("#tab_personal_info");
            const tabEducation = $("#tab_education");
            const tabTraining = $("#tab_training");
            const tabExperience = $("#tab_xp");

            // add more field button
            const btnAddEdu = $('#btnAddMoreEdu');
            const btnAddTraining = $('#btnAddMoreTrain');
            const btnAddExp = $('#btnAddMoreExperience');

            // hiding content
            personalInfoContainer.show();
            educationInfoContainer.hide();
            trainingInfoContainer.hide();
            experienceContainer.hide();


            // colors
            let tabActive = `rgb(13, 110, 253)`;
            let tabVisited = `rgb(13, 201, 239)`;
            let tabFontActive = `rgb(255,255,255)`;

            // continue buttons
            const btnEducationSubmit = $("#btnEduNextPage");
            const btnTrainingSubmit = $("#btnTrainingNextPage");
            const btnSubmitExp = $("#btnSubmitExp");


            // data container
            // tab activity
            const formData = {}; //form data container
            let formActive = new Map();
            const tabActiveList = new Map();

            // bootstrap toast
            const toastTrigger = document.getElementById('liveToastBtn')
            const toastLiveExample = document.getElementById('liveToast')
            const toastSuccess = document.getElementById('toastSuccess')

            const toastContent = $("#toastContent");
            const toastContentSuccess = $("#toastContentSuccess");
            let toastContainer = $('<div>');

            // tables
            const tableEducation = $("#dataTable");
            const tableTraining = $("#dataTableTraining");
            const tableExperience = $("#dataTableExperience");


            // console.log(tableEducation);
            // let test = tableEducation[0].rows;
            // console.log(test[1]);
            // console.log(test[1].cells.length);





            //==========================job validation function=================
            function jobStatusValidation(arg) {
                let checkbox, formContainer, currentDatebox;

                checkbox = arg.currentTarget;
                formContainer = $(checkbox).parentsUntil($('.input-xp-container')).parent();
                currentDatebox = $(formContainer).find($(`[data-job-condition="resign_date"]`));

                if (checkbox.checked) {
                    currentDatebox.attr('disabled', '');
                    currentDatebox.removeAttr('required', '');
                    currentDatebox[0].value = '';
                } else {
                    currentDatebox.removeAttr('disabled', '');
                    currentDatebox.attr('required', '');
                }

            }

            // =====================tab function===========================
            function tabVisibility() {
                switch (true) {
                    case personalInfoContainer.is(":visible"):
                        tabPersonalInfo.css('background-color', tabActive);

                        break;
                    case educationInfoContainer.is(":visible"):
                        tabEducation.css('background-color', tabActive);
                        // code block
                        break;
                    case trainingInfoContainer.is(":visible"):
                        tabTraining.css('background-color', tabActive);
                        break;

                    case experienceContainer.is(":visible"):
                        tabExperience.css('background-color', tabActive);
                        break;
                    default:
                        console.log("Unknown");
                        // code block
                }
            }

            function tabActivated(tabList) {
                tabList.forEach(element => {
                    element.css('background-color', tabVisited);
                    element.css('cursor', 'pointer');
                    element.css('color', tabFontActive);

                });
            }

            function switchTab(elementHide, elementShow) {
                elementHide.forEach(element => {
                    element.hide()
                });
                elementShow.show();
            }


            function educationNextPage() {
                if (trDataChecker(tableEducation)) {
                    btnEducationSubmit.removeAttr('disabled', '');
                    btnEducationSubmit.removeClass('btn-outline-secondary').addClass("btn-outline-primary");
                } else {
                    btnEducationSubmit.attr('disabled', '');
                    btnEducationSubmit.removeClass('btn-outline-primary').addClass("btn-outline-secondary");
                }

            }


            function trainingNextPage() {
                if (trDataChecker(tableTraining)) {
                    btnTrainingSubmit.removeAttr('disabled', '');
                    btnTrainingSubmit.removeClass('btn-outline-secondary').addClass("btn-outline-primary");
                } else {
                    btnTrainingSubmit.attr('disabled', '');
                    btnTrainingSubmit.removeClass('btn-outline-primary').addClass("btn-outline-secondary");
                }
            }

            function experienceNextPage() {
                if (trDataChecker(tableExperience)) {
                    btnSubmitExp.removeAttr('disabled', '');
                    btnSubmitExp.removeClass('btn-outline-secondary').addClass("btn-outline-primary");
                } else {
                    btnSubmitExp.attr('disabled', '');
                    btnSubmitExp.removeClass('btn-outline-primary').addClass("btn-outline-secondary");
                }
            }


            /**
             * Data table checker
             */
            function trDataChecker(tableToCheck) {
                let countCellsSecondRow = 0;
                let countRows = tableToCheck[0].rows;
                if (countRows[1]?.cells?.length) {
                    countCellsSecondRow = countRows[1].cells.length;
                }

                if (countCellsSecondRow > 3) {
                    return true;
                } else {
                    return false;
                }

            }
            // other functions


            btnEducationSubmit.click((e) => {
                educationInfoContainer.hide(0, e => {
                    trainingInfoContainer.show();

                    if (!formActive.get('trainingInfo')) {
                        formActive.set('trainingInfo', trainingInfoContainer);
                        tabActiveList.set('tabTraining', tabTraining);
                    }

                })
            })


            function deleteEducation() { // delete information from education
                $("#dataTable button").click((e) => {
                    console.log(e.currentTarget.value);

                    let currentRow = $(e.currentTarget).parent().parent();
                    let formDataTransport = new FormData();

                    formDataTransport.append('id', e.currentTarget.value);
                    axios.post('{{ route('doctor.delete_education') }}', formDataTransport)
                        .then(function(response) {
                            currentRow.remove();
                            toastSuccessShow(response.data.message);
                            educationNextPage();
                        }).catch(function(error) {
                            console.log(error);
                        });
                })

            }


            btnTrainingSubmit.click((e) => {
                trainingInfoContainer.hide(0, e => {
                    experienceContainer.show();

                    if (!formActive.get('experienceInfo')) {
                        formActive.set('expInfo', experienceContainer);
                        tabActiveList.set('tabExp', tabExperience);
                    }

                })
            })


            function deleteTraining() { // delete information from training
                $("#dataTableTraining button").click((e) => {
                    let currentRow = $(e.currentTarget).parent().parent();
                    let formDataTransport = new FormData();

                    formDataTransport.append('id', e.currentTarget.value);
                    axios.post('{{ route('doctor.delete_training') }}', formDataTransport)
                        .then(function(response) {
                            currentRow.remove();
                            toastSuccessShow(response.data.message);
                            trainingNextPage()
                        }).catch(function(error) {
                            console.log(error);
                        });
                })

            }


            /**
             * experience handling
             */
            btnSubmitExp.click((e) => {
                window.location.href = "{{ route('doctor.profile') }}";
            });


            function deleteExperience() { // delete information from experience
                $("#dataTableExperience button").click((e) => {

                    let currentRow = $(e.currentTarget).parent().parent();
                    let formDataTransport = new FormData();

                    formDataTransport.append('id', e.currentTarget.value);
                    axios.post('{{ route('doctor.delete_experience') }}', formDataTransport)
                        .then(function(response) {
                            currentRow.remove();
                            toastSuccessShow(response.data.message);
                            experienceNextPage();

                        }).catch(function(error) {
                            console.log(error);
                        });
                })

            }


            /**
             * toast success function
             */
            function toastSuccessShow(message) {
                toastContentSuccess.empty();
                toastContainer = toastContainer.text(message);

                toastContentSuccess.append(toastContainer);
                const toastBootstrap = bootstrap.Toast
                    .getOrCreateInstance(toastSuccess)
                toastBootstrap.show()
            }

            //=============================form validation
            (() => {
                'use strict'
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                const forms = document.querySelectorAll('.needs-validation')

                // Loop over them and prevent submission
                Array.from(forms).forEach(form => {
                    form.addEventListener('submit', event => {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        } else { // ============ validated
                            event.preventDefault();

                            let formDataTransport = new FormData();

                            if (event.currentTarget.id ===
                                'form_personal_info'
                            ) { // ==========================personal information

                                const rawPersonalInfo = new FormOperation(event.target.elements,
                                    personalInfoContainer);
                                formData["personalInfo"] = rawPersonalInfo.formDataPack;

                                // assigning data
                                formData["personalInfo"].repackedData.forEach(function(value,
                                    key) {
                                    formDataTransport.append(key, value);
                                })


                                const identityProofInput = $('#identity_proof')[0];
                                const licenseAttachmentInput = $('#license_attachment')[0];

                                const identityProof = identityProofInput.files[0];
                                const licenseAttachment = licenseAttachmentInput.files[0];


                                if (identityProof !== undefined) {
                                    formDataTransport.append('identity_proof_file',
                                        identityProof);
                                }

                                if (identityProof !== licenseAttachment) {
                                    formDataTransport.append('license_attachment_file',
                                        licenseAttachment);
                                }




                                axios.post('{{ route('doctor.profile.store') }}',
                                    formDataTransport, {
                                        headers: {
                                            'Content-Type': 'multipart/form-data',
                                        }
                                    }).then(function(response) {
                                    console.log(response);
                                    toastContentSuccess.empty();
                                    toastContainer = toastContainer.text(response.data[
                                        'message']);

                                    toastContentSuccess.append(toastContainer);
                                    const toastBootstrap = bootstrap.Toast
                                        .getOrCreateInstance(toastSuccess)
                                    toastBootstrap.show()
                                    // alert(response.data['message']);
                                    personalInfoContainer.hide(0, e => {
                                        educationInfoContainer.show();
                                        tabActiveList.set('tabPersonal',
                                            tabPersonalInfo);
                                        tabActiveList.set('tabEdu',
                                            tabEducation);

                                        if (!formActive.get('personalInfo')) {
                                            formActive.set('personalInfo',
                                                personalInfoContainer);
                                            formActive.set('educationInfo',
                                                educationInfoContainer);
                                            tabActiveList.set('tabPersonal',
                                                tabPersonalInfo);
                                            tabActiveList.set('tabEdu',
                                                tabEducation);
                                        }
                                        tabActivate();

                                    })
                                }).catch(function(error) {
                                    console.log(error);
                                    if (error.response.status === 422) {
                                        let errors = error.response.data.errors;
                                        // Clear previous error messages
                                        toastContent.empty();

                                        let ul = $("<ul>");
                                        Object.entries(errors).forEach((value) => {
                                            let fieldName = value[0],
                                                errorMessage = value[1][0],
                                                li = $("<li>").text(
                                                    errorMessage);
                                            console.log(fieldName,
                                                errorMessage);
                                            ul.append(li);
                                        })

                                        toastContent.append(ul);
                                        const toastBootstrap = bootstrap.Toast
                                            .getOrCreateInstance(toastLiveExample)
                                        toastBootstrap.show()

                                    }
                                });


                            } else if (event.currentTarget.id ===
                                'form_education'
                            ) { //======================= education information
                                const rawEducationInfo = new FormOperation(event.target
                                    .elements, educationInfoContainer);

                                formData["educationInfo"] = rawEducationInfo.formDataPack;


                                // const rawPersonalInfo = new FormOperation(event.target.elements,personalInfoContainer);
                                // formData["personalInfo"] = rawPersonalInfo.formDataPack;

                                // assigning data
                                formData["educationInfo"].repackedData.forEach(function(value,
                                    key) {
                                    formDataTransport.append(key, value);
                                })

                                const education_certificate = $('#education_certificate')[0];
                                const education_certificate_file = education_certificate.files[
                                    0];

                                formDataTransport.append('education_certificate_file',
                                    education_certificate_file);

                                axios.post('{{ route('doctor.profile.store') }}',
                                    formDataTransport, {
                                        headers: {
                                            'Content-Type': 'multipart/form-data',
                                        }
                                    }).then(function(response) {
                                    console.log(response.data.educations);

                                    toastContentSuccess.empty();
                                    toastContainer = toastContainer.text(response.data[
                                        'message']);

                                    toastContentSuccess.append(toastContainer);
                                    const toastBootstrap = bootstrap.Toast
                                        .getOrCreateInstance(toastSuccess)
                                    toastBootstrap.show()
                                    // form reset
                                    frmEducation[0].reset();
                                    $('#dataTable tbody tr').remove();

                                    (response.data.educations).forEach((value, key) => {
                                        $('#dataTable').append(
                                            `<tr>
                                            <td>${value.institute}</td>
                                            <td>${value.specialization}</td>
                                            <td>${value.duration}</td>
                                            <td>${value.passing_year}</td>
                                            <td>${value.edu_doc_title}</td>

                                            <td><button class="btn btn-danger" name="edu_id" value="${value.id}"><i class="fa-regular fa-trash-can"></button></td>

                                        </tr>`
                                        );
                                    })
                                    educationNextPage();
                                    deleteEducation();
                                    // submitEducation();
                                    // alert(response.data['message']);

                                }).catch(function(error) {
                                    console.log(error);
                                    if (error.response.status === 422) {
                                        let errors = error.response.data.errors;
                                        // Clear previous error messages
                                        toastContent.empty();

                                        console.log(Object.entries(errors));
                                        let ul = $("<ul>");
                                        Object.entries(errors).forEach((value) => {
                                            let fieldName = value[0],
                                                errorMessage = value[1][0],
                                                li = $("<li>").text(
                                                    errorMessage);
                                            console.log(fieldName,
                                                errorMessage);
                                            ul.append(li);
                                        })

                                        toastContent.append(ul);
                                        const toastBootstrap = bootstrap.Toast
                                            .getOrCreateInstance(toastLiveExample)
                                        toastBootstrap.show()

                                    }
                                });

                                // educationInfoContainer.hide(0,e=>{
                                //     trainingInfoContainer.show();
                                //
                                //     if(!formActive.get('trainingInfo')){
                                //         formActive.set('trainingInfo',trainingInfoContainer);
                                //         tabActiveList.set('tabTraining',tabTraining);
                                //     }
                                //
                                // })
                                // console.log(rawEducationInfo.formElements);
                                console.log(formData);
                            } else if (event.currentTarget.id ===
                                'form_training') { //===================== training information
                                //object creation
                                const rawTrainingInfo = new FormOperation(event.target.elements,
                                    trainingInfoContainer);

                                formData["trainingInfo"] = rawTrainingInfo.formDataPack;

                                // assigning data
                                formData["trainingInfo"].repackedData.forEach(function(value,
                                    key) {
                                    formDataTransport.append(key, value);
                                })

                                const training_certificate = $('#training_certificate')[0];
                                const training_certificate_file = training_certificate.files[0];

                                formDataTransport.append('training_certificate_file',
                                    training_certificate_file);

                                axios.post('{{ route('doctor.profile.store') }}',
                                    formDataTransport, {
                                        headers: {
                                            'Content-Type': 'multipart/form-data',
                                        }
                                    }).then(function(response) {
                                    // console.log(response);
                                    console.log(response.data.trainings);

                                    toastContentSuccess.empty();
                                    toastContainer = toastContainer.text(response.data[
                                        'message']);

                                    toastContentSuccess.append(toastContainer);
                                    const toastBootstrap = bootstrap.Toast
                                        .getOrCreateInstance(toastSuccess)
                                    toastBootstrap.show()
                                    // // form reset
                                    frmTraining[0].reset();
                                    $('#dataTableTraining tbody tr').remove();

                                    (response.data.trainings).forEach((value, key) => {
                                        $('#dataTableTraining').append(
                                            `<tr>
                                            <td>${value.institute}</td>
                                            <td>${value.specialization}</td>
                                            <td>${value.from_date}</td>
                                            <td>${value.to_date}</td>
                                            <td>${value.training_title}</td>

                                            <td><button class="btn btn-danger" name="training_id" value="${value.id}"><i class="fa-regular fa-trash-can"></button></td>

                                        </tr>`
                                        );
                                    })

                                    deleteTraining();
                                    trainingNextPage()
                                    // submitTraining();

                                }).catch(function(error) {
                                    console.log(error);
                                    if (error.response.status === 422) {
                                        let errors = error.response.data.errors;
                                        // Clear previous error messages
                                        toastContent.empty();

                                        console.log(Object.entries(errors));
                                        let ul = $("<ul>");
                                        Object.entries(errors).forEach((value) => {
                                            let fieldName = value[0],
                                                errorMessage = value[1][0],
                                                li = $("<li>").text(
                                                    errorMessage);
                                            console.log(fieldName,
                                                errorMessage);
                                            ul.append(li);
                                        })

                                        toastContent.append(ul);
                                        const toastBootstrap = bootstrap.Toast
                                            .getOrCreateInstance(toastLiveExample)
                                        toastBootstrap.show()

                                    }
                                });


                            } else if (event.currentTarget.id ===
                                'form_experience') { // ==================  experience info
                                //object creation
                                const rawExperienceInfo = new FormOperation(event.target
                                    .elements);
                                formData["experienceInfo"] = rawExperienceInfo.formDataPack;
                                // assigning data
                                formData["experienceInfo"].repackedData.forEach(function(value,
                                    key) {
                                    formDataTransport.append(key, value);
                                })

                                /*
                                 ** Data manupulation
                                 */
                                axios.post('{{ route('doctor.profile.store') }}',
                                    formDataTransport, {
                                        headers: {
                                            'Content-Type': 'multipart/form-data',
                                        }
                                    }).then(function(response) {
                                    // console.log(response);
                                    console.log(response);

                                    toastContentSuccess.empty();
                                    toastContainer = toastContainer.text(response.data[
                                        'message']);

                                    toastContentSuccess.append(toastContainer);
                                    const toastBootstrap = bootstrap.Toast
                                        .getOrCreateInstance(toastSuccess)
                                    toastBootstrap.show()
                                    // // form reset
                                    frmExperience[0].reset();
                                    $('#dataTableExperience tbody tr').remove();
                                    (response.data.experiences).forEach((value,
                                        key) => {
                                        let currentJobStatus;

                                        if (value.job_status == 'true') {
                                            currentJobStatus = 'Present';
                                        } else {
                                            currentJobStatus = value.to_date;

                                        }
                                        $('#dataTableExperience').append(
                                            `<tr>
                                            <td>${value.org_name}</td>
                                            <td>${value.department}</td>
                                            <td>${value.position}</td>
                                            <td>${value.from_date}</td>
                                            <td>${currentJobStatus}</td>

                                            <td><button class="btn btn-danger" name="id" value="${value.id}"><i class="fa-regular fa-trash-can"></button></td>

                                        </tr>`
                                        );
                                    })

                                    // submitTraining();
                                    deleteExperience();
                                    experienceNextPage();
                                    // submitExperience();

                                }).catch(function(error) {
                                    console.log(error);
                                    if (error.response.status === 422) {
                                        let errors = error.response.data.errors;
                                        // Clear previous error messages
                                        toastContent.empty();

                                        console.log(Object.entries(errors));
                                        let ul = $("<ul>");
                                        Object.entries(errors).forEach((value) => {
                                            let fieldName = value[0],
                                                errorMessage = value[1][0],
                                                li = $("<li>").text(
                                                    errorMessage);
                                            console.log(fieldName,
                                                errorMessage);
                                            ul.append(li);
                                        })

                                        toastContent.append(ul);
                                        const toastBootstrap = bootstrap.Toast
                                            .getOrCreateInstance(toastLiveExample)
                                        toastBootstrap.show()

                                    }
                                });
                            }
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
            })();


            // ===========================back to the previous page
            // education
            (educationInfoContainer.find("[name='back']")).click(() => educationInfoContainer.hide(0, () =>
                personalInfoContainer.show()));

            // training
            (trainingInfoContainer.find("[name='back']")).click(() => trainingInfoContainer.hide(0, () =>
                educationInfoContainer.show()));

            //experience
            (experienceContainer.find("[name='back']")).click(() => experienceContainer.hide(0, () =>
                trainingInfoContainer.show()));


            // ================================tab handler
            $('form').submit(() => tabActivate())
            $(document).click(() => tabActivate())

            function tabActivate() {
                // jQuery methods go here...
                tabActivated(tabActiveList);
                tabVisibility();

                if (formActive.get('personalInfo')) {

                    tabPersonalInfo.click(e => {
                        switchTab(formActive, personalInfoContainer);
                    })
                }


                if (formActive.get('educationInfo')) {
                    tabEducation.click(e => {
                        switchTab(formActive, educationInfoContainer);
                    })
                }

                if (formActive.get('trainingInfo')) {
                    tabTraining.click(e => {
                        switchTab(formActive, trainingInfoContainer);
                    })
                }

                if (formActive.get('expInfo')) {
                    tabExperience.click(e => {
                        switchTab(formActive, experienceContainer);
                    })
                }
            }


            /**
             * job validation
             */
            $(`[data-job-condition="present"]`).click(e => {
                jobStatusValidation(e);
            });

            $('#form_experience .btn-close').click(e => {
                $(e.currentTarget).parent().parent().remove();
            })



            // let formSubmit = {
            //     column : $("#dataTable tbody tr td"),
            //     btnSubmit : btnEducationSubmit,
            //     containerToHide : educationInfoContainer,
            //     containerToShow : trainingInfoContainer,
            //     formActive : 'trainingInfo',
            //     tabSetList : 'tabTraining',
            //     tabToSet : tabTraining,
            // }


            /**
             * deleting live record
             */
            deleteEducation();
            deleteTraining();
            deleteExperience();

            //changing page
            educationNextPage();
            trainingNextPage();
            experienceNextPage();


        }) // main loader ending tag
        // ============================bootstrap toast functions
        $(document).ready(function() {
            $("#liveToast").toast({
                autohide: false
            });
        });


        $('#dataTable').DataTable({
            responsive: true,
            "searching": false, // Disable search bar
            "paging": false, // Disable pagination
            "info": false
        });

        $('#dataTableTraining').DataTable({
            responsive: true,
            "searching": false, // Disable search bar
            "paging": false, // Disable pagination
            "info": false
        });

        // termsw and conditions ;
        $(document).ready(function() {
            let termsStatus = {{ $user->terms }};
            if (termsStatus === 0) {
                $('#staticBackdrop').modal('show');
            }


            $('#declineButton, #closeModalButton').on('click', function() {
                window.history.back();
            });

            // btnAgreedTerms
            $('#btnAgreedTerms').on('click', function() {
                let formDataTransport = new FormData();
                formDataTransport.append('terms', 1);
                formDataTransport.append('from_terms', 'true');
                axios.post('{{ route('doctor.profile.store') }}', formDataTransport)
                    .then(function(response) {
                        console.log(response);
                        $('#staticBackdrop').modal('hide');
                    }).catch(function(error) {
                        console.log(error);
                    });
            });

        });
    </script>
@endsection
