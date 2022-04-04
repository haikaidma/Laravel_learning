@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center text-success">NINE PLUS SOLUTIONS</h3>
                    <br/>
                    <h1>Title: {{ $post->title }}</h1>
                    <h2>
                        Content:{{ $post->content }}
                    </h2>
                    <hr />
                    <h4>Display Comments</h4>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    @include('posts.commentsDisplay', ['comments' => $post->comments, 'post_id' => $post->id])
   
                    <hr/>
                    <h4>Add comment</h4>
                    <form method="post" action="{{ route('comments.store') }}">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" name=body></textarea>
                            <input type=hidden name=post_id value="{{ $post->id }}" />
                        </div>
                        
                        <div class="form-group">
                            <br>
                            <input type=submit class="btn btn-success" value="Add Comment" />
                        </div>
                        <br>
                        <a href="http://127.0.0.1:8000/post/index">Back list Posts</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection