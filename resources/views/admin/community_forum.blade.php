@extends('layouts.admin.app')

@section('link')
    <x-vendor.bootstrap_css />
    <link rel="stylesheet" href="{{ asset('css/community.css') }}">
@endsection

@section('content')
    {{-- toast warning  --}}
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


    <div class="m-2">
        <x-coomunity_forum :posts="$posts" :user="$user" />
    </div>
@endsection

@section('scripts')
    <x-vendor.bootstrap_js />


    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields

        /**
         * toast variables
         */
        const toastContentSuccess = $('#toastContentSuccess');
        const toastSuccess = $('#toastSuccess');

        const toastContentError = $('#toastContentError');
        const toastError = $('#toastError');

        let toastContainer = $('<div>');

        const currentUser = {
            user_name: " {{ $user->first_name != null ? $user->first_name : $user->getRoleNames()[0] . ' ' . $user->last_name }}",
            user_id: " {{ $user->id }}",
        }

        /**
         * cloning the post card
         */

        const postCard = $('#postCard');
        const postCardClone = postCard.clone(false);


        function latestReply(data, author) {
            let replyCard;


            replyCard = `
                    <div class="p-des__reply">
                        <div class="row">
                            <div class="col-6">
                                <h6 class="p-des__reply-author"> <a href="#" class="text-secondary">${author.user_name}</a> </h6>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <button value="${data.id}" class="btn btn-link link-danger btn-deleteComment">Delete</button>
                                </div>
                            </div>
                        </div>

                        <p>${data.comment}</p>
                        <div class="p-des__reply-info">
                            <p class="p-des__reply-time">${data.created_at}</p>
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

                            axios.post("{{ route('admin.community.store') }}", formData)
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
                        } else if (formData.get('frmComment') == 'comment') {
                            axios.post("{{ route('admin.store_comment') }}", formData)
                                .then(function(response) {
                                    console.log(response);
                                    if (response.status == 200) {
                                        const originalDate = new Date(response.data.comment[
                                            'created_at']);
                                        let formatDateTime =
                                            `${originalDate.getFullYear()}-${originalDate.getMonth()}-${originalDate.getDate()} ${originalDate.getHours()}:${originalDate.getMinutes()}:${originalDate.getSeconds()}`;

                                        response.data.comment['created_at'] = formatDateTime;

                                        $(form).after(latestReply(response.data.comment,
                                            currentUser));

                                        form.reset();
                                        toastSuccessShow(response.data.success);
                                        deleteRecord($('.btn-deletePost'),
                                            '{{ route('admin.delete_post') }}', '.post__card');
                                        deleteRecord($('.btn-deleteComment'),
                                            '{{ route('admin.delete_comment') }}',
                                            '.p-des__reply');


                                        let commentCountElement = $(form).closest('.post__card')
                                            .find('.comment-count');
                                        let currentCount = parseInt(commentCountElement.text());
                                        commentCountElement.text(currentCount + 1);


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
                        } else {
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


        function deleteRecord(btnTriggerd, url, deleteContent) {

            btnTriggerd.each(function(index) {
                const $this = $(this);

                $this.on('click', function() {
                    const postId = $this.val();


                    console.log(postId);
                    let formDataTransport = new FormData();

                    formDataTransport.append('id', postId);
                    axios.post(url, formDataTransport)
                        .then(function(response) {
                            $this.closest(deleteContent).remove();
                            toastSuccessShow(response.data.success);

                        }).catch(function(error) {
                            console.log(error);
                        });


                });
            });
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



            $('.p-des__comments').hide();

            $('.btn-comment').each(function(index) {
                const $this = $(this);
                $this.find(':first-child').text($this.parent().next().children().length - 2);

                $this.on('click', function() {
                    $this.parent().siblings('.p-des__comments').toggle();
                });
            });
        });



        /**
         * delete post
         */

        $(document).ready(() => {
            deleteRecord($('.btn-deletePost'), '{{ route('admin.delete_post') }}', '.post__card');


            deleteRecord($('.btn-deleteComment'), '{{ route('admin.delete_comment') }}', '.p-des__reply');

        });
    </script>
@endsection
