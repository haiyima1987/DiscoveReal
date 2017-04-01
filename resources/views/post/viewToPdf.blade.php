<!doctype html>
<html lang="en">
<head>
    <title>DiscoveReal</title>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>--}}
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    {!! Html::style('font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('css/style.css') !!}

    {{--these styles are to solve the problem that css flex doesn't work with PDF printer--}}
    <style>
        .postBox {
            position: relative;
            min-height: 340px;
        }
        .postSide {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
        }
    </style>
</head>
<body>

<div class="banner">
    <img src="{{ url('img/banner3.png') }}" alt="banner">
    <div class="bannerText">
        <h2><strong>Discover Real World</strong></h2>
    </div>
</div>

<div class="content">
    <div class="postBox row">
        <div class="postSide col-xs-3">
            {{--{{ $author->id }}--}}
            <img src="{{ ($author = $post->user)->photo ? url($author->photo) : url('img/avatar.png') }}"
                 alt="{{ $author->id }}">
            <hr>
            <a href="#">{{ $post->user->username }}</a>
            <p>{{ ucwords($author->role->role) }}</p>
            <p>{{ $author->city . ', '. $author->country }}</p>
            <p>Date Joined: {{ $author->created_at->diffForHumans() }}</p>
            <p>Posts: {{ count($author->posts) }}</p>
        </div>

        {{--spacer as layout helper to solve problem that flex doesn't work--}}
        <div class="spacer col-xs-3"></div>

        <div class="postContent col-xs-9">
            <h4><strong>{{ ucwords($post->title) }}</strong></h4>
            <p>
                <small>{{ $post->created_at->format('d-M-Y, H:i A') }}</small>
            </p>
            <hr>

            @foreach($photos->chunk(2) as $photoChunk)
                <div class="row">
                    @foreach($photoChunk as $photo)
                        <div class="col-xs-6">
                            <img src="{{ url($photo->imgPath) }}" alt="{{ $photo->post_id }}">
                        </div>
                    @endforeach
                </div>
            @endforeach

            <p>{!! $post->content !!}</p>
        </div>
    </div>

    @foreach($comments as $comment)

        <div class="postBox row">
            <div class="postSide col-xs-3">
                <img src="{{ $author->photo ? url($author->photo) : url('img/avatar.png') }}"
                     alt="{{ $author->id }}">
                <hr>
                <a href="#">{{ $post->user->username }}</a>
                <p>{{ ucwords($author->role->role) }}</p>
                <p>{{ $author->city . ', '. $author->country }}</p>
                <p>Date Joined: {{ $author->created_at->diffForHumans() }}</p>
                <p>Posts: {{ count($author->posts) }}</p>
            </div>

            <div class="spacer col-xs-3"></div>

            <div class="postContent col-xs-9">
                <h4><strong>{{ $comment->title ? ucwords($comment->title) : '' }}</strong></h4>
                <p>
                    <small>{{ $comment->created_at->format('d-M-Y, H:i A') }}</small>
                </p>
                <hr>
                <p>{!! $comment->content !!}</p>
            </div>
        </div>

    @endforeach
</div>

</body>