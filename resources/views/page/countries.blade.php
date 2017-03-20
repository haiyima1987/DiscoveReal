@extends('layout.master')

@section('banner')
    <div class="banner">
        <img src="{{ url('img/banner2.png') }}" alt="banner">
        <div class="bannerText">
            <h2><strong>Choose Your Destination</strong></h2>
        </div>
    </div>
@endsection

@section('content')

    <div class="content">
        @foreach($countries->chunk(3) as $countryChunk)

            <div class="row">

                @foreach($countryChunk as $country)

                    <div class="col-sm-4 frame">
                        <a href="{{ route('countries', ['id' => $country->id]) }}">
                            <div class="countryBox clearfix">
                                <div class="col-xs-4 imgBox">
                                    <img src="{{ $country->path }}" alt="{{ $country->id }}">
                                </div>
                                <div class="countryText col-xs-8">
                                    <h4>{{ $country->name }}</h4>
                                    <p>
                                        <small>{{ $count = $postCount[$country->id] }} {{ $count > 1 ? 'Posts' : 'Post' }}</small>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>

                @endforeach

            </div>

        @endforeach
    </div>

@endsection