@extends('layout.master')

@section('stylesheet')

    <script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'image imagetools',
            menubar: false
        });
    </script>

@endsection

@section('banner')
    <div class="banner">
        <img src="{{ url('img/banner3.png') }}" alt="banner">
        <div class="bannerText">
            <h2><strong>Discover Real World</strong></h2>
        </div>
    </div>
@endsection

@section('content')

    <div class="content">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <div class="postBox row">
                <div class="postSide col-sm-3">
                    {{--{{ $author->id }}--}}
                    <img class="img-circle img-responsive"
                         src="{{ ($author = $post->user)->photo ? url($author->photo) : url('img/avatar.png') }}"
                         alt="{{ $author->id }}">
                    <hr>
                    <h4><a href="#"
                           data-toggle="modal"
                           data-target="#userInfo"
                           data-img="{{ $author->photo ? url($author->photo) : url('img/avatar.png') }}"
                           data-identity="{{ $user->id }}"
                           data-username="{{ $author->username }}"
                           data-role="{{ $author->role->role }}"
                           data-bday="{{ $author->birthday }}"
                           data-location="{{ $author->city. ', '.$author->country }}"
                           data-year="{{ $author->created_at->format('d-M-Y') }}"
                           data-count="{{ count($author->posts) }}"
                           data-route="{{ route('user.allPosts', $author) }}">
                            {{ $post->user->username }}
                        </a></h4>
                    <p>{{ ucwords($author->role->role) }}</p>
                    <p>{{ $author->city . ', '. $author->country }}</p>
                    <p>Date Joined: {{ $author->created_at->diffForHumans() }}</p>
                    <p>Posts: {{ count($author->posts) }}</p>
                </div>
                <div class="postContent col-sm-9">
                    <h4><strong>{{ ucwords($post->title) }}</strong></h4>
                    <p>
                        <small>{{ $post->created_at->format('d-M-Y, H:i A') }}</small>
                    </p>
                    <hr>

                    <div class="postImgBox">
                        @foreach($photos->chunk(2) as $photoChunk)
                            <div class="row">
                                @foreach($photoChunk as $photo)

                                    <div class="col-sm-6">
                                        <img class="img-rounded" src="{{ url($photo->imgPath) }}"
                                             alt="{{ $photo->post_id }}">
                                    </div>

                                @endforeach
                            </div>
                        @endforeach
                    </div>

                    <p>{!! $post->content !!}</p>

                    <div class="postBtmBar">
                        <a href="{{ route('post.viewToPdf', $post) }}" class="pull-left">Download this post as PDF</a>
                        @can('update', $post)
                            <a href="{{ route('post.edit', $post) }}" class="btn btn-success pull-right btnEdit">
                                <i class="fa fa-pencil" aria-hidden="true"></i> Edit
                            </a>
                        @endcan
                    </div>
                </div>
            </div>

            @each('post.partials.comments', $comments, 'comment')

            @if(Auth::check())
                @include('post.partials.commentBox', ['user' => $user, 'post' => $post])
            @endif

        </div>
    </div>

    @include('post.partials.userInfoModal')

@endsection