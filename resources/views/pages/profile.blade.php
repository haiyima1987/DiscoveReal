@extends('master')

@section('content')

    <div class="col-sm-3">
        <img class="img-circle img-responsive" src="{{ $user->photo ? $user->photo : url('img/users/avatar.png') }}" alt="{{ $user->id }}">
    </div>
    <div class="col-sm-9">
        {{ $user->lastName }}
    </div>
    <div class="col-sm-12">
        <a href="{{ route('post.create') }}" class="btn btn-primary pull-right">
            New Post
        </a>
    </div>

@endsection