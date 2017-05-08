@extends('layout.admin')

@section('content')

    <div class="content">
        <div class="text-center">{{ $users->render() }}</div>

        <div class="col-sm-10 col-sm-offset-1">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <td class="tdHead"></td>
                    <td><strong>Username</strong></td>
                    <td><strong>Date Registered</strong></td>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td class="col-sm-1 tdHead">
                            <img class="img-circle img-responsive"
                                 src="{{ $user->photo ? url($user->photo) : url('img/avatar.png') }}"
                                 alt="{{ $user->id }}">
                        </td>
                        <td class="">
                            <a href="#"
                               data-toggle="modal"
                               data-target="#userInfo"
                               data-img="{{ $user->photo ? url($user->photo) : url('img/avatar.png') }}"
                               data-identity="{{ $user->id }}"
                               data-username="{{ $user->name }}"
                               data-role="{{ $user->role->role }}"
                               data-bday="{{ $user->birthday }}"
                               data-location="{{ $user->city. ', '.$user->country }}"
                               data-year="{{ $user->created_at->format('d-M-Y') }}"
                               data-count="{{ count($user->posts) }}"
                               data-route="{{ route('user.allPosts', $user) }}"
                               data-msg="{{ route('messages.create', $user) }}">
                                {{ $user->name }}
                            </a>
                            <p id="authenticatedId" hidden>{{ Auth::id() }}</p>
                        </td>
                        <td class="">{{ $user->created_at->format('d-M-Y, H:i A') }}</td>
                        <td><a href="#"
                               data-toggle="modal"
                               data-target="#adminUserDelete"
                               data-username="{{ $user->name }}"
                               data-identity="{{ $user->id }}"
                               class="btn btn-danger pull-right">
                                <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="text-center">{{ $users->render() }}</div>
    </div>

    @include('admin.partials.userModal')
    @include('admin.partials.deleteModal')

@endsection