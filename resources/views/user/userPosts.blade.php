@extends('layout.master')

@section('banner')
    <div class="banner">
        <img src="{{ url('img/banner3.png') }}" alt="banner">
        <div class="bannerText">
            <h2><strong>{{ $user->name }}</strong></h2>
        </div>
    </div>
@endsection

@section('content')

    <div class="content">
        <div class="text-center">{!! $posts->render() !!}</div>

        <table class="table table-condensed">
            <thead>
            <tr>
                <td class="tdHead">Topics</td>
                <td>Statistics</td>
                <td>Date Updated</td>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td class="col-sm-8 tdHead"><a href="{{ route('post.view', $post) }}">
                            {{ ucwords($post->title) }}
                        </a>
                        <p>Published by {{ $post->user->name }} at {{ $post->created_at->format('d-M-Y, H:i A') }}
                        </p>
                    </td>
                    <td class="col-sm-2">
                        <i class="fa fa-comments" aria-hidden="true"></i> {{ count($post->comments) }}
                    </td>
                    <td class="col-sm-2">{{ $post->updated_at->diffForHumans() }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="text-center">{!! $posts->render() !!}</div>
    </div>

@endsection