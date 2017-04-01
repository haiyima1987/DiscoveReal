@extends('layout.admin')

@section('content')

    <div class="content">
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
                        <td class="tdHead">{{ $singleNews->title }}</td>
                        <td>{{ $singleNews->created_at->format('d-M-Y, H:i A') }}</td>
                        <td><a href="{{ route('admin.deleteNews', $singleNews) }}"
                               class="btn btn-danger pull-right">
                                <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
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