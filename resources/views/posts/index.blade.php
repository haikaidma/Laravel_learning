@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Manage Posts</h1>
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <a href="{{ route('post.create') }}" class="btn btn-success" style="float: right">Create Post</a>
                <table class="table table-bordered">
                    <thead>
                        <th width=80px>Id</th>
                        <th>Title</th>
                        <th width=150px>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>
                                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">View Post</a>
                                    <a href="{{ route('posts.delete', $post->id) }}" class="btn btn-danger"
                                        style="margin-top: 10px;" onclick="return confirm('Are you sure')">Delete Post</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
