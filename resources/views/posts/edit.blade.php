@extends('layouts.master')

@section('content')

    <h1>Edit Post</h1>
    <form method="POST" action="{{route('posts.update')}}">
        @include('posts.partials.form')
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>

@endsection