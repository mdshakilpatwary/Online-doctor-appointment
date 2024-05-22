<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    {{-- cuatom style and others --}}
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css') }} " type="text/css">

    <!--fontawesome link-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/fontawesome-free-6.2.1-web/css/all.min.css') }} ">

    <!--custom css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }} ">

    {{-- sweetalert2  --}}
    <link rel="stylesheet" href="vendor/sweetalert2/sweetalert2.min.css">

    <!-- fonts and family -->
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Passion+One:900" rel="stylesheet">



    <!-- jquery js  -->
    <script src="{{ asset('vendor/jquery/jquery-3.6.3.min.js') }}"></script>



    <!-- Scripts -->
    {{-- @vite(['resources/js/app.js',]) --}}

</head>


<body>
    {{-- |||||||||||Navigation Menu bar ||||||||||||||||| --}}
    <nav class="mobile-nav">
        <!-- navigation menu bar  -->
        <div class="mobile-nav__close"><i class="fa-solid fa-xmark"></i></div>
    </nav>
    <!-- ===========header ============= -->
    <header class="header">
        <!------ nav menu start ------->
        <nav class="nav nav--font nav--padding">
            <!-- site logo  -->
            <div class="nav__logo-container">
                <a href="{{ route('home') }}"><img data-href="{% url 'home' %}" class="nav__logo" id="nav__logo"
                        src="{{ asset('images/logo/logo_.png') }} " alt="Logo"></a>
            </div>

            <!-- navigation menu bar  -->
            <ul class="nav__menu">
                <li class="nav__item"><a class="nav__link {{ $home ?? '' }}" href="{{ route('home') }}">Home</a></li>
                <li class="nav__item nav__dropdown--item"><a class="nav__link {{ $doctor_counselor ?? '' }}"
                        href="{{ route('doctor_counselor') }}">Services <i class="fa-solid fa-caret-down"></i></a>

                    <ul class="nav__dropdown">
                        <li class="nav__item"><a class="nav__link {{ $doctor_counselor ?? '' }}"
                                href="{{ route('doctor_counselor') }}">Doctor & Counselor</a></li>
                        <li class="nav__item"><a class="nav__link" href="#">Mental Disorder</a></li>
                        <li class="nav__item"><a class="nav__link" href="#">Appointment</a></li>
                        <li class="nav__item"><a class="nav__link" href="#">Call Counselor</a></li>
                    </ul>

                </li>
                <li class="nav__item"><a class="nav__link {{ $community ?? '' }}"
                        href="{{ route('community') }}">Community Forum</a></li>
                <li class="nav__item"><a class="nav__link {{ $about ?? '' }}" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav__item"><a class="nav__link {{ $contact ?? '' }}"
                        href="{{ route('contact') }}">Contact</a></li>
            </ul>

            <!-- user login registration  -->
            <div class="nav__user user">

                @auth
                    <div class="user__logged">
                        <div class="dropdown">
                            <li class="dropdown-toggle dropdown-toggle_custom" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fa-regular fa-face-smile"></i>
                                {{-- @if (isset($user) && isset($user->full_name)) {{$user->full_name}} @else {{__('Assign Your Name')}} @endif --}}@isset(Auth::user()->first_name)
                                {{ Auth::user()->first_name . ' ' . Auth::user()?->last_name }}
                            @else
                                Your Name
                            @endisset
                        </li>
                        <ul class="dropdown-menu">
                            @role('Patient')
                                <li><a class="dropdown-item" href="{{ route('patient.profile') }}">View Profile</a></li>
                                <li><a class="dropdown-item" href="./edit_user.php">Edit Profile</a></li>
                                <li><a class="dropdown-item" href="{{route('patient.patient_appointment')}}">My Appointments</a></li>
                            @endrole
                            @role('Doctor')
                                <li><a class="dropdown-item" href="{{ route('doctor.dashboard') }}">Dashboard</a></li>
                            @endrole
                            @role('Counselor')
                                <li><a class="dropdown-item" href="{{ route('counselor.dashboard') }}">Dashboard</a></li>
                            @endrole
                            @role('Admin')
                                <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            @endrole
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf

                            </form>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    {{ __('Sign Out') }}
                                </a>
                                {{--                                    <a class="dropdown-item" href="{{ route('logout') }}">Sign Out</a> --}}
                            </li>
                        </ul>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            @endauth
            @guest
                <div class="user__unlogged">
                    <a href="{{ route('login') }}" class="user__login  btn btn-primary {{-- user__login--theme user__login--size button --}}"
                        {{-- data-bs-toggle="modal" data-bs-target="#login" --}}>Login</a>
                    <a href="{{ route('register') }}" class="user__register btn btn-success {{-- user__register--theme user__register--size button --}} "
                        {{-- data-bs-toggle="modal" data-bs-target="#register_popup" --}}>Register</a>
                </div>
            @endguest


        </div>


        <!-- nav menu button  -->
        <div class="nav__menu-button" id="btnMenu">
            <span class="nav__menu-open"> <i class="fa-solid fa-bars"></i></span>
        </div>
    </nav>
    <!------- nav menu end --------->

    {{-- ||||||||||||Banner Area||||||||||| --}}
    @yield('banner')

