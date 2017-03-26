<div class="media">
    <div class="col-sm-2">
        <img src="{{ ($user = $message->user)->photo ? url($user->photo) : url('img/avatar.png') }}"
             alt="{{ $user->name }}"
             class="img-circle img-responsive">
    </div>
    <div class="media-body">
        <div class="col-sm-10 {{ $user->id == Auth::id() ? 'col-sm-offset-2' : '' }}">
            <h5 class="media-heading">{{ $user->username }}</h5>
            <p>{{ $message->body }}</p>
            <div class="text-muted">
                <small>Sent {{ $message->created_at->diffForHumans() }}</small>
            </div>
        </div>
    </div>
</div>