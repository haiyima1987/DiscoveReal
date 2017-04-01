<div class="commentBox row">
    <div class="commentSide col-sm-3">
        <img class="img-circle img-responsive"
             src="{{ $user->photo ? url($user->photo) : url('img/avatar.png') }}"
             alt="{{ $user->id }}">
        <hr>
        <h4><strong>{{ $user->username }}</strong></h4>
        <p>{{ ucwords($user->role->role) }}</p>
        <p>{{ $user->city . ', '. $user->country }}</p>
        <p>Date Joined: {{ $user->created_at->diffForHumans() }}</p>
        <p>Posts: {{ count($user->posts) }}</p>
    </div>
    <div class="commentContent col-sm-9">
        {!! Form::open(['method'=>'post', 'action'=>['CommentController@publishComment', $post], 'files'=>true]) !!}
        {{ csrf_field() }}

        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
            {!! Form::label('title', 'Comment Title', ['class'=>'col-form-label']) !!}
            {!! Form::text('title', old('title'), ['class'=>'form-control', 'placeholder'=>'Enter Title']) !!}
            @if ($errors->has('title'))
                <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
            {!! Form::label('content', 'Comment Content', ['class'=>'col-form-label']) !!}
            {!! Form::textarea('content', old('content'), ['class'=>'form-control', 'placeholder'=>'Enter content']) !!}
            @if ($errors->has('content'))
                <span class="help-block"><strong>{{ $errors->first('content') }}</strong></span>
            @endif
        </div>

        {!! Form::submit('Comment', ['class'=>'btn btn-success pull-right']) !!}
        {!! Form::close() !!}
    </div>
</div>