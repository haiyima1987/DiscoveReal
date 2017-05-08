@extends('layout.master')

@section('banner')
    <div class="banner">
        <img src="{{ url('img/banner1.png') }}" alt="banner">
        <div class="bannerText">
            <h2><strong>{{ $country->name }}</strong></h2>
        </div>
    </div>
@endsection

@section('content')

    <div class="tableContainer">

        @if(count($posts) > 0)
            <div class="text-center">{{ $posts->render() }}</div>

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
                            <p>Published by
                                <a href="#"
                                   data-toggle="modal"
                                   data-target="#userInfo"
                                   data-img="{{ $post->user->photo ? url($post->user->photo) : url('img/avatar.png') }}"
                                   data-identity="{{ $post->user->id }}"
                                   data-username="{{ $post->user->name }}"
                                   data-role="{{ $post->user->role->role }}"
                                   data-bday="{{ $post->user->birthday }}"
                                   data-location="{{ $post->user->city. ', '.$post->user->country }}"
                                   data-year="{{ $post->user->created_at->format('d-M-Y') }}"
                                   data-count="{{ count($post->user->posts) }}"
                                   data-route="{{ route('user.allPosts', $post->user) }}"
                                   data-msg="{{ route('messages.create', $post->user) }}">
                                    {{ $post->user->name }}
                                </a>
                                at {{ $post->created_at->format('d-M-Y, H:i A') }}
                            </p>
                            <p id="authenticatedId" hidden>{{ Auth::id() }}</p>
                        </td>
                        <td class="col-sm-2">
                            <i class="fa fa-comments" aria-hidden="true"></i> {{ count($post->comments) }}
                        </td>
                        <td class="col-sm-2">{{ $post->updated_at->diffForHumans() }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="text-center">{{ $posts->render() }}</div>
        @else
            <p class="alert alert-info text-center">No post has been published in {{ $country->name }}</p>
        @endif

    </div>

    @include('post.partials.userInfoModal')

@endsection