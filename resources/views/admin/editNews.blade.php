@extends('layout.admin')

@section('banner')
    <div class="banner">
        <img src="{{ url('img/banner1.png') }}" alt="banner">
        <div class="bannerText">
            <h2><strong>Edit News</strong></h2>
        </div>
    </div>
@endsection

@section('content')

    <div class="content">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="formCreateEdit clearfix">

                {!! Form::open(['method'=>'put', 'action'=>['AdminController@updateNews', $news], 'files'=>true]) !!}
                {{ csrf_field() }}

                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                    {!! Form::label('title', 'Title', ['class'=>'col-form-label']) !!}
                    {!! Form::text('title', $news->title, ['class'=>'form-control', 'placeholder'=>'Enter Title']) !!}
                    @if ($errors->has('title'))
                        <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                    {!! Form::label('content', 'News content', ['class'=>'col-form-label']) !!}
                    {!! Form::textarea('content', $news->content, ['class'=>'form-control', 'placeholder'=>'Enter content']) !!}
                    @if ($errors->has('content'))
                        <span class="help-block"><strong>{{ $errors->first('content') }}</strong></span>
                    @endif
                </div>

                {!! Form::submit('Update', ['class'=>'btn btn-success pull-right']) !!}
                {!! Form::close() !!}

                <div class="alert alert-danger newsDeleteBox clearfix">
                    <a href="#"
                       data-toggle="modal"
                       data-target="#adminNewsDelete"
                       class="btn btn-danger pull-left">Delete</a>
                    <span id="spanDeleteMsg">Click the button on the left to delete the news</span>
                </div>

            </div>
        </div>
    </div>

    @include('admin.partials.newsModal')

@endsection