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
        <div class="col-sm-10 col-sm-offset-1">

            @foreach($news as $singleNews)
                <div class="newsBox row">
                    <div class="col-sm-3 col-md-2 newsSide">
                        <img src="{{ $singleNews->imgPath ? url($singleNews->imgPath) : url('img/news.png') }}"
                             alt="" class="img-rounded img-responsive">
                    </div>
                    <div class="col-sm-9 col-md-10 newsContent">
                        <h5 class="media-heading"><strong>{{ $singleNews->title }}</strong></h5>
                        <p>{{ $singleNews->content }}</p>
                        <div class="text-muted">
                            <small>Published {{ $singleNews->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

@endsection