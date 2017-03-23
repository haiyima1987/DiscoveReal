@extends('layout.master')

@section('head')

    {{--<!-- Generic page styles -->--}}
    {{--{!! Html::style('plugin/css/style.css') !!}--}}
    {{--<link rel="stylesheet" href="css/style.css">--}}
    {{--<!-- blueimp Gallery styles -->--}}
    {{--<link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">--}}
    {{--<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->--}}
    {{--{!! Html::style('plugin/css/jquery.fileupload.css') !!}--}}
    {{--<link rel="stylesheet" href="css/jquery.fileupload.css">--}}
    {{--{!! Html::style('plugin/css/jquery.fileupload-ui.css') !!}--}}
    {{--<link rel="stylesheet" href="css/jquery.fileupload-ui.css">--}}
    {{--<!-- CSS adjustments for browsers with JavaScript disabled -->--}}
    {{--<noscript><link rel="stylesheet" href="css/jquery.fileupload-noscript.css"></noscript>--}}
    {{--<noscript><link rel="stylesheet" href="css/jquery.fileupload-ui-noscript.css"></noscript>--}}

    {!! Html::style('packages/dropzone/basic.css') !!}
    {!! Html::style('packages/dropzone/dropzone.css') !!}

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
                {!! Form::open(['method'=>'post', 'action'=>'PostController@publishPost', 'files'=>true]) !!}
                {{--,'id' => 'drDropzone', 'class' => 'dropzone']) !!}--}}
                {{ csrf_field() }}
                {!! Form::hidden('postId', $post->id) !!}

                <fieldset>
                    <legend>New Post</legend>

                    <div class="row">
                        <div class="form-group leftElem col-sm-6 {{ $errors->has('attraction') ? ' has-error' : '' }}">
                            {!! Form::label('attraction', 'Attraction', ['class'=>'col-form-label']) !!}
                            {!! Form::text('attraction', old('attraction'), ['class'=>'form-control', 'placeholder'=>'Enter attraction']) !!}
                            @if ($errors->has('attraction'))
                                <span class="help-block"><strong>{{ $errors->first('attraction') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group rightElem col-sm-6 {{ $errors->has('address') ? ' has-error' : '' }}">
                            {!! Form::label('address', 'Address', ['class'=>'col-form-label']) !!}
                            {!! Form::text('address', old('address'), ['class'=>'form-control', 'placeholder'=>'Enter address']) !!}
                            @if ($errors->has('address'))
                                <span class="help-block"><strong>{{ $errors->first('address') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group leftElem col-sm-6 {{ $errors->has('city') ? ' has-error' : '' }}">
                            {!! Form::label('city', 'City', ['class'=>'col-form-label']) !!}
                            {!! Form::text('city', old('city'), ['class'=>'form-control', 'placeholder'=>'Enter city']) !!}
                            @if ($errors->has('city'))
                                <span class="help-block"><strong>{{ $errors->first('city') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group rightElem col-sm-6 {{ $errors->has('country') ? ' has-error' : '' }}">
                            {!! Form::label('country', 'Country', ['class'=>'col-form-label']) !!}
                            {!! Form::select('country', $countries, null, ['class'=>'form-control', 'placeholder'=>'Select country']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group leftElem col-sm-6 {{ $errors->has('title') ? ' has-error' : '' }}">
                            {!! Form::label('title', 'Your title', ['class'=>'col-form-label']) !!}
                            {!! Form::text('title', old('title'), ['class'=>'form-control', 'placeholder'=>'Enter Title']) !!}
                            @if ($errors->has('title'))
                                <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group rightElem col-sm-6 {{ $errors->has('category') ? ' has-error' : '' }}">
                            {!! Form::label('category', 'Category', ['class'=>'col-form-label']) !!}
                            {!! Form::select('category', $categories, null, ['class'=>'form-control', 'placeholder'=>'Select category']) !!}
                        </div>
                    </div>

                    {{--@include('partial.imageUpload')--}}

                    {{--<div class="form-group {{ $errors->has('photos[]') ? ' has-error' : '' }}">--}}
                    {{--{!! Form::label('photos[]', 'Upload images', ['class'=>'col-form-label']) !!}--}}
                    {{--{!! Form::file('photos[]', ['class'=>'form-control', 'multiple']) !!}--}}
                    {{--@if ($errors->has('photos[]'))--}}
                    {{--<span class="help-block"><strong>{{ $errors->first('photos[]') }}</strong></span>--}}
                    {{--@endif--}}
                    {{--</div>--}}
                    <div class="form-group {{ $errors->has('postContent') ? ' has-error' : '' }}">
                        {!! Form::label('postContent', 'Your post content', ['class'=>'col-form-label']) !!}
                        {!! Form::textarea('postContent', old('postContent'), ['class'=>'form-control', 'placeholder'=>'Enter content']) !!}
                        @if ($errors->has('postContent'))
                            <span class="help-block"><strong>{{ $errors->first('postContent') }}</strong></span>
                        @endif
                    </div>
                </fieldset>

                <div class="form-group col-sm-12">
                    {!! Form::submit('Publish', ['class'=>'btn btn-success pull-right btnPublish']) !!}
                </div>

                {!! Form::close() !!}

                {{--@include('partial.dropzoneUpload')--}}

            </div>
            @include('partial.dropzoneCreate')
        </div>
    </div>

@endsection

@section('scripts')

    {!! Html::script('packages/dropzone/dropzone.js') !!}
    {!! Html::script('packages/dropzone/dropzone-config.js') !!}

    {{--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>--}}
    {{--<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->--}}
    {{--{!! Html::script('plugin/js/vendor/jquery.ui.widget.js') !!}--}}
    {{--<script src="js/vendor/jquery.ui.widget.js"></script>--}}
    {{--<!-- The Templates plugin is included to render the upload/download listings -->--}}
    {{--<script src="//blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>--}}
    {{--<!-- The Load Image plugin is included for the preview images and image resizing functionality -->--}}
    {{--<script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>--}}
    {{--<!-- The Canvas to Blob plugin is included for image resizing functionality -->--}}
    {{--<script src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>--}}
    {{--<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->--}}
    {{--<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>--}}
    {{--<!-- blueimp Gallery script -->--}}
    {{--<script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>--}}
    {{--<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->--}}
    {{--{!! Html::script('plugin/js/jquery.iframe-transport.js') !!}--}}
    {{--<script src="js/jquery.iframe-transport.js"></script>--}}
    {{--<!-- The basic File Upload plugin -->--}}
    {{--{!! Html::script('plugin/js/jquery.fileupload.js') !!}--}}
    {{--<script src="js/jquery.fileupload.js"></script>--}}
    {{--<!-- The File Upload processing plugin -->--}}
    {{--{!! Html::script('plugin/js/jquery.fileupload-process.js') !!}--}}
    {{--<script src="js/jquery.fileupload-process.js"></script>--}}
    {{--<!-- The File Upload image preview & resize plugin -->--}}
    {{--{!! Html::script('plugin/js/jquery.fileupload-image.js') !!}--}}
    {{--<script src="js/jquery.fileupload-image.js"></script>--}}
    {{--<!-- The File Upload audio preview plugin -->--}}
    {{--<script src="js/jquery.fileupload-audio.js"></script>--}}
    {{--<!-- The File Upload video preview plugin -->--}}
    {{--<script src="js/jquery.fileupload-video.js"></script>--}}
    {{--<!-- The File Upload validation plugin -->--}}
    {{--{!! Html::script('plugin/js/jquery.fileupload-validate.js') !!}--}}
    {{--<script src="js/jquery.fileupload-validate.js"></script>--}}
    {{--<!-- The File Upload user interface plugin -->--}}
    {{--{!! Html::script('plugin/js/jquery.fileupload-ui.js') !!}--}}
    {{--<script src="js/jquery.fileupload-ui.js"></script>--}}
    {{--<!-- The main application script -->--}}
    {{--{!! Html::script('plugin/js/main.js') !!}--}}
    {{--<script src="js/main.js"></script>--}}
    {{--<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->--}}
    {{--<!--[if (gte IE 8)&(lt IE 10)]>--}}
    {{--{!! Html::script('plugin/js/cors/jquery.xdr-transport.js') !!}--}}
    {{--<!--<script src="js/cors/jquery.xdr-transport.js"></script>-->--}}

@endsection