{{--<h4>New Message</h4>--}}

{!! Form::open(['method' => 'put', 'action' => ['MessagesController@update', $thread->id]]) !!}
{{ csrf_field() }}
{{--{!! Form::hidden('recipientId', $author->id) !!}--}}
{{--{!! Form::hidden('recipient', $author) !!}--}}

<div class="form-group">
    {!! Form::label('message', 'Message', ['class'=>'col-form-label']) !!}
    {!! Form::textarea('message', old('message'), ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Send', ['class' => 'btn btn-primary pull-right']) !!}
</div>

{!! Form::close() !!}