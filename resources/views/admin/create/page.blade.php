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
                    <form method="POST" action="{{ route('postPage') }}">
                        {{ method_field('PUT') }}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group col-xs-12">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                        </div>
                        <div class="form-group col-xs-6">
                            <label for="url">URL</label>
                            <input type="text" class="form-control" id="url" name="url" value="{{ old('url') }}">
                        </div>
                        <div class="form-group col-xs-6">
                            <label for="linkName">Link Name</label>
                            <input type="text" class="form-control" id="linkName" name="linkName" value="{{ old('linkName') }}">
                        </div>
                        <div class="form-group col-xs-12">
                            <label for="content">Content</label>
                            <textarea class="form-control " id="content" name="content" >{{ old('content') }}</textarea>
                        </div>
                        <div class="form-group col-xs-12">
                            <button type="submit" class="btn col-xs-12 btn-default">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
