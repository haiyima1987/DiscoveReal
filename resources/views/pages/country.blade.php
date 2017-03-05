@extends('master')

@section('content')

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
        @foreach($allPosts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ ucwords($post->title) }}</td>
                <td>{{ $post->created_at->diffForHumans() }}</td>
                <td>{{ $post->updated_at->diffForHumans() }}</td>
                <td>
                    <a href="{{ route('post.view', ['id' => $post->id]) }}" class="btn btn-success pull-right">
                        <i class="fa fa-list-ul" aria-hidden="true"></i>View Post
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection