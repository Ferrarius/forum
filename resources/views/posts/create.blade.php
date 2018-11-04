@extends('layouts.master')

@section('content')

    <h1>New Post</h1>
    <form method="POST" action="{{route('posts.store')}}">
        @include('posts.partials.form')
        <button type="submit" class="btn btn-primary">Post</button>
    </form>

@endsection