@extends('master')

@section('content')

    @foreach($countries->chunk(3) as $countryChunk)

        <div class="row">

            @foreach($countryChunk as $country)

                <div class="col-sm-4 frame">
                    <div class="countryBox clearfix">
                        <a href="{{ route('countries', ['id' => $country->id]) }}">
                            <div class="col-xs-4 imgBox">
                                <img src="{{ $country->path }}" alt="{{ $country->id }}">
                            </div>
                            <div class="col-xs-8">
                                <p>{{ $country->name }}</p>
                            </div>
                        </a>
                    </div>
                </div>

            @endforeach

        </div>

    @endforeach

@endsection