</header>
<!-- =================header end ================ -->

{{-- ||||||||||||Main conent ||||||||||||| --}}
<main class="main">
    @yield('content')
</main>

<!-- =============footer section ============== -->
<footer class="footer ">
    <div class="footer__body f-bdy">
        <div class="f-bdy__segment">
            <h3 class="f-bdy__title">Quick Links</h3>
            <ul class="f-bdy__contents">
                <li class="f-bdy__content"><a href="./doctor_appointment.php" class="f-bdy__content-link">Get
                        Help</a></li>
                <li class="f-bdy__content"><a href="{{ route('community') }}"
                        class="f-bdy__content-link">Community</a></li>
                <li class="f-bdy__content"><a href="{{ route('contact') }}" class="f-bdy__content-link">Contact
                        Us</a></li>
                <li class="f-bdy__content"><a href="{{ route('about') }}" class="f-bdy__content-link">About</a>
                </li>
            </ul>
        </div>

        <div class="f-bdy__segment">
            <h3 class="f-bdy__title">Get Involved</h3>
            <ul class="f-bdy__contents">
                <li class="f-bdy__content"><a href="councilor_reg.php" class="f-bdy__content-link">Join as
                        counselor</a></li>
                <li class="f-bdy__content"><a href="contact_us.php" class="f-bdy__content-link">Browse and
                        contact </a></li>
                <li class="f-bdy__content"><a href="doc_reg.php" class="f-bdy__content-link">Become a doctor </a>
                </li>
                <li class="f-bdy__content"><a href="index.php" class="f-bdy__content-link">Work with us</a></li>
            </ul>
        </div>

        <div class="f-bdy__segment">
            <h3 class="f-bdy__title">Social Links</h3>
            <ul class="f-bdy__contents">
                <li class="f-bdy__content"><a href="https://www.facebook.com/"
                        class="f-bdy__content-link">Facebook</a></li>
                <li class="f-bdy__content"><a href="https://twitter.com/i/flow/login"
                        class="f-bdy__content-link">Twitter</a></li>
                <li class="f-bdy__content"><a href="https://www.instagram.com/"
                        class="f-bdy__content-link">Instagram</a></li>
                <li class="f-bdy__content"><a href="https://bd.linkedin.com/"
                        class="f-bdy__content-link">Linkdin</a></li>
            </ul>
        </div>
    </div>
    <div class="footer__bottom f-btm">
        <p class="f-btm__content">Copyright ©2022 All rights reserved | This template is made with &#128420; by
            Bikash Chowdhury</p>

    </div>
</footer>

{{-- ||||||||||||Modal |||||||||| --}}

{{-- imported axios  --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> --}}
<script src="{{ asset('vendor/axios/axios.min.js') }}"></script>
<!-- fontawesome -->
<script src="{{ asset('vendor/fontawesome-free-6.2.1-web/js/all.js') }}" type="text/javascript"></script>

<!-- datatable -->
{{--    {% comment %} <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> {% endcomment %} --}}
{{--    {% comment %} <script type="text/javascript" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script> --}}
{{--    <script type="text/javascript" src="https://cdn.datatables.net/1.13.2/js/dataTables.jqueryui.min.js"></script> --}}

{{--    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script> --}}
{{--    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.4.0/js/responsive.jqueryui.min.js"></script> {% endcomment %} --}}

<!-- bootstrap -->
<script type="text/javascript" src="{{ asset('vendor/bootstrap-5.3.0-alpha1-dist/js/bootstrap.bundle.min.js') }}">
</script>


<!-- packagers --->
{{--    {% comment %} <script type="text/javascript" src="{% static 'packages/jquery-validation-1.19.5/lib/jquery-1.11.1.js' %} "></script> --}}
{{--    <script type="text/javascript" src="{% static 'packages/jquery-validation-1.19.5/dist/jquery.validate.js' %} "></script> {% endcomment %} --}}

<!-- custom js -->
<script src="{{ asset('js/main.js') }}" type="text/javascript"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
<script src="{{asset('vendor/sweetaltert2/sweetalert2@11.min.js')}}"></script>


@yield('scripts')


<script type="text/javascript">


    // tooltip code
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>





</body>

</html>
