@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Create Post -->
    <h1 class="text-center py-3">Hello, <span class="fw-bold">{{ Auth::user()->name }}</span> 👋</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body p-5">
                    <form action="{{route('createpost')}}" method="post">
                        @csrf
                        <input type="text" name="content" id="content" placeholder="What's on your mind?" required class="form-control">
                        <button type="submit" class="btn btn-dark mt-2 float-end">Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Posts -->
    @foreach($posts as $post)
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body p-4">
                    <span class="fw-bold">{{ $post->user->name }}
                        @if($post->user->id === Auth::user()->id)
                        <a href="{{route('deletepost', $post->id)}}" class="btn btn-sm btn-secondary float-end">Delete</a>
                        @endif
                    </span>
                    <br>
                    <small>{{$post->created_at->diffforHumans()}}</small>
                    <p class="mt-3">
                        {{$post->content}}
                    </p>
                    <div class="card mb-3">
                        <div class="card-body">
                            <form action="{{route('createcomment')}}" method="post">
                                @csrf
                                <input type="text" name="content" placeholder="Write a comment..." required class="form-control">
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <button type="submit" class="btn btn-dark mt-2 float-end btn-sm">Comment</button>
                            </form>
                        </div>
                    </div>
                    @foreach ($post->comments->reverse() as $comment)
                    <div class="card px-3 py-1 mt-2" style="font-size: 12px">
                        <span class="fw-bold mt-2">{{$comment->user->name}}</span>
                        <small>{{$comment->created_at->diffforHumans()}}</small>
                        <p>
                            {{$comment->content}}
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection