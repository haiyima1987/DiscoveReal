@extends('layout.master')

@section('banner')
    <div class="banner">
        <img src="{{ url('img/banner0.png') }}" alt="banner">
        <div class="bannerText">
            <h2><strong>This is your world</strong></h2>
        </div>
    </div>
@endsection

@section('content')

    <div class="content">
        <div class="headBar col-sm-12">
            <a class="btn btn-warning" href="{{ route('user.logOutUser') }}">Log Out</a>
            <a class="btn btn-primary pull-right" href="{{ route('post.create') }}">New Post</a>
        </div>
        <div class="profileBox row">
            <div class="profileSide col-sm-3">
                <div id="profileImg">
                    <img class="img-circle img-responsive"
                         src="{{ $user->photo ? url($user->photo) : url('img/avatar.png') }}"
                         alt="{{ $user->id }}">
                </div>
                <hr>
                <h5>{{ $user->username }}</h5>
                <h5>{{ ucwords($user->role->role) }}</h5>
                <p><i class="fa fa-id-card-o" aria-hidden="true"></i> {{ $user->firstName . ' ' . $user->lastName }}
                    <i class="fa {{ $user->gender == 'M' ? 'fa-male' : 'fa-female' }} fa-lg" aria-hidden="true"></i>
                </p>
                <p><i class="fa fa-envelope-o"></i> {{ $user->email }}</p>
                <p><i class="fa fa-gift"></i> {{ $user->birthday }}</p>
                <p><i class="fa fa-map-marker"></i> {{ $user->city. ', '.$user->country }}</p>

                <a class="btn btn-success btnProfileEdit" href="{{ route('user.editProfile') }}">Edit Profile</a>
                @if($user->isAdmin())
                    <a href="{{ route('admin.news') }}" class="btn btn-default btnProfileEdit">Go To Admin Page</a>
                @endif
            </div>

            <div class="profileContent col-sm-9">
                <div class="content">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#post">Posts</a></li>
                        <li><a data-toggle="tab" href="#msg">Messages</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="post" class="tab-pane fade in active">
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
                                            <p>Published at {{ $post->created_at->format('d-M-Y, H:i A') }}
                                            </p>
                                        </td>
                                        <td class="col-sm-2">
                                            <i class="fa fa-comments"
                                               aria-hidden="true"></i> {{ count($post->comments) }}
                                        </td>
                                        <td class="col-sm-2">{{ $post->updated_at->diffForHumans() }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="text-center">{{ $posts->render() }}</div>
                        </div>
                        <div id="msg" class="tab-pane fade">
                            <table class="table table-condensed">
                                <thead>
                                <tr>
                                    <td class="tdHead">Conversations</td>
                                    <td>Unread</td>
                                    <td>Creator</td>
                                </tr>
                                </thead>
                                <tbody>
                                @include('messenger.index')
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection