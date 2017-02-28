@extends('master')

@section('content')

    {!! Form::open(['method'=>'post', 'files'=>'true', 'action'=>'PostController@publishPost']) !!}

    {{ csrf_field() }}

    <fieldset>
        <legend>New Post</legend>
        <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
            {!! Form::label('title', 'Your title', ['class'=>'col-form-label']) !!}
            {!! Form::text('title', old('title'), ['class'=>'form-control', 'placeholder'=>'Enter Title']) !!}
            @if ($errors->has('title'))
                <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('attraction') ? ' has-error' : '' }}">
            {!! Form::label('attraction', 'Attraction', ['class'=>'col-form-label']) !!}
            {!! Form::text('attraction', old('attraction'), ['class'=>'form-control', 'placeholder'=>'Enter attraction']) !!}
            @if ($errors->has('attraction'))
                <span class="help-block"><strong>{{ $errors->first('attraction') }}</strong></span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
            {!! Form::label('address', 'Address', ['class'=>'col-form-label']) !!}
            {!! Form::text('address', old('address'), ['class'=>'form-control', 'placeholder'=>'Enter address']) !!}
            @if ($errors->has('address'))
                <span class="help-block"><strong>{{ $errors->first('address') }}</strong></span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('city') ? ' has-error' : '' }}">
            {!! Form::label('city', 'City', ['class'=>'col-form-label']) !!}
            {!! Form::text('city', old('city'), ['class'=>'form-control', 'placeholder'=>'Enter city']) !!}
            @if ($errors->has('city'))
                <span class="help-block"><strong>{{ $errors->first('city') }}</strong></span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('country') ? ' has-error' : '' }}">
            {!! Form::label('country', 'Country', ['class'=>'col-form-label']) !!}
            {!! Form::select('country', $countries, null, ['class'=>'form-control', 'placeholder'=>'Select country']) !!}
        </div>
        <div class="form-group {{ $errors->has('category') ? ' has-error' : '' }}">
            {!! Form::label('category', 'Category', ['class'=>'col-form-label']) !!}
            {!! Form::select('category', $categories, null, ['class'=>'form-control', 'placeholder'=>'Select category']) !!}
        </div>
        <div class="form-group {{ $errors->has('path') ? ' has-error' : '' }}">
            {!! Form::label('path', 'Upload image', ['class'=>'col-form-label']) !!}
            {!! Form::file('path', ['class'=>'form-control', 'placeholder'=>'Enter path']) !!}
            @if ($errors->has('path'))
                <span class="help-block"><strong>{{ $errors->first('path') }}</strong></span>
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

    {!! Form::submit('Publish', ['class'=>'btn btn-success pull-right']) !!}

    {!! Form::close() !!}

@endsection