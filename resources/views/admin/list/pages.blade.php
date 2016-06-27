@extends('layouts.app')

@section('content')
    <div class="container">
        @include('layouts.nav')
        <div class="col-xs-9">
            <div class="panel panel-primary">
                <div class="panel-heading">Pages</div>

                <div class="panel-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            <b>SUCCESS:</b> {{ session('success') }}!
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            <b>ERROR:</b> {{ session('error') }}
                        </div>
                    @endif
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>URL</th>
                                <th>Link Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pages as $page)
                                <tr>
                                    <td>{{ $page->id }}</td>
                                    <td>{{ $page->title }}</td>
                                    <td>{{ $page->url }}</td>
                                    <td>{{ $page->linkName }}</td>
                                    <td>
                                        <a href="{{ route('editPage', ['id' => $page->id]) }}" class="btn btn-primary btn-sm" role="button"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('deletePage', ['id' => $page->id]) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete the {{ $page->title }} page?');" role="button"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    <small><a class="btn btn-success btn-sm" href="{{ route('addPage') }}">Create Page</a></small>
                </div>
            </div>
        </div>
    </div>
@endsection
