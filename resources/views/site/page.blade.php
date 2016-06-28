@extends('site.layout.layout')

@section('content')
    <div class="container">
        <div class="col-xs-12">
            {!! $page->content !!}
        </div>
    </div>
@endsection
