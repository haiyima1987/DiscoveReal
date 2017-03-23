@extends('layout.master')

@section('banner')
    <div class="banner">
        <img src="{{ url('img/banner0.png') }}" alt="banner">
        <div class="bannerText">
            <h2><strong>This is your world</strong></h2>
        </div>
    </div>
@endsection

@section('content')

    <div class="content">
        <div class="profileBox row">
            <div class="profileSide col-sm-3">
                <div id="profileImg">
                    <img class="img-circle img-responsive"
                         src="{{ $user->photo ? url($user->photo) : url('img/avatar.png') }}"
                         alt="{{ $user->id }}">
                </div>
                {!! Form::open(['id' => 'imgForm', 'method'=>'post', 'action'=>['UserController@updateProfileImage', $user], 'files'=>true]) !!}
                {{ csrf_field() }}
                {!! Form::file('photo', ['id'=>'btnFileUpload']) !!}
                {!! Form::submit('Update') !!}
                {!! Form::close() !!}

                @if ($errors->has('photo'))
                    <span class="help-block"><strong>{{ $errors->first('photo') }}</strong></span>
                @endif
                <button id="btnClickHelper" class="btn btn-primary">Change Image</button>
                <hr>
                <h5>{{ $user->username }}</h5>
                <h5>{{ $user->role->role }}</h5>
                <p><i class="fa fa-id-card-o" aria-hidden="true"></i> {{ $user->firstName . ' ' . $user->lastName }}
                    <i class="fa {{ $user->gender == 'M' ? 'fa-male' : 'fa-female' }} fa-lg" aria-hidden="true"></i>
                </p>
                <p><i class="fa fa-envelope-o"></i> {{ $user->email }}</p>
                <p><i class="fa fa-gift"></i> {{ $user->birthday }}</p>
                <p><i class="fa fa-map-marker"></i> {{ $user->city. ', '.$user->country }}</p>
            </div>

            <div class="profileContent col-sm-9">
                <div class="content">
                    {!! Form::open(['method'=>'put', 'action'=>['UserController@updateProfile']]) !!}
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="form-group leftElem col-sm-6 {{ $errors->has('firstName') ? 'has-error' : '' }}">
                            {!! Form::label('firstName', 'First Name', ['class'=>'col-form-label']) !!}
                            {!! Form::text('firstName', $user->firstName, ['class'=>'form-control', 'placeholder'=>'Enter First Name']) !!}
                            @if ($errors->has('firstName'))
                                <span class="help-block"><strong>{{ $errors->first('firstName') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group rightElem col-sm-6 {{ $errors->has('lastName') ? 'has-error' : '' }}">
                            {!! Form::label('lastName', 'Last Name', ['class'=>'col-form-label']) !!}
                            {!! Form::text('lastName', $user->lastName, ['class'=>'form-control', 'placeholder'=>'Enter Last Name']) !!}
                            @if ($errors->has('lastName'))
                                <span class="help-block"><strong>{{ $errors->first('lastName') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group leftElem col-sm-6 {{ $errors->has('birthday') ? 'has-error' : '' }}">
                            {!! Form::label('birthday', 'Birthday', ['class'=>'col-form-label']) !!}
                            {!! Form::date('birthday', $user->birthday, ['class'=>'form-control', 'placeholder'=>'Enter birthday']) !!}
                            @if ($errors->has('birthday'))
                                <span class="help-block"><strong>{{ $errors->first('birthday') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group rightElem col-sm-6 {{ $errors->has('gender') ? 'has-error' : '' }}">
                            {!! Form::label('gender', 'Gender', ['class'=>'col-form-label']) !!}
                            {!! Form::select('gender', ['M' => 'Male', 'F' => 'Female', 'O' => 'Not Shown'], $user->gender,
                            ['class'=>'form-control', 'placeholder'=>'Select gender']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group leftElem col-sm-6 {{ $errors->has('city') ? 'has-error' : '' }}">
                            {!! Form::label('city', 'City', ['class'=>'col-form-label']) !!}
                            {!! Form::text('city', $user->city, ['class'=>'form-control', 'placeholder'=>'Enter city']) !!}
                            @if ($errors->has('city'))
                                <span class="help-block"><strong>{{ $errors->first('city') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group leftElem col-sm-6 {{ $errors->has('country') ? 'has-error' : '' }}">
                            {!! Form::label('country', 'Country', ['class'=>'col-form-label']) !!}
                            {!! Form::text('country', $user->country, ['class'=>'form-control', 'placeholder'=>'Enter country']) !!}
                            @if ($errors->has('country'))
                                <span class="help-block"><strong>{{ $errors->first('country') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group leftElem col-sm-6 {{ $errors->has('password') ? 'has-error' : '' }}">
                            {!! Form::label('password', 'Password', ['class'=>'col-form-label']) !!}
                            {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'Enter password']) !!}
                            @if ($errors->has('password'))
                                <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group leftElem col-sm-6 {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                            {!! Form::label('password_confirmation', 'Confirm', ['class'=>'col-form-label']) !!}
                            {!! Form::password('password_confirmation', ['class'=>'form-control', 'placeholder'=>'Confirm password']) !!}
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block"><strong>{{ $errors->first('password_confirmation') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            {!! Form::submit('Update', ['class'=>'btn btn-success pull-right']) !!}
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>

@endsection

@section('scripts')
    {!! Html::script('js/profile.js') !!}
@endsection