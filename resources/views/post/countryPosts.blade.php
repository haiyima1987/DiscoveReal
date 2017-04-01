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
                            {{--<i class="fa fa-list-ul" aria-hidden="true"></i> View--}}
                        </a>
                        <p>Published by
                            <a href="#"
                               data-toggle="modal"
                               data-target="#userInfo"
                               data-img="{{ ($user = $post->user)->photo ? url($user->photo) : url('img/avatar.png') }}"
                               data-identity="{{ $user->id }}"
                               data-username="{{ $user->username }}"
                               data-role="{{ $user->role->role }}"
                               data-bday="{{ $user->birthday }}"
                               data-location="{{ $user->city. ', '.$user->country }}"
                               data-year="{{ $user->created_at->format('d-M-Y') }}"
                               data-count="{{ count($user->posts) }}"
                               data-route="{{ route('user.allPosts', $user) }}"
                               data-msg="{{ route('messages.create', $user) }}">
                                {{ $post->user->username }}
                            </a>
                            {{--                            <a href="{{ route('user.profile', $user = $post->user) }}">{{ $user->username }}</a>--}}
                            at {{ $post->created_at->format('d-M-Y, H:i A') }}
                        </p>
                    </td>
                    <td class="col-sm-2">
                        <i class="fa fa-comments" aria-hidden="true"></i> {{ count($post->comments) }}
                    </td>
                    <td class="col-sm-2">{{ $post->updated_at->diffForHumans() }}</td>
                    {{--<td class="col-sm-3">{{ $post->updated_at->diffForHumans() }}</td>--}}
                    {{--<td>--}}
                    {{--<a href="{{ route('post.view', $post) }}" class="btn btn-success pull-right">--}}
                    {{--<i class="fa fa-list-ul" aria-hidden="true"></i> View--}}
                    {{--</a>--}}
                    {{--</td>--}}
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="text-center">{{ $posts->render() }}</div>

    </div>

    @include('post.partials.userInfoModal')

@endsection