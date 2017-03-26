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
        <table class="table table-condensed">
            <thead>
            <tr>
                <td class="tdHead">Topics</td>
                <td>Statistics</td>
                <td>Date Updated</td>
            </tr>
            </thead>
            <tbody>
            @foreach($allPosts as $post)
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
    </div>

    {{--modal--}}
    <div class="modal fade" id="userInfo"
         tabindex="-1" role="dialog"
         aria-labelledby="favoritesModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    {{--<h4 class="modal-title"--}}
                    {{--id="userHeader">Title</h4>--}}
                </div>
                <div class="modal-body clearfix">
                    <div class="col-sm-3">
                        <img class="img-circle img-responsive" id="userImg" src="">
                    </div>
                    <div class="col-sm-5">
                        <p id="userName">username</p>
                        <p id="userRole">role</p>
                        <p id="userYear">year</p>
                        <p id="userCount">count</p>
                    </div>
                    <div class="col-sm-4">
                        <p id="userBday"><i class="fa fa-gift"></i> birthday</p>
                        <p id="userLocation"><i class="fa fa-map-marker"></i> location</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button"
                            class="btn btn-default pull-left"
                            data-dismiss="modal">Close
                    </button>
                    <a href="#"
                       id="userRoute"
                       class="btn btn-primary pull-right">View Posts
                    </a>
                    @if(Auth::id() != $post->user_id)
                        <a href="#"
                           id="userMsg"
                           class="btn btn-success pull-right">Message Author
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection