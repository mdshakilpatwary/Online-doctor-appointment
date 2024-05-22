@extends('layouts.app')

@section('title') Community forum @endsection

@section('banner')
    <div class="banner ">
        <h1 class="banner__title">Community Forum</h1>
        <img class="banner__img" src="{{asset('images/banner/banner3.jpg')}}" alt="{{__('Community Forum')}}">
    </div>
@endsection

@section('content')

    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div id="toastError" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                {{-- <img src="..." class="rounded me-2" alt="..."> --}}
                <strong class="me-auto text-danger">Warning!</strong>
                {{-- <small>11 mins ago</small> --}}
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <div id="toastContentError">
                </div>
            </div>
        </div>
    </div>

    {{--            toast success --}}
    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div id="toastSuccess" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto text-success">Success!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <div id="toastContentSuccess">
                </div>
            </div>
        </div>
    </div>


    <x-coomunity_forum :posts="$posts" :user="$user ?? null" />
    {{-- {{$posts}} --}}
@endsection

@section('scripts')
    <script>

        // let btnComment;

        // btnComment = document.querySelectorAll('.btn-comment');

        // for (let i = 0; i < btnComment.length; i++) {
        //     btnComment[i].firstElementChild.textContent = btnComment[i].parentNode.nextElementSibling.children.length - 2;
        //     btnComment[i].addEventListener('click', () => {
        //         btnComment[i].parentNode.nextElementSibling.classList.toggle('comments-visible');
        //     })
        // }
        // Example starter JavaScript for disabling form submissions if there are invalid fields

        /**
         * toast variables
         */
        const toastContentSuccess = $('#toastContentSuccess');
        const toastSuccess = $('#toastSuccess');

        const toastContentError = $('#toastContentError');
        const toastError = $('#toastError');

        let toastContainer = $('<div>');

        const currentUser = "{{ $user?->first_name . ' ' . $user?->last_name }}";


        /**
         * cloning the post card
         */

        const postCard = $('#postCard');
        const postCardClone = postCard.clone(false);

        console.log(postCardClone);

        function latestReply(data,author){
            let replyCard;


            replyCard = `
                    <div class="p-des__reply">
                        <h6 class="p-des__reply-author"> <a href="#" class="text-secondary">${author}</a> </h6>

                        <p>${data.comment}</p>
                        <div class="p-des__reply-info">
                            <p class="p-des__reply-time">${data.created_at}</p>
                            <p>id:${data.id} </p>
                            <span class="p-des__reply-icon"><i class="picon-size fa-solid fa-face-grin-hearts"></i></span>
                        </div>
                    </div>`;

            return replyCard;
        }




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
                    } else {
                        event.preventDefault()

                        const formData = new FormData(form);
                        console.log(formData);

                        if (formData.get('frmPost') == 'article') {

                            axios.post("{{ route('patient.community.store') }}", formData)
                                .then(function(response) {
                                    console.log(response);
                                    if (response.status == 200) {
                                        form.reset();
                                        toastSuccessShow(response.data.success);
                                        location.reload(true);
                                    } else {
                                        alert('Post creation failed');
                                    }

                                })
                                .catch(function(error) {
                                    console.log(error);

                                    const errorList = $('<ul>');
                                    Object.entries(error.response.data.errors).forEach(element => {
                                        console.log(element);
                                        errorList.append($("<li>").text(element[1][0]));
                                    });

                                    toastErrorShow(errorList);
                                });
                        }else if(formData.get('frmComment') == 'comment'){
                            axios.post("{{ route('patient.store_comment') }}", formData)
                                .then(function(response) {
                                    console.log(response);
                                    if (response.status == 200) {
                                        const originalDate = new Date(response.data.comment['created_at']);
                                        let formatDateTime = `${originalDate.getFullYear()}-${originalDate.getMonth()}-${originalDate.getDate()} ${originalDate.getHours()}:${originalDate.getMinutes()}:${originalDate.getSeconds()}`;

                                        response.data.comment['created_at'] = formatDateTime;

                                        $(form).after(latestReply(response.data.comment,currentUser));

                                        form.reset();
                                        toastSuccessShow(response.data.success);
                                    } else {
                                        alert('Post creation failed');
                                    }

                                })
                                .catch(function(error) {
                                    console.log(error);
                                    const errorList = $('<ul>');
                                    Object.entries(error.response.data.errors).forEach(element => {
                                        console.log(element);
                                        errorList.append($("<li>").text(element[1][0]));
                                    });

                                    toastErrorShow(errorList);
                                });
                        }else{
                            alert('something went wrong');
                        }

                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()

        // bootstrap toast
        /**
         * toast success function
         */
            function toastSuccessShow(message) {
            toastContentSuccess.empty();
            toastContainer = toastContainer.text(message);

            toastContentSuccess.append(toastContainer);
            const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastSuccess)
            toastBootstrap.show()
        }

        function toastErrorShow(message) {
            toastContentError.empty();
            // toastContainer = toastContainer.text(message);

            toastContentError.append(message);
            const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastError)
            toastBootstrap.show()
        }


        /**
         * post live card
         */
        // const postCard = $('#postCard');
        // postCard.hide();





        $(document).ready(function() {
            const toastTrigger = document.getElementById('liveToastBtn')
            const toastLiveExample = document.getElementById('liveToast')

            if (toastTrigger) {
            const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
            toastTrigger.addEventListener('click', () => {
                toastBootstrap.show()
            })
            }


            const $btnComment = $('.btn-comment');

            $btnComment.each(function(index) {
                const $this = $(this);
                $this.find(':first-child').text($this.parent().next().children().length - 2);

                $this.on('click', function() {
                    $this.parent().next().toggleClass('comments-visible');
                });
            });
        });

    </script>
@endsection
