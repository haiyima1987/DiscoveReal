@extends('layout.master')

@section('banner')
    <div class="banner">
        <img src="{{ url('img/banner1.png') }}" alt="banner">
        <div class="bannerText">
            <h2><strong>Welcome to Join Us</strong></h2>
        </div>
    </div>
@endsection

@section('content')

    <div class="content">
        <div class="signUpForm col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2">

            {!! Form::open(['method'=>'post', 'action'=>'UserController@signUpUser']) !!}

            {{ csrf_field() }}

            <fieldset>
                <legend>Login Information:</legend>
                <div class="input-group input-group {{ $errors->has('username') ? 'has-error' : '' }}">
                    <span class="input-group-addon"><i class="fa fa-user-circle-o fa-fw" aria-hidden="true"></i></span>
                    {!! Form::text('username', old('username'), ['class'=>'form-control', 'placeholder'=>'Enter Username']) !!}
                    @if ($errors->has('username'))
                        <span class="help-block"><strong>{{ $errors->first('username') }}</strong></span>
                    @endif
                </div>
                <div class="input-group input-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <span class="input-group-addon"><i class="fa fa-lock fa-fw" aria-hidden="true"></i></span>
                    {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'Enter Password']) !!}
                    @if ($errors->has('password'))
                        <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                    @endif
                </div>
                <div class="input-group input-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                    <span class="input-group-addon"><i class="fa fa-lock fa-fw" aria-hidden="true"></i></span>
                    {!! Form::password('password_confirmation', ['class'=>'form-control', 'placeholder'=>'Confirm Password']) !!}
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block"><strong>{{ $errors->first('password_confirmation') }}</strong></span>
                    @endif
                </div>
            </fieldset>
            <br>
            <fieldset>
                <legend>Account Information:</legend>
                <div class="input-group input-group {{ $errors->has('firstName') ? 'has-error' : '' }}">
                    <span class="input-group-addon"><i class="fa fa-address-card fa-fw" aria-hidden="true"></i></span>
                    {!! Form::text('firstName', old('firstName'), ['class'=>'form-control', 'placeholder'=>'First Name']) !!}
                    @if ($errors->has('firstName'))
                        <span class="help-block"><strong>{{ $errors->first('firstName') }}</strong></span>
                    @endif
                </div>
                <div class="input-group input-group {{ $errors->has('lastName') ? 'has-error' : '' }}">
                    <span class="input-group-addon"><i class="fa fa-address-card-o fa-fw" aria-hidden="true"></i></span>
                    {!! Form::text('lastName', old('lastName'), ['class'=>'form-control', 'placeholder'=>'Last Name']) !!}
                    @if ($errors->has('lastName'))
                        <span class="help-block"><strong>{{ $errors->first('lastName') }}</strong></span>
                    @endif
                </div>
                <div class="input-group input-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <span class="input-group-addon"><i class="fa fa-envelope fa-fw" aria-hidden="true"></i></span>
                    {!! Form::email('email', old('email'), ['class'=>'form-control', 'placeholder'=>'Enter Email']) !!}
                    @if ($errors->has('email'))
                        <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                    @endif
                </div>
                <div class="input-group input-group {{ $errors->has('bday') ? 'has-error' : '' }}">
                    <span class="input-group-addon"><i class="fa fa-birthday-cake fa-fw" aria-hidden="true"></i></span>
                    {!! Form::date('bday', old('bday'), ['class'=>'form-control', 'placeholder'=>'Enter Birthday']) !!}
                    @if ($errors->has('bday'))
                        <span class="help-block"><strong>{{ $errors->first('bday') }}</strong></span>
                    @endif
                </div>
                <div class="input-group input-group">
                    <label class="input-group-addon">
                        <i class="fa fa-mars fa" aria-hidden="true"></i>&nbsp;&nbsp;
                        <input type="radio" name="gender" value="M" required>
                    </label>
                    <label class="input-group-addon">
                        <i class="fa fa-venus fa" aria-hidden="true"></i>&nbsp;&nbsp;
                        <input type="radio" name="gender" value="F">
                    </label>
                    <label class="input-group-addon">
                        <i class="fa fa-genderless fa" aria-hidden="true"></i>&nbsp;&nbsp;
                        <input type="radio" name="gender" value="O">
                    </label>
                </div>
                <div class="input-group input-group {{ $errors->has('city') ? 'has-error' : '' }}">
                    <span class="input-group-addon"><i class="fa fa-map-marker fa-fw" aria-hidden="true"></i></span>
                    {!! Form::text('city', old('city'), ['class'=>'form-control', 'placeholder'=>'Enter City']) !!}
                    @if ($errors->has('city'))
                        <span class="help-block"><strong>{{ $errors->first('city') }}</strong></span>
                    @endif
                </div>
                <div class="input-group input-group {{ $errors->has('country') ? 'has-error' : '' }}">
                    <span class="input-group-addon"><i class="fa fa-globe fa-fw" aria-hidden="true"></i></span>
                    {!! Form::text('country', old('country'), ['class'=>'form-control', 'placeholder'=>'Enter Country']) !!}
                    @if ($errors->has('country'))
                        <span class="help-block"><strong>{{ $errors->first('country') }}</strong></span>
                    @endif
                </div>
                <br>
                <div class="form-group">
                    {!! Form::submit('Sign Up', ['class'=>'btn btn-success btn center-block']) !!}
                </div>
            </fieldset>

            {!! Form::close() !!}

        </div>
    </div>

@endsection