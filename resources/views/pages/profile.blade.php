@extends('master')

@section('content')

    <div class="col-sm-12">
        <a class="btn btn-primary pull-left" href="{{ route('post.create') }}">New Post</a>
        <a class="btn btn-warning pull-right" href="{{ route('user.logOutUser') }}">Log Out</a>
    </div>
    <div class="col-sm-3">
        <img class="img-circle img-responsive" src="{{ $user->photo ? $user->photo : url('img/users/avatar.png') }}"
             alt="{{ $user->id }}">
        <p>{{ $user->firstName . ' ' . $user->lastName }}</p>
        <p>{{ $user->email }}</p>
        {!! Form::open(['method'=>'post', 'action'=>['UserController@updateProfileImage'], 'files'=>true]) !!}
        {{ csrf_field() }}

        {!! Form::file('photo', ['class'=>'form-control']) !!}
        @if ($errors->has('photo'))
            <span class="help-block"><strong>{{ $errors->first('photo') }}</strong></span>
        @endif

        {!! Form::submit('Update', ['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>

    <div class="col-sm-9">
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
    </div>

@endsection