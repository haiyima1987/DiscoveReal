@extends('layout.admin')

@section('banner')
    <div class="banner">
        <img src="{{ url('img/banner1.png') }}" alt="banner">
        <div class="bannerText">
            <h2><strong>Create News</strong></h2>
        </div>
    </div>
@endsection

@section('content')

    <div class="content">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="formCreateEdit clearfix">

                {!! Form::open(['method'=>'post', 'action'=>['AdminController@publishNews'], 'files'=>true]) !!}
                {{ csrf_field() }}

                {!! Form::hidden('newsId', $news->id) !!}

                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                    {!! Form::label('title', 'Title', ['class'=>'col-form-label']) !!}
                    {!! Form::text('title', old('title'), ['class'=>'form-control', 'placeholder'=>'Enter Title']) !!}
                    @if ($errors->has('title'))
                        <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                    {!! Form::label('content', 'News content', ['class'=>'col-form-label']) !!}
                    {!! Form::textarea('content', old('content'), ['class'=>'form-control', 'placeholder'=>'Enter content']) !!}
                    @if ($errors->has('content'))
                        <span class="help-block"><strong>{{ $errors->first('content') }}</strong></span>
                    @endif
                </div>

                {!! Form::submit('Publish', ['class'=>'btn btn-success pull-right']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection