@extends('layouts.app')

@section('title')
    Contact-Us
@endsection

@section('banner')
    <div class="banner ">
        <h1 class="banner__title">Contact Us</h1>
        <img class="banner__img" src="{{ asset('images/banner/banner3.jpg') }}" alt="{{ __('Community Forum') }}">
    </div>
@endsection

@section('content')
    <section class="contact segment-margin">
        <div class="contact__card">
            <!-- <img src="" alt="" class="contact__icon"> -->
            <h2 class="contact__icon"><i class="fa-solid fa-map-location-dot"></i></h2>
            <h3 class="contact__title">Address </h3>
            <p class="contact__info">Dhaka, Dhanmondi</p>
        </div>
        <div class="contact__card">
            <h2 class="contact__icon"><i class="fa-solid fa-phone-volume"></i></h2>
            <h3 class="contact__title">Contact Number </h3>
            <p class="contact__info">0815454444</p>
        </div>
        <div class="contact__card">
            <h2 class="contact__icon"><i class="fa-solid fa-envelope"></i></h2>
            <h3 class="contact__title">E-mail </h3>
            <p class="contact__info">mental.health.support@email.com</p>
        </div>
    </section>

    <!-- contact form  -->
    <section class="contact-frm segment-margin">
        <div class="contact-frm__artcle-con">
            <h2 class="contact-frm__artcle-title">Feel Free To Message Us</h2>
            <p class="contact-frm__artcle">Message us for any information and queries</p>

            <div class="contact-frm__artcle-img-con">
                <img src="{{ asset('images/img/who-we-are.jpg') }}" alt="" class="contact-frm__artcle-img">
            </div>

        </div>
        <div class="contact-form d-flex align-items-center">
            @if ($errors->any())
                {{-- toast success --}}
                <div class="toast-container position-fixed top-0 end-0 p-3">
                    <div id="myToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header">
                            {{-- <img src="..." class="rounded me-2" alt="..."> --}}
                            <strong class="me-auto">Warning</strong>
                            {{-- <small>11 mins ago</small> --}}
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            <ul class="text-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

            @endif
            @if (session('status'))
                {{-- toast success --}}
                <div class="toast-container position-fixed top-0 end-0 p-3">
                    <div id="myToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header">
                            {{-- <img src="..." class="rounded me-2" alt="..."> --}}
                            <strong class="me-auto">Success</strong>
                            {{-- <small>11 mins ago</small> --}}
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            <span class="text-success">Your message has been sent successfully</span>
                        </div>
                    </div>
                </div>
            @endif




            <div class="card p-5">
                <form action="{{ route('send_query') }}" method="POST" novalidate class="needs-validation">
                    @csrf
                    <div class="row g-4">
                        <div class="col-md-6 col-lg-6">
                            <input class="form-control " type="text" placeholder="First Name"
                                value="{{ Auth::user()?->first_name }}" name="first_name" required>
                        </div>
                        <div class="col-md-6 col-lg-6">

                            <input class="form-control " type="text" placeholder="Last Name"
                                value="{{ Auth::user()?->last_name }}" name="last_name" required>
                        </div>

                        <div class="col-12">
                            <input class="form-control " type="email" value="{{ Auth::user()?->email }}"
                                placeholder="Email" name="email" required>
                        </div>

                        <div class="col-12">
                            <textarea class="form-control " rows="4" name="message" required placeholder="Leave Your Comments"></textarea>
                        </div>

                        <div class="col-12">
                            {{-- <input name="btn-contact" type="submit" class="button c-block__button" value="Send"> --}}
                            <div class="d-grid gap-2 col-6">
                                <button class="btn btn-primary" name="btn-contact" value="Send"
                                    type="submit">Send</button>
                                {{-- <input name="btn-contact" type="submit" class="btn btn-primary" value="Send"> --}}

                            </div>
                        </div>

                        {{-- <div class="contact-form__block c-block">

                            </div>

                            <div class="contact-form__block c-block">
                                <input class="input c-block__email" type="email" value="{{Auth::user()?->email}}" placeholder="Email" name="email" required>

                            </div>
                            <div class="contact-form__block c-block">
                                <textarea class="input c-block__comment" name="message" required placeholder="Leave Your Comments"></textarea>

                            </div>


                            <div class="contact-form__block c-block">
                                <input name="btn-contact" type="submit" class="button c-block__button" value="Send">
                            </div> --}}

                    </div>

                </form>

            </div>



        </div>

    </section>
@endsection

@section('scripts')
    <script src="{{ asset('js/form_validation.js') }}"></script>

    <script type="text/javascript">

        var toastEl = document.getElementById('myToast');
        var toast = new bootstrap.Toast(toastEl);

        toast.show();
    </script>
@endsection
