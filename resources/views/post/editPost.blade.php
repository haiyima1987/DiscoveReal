@extends('layout.master')

@section('stylesheet')

    <script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'image imagetools',
            menubar: false
        });
    </script>

@endsection

@section('content')

    <div class="col-sm-10 col-sm-offset-1">
        <div class="content">
            <div class="formCreateEdit clearfix">
                <div class="alert alert-danger clearfix">
                    {{--{!! Form::open(['method'=>'delete', 'action'=>['PostController@removePost', $post], 'files'=>true]) !!}--}}
                    {{--{{ csrf_field() }}--}}
                    {{--{!! Form::submit('Delete', ['class'=>'btn btn-danger pull-right']) !!}--}}
                    <a href="#"
                       data-toggle="modal"
                       data-target="postDelete">Delete</a>
                    <span>Click the button on the right to delete the post</span>
                    {{--{!! Form::close() !!}--}}
                </div>

                {!! Form::open(['method'=>'put', 'action'=>['PostController@updatePost', $post], 'files'=>true]) !!}
                {{ csrf_field() }}

                <fieldset>
                    <legend>Edit Post</legend>
                    <div class="row">
                        <div class="form-group leftElem col-sm-6 {{ $errors->has('attraction') ? 'has-error' : '' }}">
                            {!! Form::label('attraction', 'Attraction', ['class'=>'col-form-label']) !!}
                            {!! Form::text('attraction', $location->name, ['class'=>'form-control', 'placeholder'=>'Enter attraction']) !!}
                            @if ($errors->has('attraction'))
                                <span class="help-block"><strong>{{ $errors->first('attraction') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group rightElem col-sm-6 {{ $errors->has('address') ? 'has-error' : '' }}">
                            {!! Form::label('address', 'Address', ['class'=>'col-form-label']) !!}
                            {!! Form::text('address', $location->address, ['class'=>'form-control', 'placeholder'=>'Enter address']) !!}
                            @if ($errors->has('address'))
                                <span class="help-block"><strong>{{ $errors->first('address') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group leftElem col-sm-6 {{ $errors->has('city') ? 'has-error' : '' }}">
                            {!! Form::label('city', 'City', ['class'=>'col-form-label']) !!}
                            {!! Form::text('city', $location->city, ['class'=>'form-control', 'placeholder'=>'Enter city']) !!}
                            @if ($errors->has('city'))
                                <span class="help-block"><strong>{{ $errors->first('city') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group rightElem col-sm-6 {{ $errors->has('country') ? 'has-error' : '' }}">
                            {!! Form::label('country', 'Country', ['class'=>'col-form-label']) !!}
                            {!! Form::select('country', $countries, $country->id, ['class'=>'form-control', 'placeholder'=>'Select country']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group leftElem col-sm-6 {{ $errors->has('title') ? 'has-error' : '' }}">
                            {!! Form::label('title', 'Your title', ['class'=>'col-form-label']) !!}
                            {!! Form::text('title', $post->title, ['class'=>'form-control', 'placeholder'=>'Enter Title']) !!}
                            @if ($errors->has('title'))
                                <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group rightElem col-sm-6 {{ $errors->has('category') ? 'has-error' : '' }}">
                            {!! Form::label('category', 'Category', ['class'=>'col-form-label']) !!}
                            {!! Form::select('category', $categories, $category->id, ['class'=>'form-control', 'placeholder'=>'Select category']) !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
                        {!! Form::label('photo', 'Upload image', ['class'=>'col-form-label']) !!}
                        {!! Form::file('photo', ['class'=>'form-control']) !!}
                        @if ($errors->has('photo'))
                            <span class="help-block"><strong>{{ $errors->first('photo') }}</strong></span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('postContent') ? 'has-error' : '' }}">
                        {!! Form::label('postContent', 'Your post content', ['class'=>'col-form-label']) !!}
                        {!! Form::textarea('postContent', $post->content, ['class'=>'form-control', 'placeholder'=>'Enter content']) !!}
                        @if ($errors->has('postContent'))
                            <span class="help-block"><strong>{{ $errors->first('postContent') }}</strong></span>
                        @endif
                    </div>
                </fieldset>

                {!! Form::submit('Update', ['class'=>'btn btn-success pull-right']) !!}

                {!! Form::close() !!}
            </div>
        </div>
    </div>

    {{--modal--}}
    <div class="modal fade" id="postDelete"
         tabindex="-1" role="dialog"
         aria-labelledby="favoritesModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    {{--<h4 class="modal-title"--}}
                    {{--id="userHeader">Title</h4>--}}
                </div>
                <div class="modal-body clearfix">
                    {!! Form::open(['method'=>'delete', 'action'=>['PostController@removePost', $post], 'files'=>true]) !!}
                    {{ csrf_field() }}
                </div>
                <div class="modal-footer">
                    <button type="button"
                            class="btn btn-default pull-left"
                            data-dismiss="modal">Close
                    </button>
                    {!! Form::submit('Delete', ['class'=>'btn btn-danger pull-right']) !!}
                    {!! Form::close() !!}
                    {{--<a href="#"--}}
                    {{--id="userRoute"--}}
                    {{--class="btn btn-primary pull-right">View Posts--}}
                    {{--</a>--}}
                </div>
            </div>
        </div>
    </div>

@endsection