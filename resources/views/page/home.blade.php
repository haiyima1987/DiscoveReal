@extends('layout.master')

@section('content')

    <div class="carouselContainer">
        <ul class="carousel">
            <li class="slide"><img class="shape" src="{{ url('img/bg0.png') }}" alt="shape"></li>
            <li class="slide"><img class="shape" src="{{ url('img/bg1.png') }}" alt="shape"></li>
            <li class="slide"><img class="shape" src="{{ url('img/bg2.png') }}" alt="shape"></li>
            <li class="slide"><img class="shape" src="{{ url('img/bg0.png') }}" alt="shape"></li>
        </ul>
        <div class="pageDotContainer">
            <ol class="pageDotGroup">
                <li id="dot1" class="pageDot active"></li>
                <li id="dot2" class="pageDot"></li>
                <li id="dot3" class="pageDot"></li>
            </ol>
        </div>
        <div class="carouselBtns">
            <div id="prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
            <div id="next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
            <div id="start"><i class="fa fa-play" aria-hidden="true"></i></div>
            <div id="pause"><i class="fa fa-pause" aria-hidden="true"></i></div>
        </div>
        <!--jumbotron-->
        <div class="mainText">
            <h1>Welcome to DiscoveReal</h1>
            <h3>Discover the Real World</h3>
            <br><br><br>
            <div class="introText">
                <p>Share your traveling experience with everybody</p>
                <p>Share tips about attractions all over the world</p>
                <p>Find the unseen discovered by wanderlusts</p>
                <p>Make friends with other birds of passage</p>
                <p>Listen to stories from crazy backpackers</p>
            </div>
        </div>
        <ul class="btnHomeGroup">
            @if(!Auth::check())
                <li class="btnHome">
                    <a href="{{ route('user.signup') }}">Join DiscoveReal</a>
                </li>
            @endif
            <li class="btnHome">
                <a href="{{ route('countries') }}">View DR Posts</a>
            </li>
            <li class="btnHome">
                <a href="{{ route('news') }}">View DR News</a>
            </li>
        </ul>
    </div>

@endsection

@section('scripts')

    {!! Html::script('js/carousel.js') !!}

@endsection