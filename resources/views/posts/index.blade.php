@extends('layouts.master')

@section('content')

    <br>

    <a href="/" class="btn btn-secondary">All tags</a> |
    @foreach($tags as $tag)
        <a href="{{route('posts.index', $tag->name)}}" class="btn {{$tag->active == 1 ? 'btn-dark' : 'btn-secondary'}}">{{$tag->name}}</a>
    @endforeach

    <form method="GET" class="float-right" action="{{route('posts.index', Request::route('tag'))}}">
        <div class="form-group">
            <input name="search" class="form-control" type="text">
        </div>
    </form>
    <div class="clearfix"></div>
    <hr>

    @foreach($posts as $post)
        <div class="card" style="">
            <div class="card-body">
                <h5 class="card-title">{{$post->title}}</h5>
                <div class="card-subtitle mb-2 text-muted">
                    @foreach($post->tags as $tag)
                        <span class="badge badge-secondary">{{$tag->name}}</span>
                    @endforeach
                </div>
                <hr>
                <p class="card-text">{!! $post->content !!}</p>
                <a href="{{route('posts.show', $post)}}" class="card-link">Open</a>
            </div>
        </div>
        <br>
    @endforeach

    <a class="btn btn-block btn-primary" href="{{route('posts.create')}}">Create post</a>

@endsection