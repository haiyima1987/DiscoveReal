@extends('layout.admin')

@section('content')

    <div class="content">
        <div class="headBarNews col-sm-10 col-sm-offset-1">
            {!! Form::open(['method'=>'delete', 'action'=>'AdminController@clearUnpublished']) !!}
            {{ csrf_field() }}
            {!! Form::submit('Clear Unpublished', ['class'=>'btn btn-warning pull-left']) !!}
            {!! Form::close() !!}
        </div>

        <div class="text-center">{{ $posts->render() }}</div>

        <div class="col-sm-10 col-sm-offset-1">
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
                        <td class="col-sm-8 tdHead"><a href="{{ route('admin.viewPost', $post) }}">
                                {{ ucwords($post->title) }}
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
                                at {{ $post->created_at->format('d-M-Y, H:i A') }}
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
        </div>

        <div class="text-center">{{ $posts->render() }}</div>
    </div>

    @include('admin.partials.userModal')

@endsection