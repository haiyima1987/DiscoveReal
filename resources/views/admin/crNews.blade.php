@extends('layout.admin')

@section('content')
<form method="post" action="">
    <input placeholder="title" style="padding-left: 5px; width: 300px;">
    <br>
    {!! Form::textarea('newsContent', old('newsContent'), ['class'=>'form-control', 'placeholder'=>'Enter content']) !!}

    @include('partial.imageUpload')
    <br>
    <button class="btn btn-success pull-right btnPublish" style="right: 1040px !important;">publish</button>
</form>
@endsection