@extends('layouts.master')

@section('content')

    <br>
    <h1>Tags</h1>
    <br>
    @foreach($tags as $tag)
        <form class="form-inline" method="POST" action="{{route('tags.update', $tag->id)}}">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" id="name" name="name" value="{{old('name', $tag->name)}}">

                <a class="btn btn-danger" href="{{route('tags.delete', $tag->id)}}">X</a>
            </div>
        </form>
        <br>
    @endforeach
    <br>
    <form action="{{ route('tags.store') }}" method="post">
        @csrf
        <button class="btn btn-success btn-block" type="submit">+</button>
    </form>

@endsection