@extends('layout.admin')

@section('content')

    <div class="content">
        <div class="headBarAdmin col-sm-10 col-sm-offset-1">
            <a class="btn btn-primary pull-right" href="{{ route('admin.createNews') }}">Create News</a>
            {!! Form::open(['method'=>'delete', 'action'=>'AdminController@clearUnpublishedNews']) !!}
            {{ csrf_field() }}
            {!! Form::submit('Clear Unpublished', ['class'=>'btn btn-warning pull-left']) !!}
            {!! Form::close() !!}
        </div>

        <div class="text-center">{{ $news->render() }}</div>

        <div class="col-sm-10 col-sm-offset-1">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <td class="tdHead">Topics</td>
                    <td>Created Updated</td>
                </tr>
                </thead>
                <tbody>
                @foreach($news as $singleNews)
                    <tr>
                        <td class="tdHead">
                            @if($singleNews->published == 1)
                                {{ $singleNews->title }}
                            @else
                                <p>Junk News</p>
                            @endif
                        </td>
                        <td>{{ $singleNews->created_at->format('d-M-Y, H:i A') }}</td>
                        <td>
                            <a href="{{ route('admin.editNews', $singleNews) }}"
                               class="btn btn-warning pull-right">
                                <i class="fa fa-pencil" aria-hidden="true"></i> Edit
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="text-center">{{ $news->render() }}</div>
    </div>

@endsection