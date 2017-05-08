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
                <div class="input-group input-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <span class="input-group-addon"><i class="fa fa-user-circle-o fa-fw" aria-hidden="true"></i></span>
                    {!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Enter name']) !!}
                </div>
                @if ($errors->has('name'))
                    <p class="alert alert-danger text-center errorInfo">
                        <strong>{{ $errors->first('name') }}</strong></p>
                @endif

                <div class="input-group input-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <span class="input-group-addon"><i class="fa fa-lock fa-fw" aria-hidden="true"></i></span>
                    {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'Enter Password']) !!}
                </div>
                @if ($errors->has('password'))
                    <p class="alert alert-danger text-center errorInfo">
                        <strong>{{ $errors->first('password') }}</strong></p>
                @endif

                <div class="input-group input-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                    <span class="input-group-addon"><i class="fa fa-lock fa-fw" aria-hidden="true"></i></span>
                    {!! Form::password('password_confirmation', ['class'=>'form-control', 'placeholder'=>'Confirm Password']) !!}
                </div>
                @if ($errors->has('password_confirmation'))
                    <p class="alert alert-danger text-center errorInfo">
                        <strong>{{ $errors->first('password_confirmation') }}</strong></p>
                @endif
            </fieldset>
            <br>
            <fieldset>
                <legend>Account Information:</legend>
                <div class="input-group input-group {{ $errors->has('firstName') ? 'has-error' : '' }}">
                    <span class="input-group-addon"><i class="fa fa-address-card fa-fw" aria-hidden="true"></i></span>
                    {!! Form::text('firstName', old('firstName'), ['class'=>'form-control', 'placeholder'=>'First Name']) !!}
                </div>
                @if ($errors->has('firstName'))
                    <p class="alert alert-danger text-center errorInfo">
                        <strong>{{ $errors->first('firstName') }}</strong></p>
                @endif

                <div class="input-group input-group {{ $errors->has('lastName') ? 'has-error' : '' }}">
                    <span class="input-group-addon"><i class="fa fa-address-card-o fa-fw" aria-hidden="true"></i></span>
                    {!! Form::text('lastName', old('lastName'), ['class'=>'form-control', 'placeholder'=>'Last Name']) !!}
                </div>
                @if ($errors->has('lastName'))
                    <p class="alert alert-danger text-center errorInfo">
                        <strong>{{ $errors->first('lastName') }}</strong></p>
                @endif

                <div class="input-group input-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <span class="input-group-addon"><i class="fa fa-envelope fa-fw" aria-hidden="true"></i></span>
                    {!! Form::email('email', old('email'), ['class'=>'form-control', 'placeholder'=>'Enter Email']) !!}
                </div>
                @if ($errors->has('email'))
                    <p class="alert alert-danger text-center errorInfo"><strong>{{ $errors->first('email') }}</strong>
                    </p>
                @endif

                <div class="input-group input-group {{ $errors->has('birthday') ? 'has-error' : '' }}">
                    <span class="input-group-addon"><i class="fa fa-birthday-cake fa-fw" aria-hidden="true"></i></span>
                    {!! Form::date('birthday', old('birthday'), ['class'=>'form-control', 'placeholder'=>'Enter Birthday']) !!}
                </div>
                @if ($errors->has('birthday'))
                    <p class="alert alert-danger text-center errorInfo">
                        <strong>{{ $errors->first('birthday') }}</strong></p>
                @endif

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
                </div>
                @if ($errors->has('city'))
                    <p class="alert alert-danger text-center errorInfo"><strong>{{ $errors->first('city') }}</strong>
                    </p>
                @endif

                <div class="input-group input-group {{ $errors->has('country') ? 'has-error' : '' }}">
                    <span class="input-group-addon"><i class="fa fa-globe fa-fw" aria-hidden="true"></i></span>
                    {!! Form::text('country', old('country'), ['class'=>'form-control', 'placeholder'=>'Enter Country']) !!}
                </div>
                @if ($errors->has('country'))
                    <p class="alert alert-danger text-center errorInfo"><strong>{{ $errors->first('country') }}</strong>
                    </p>
                @endif

                <br>
                <div class="form-group">
                    {!! Form::submit('Sign Up', ['class'=>'btn btn-success btn center-block']) !!}
                </div>
            </fieldset>

            {!! Form::close() !!}

        </div>
    </div>

@endsection