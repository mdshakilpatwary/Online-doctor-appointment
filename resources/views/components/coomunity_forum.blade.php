<section class="segment-margin community">
    <!-- post sectoin  -->
    <div class="community__post post">
        <!-- creating new post section  -->
        @unless ($user)
            <p class="text-center fs-4 text-danger pt-2">Please Login to comment and create your won post</p>
        @endunless
        <div class="post__card">
            <div class="post__title">


                <h3 class="post__author">Create a new post</h3>
            </div>
            <div class="p-des">
                <div class="p-des__article">
                    <fieldset @disabled($user == null)>
                        <form action="" class="needs-validation" method="POST" novalidate>
                            @csrf
                            {{-- <input type="hidden" name="user_id" value=""> --}}
                            <div class="form-group py-2">
                                <input type="text" name="title" required class="form-control"
                                    placeholder="Post Title" maxlength="256">

                                {{-- <input type="text" name="post_title" required class="form-control" placeholder="Post Title" maxlength="256"> --}}
                            </div>

                            <div class="form-group py-2">
                                <textarea name="description" required class="form-control" rows="3" placeholder="Write Your Post Here"></textarea>

                                {{-- <textarea name="post_details" required class="form-control" rows="3" placeholder="Write Your Post Here"></textarea> --}}
                            </div>
                            <input type="hidden" name="frmPost" value="article">


                            <div class="form-group py-2">
                                {{-- <div class="col text-center"><input type="submit" value="Post Now" name="post_article" class="btn btn-primary"></div> --}}
                                <button id="btnPostArticle" class="btn btn-primary" type="submit" name="post"
                                    value="article">Post</button>

                            </div>
                        </form>
                    </fieldset>
                </div>

            </div>
        </div>

        <!-- end creating new post  -->
        @foreach ($posts as $post)
            <div id="postCard" class="post__card">
                <div class="post__title">
                    <div class="row ">
                        <div class="col-6">
                            <h3 class="post__author text-start">
                                {{ $post->user->first_name . ' ' . $post->user->last_name }}</h3>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <button value="{{$post->id}}" class="btn btn-link link-danger btn-deletePost">Delete</button>
                            </div>
                        </div>


                    </div>
                    {{-- <h3 class="post__author">{{ $post->id }}</h3> --}}
                    <h4 class="post__upload-info">
                        {{ $post->user->getRoleNames()[0] == 'Patient' ? 'General User' : $post->user->getRoleNames()[0] }}
                        | <span class="text-muted">{{ $post->created_at }}</span> </h4>
                </div>
                <div class="p-des">
                    <h5>{{ $post->title }}</h5>
                    <p class="p-des__article">
                        {{ $post->description }}
                    </p>
                    <div class="p-des__react-info" id="blah">
                        <div class="p-des__comment btn-comment"><span id="commnetsCount"
                                class="comment-count"></span><span> comments</span><i
                                class="picon-size fa-solid fa-comments"></i></div>
                        <div class="p-des__react"> <span id="reactCount">5 </span><a href="#"
                                class="text-secondary"><i class="picon-size fa-solid fa-face-grin-hearts"></i></a></div>
                    </div>


                    <div class="p-des__comments comment-reply" id="commentsReply">
                        <hr>
                        <!-- comments form  -->
                        <!-- comments form  -->
                        <fieldset @disabled($user == null)>
                            <form method="POST" class="mb-2 needs-validation" novalidate>
                                @csrf
                                <h6 class="p-des__reply-author py-2"> <a href="#"
                                        class="text-secondary">{{ $user?->first_name . ' ' . $user?->last_name }}</a>
                                </h6>

                                <input type="hidden" name="user_id" value="{{ $user?->id }}">
                                <input type="hidden" name="post_id" value="{{ $post->id }}">

                                <div class="">
                                    <textarea name="comment" required rows="2" class="form-control " placeholder="Leave a Comment"></textarea>
                                    <input type="hidden" name="frmComment" value="comment">
                                </div>
                                <div class="text-end">
                                    {{-- <input class="btn btn-sm btn-secondary mt-1" type="submit" value="reply" name="btn-comment"> --}}
                                    <button id="btnComment" class="btn btn-sm btn-secondary mt-1" type="submit"
                                        name="bnt-comment" value="reply">reply</button>
                                </div>
                            </form>
                        </fieldset>


                        @if ($post->comments->count() > 0)
                            @foreach ($post->comments as $comment)
                                <div class="p-des__reply">
                                    <div class="row">
                                        <div class="col-6">
                                            <h6 class="p-des__reply-author"> <a href="#"
                                                    class="text-secondary">{{ $comment->user->first_name != null ? $comment->user->first_name : $comment->user->getRoleNames()[0] }}
                                                    {{ ' ' . $comment->user->last_name }}</a> </h6>
                                            {{-- <h3 class="post__author text-start">{{ $post->user->first_name . ' ' . $post->user->last_name }}</h3> --}}
                                        </div>
                                        <div class="col-6">
                                            <div class="text-end">
                                                <button  value="{{$comment->id}}" class="btn btn-link link-danger btn-deleteComment">Delete</button>
                                            </div>
                                        </div>
                                    </div>

                                    <p>{{ $comment->comment }}</p>
                                    <div class="p-des__reply-info">
                                        <p class="p-des__reply-time">{{ $comment->created_at }}</p>
                                        {{-- <p>id: {{$comment->id}}</p> --}}
                                        <span class="p-des__reply-icon"><i
                                                class="picon-size fa-solid fa-face-grin-hearts"></i></span>
                                    </div>
                                </div>
                            @endforeach
                        @endif


                    </div>
                </div>
            </div>
        @endforeach



        <!-- page number  -->
        <div aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link">Previous</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- aside bar  -->
    <div class="community__aside com-aside">
        <h3 class="com-aside__title">Popular Posts</h3>
        <div class="com-aside__update aside-update">
            <h4 class="aside-update__header">&Lorem ipsum dolor, sit amet consectetur adipisicing elit.</h4>
            <p class="aside-update__author">Posted by Mayesha</p>
        </div>
    </div>

</section>
