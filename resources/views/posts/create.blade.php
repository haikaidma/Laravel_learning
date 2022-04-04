@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Post</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="post" action="{{ route('post.create') }}">
                            <div class="form-group">
                                @csrf
                                <label class="label">Post Title: </label>
                                <input type=text name=title class="form-control" />
                            </div>
                            <div class="form-group">
                                <label class="label">Post Content: </label>
                                <textarea name=content rows="10" cols="30" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <input type=submit class="btn btn-success" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
