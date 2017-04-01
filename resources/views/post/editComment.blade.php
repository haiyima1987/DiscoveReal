@extends('layout.master')

@section('head')

    {!! Html::style('packages/dropzone/basic.css') !!}
    {!! Html::style('packages/dropzone/dropzone.css') !!}

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
        <img src="{{ url('img/banner1.png') }}" alt="banner">
        <div class="bannerText">
            <h2><strong>Edit Your Comment</strong></h2>
        </div>
    </div>
@endsection

@section('content')

    <div class="col-sm-10 col-sm-offset-1">
        <div class="content">
            <div class="formCreateEdit clearfix">

                {!! Form::open(['method'=>'put', 'action'=>['CommentController@updateComment', $comment]]) !!}
                {{ csrf_field() }}

                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                    {!! Form::label('title', 'Title', ['class'=>'col-form-label']) !!}
                    {!! Form::text('title', $comment->title, ['class'=>'form-control', 'placeholder'=>'Enter Title']) !!}
                    @if ($errors->has('title'))
                        <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                    {!! Form::label('comment', 'Comment content', ['class'=>'col-form-label']) !!}
                    {!! Form::textarea('content', $comment->content, ['class'=>'form-control', 'placeholder'=>'Enter content']) !!}
                    @if ($errors->has('content'))
                        <span class="help-block"><strong>{{ $errors->first('content') }}</strong></span>
                    @endif
                </div>

                {!! Form::submit('Update', ['class'=>'btn btn-success center-block btnComment']) !!}
                {!! Form::close() !!}

                <div class="alert alert-danger clearfix">
                    <a href="#"
                       data-toggle="modal"
                       data-target="#commentDelete"
                       class="btn btn-danger pull-left">Delete</a>
                    <span id="spanDeleteMsg">Click the button on the left to delete the comment</span>
                </div>
            </div>
        </div>
    </div>

    @include('post.partials.commentModal')

@endsection