@extends('layouts.app')

@section('content')
    <div class="container">
        @include('layouts.nav')
        <div class="col-xs-9">
            <div class="panel panel-primary">
                <div class="panel-heading">Pages</div>

                <div class="panel-body">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('postEditPage', ['id' => $page->id]) }}">
                        {{ method_field('PUT') }}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group col-xs-12">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $page->title }}">
                        </div>
                        <div class="form-group col-xs-6">
                            <label for="url">URL</label>
                            <input type="text" class="form-control" id="url" name="url" value="{{ $page->url }}">
                            <input type="hidden" class="form-control" id="oldUrl" name="oldUrl" value="{{ $page->url }}">
                        </div>
                        <div class="form-group col-xs-6">
                            <label for="linkName">Link Name</label>
                            <input type="text" class="form-control" id="linkName" name="linkName" value="{{ $page->linkName }}">
                        </div>
                        <div class="form-group col-xs-12">
                            <label for="content">Content</label>
                            <textarea class="form-control " id="content" name="content" >{{ $page->content }}</textarea>
                        </div>
                        <div class="form-group col-xs-12">
                            <button type="submit" class="btn col-xs-12 btn-default">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
