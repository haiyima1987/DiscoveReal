@extends('layout.master')

@section('banner')
    <div class="banner">
        <img src="{{ url('img/banner0.png') }}" alt="banner">
        <div class="bannerText">
            <h2><strong>Contact the Author</strong></h2>
        </div>
    </div>
@endsection

@section('content')
    <div class="content">
        <div class="col-sm-6 col-sm-offset-3">
            <h4><strong>Message To:</strong> {{ $user->name }}</h4>
            <br>
            {!! Form::open(['method' => 'post', 'action' => 'MessagesController@store']) !!}
            {{ csrf_field() }}
            {!! Form::hidden('recipientId', $user->id) !!}
            {{--{!! Form::hidden('recipient', $author) !!}--}}

            <div class="form-group">
                {!! Form::label('subject', 'Subject', ['class'=>'col-form-label']) !!}
                {!! Form::text('subject', old('subject'), ['class'=>'form-control', 'placeholder'=>'Enter subject']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('message', 'Message', ['class'=>'col-form-label']) !!}
                {!! Form::textarea('message', old('message'), ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Send', ['class' => 'btn btn-primary pull-right']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@stop
