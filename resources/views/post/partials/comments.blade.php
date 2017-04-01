<div class="postBox row">
    <div class="postSide col-sm-3">
        <img class="img-circle img-responsive"
             src="{{ ($author = $comment->user)->photo ? url($author->photo) : url('img/avatar.png') }}"
             alt="{{ $author->id }}">
        <hr>
        <h4><a href="#"
               data-toggle="modal"
               data-target="#userInfo"
               data-img="{{ $author->photo ? url($author->photo) : url('img/avatar.png') }}"
               data-username="{{ $author->username }}"
               data-role="{{ $author->role->role }}"
               data-bday="{{ $author->birthday }}"
               data-location="{{ $author->city. ', '.$author->country }}"
               data-year="{{ $author->created_at->format('d-M-Y') }}"
               data-count="{{ count($author->posts) }}"
               data-route="{{ route('user.allPosts', $author) }}">
                {{ $author->username }}
            </a></h4>
        <p>{{ ucwords($author->role->role) }}</p>
        <p>{{ $author->city . ', '. $author->country }}</p>
        <p>Date Joined: {{ $author->created_at->diffForHumans() }}</p>
        <p>Posts: {{ count($author->posts) }}</p>
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