@extends('master')

@section('content')

    @foreach($countries->chunk(3) as $countryChunk)

        <div class="row">

            @foreach($countryChunk as $country)

                <div class="col-sm-4 frame">
                    <a href="{{ route('countries', ['id' => $country->id]) }}">
                        <div class="countryBox clearfix">
                            <div class="col-xs-3 imgBox">
                                <img src="{{ $country->path }}" alt="{{ $country->id }}">
                            </div>
                            <div class="col-xs-9">
                                <p>{{ $country->name }}</p>
                                <p>{{ $count = $postCount[$country->id] }} {{ $count > 1 ? 'Posts' : 'Post' }}</p>
                            </div>
                        </div>
                    </a>
                </div>

            @endforeach

        </div>

    @endforeach

@endsection