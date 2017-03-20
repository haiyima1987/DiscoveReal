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

@section('content')

    <div class="col-sm-10 col-sm-offset-1">
        <div class="content">
            <div class="formCreateEdit clearfix">
                {!! Form::open(['method'=>'post', 'action'=>'PostController@publishPost', 'files'=>true]) !!}
                {{ csrf_field() }}

                <fieldset>
                    <legend>New Post</legend>
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
                            {!! Form::label('title', 'Your title', ['class'=>'col-form-label']) !!}
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
                    <div class="form-group {{ $errors->has('photos[]') ? ' has-error' : '' }}">
                        {!! Form::label('photos[]', 'Upload images', ['class'=>'col-form-label']) !!}
                        {!! Form::file('photos[]', ['class'=>'form-control', 'multiple']) !!}
                        @if ($errors->has('photos[]'))
                            <span class="help-block"><strong>{{ $errors->first('photos[]') }}</strong></span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('postContent') ? ' has-error' : '' }}">
                        {!! Form::label('postContent', 'Your post content', ['class'=>'col-form-label']) !!}
                        {!! Form::textarea('postContent', old('postContent'), ['class'=>'form-control', 'placeholder'=>'Enter content']) !!}
                        @if ($errors->has('postContent'))
                            <span class="help-block"><strong>{{ $errors->first('postContent') }}</strong></span>
                        @endif
                    </div>
                </fieldset>

                <div class="form-group col-sm-12">
                    {!! Form::submit('Publish', ['class'=>'btn btn-success pull-right']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection