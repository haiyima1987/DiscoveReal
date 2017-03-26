@extends('layout.master')

@section('banner')
    <div class="banner">
        <img src="{{ url('img/banner0.png') }}" alt="banner">
        <div class="bannerText">
            <h2><strong>Enjoy Chatting</strong></h2>
        </div>
    </div>
@endsection

@section('content')
    <div class="content">
        <div class="col-sm-8 col-sm-offset-2">
            <h4>{{ $thread->subject }}</h4>
            @each('messenger.partials.messages', $thread->messages, 'message')

            @include('messenger.partials.form-message')
        </div>
    </div>
@stop
