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
            <h2><strong>Edit Your Post</strong></h2>
        </div>
    </div>
@endsection

@section('content')

    <div class="col-sm-10 col-sm-offset-1">
        <div class="content">
            <div class="formCreateEdit clearfix">

                {!! Form::open(['method'=>'put', 'action'=>['PostController@updatePost', $post], 'files'=>true]) !!}
                {{ csrf_field() }}

                <div class="row">
                    <div class="form-group leftElem col-sm-6 {{ $errors->has('attraction') ? 'has-error' : '' }}">
                        {!! Form::label('attraction', 'Attraction', ['class'=>'col-form-label']) !!}
                        {!! Form::text('attraction', $location->name, ['class'=>'form-control', 'placeholder'=>'Enter attraction']) !!}
                        @if ($errors->has('attraction'))
                            <span class="help-block"><strong>{{ $errors->first('attraction') }}</strong></span>
                        @endif
                    </div>
                    <div class="form-group rightElem col-sm-6 {{ $errors->has('address') ? 'has-error' : '' }}">
                        {!! Form::label('address', 'Address', ['class'=>'col-form-label']) !!}
                        {!! Form::text('address', $location->address, ['class'=>'form-control', 'placeholder'=>'Enter address']) !!}
                        @if ($errors->has('address'))
                            <span class="help-block"><strong>{{ $errors->first('address') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="form-group leftElem col-sm-6 {{ $errors->has('city') ? 'has-error' : '' }}">
                        {!! Form::label('city', 'City', ['class'=>'col-form-label']) !!}
                        {!! Form::text('city', $location->city, ['class'=>'form-control', 'placeholder'=>'Enter city']) !!}
                        @if ($errors->has('city'))
                            <span class="help-block"><strong>{{ $errors->first('city') }}</strong></span>
                        @endif
                    </div>
                    <div class="form-group rightElem col-sm-6 {{ $errors->has('country') ? 'has-error' : '' }}">
                        {!! Form::label('country', 'Country', ['class'=>'col-form-label']) !!}
                        {!! Form::select('country', $countries, $country->id, ['class'=>'form-control', 'placeholder'=>'Select country']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group leftElem col-sm-6 {{ $errors->has('title') ? 'has-error' : '' }}">
                        {!! Form::label('title', 'Title', ['class'=>'col-form-label']) !!}
                        {!! Form::text('title', $post->title, ['class'=>'form-control', 'placeholder'=>'Enter Title']) !!}
                        @if ($errors->has('title'))
                            <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
                        @endif
                    </div>
                    <div class="form-group rightElem col-sm-6 {{ $errors->has('category') ? 'has-error' : '' }}">
                        {!! Form::label('category', 'Category', ['class'=>'col-form-label']) !!}
                        {!! Form::select('category', $categories, $category->id, ['class'=>'form-control', 'placeholder'=>'Select category']) !!}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('postContent') ? 'has-error' : '' }}">
                    {!! Form::label('postContent', 'Post content', ['class'=>'col-form-label']) !!}
                    {!! Form::textarea('postContent', $post->content, ['class'=>'form-control', 'placeholder'=>'Enter content']) !!}
                    @if ($errors->has('postContent'))
                        <span class="help-block"><strong>{{ $errors->first('postContent') }}</strong></span>
                    @endif
                </div>

                {!! Form::submit('Update', ['class'=>'btn btn-success pull-right btnPublish']) !!}
                {!! Form::close() !!}

                <div class="dropzoneBox">
                    {!! Form::label('images', 'Post images', ['class'=>'col-form-label']) !!}
                    @include('partial.dropzoneEdit')
                </div>

                <div class="alert alert-danger clearfix">
                    <a href="#"
                       data-toggle="modal"
                       data-target="#postDelete"
                       class="btn btn-danger pull-left">Delete</a>
                    <span id="spanDeleteMsg">Click the button on the left to delete the post <strong>(delete with caution)</strong></span>
                </div>
            </div>
        </div>
    </div>

    @include('post.partials.postModal')

@endsection

@section('scripts')

    {!! Html::script('packages/dropzone/dropzone.js') !!}
    {!! Html::script('packages/dropzone/dropzone-editConfig.js') !!}

@endsection