@extends('layouts.master')

@section('content')

<div class="card text-center">
    <div class="card-header">
        @foreach($post->tags as $tag)
            <span class="badge badge-secondary">{{$tag->name}}</span>
        @endforeach
    </div>
    <div class="card-body">
        <h5 class="card-title">{{$post->title}}</h5>
        <p class="card-text">{!! $post->content !!}</p>
    </div>
    <div class="card-footer text-muted">
        {{$post->created_at}}
    </div>
</div>

    @foreach($post->comments as $comment)
        <hr>
        <h5>{{$comment->user->name}}:</h5>
        <p>{{$comment->content}}</p>
        @if($comment->owner == 1)
            <form action="{{ route('comments.delete', [$post, $comment]) }}" method="post">
                @csrf
                <input name="_method" type="hidden" value="DELETE">
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        @endif
    @endforeach

<hr>
<form method="POST" action="{{route('comments.store', $post)}}">
    @csrf
    <div class="form-group">
        <label for="content"><b>Comment</b></label>
        <textarea class="form-control" name="content" id="" cols="30" rows="5"></textarea>
    </div>
    <div class="form-group">
        <input class="form-control" type="submit" value="Send">
    </div>
</form>

@endsection