<div class="media">
    <div class="col-sm-2">
        <img src="{{ $message->user->photo ? url($message->user->photo) : url('img/avatar.png') }}"
             alt="{{ $message->user->name }}"
             class="img-circle img-responsive">
    </div>
    <div class="media-body">
        <div class="col-sm-10 {{ $message->user->id == Auth::id() ? 'col-sm-offset-2' : '' }}">
            <h5 class="media-heading">{{ $message->user->name }}</h5>
            <p>{{ $message->body }}</p>
            <div class="text-muted">
                <small>Sent {{ $message->created_at->diffForHumans() }}</small>
            </div>
        </div>
    </div>
</div>