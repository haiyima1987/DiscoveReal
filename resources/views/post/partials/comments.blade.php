<div class="postBox row">
    <div class="postSide col-sm-3">
        <img class="img-circle img-responsive"
             src="{{ $comment->user->photo ? url($comment->user->photo) : url('img/avatar.png') }}"
             alt="{{ $comment->user->id }}">
        <hr>
        <h4><a href="#"
               data-toggle="modal"
               data-target="#userInfo"
               data-img="{{ $comment->user->photo ? url($comment->user->photo) : url('img/avatar.png') }}"
               data-username="{{ $comment->user->name }}"
               data-role="{{ $comment->user->role->role }}"
               data-bday="{{ $comment->user->birthday }}"
               data-location="{{ $comment->user->city. ', '.$comment->user->country }}"
               data-year="{{ $comment->user->created_at->format('d-M-Y') }}"
               data-count="{{ count($comment->user->posts) }}"
               data-route="{{ route('user.allPosts', $comment->user) }}"
               data-msg="{{ route('messages.create', $comment->user) }}">
                {{ $comment->user->name }}
            </a></h4>
        <p>{{ ucwords($comment->user->role->role) }}</p>
        <p>{{ $comment->user->city . ', '. $comment->user->country }}</p>
        <p>Date Joined: {{ $comment->user->created_at->diffForHumans() }}</p>
        <p>Posts: {{ count($comment->user->posts) }}</p>
    </div>
    <div class="postContent col-sm-9">
        <h4><strong>{{ $comment->title ? ucwords($comment->title) : '' }}</strong></h4>
        <p>
            <small>{{ $comment->created_at->format('d-M-Y, H:i A') }}</small>
        </p>
        <hr>
        <p>{!! $comment->content !!}</p>
        <div class="commentBtmBar">
            @can('update', $comment)
                <a href="{{ route('comment.edit', $comment) }}" class="btn btn-success pull-right btnEdit">
                    <i class="fa fa-pencil" aria-hidden="true"></i> Edit
                </a>
            @endcan
        </div>
    </div>
</div>