@extends('master')

@section('banner')
    <div class="banner">
        <img src="{{ url('img/banner1.png') }}" alt="banner">
        <div class="bannerText"><h2><strong>{{ $country->name }}</strong></h2></div>
    </div>
@endsection

@section('content')

    <div class="tableContainer">
        <table class="table table-condensed">
            <thead>
            <tr>
                <td></td>
                <td>Topics</td>
                <td>Statistics</td>
                <td>Date Updated</td>
            </tr>
            </thead>
            <tbody>
            @foreach($allPosts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td class="col-sm-8 tdHead"><a href="{{ route('post.view', $post) }}">
                            {{ ucwords($post->title) }}
                            {{--<i class="fa fa-list-ul" aria-hidden="true"></i> View--}}
                        </a>
                        <p>Published by
                            <a href="{{ route('user.profile', $user = $post->user) }}">{{ $user->username }}</a>
                            at {{ $post->created_at->format('d-M-Y, H:i A') }}
                        </p>
                    </td>
                    <td class="col-sm-2">
                        <i class="fa fa-comments" aria-hidden="true"></i> {{ count($post->comments) }}
                    </td>
                    <td class="col-sm-2">{{ $post->updated_at->diffForHumans() }}</td>
                    {{--<td class="col-sm-3">{{ $post->updated_at->diffForHumans() }}</td>--}}
                    {{--<td>--}}
                    {{--<a href="{{ route('post.view', $post) }}" class="btn btn-success pull-right">--}}
                    {{--<i class="fa fa-list-ul" aria-hidden="true"></i> View--}}
                    {{--</a>--}}
                    {{--</td>--}}
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection