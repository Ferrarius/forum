@extends('layouts.master')

@section('content')

    <h1>Users</h1>
    <form method="POST" action="{{route('users.update', $user->id)}}">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{old('name', $user->name)}}">
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>

@endsection