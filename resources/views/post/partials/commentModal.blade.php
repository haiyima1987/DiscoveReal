{{--modal--}}
<div class="modal fade" id="commentDelete"
     tabindex="-1" role="dialog"
     aria-labelledby="favoritesModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"
                    id="userHeader">Comment Title: {{ ucwords($comment->title) }}</h4>
            </div>
            {!! Form::open(['method'=>'delete', 'action'=>['CommentController@removeComment', $comment]]) !!}
            {{ csrf_field() }}
            <div class="modal-body alert-warning clearfix">
                <h4 class="text-center"><strong>Are you sure you want to delete this comment?</strong></h4>
            </div>
            <div class="modal-footer">
                <button type="button"
                        class="btn btn-default pull-left"
                        data-dismiss="modal">Close
                </button>
                {!! Form::submit('Delete', ['class'=>'btn btn-danger pull-right']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>