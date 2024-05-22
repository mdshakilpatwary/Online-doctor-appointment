@extends('layouts.admin.app')

@section('link')
    <x-vendor.bootstrap_css />
@endsection

@section('content')
    <section class="profile segment-margin">


        <div class="row justify-content-center">
            <div class="col-md-3 col-lg-3 align-self-center">
                @isset($user->pp_name)
                    <img src="{{ asset($user->pp_location . '/' . $user->pp_name) }}" class="img-fluid rounded" alt="...">
                @else
                    <img src="{{ asset('images/profile_pic/blank-profile-picture.png') }}" class="img-fluid rounded"
                        alt="...">
                @endisset
                <p class="text-center"><a href="#" data-bs-toggle="modal" data-bs-target="#user_profile_image">Upload
                        Photo</a></p>
            </div>
            <h3 class="text-center mb-3">{{ $user?->first_name }}</h3>
        </div>
    </section>

    <x-image-upload>
        {{ $user->id }}
    </x-image-upload>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('vendor/bootstrap-5.3.0-alpha1-dist/js/bootstrap.bundle.min.js') }}">
    </script>





    @error('profile_picture')
        <div class="toast-container position-fixed top-0 end-0 p-3">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">

                    <strong class="me-auto"> Warning! </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body text-danger">
                    <strong>{{ $message }}</strong>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $('.toast').toast({
                    delay: 5000
                });
                $('.toast').toast('show');
            });
        </script>
    @enderror
@endsection
