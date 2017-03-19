@extends('master')

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

                @foreach($photos->chunk(2) as $photoChunk)
                    <div class="row">
                        @foreach($photoChunk as $photo)

                            <div class="col-sm-6">
                                <img src="{{ url($photo->imgPath) }}" alt="{{ $photo->post_id }}">
                            </div>

                        @endforeach
                    </div>
                @endforeach

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

        @foreach($comments as $comment)

            <div class="postBox row">
                <div class="postSide col-sm-3">
                    <img class="img-circle img-responsive"
                         src="{{ $author->photo ? url($author->photo) : url('img/avatar.png') }}"
                         alt="{{ $author->id }}">
                    <hr>
                    <a href="#"
                       data-toggle="modal"
                       data-target="#userInfo"
                       data-img="{{ ($author = $post->user)->photo ? url($author->photo) : url('img/avatar.png') }}"
                       data-username="{{ $author->username }}"
                       data-role="{{ $author->role->role }}"
                       data-bday="{{ $author->birthday }}"
                       data-location="{{ $author->city. ', '.$author->country }}"
                       data-year="{{ $author->created_at->format('d-M-Y') }}"
                       data-count="{{ count($author->posts) }}"
                       data-route="{{ route('user.allPosts', $author) }}">
                        {{ $post->user->username }}
                    </a>
                    <p>{{ ucwords($author->role->role) }}</p>
                    <p>{{ $author->city . ', '. $author->country }}</p>
                    <p>Date Joined: {{ $author->created_at->diffForHumans() }}</p>
                    <p>Posts: {{ count($author->posts) }}</p>
                </div>
                <div class="postContent col-sm-9">
                    <h4><strong>{{ $comment->title ? ucwords($comment->title) : '' }}</strong></h4>
                    <p>
                        <small>{{ $comment->created_at->format('d-M-Y, H:i A') }}</small>
                    </p>
                    <hr>
                    <p>{!! $comment->content !!}</p>
                    <div class="commentBtmBar">
                        @can('update', $comment)
                            <a href="{{ route('post.edit', $post) }}" class="btn btn-success pull-right btnEdit">
                                <i class="fa fa-pencil" aria-hidden="true"></i> Edit
                            </a>
                        @endcan
                    </div>
                </div>
            </div>

        @endforeach

        @if(Auth::check())

            <div class="commentBox row">
                <div class="commentSide col-sm-3">
                    <img class="img-circle img-responsive"
                         src="{{ $user->photo ? url($user->photo) : url('img/avatar.png') }}"
                         alt="{{ $user->id }}">
                    <hr>
                    <h4><strong>{{ $user->username }}</strong></h4>
                    <p>{{ ucwords($user->role->role) }}</p>
                    <p>{{ $user->city . ', '. $user->country }}</p>
                    <p>Date Joined: {{ $user->created_at->diffForHumans() }}</p>
                    <p>Posts: {{ count($user->posts) }}</p>
                </div>
                <div class="commentContent col-sm-9">
                    {!! Form::open(['method'=>'post', 'action'=>['CommentController@publishComment', $post], 'files'=>true]) !!}
                    {{ csrf_field() }}

                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                        {!! Form::label('title', 'Comment Title', ['class'=>'col-form-label']) !!}
                        {!! Form::text('title', old('title'), ['class'=>'form-control', 'placeholder'=>'Enter Title']) !!}
                        @if ($errors->has('title'))
                            <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                        {!! Form::label('content', 'Comment Content', ['class'=>'col-form-label']) !!}
                        {!! Form::textarea('content', old('content'), ['class'=>'form-control', 'placeholder'=>'Enter content']) !!}
                        @if ($errors->has('content'))
                            <span class="help-block"><strong>{{ $errors->first('content') }}</strong></span>
                        @endif
                    </div>

                    {!! Form::submit('Comment', ['class'=>'btn btn-success pull-right']) !!}
                    {!! Form::close() !!}
                </div>
            </div>

        @endif
    </div>

    {{--modal--}}
    <div class="modal fade" id="userInfo"
         tabindex="-1" role="dialog"
         aria-labelledby="favoritesModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    {{--<h4 class="modal-title"--}}
                    {{--id="userHeader">Title</h4>--}}
                </div>
                <div class="modal-body clearfix">
                    <div class="col-sm-3">
                        <img class="img-circle img-responsive" id="userImg" src="">
                    </div>
                    <div class="col-sm-5">
                        <p id="userName">username</p>
                        <p id="userRole">role</p>
                        <p id="userYear">year</p>
                        <p id="userCount">count</p>
                    </div>
                    <div class="col-sm-4">
                        <p id="userBday"><i class="fa fa-gift"></i> birthday</p>
                        <p id="userLocation"><i class="fa fa-map-marker"></i> location</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button"
                            class="btn btn-default pull-left"
                            data-dismiss="modal">Close
                    </button>
                    <a href="#"
                       id="userRoute"
                       class="btn btn-primary pull-right">View Posts
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
