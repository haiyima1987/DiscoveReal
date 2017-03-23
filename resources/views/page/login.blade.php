@extends('layout.master')

@section('banner')
    <div class="banner">
        <img src="{{ url('img/banner1.png') }}" alt="banner">
        <div class="bannerText">
            <h2><strong>Welcome Back</strong></h2>
        </div>
    </div>
@endsection

@section('content')

    <div class="content">
        <div class="signUpForm col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2">

            {!! Form::open(['method'=>'post', 'action'=>'UserController@logInUser']) !!}
            {{ csrf_field() }}

            <fieldset>
                <legend>Login Information:</legend>
                <div class="input-group input-group-lg {{ $errors->has('msg') ? 'has-error' : '' }}">
                    <span class="input-group-addon"><i class="fa fa-user-circle-o fa-fw" aria-hidden="true"></i></span>
                    {!! Form::text('login', old('login'), ['class'=>'form-control', 'placeholder'=>'Enter Username/Email']) !!}
                    @if ($errors->has('msg'))
                        <span class="help-block"><strong>{{ $errors->first('msg') }}</strong></span>
                    @endif
                </div>
                <div class="input-group input-group-lg {{ $errors->has('msg') ? 'has-error' : '' }}">
                    <span class="input-group-addon"><i class="fa fa-lock fa-fw" aria-hidden="true"></i></span>
                    {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'Enter Password']) !!}
                    @if ($errors->has('msg'))
                        <span class="help-block"><strong>{{ $errors->first('msg') }}</strong></span>
                    @endif
                </div>
                <br>
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <div class="checkbox">
                            <label><input type="checkbox" name="remember" value="1"> Remember Me</label>
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <div class="col-sm-9 col-sm-offset-3">
                        {!! Form::submit('Log In', ['class'=>'btnSignUpLogIn btn btn-success pull-left']) !!}
                        <p class="text-left">
                            <a class="btn btn-link" href="{{ route('password.requestForm') }}">
                                Forgot Your Password?</a></p>
                    </div>
                </div>
            </fieldset>

            {!! Form::close() !!}

        </div>
    </div>

@endsection