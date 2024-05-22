@extends('layouts.app')

@section('title')
    Services
@endsection

@section('banner')
    <div class="banner ">
        <h1 class="banner__title">Doctor and Counselor</h1>
        <img class="banner__img" src="{{ asset('images/banner/banner3.jpg') }}" alt="{{ __('Community Forum') }}">
    </div>
@endsection

@section('content')
    <section class="specialist segment-margin-side">
        <div class="d-grid gap-2 mb-4"><a href="./upcomming_appointment.php" class="btn btn-lg btn-primary">Upcoming
                Appointments</a></div>
        <div class="section-heading">
            <h3 class="section-heading__title">
                Experts And Counselors
            </h3>
        </div>

        <div class="accordion" id="accordionPanelsStayOpenExample">
            <!-- doctor list  -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button accordion-button--custom" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                        aria-controls="panelsStayOpen-collapseOne">
                        Doctors
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                    aria-labelledby="panelsStayOpen-headingOne">
                    <div class="accordion-body">
                        <div class="specialist__card-container">
                            @foreach ($doctorSchedule as $data)
                            <div class="specialist__card" style="max-width:20rem;">
                             
                    
                                <a href="{{route('patient.appointment.set',$data->id)}}" style="text-decoration: none;">
                                    <div class="specialist__info ">
                                    <div class="person">
                                        <h3 class="person__name">{{$data->set_date}}</h3>
                                        <h3 class="person__occu">{{$data->department->doctor_department}}</h3>
                                    </div>
                                    <p class="person__description">
                                        {{$data->specialist}}
                                    </p>
                                    <p class="person__description">
                                        @if($data->patient_qty >0)
                                        Limit: {{$data->patient_qty}}
                                        @else
                                        <span class="text-danger">Appoinment Limit: full</span>
                                        @endif
                                    </p>
                    
                                    <div class="specialist__links">
                                        <a href="#" title="click here to visit my facebook wall" class="specialist__icon"><i class="fa-brands fa-facebook-f"></i></a>
                                        <a href="#" title="click to follow twitter" class="specialist__icon"><i class="fa-brands fa-twitter"></i></a>
                                        <a href="#" title="click to visit web site" class="specialist__icon"><i class="fa-solid fa-globe"></i></a>
                                        <a href="#" title="click to visit linkdin profile" class="specialist__icon"><i class="fa-brands fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                                </a>
                                    
                    
                               
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            <!--\\\\\\\\\\\\\\\\\\ councilor list  ////////////////-->
            <div class="accordion-item">
                <h2 class="accordion-header " id="panelsStayOpen-headingTwo">
                    <button class="accordion-button collapsed accordion-button--custom" type="button"
                        data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseTwo">
                        Counselors
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                    aria-labelledby="panelsStayOpen-headingTwo">
                    <div class="accordion-body">
                        <div class="specialist__card-container">

                            @foreach ($users as $user)
                                @if ($user->hasRole('Counselor'))
                                    <div class="specialist__card">
                                        <div class="specialist__img-con">
                                            <img class="specialist__img" src="#" alt="">
                                        </div>

                                        <div class="specialist__info ">
                                            <input type="hidden" id='user_id' value="{{$user->id}}">
                                            <div class="person">
                                                <h3 class="person__name">{{ $user->first_name . ' ' . $user->last_name }}
                                                </h3>
                                                <h3 class="person__occu">Education info</h3>
                                            </div>
                                            <p class="person__description">
                                                Bio
                                            </p>
                                            {{-- {% comment %} social links  {% endcomment %} --}}
                                            <div class="specialist__links">
                                                <a href="#" title="click here to visit my facebook wall"
                                                    class="specialist__icon"><i class="fa-brands fa-facebook"></i></a>
                                                <a href="#" title="click to follow twitter"
                                                    class="specialist__icon"><i class="fa-brands fa-square-twitter"></i></a>
                                                <a href="#" title="click to visit web site"
                                                    class="specialist__icon"><i class="fa-solid fa-globe"></i></a>
                                                <a href="#" title="click to visit linkdin profile"
                                                    class="specialist__icon"><i class="fa-brands fa-linkedin"></i></a>
                                            </div>
                                            <div class="text-warning">Rating : 5</div>
                                        </div>
                                        <button name="btn-councilor" value="" class="specialist_view">View
                                            Info</button>
                                    </div>
                                @endif
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
@endsection

@section('scripts')
    <script>
        let specialistCardInfo = '';

        let user = '';

        @auth
        // If the user is authenticated, set the user variable with the user's information
        user = {!! json_encode(Auth::user()) !!};
        @endauth

        const specialistCard = $('.specialist__card');

        let baseUrl = "{{ route('patient.show_user_profile', ['user_id' => 'PLACEHOLDER'])}}";
        baseUrl = baseUrl.replace('PLACEHOLDER', '');

        specialistCard.click(e => {
            if (user != '') {
                let specialistId = $(e.currentTarget).find('#user_id').val();

                let url = `${baseUrl}${specialistId}`;
                window.location.href = url;
            } else {
                Swal.fire({
                    title: "Login Required",
                    text: "You need to login to view the specialist's information",
                    icon: "warning"
                });
            }


        });
    </script>
@endsection
