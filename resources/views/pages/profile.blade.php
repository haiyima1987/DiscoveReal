@extends('master')

@section('content')

    <div class="col-sm-3">
        <img class="img-circle img-responsive" src="{{ $user->photo ? $user->photo : url('img/users/avatar.png') }}"
             alt="{{ $user->id }}">
    </div>
    <div class="col-sm-9">
        {{ $user->lastName }}
    </div>
    <div class="col-sm-12">
        <a href="{{ route('post.create') }}" class="btn btn-primary pull-right">
            New Post
        </a>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <td>ID</td>
            <td>Title</td>
            <td>Date Published</td>
            <td>Date Updated</td>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ ucwords($post->title) }}</td>
                <td>{{ $post->created_at->diffForHumans() }}</td>
                <td>{{ $post->updated_at->diffForHumans() }}</td>
                <td>
                    <a href="{{ route('post.view', ['id' => $post->id]) }}" class="btn btn-success pull-right">
                        <i class="fa fa-list-ul" aria-hidden="true"></i>View
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection