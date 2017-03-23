{!! Form::open(['method' => 'post', 'action'=>'ImageController@postImageUpload', 'files'=>true,
                'class' => 'dropzone', 'id'=>'drDropzoneCreate']) !!}

{{ csrf_field() }}
{!! Form::hidden('postId', $post->id) !!}

{!! Form::close() !!}

{{--<form action="{{ route('upload-post') }}"--}}
{{--class="dropzone"--}}
{{--id="dr-dropzone">--}}
{{--{!! Form::hidden('csrf-token', csrf_token(), ['id' => 'csrf-token']) !!}--}}
{{--</form>--}}

<!-- Dropzone Preview Template -->
<div id="dropzonePreview">
    <div class="dz-preview dz-file-preview">
        <div class="dz-details">
            <div class="dz-filename"><span data-dz-name></span></div>
            <div class="dz-size" data-dz-size></div>
            <img src="" data-dz-thumbnail/>
        </div>
        <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
        <div class="dz-success-mark"><span></span></div>
        <div class="dz-error-mark"><span></span></div>
        <div class="dz-error-message"><span data-dz-errormessage></span></div>
    </div>
</div>

{!! Form::hidden('csrf-token', csrf_token(), ['id' => 'csrf-token']) !!}