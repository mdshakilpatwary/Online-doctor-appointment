@extends('layouts.app')

@section('title') Mental Health @endsection

@section('banner')
    <div class="hero-container">
        <div id="carouselExampleDark" class="carousel carousel-dark slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="{{asset('images/banner/banner_free.jpg')}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-white">Mental Health And Support</h5>
                        <p class="text-white">You Are Not Alone</p>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="{{asset('images/banner/banner_2.jpg')}} " class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>GET HELP</h5>
                        <p>You Are Not Alone</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{asset('images/banner/banner_3.jpg')}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-white">Talk to Professionals</h5>
                        <p class="text-white">We Are Here For You</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
@endsection


@section('content')
    <!-- ----------service section -----------  -->
    <section class="service segment-margin">
        <!-- service card  -->
        <div class="service__card-container ">
            <div class="service__card s-card">
                <div class="s-card__icon-container">
                    <img class="s-card__icon" src="{{asset('images/divpics/doctor.png')}}" alt="Loading">
                </div>
                <h3 class="s-card__heading">Talk to Doctors </h3>
                <p class="s-card__para">Need to talk to a psychiatrist? Make an appointment and get treatment from home!</p>
            </div>

            <div class="service__card s-card">
                <div class="s-card__icon-container">
                    <img class="s-card__icon" src="{{asset('images/divpics/counselor.png')}}" alt="Loading">
                </div>
                <h3 class="s-card__heading">Talk to Counselors</h3>
                <p class="s-card__para">Feeling alone, depreesed or anxious? Don't worry we're available for you 24/7</p>
            </div>

            <div class="service__card s-card">
                <div class="s-card__icon-container">
                    <img class="s-card__icon" src="{{asset('images/divpics/comfortable.jpg')}}" alt="Loading">
                </div>
                <h3 class="s-card__heading">Comfortable Place</h3>
                <p class="s-card__para">There's no shame in getting help. We're here to welcome you anytime</p>
            </div>

            <div class="service__card s-card">
                <div class="s-card__icon-container">
                    <img class="s-card__icon" src="{{asset('images/divpics/safe.png')}}" alt="Loading">
                </div>
                <h3 class="s-card__heading">Safe Space</h3>
                <p class="s-card__para">Share your problems in a safe space with full confidentiality</p>
            </div>


        </div>

        <!-- service welcome  -->
        <div class="service__welcome welcome">
            <div class="welcome__banner-container">
                <img class="welcome__banner" src="{{asset('images/img/service__baner.png')}}" alt="Loading">
            </div>

            <div class="welcome__article">
                <h2 class="welcome__header">Welcome To Our Vicinity</h2>
                <div class="welcome__para-container">
                    <p class="welcome__para">
                        We welcome you to join us anytime. We're here to help whenever you need.
                    </p>
                    <p class="welcome__para">
                        We provide professional mental health care service and general counseling. Become a member of our community and let us grow together.
                    </p>
                </div>

                <!-- <button class="welcome__button button button-large">Learn More</button> -->
            </div>
        </div>
    </section>
    <!-- ---------------service end ----------- -->

    <!-- ------------patient review------------ -->
    <section class="patient-review segment-margin">
        <div class="patient-review__heading-container section-heading ">
            <h2 class="section-heading__title">Patients are saying</h2>
            <p class="section-heading__para">
                We're a family and we grow by helping each other
            </p>
        </div>

        <div class="patient-review__details">
            <div class="patient-review__card patient-say">
                <div class="pateint-say__img-con">
                    <img class="pateint-say__img" src="{{asset('images/img/pp.jpg')}}" alt="Loading">
                </div>
                <div class="patient-say__info person">
                    <h3 class="person__name">daren jhonson</h3>
                    <h4 class="person__occu">Hp Specialist</h4>
                    <p class="person__description">
                        Elementum libero hac leo integer. Risus hac road parturient feugiat. Litora cursus hendrerit bib elit Tempus inceptos posuere metus.
                    </p>
                </div>

            </div>

            <div class="patient-review__card patient-say">
                <div class="pateint-say__img-con">
                    <img class="pateint-say__img" src="{{asset('images/img/pp.jpg')}}" alt="Loading">
                </div>

                <div class="patient-say__info person">
                    <h3 class="person__name">daren jhonson</h3>
                    <h4 class="person__occu">Hp Specialist</h4>
                    <p class="person__description">
                        Elementum libero hac leo integer. Risus hac road parturient feugiat. Litora cursus hendrerit bib elit Tempus inceptos posuere metus.
                    </p>
                </div>
            </div>
        </div>

        <div class="paitent-review__appointment appointment">
            <div class="appointment__background-border"></div>

            <div class="appointment__form-container">
                <form action="./upcomming_appointment.php" method="POST" class="appointment__form">
                    <h3 class="appointment__title">Appointment Now</h3>
                    <div class="form-col">
                        <input class="appointment__input input" type="text" name="name" placeholder="Your Name">
                    </div>
                    <div class="form-col">
                        <input class="appointment__input input" type="email" name="email" placeholder="Your Email">

                    </div>
                    <div class="form-col">
                        <input class="appointment__input input" type="date" name="ap_date">

                    </div>
                    <div class="form-col">
                        <textarea class="appointment__text input" name="ap_message" placeholder="Your Message"></textarea>

                    </div>
                    <div class="form-col text-center">
                        <input type="submit" value="APPOINTMENT NOW" name="ap_submit" class="button appointment__button">

                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- ------------end patient review------------- -->

    <!-- -------------our specialist--------------- -->



    <section class="specialist segment-margin">
        <div class="section-heading">
            <h3 class="section-heading__title">
                Our Specialists
            </h3>
            <p class="section-heading__para">
                Book an Appointment and Meet Our Specialists Online
            </p>
        </div>


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


    </section>
    <!-- ------------our specialist end------------ -->
    <!-- ------------emmergency hotline----------- -->
    <section class="emmergency segment-margin">
        <div class="emmergency__content">
            <h2 class="section-heading__title">Emmergency Hotline</h2>
            <h2 class="emmergency__contact">+8801725485465</h2>
            <p class="section-heading__para section-heading__para--emmergency-font">We provide 24/7 customer support. Please feel free to contact us
                for emergency case.</p>
        </div>

    </section>
    <!-- ------------end emmergency hotline-------------- -->

    <!-- ----------recent news ------------  -->
    <section class="news segment-margin">
        <div class="news__heading section-heading">
            <h2 class="section-heading__title">Recent medical news</h2>
            <p class="section-heading__para">
                Green above he cattle god saw day multiply under fill in the cattle fowl a all, living, tree word link available in the service for subdue fruit.
            </p>
        </div>

        <div class="news__card-container">
            <div class="news-card">
                <div class="news-card__img-con">
                    <img class="news-card__img" src="{{asset('images/recent-news/news1.jpg.webp')}}" alt="Loading">
                    <span class="news-card__date">22 July 2022</span>
                </div>
                <div class="news-card__description-con">
                    <h2 class="news-card__title">
                        chip to model coeliac disease
                    </h2>
                    <p class="news-card__description">
                        Elementum libero hac leo integer. Risus hac part duriw feugiat litora cursus hendrerit bibendum per person on elit.Tempus inceptos posuere me.
                    </p>
                    <a class="news-card__extend-btn" href="#">read more <i class="move fa-solid fa-right-long"></i></a>
                </div>
            </div>

            <div class="news-card">
                <div class="news-card__img-con">
                    <img class="news-card__img" src="{{asset('images/recent-news/news1.jpg.webp')}}" alt="Loading">
                    <span class="news-card__date">22 July 2022</span>
                </div>
                <div class="news-card__description-con">
                    <h2 class="news-card__title">
                        chip to model coeliac disease
                    </h2>
                    <p class="news-card__description">
                        Elementum libero hac leo integer. Risus hac part duriw feugiat litora cursus hendrerit bibendum per person on elit.Tempus inceptos posuere me.
                    </p>
                    <a class="news-card__extend-btn" href="#">read more <i class="move fa-solid fa-right-long"></i></a>
                </div>
            </div>

            <div class="news-card">
                <div class="news-card__img-con">
                    <img class="news-card__img" src="{{asset('images/recent-news/news1.jpg.webp')}}" alt="Loading">
                    <span class="news-card__date">22 July 2022</span>
                </div>
                <div class="news-card__description-con">
                    <h2 class="news-card__title">
                        chip to model coeliac disease
                    </h2>
                    <p class="news-card__description">
                        Elementum libero hac leo integer. Risus hac part duriw feugiat litora cursus hendrerit bibendum per person on elit.Tempus inceptos posuere me.
                    </p>
                    <a class="news-card__extend-btn" href="#">read more <i class="move fa-solid fa-right-long"></i></a>
                </div>
            </div>

            <div class="news-card">
                <div class="news-card__img-con">
                    <img class="news-card__img" src="{{asset('images/recent-news/news1.jpg.webp')}}" alt="Loading">
                    <span class="news-card__date">22 July 2022</span>
                </div>
                <div class="news-card__description-con">
                    <h2 class="news-card__title">
                        chip to model coeliac disease
                    </h2>
                    <p class="news-card__description">
                        Elementum libero hac leo integer. Risus hac part duriw feugiat litora cursus hendrerit bibendum per person on elit.Tempus inceptos posuere me.
                    </p>
                    <a class="news-card__extend-btn" href="#">read more <i class="move fa-solid fa-right-long"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- -----------end news-------------  -->
@endsection
