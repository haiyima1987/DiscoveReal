@extends('layout.master')

@section('head')

    {{--<!-- Generic page styles -->--}}
    {{--{!! Html::style('plugin/css/style.css') !!}--}}
    {{--<link rel="stylesheet" href="css/style.css">--}}
    {{--<!-- blueimp Gallery styles -->--}}
    {{--<link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">--}}
    {{--<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->--}}
    {{--{!! Html::style('plugin/css/jquery.fileupload.css') !!}--}}
    {{--<link rel="stylesheet" href="css/jquery.fileupload.css">--}}
    {{--{!! Html::style('plugin/css/jquery.fileupload-ui.css') !!}--}}
    {{--<link rel="stylesheet" href="css/jquery.fileupload-ui.css">--}}
    {{--<!-- CSS adjustments for browsers with JavaScript disabled -->--}}
    {{--<noscript><link rel="stylesheet" href="css/jquery.fileupload-noscript.css"></noscript>--}}
    {{--<noscript><link rel="stylesheet" href="css/jquery.fileupload-ui-noscript.css"></noscript>--}}

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
            <h2><strong>Create New Post</strong></h2>
        </div>
    </div>
@endsection

@section('content')

    <div class="col-sm-10 col-sm-offset-1">
        <div class="content">
            <div class="formCreateEdit clearfix">
                {!! Form::open(['method'=>'post', 'action'=>'PostController@publishPost', 'files'=>true]) !!}
                {{--,'id' => 'drDropzone', 'class' => 'dropzone']) !!}--}}
                {{ csrf_field() }}
                {!! Form::hidden('postId', $post->id) !!}

                <div class="row">
                    <div class="form-group leftElem col-sm-6 {{ $errors->has('attraction') ? ' has-error' : '' }}">
                        {!! Form::label('attraction', 'Attraction', ['class'=>'col-form-label']) !!}
                        {!! Form::text('attraction', old('attraction'), ['class'=>'form-control', 'placeholder'=>'Enter attraction']) !!}
                        @if ($errors->has('attraction'))
                            <span class="help-block"><strong>{{ $errors->first('attraction') }}</strong></span>
                        @endif
                    </div>
                    <div class="form-group rightElem col-sm-6 {{ $errors->has('address') ? ' has-error' : '' }}">
                        {!! Form::label('address', 'Address', ['class'=>'col-form-label']) !!}
                        {!! Form::text('address', old('address'), ['class'=>'form-control', 'placeholder'=>'Enter address']) !!}
                        @if ($errors->has('address'))
                            <span class="help-block"><strong>{{ $errors->first('address') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="form-group leftElem col-sm-6 {{ $errors->has('city') ? ' has-error' : '' }}">
                        {!! Form::label('city', 'City', ['class'=>'col-form-label']) !!}
                        {!! Form::text('city', old('city'), ['class'=>'form-control', 'placeholder'=>'Enter city']) !!}
                        @if ($errors->has('city'))
                            <span class="help-block"><strong>{{ $errors->first('city') }}</strong></span>
                        @endif
                    </div>
                    <div class="form-group rightElem col-sm-6 {{ $errors->has('country') ? ' has-error' : '' }}">
                        {!! Form::label('country', 'Country', ['class'=>'col-form-label']) !!}
                        {!! Form::select('country', $countries, null, ['class'=>'form-control', 'placeholder'=>'Select country']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group leftElem col-sm-6 {{ $errors->has('title') ? ' has-error' : '' }}">
                        {!! Form::label('title', 'Title', ['class'=>'col-form-label']) !!}
                        {!! Form::text('title', old('title'), ['class'=>'form-control', 'placeholder'=>'Enter Title']) !!}
                        @if ($errors->has('title'))
                            <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
                        @endif
                    </div>
                    <div class="form-group rightElem col-sm-6 {{ $errors->has('category') ? ' has-error' : '' }}">
                        {!! Form::label('category', 'Category', ['class'=>'col-form-label']) !!}
                        {!! Form::select('category', $categories, null, ['class'=>'form-control', 'placeholder'=>'Select category']) !!}
                    </div>
                </div>

                {{--@include('partial.imageUpload')--}}

                {{--<div class="form-group {{ $errors->has('photos[]') ? ' has-error' : '' }}">--}}
                {{--{!! Form::label('photos[]', 'Upload images', ['class'=>'col-form-label']) !!}--}}
                {{--{!! Form::file('photos[]', ['class'=>'form-control', 'multiple']) !!}--}}
                {{--@if ($errors->has('photos[]'))--}}
                {{--<span class="help-block"><strong>{{ $errors->first('photos[]') }}</strong></span>--}}
                {{--@endif--}}
                {{--</div>--}}
                <div class="form-group {{ $errors->has('content') ? ' has-error' : '' }}">
                    {!! Form::label('content', 'Post content', ['class'=>'col-form-label']) !!}
                    {!! Form::textarea('content', old('content'), ['class'=>'form-control', 'placeholder'=>'Enter content']) !!}
                    @if ($errors->has('content'))
                        <span class="help-block"><strong>{{ $errors->first('content') }}</strong></span>
                    @endif
                </div>

                {!! Form::submit('Publish', ['class'=>'btn btn-success pull-right btnPublish']) !!}
                {!! Form::close() !!}

                {{--@include('partial.dropzoneUpload')--}}
                <div class="dropzoneBox">
                    {!! Form::label('images', 'Post images', ['class'=>'col-form-label']) !!}
                    @include('partial.dropzoneCreate')
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    {!! Html::script('packages/dropzone/dropzone.js') !!}
    {!! Html::script('packages/dropzone/dropzone-config.js') !!}

@endsection