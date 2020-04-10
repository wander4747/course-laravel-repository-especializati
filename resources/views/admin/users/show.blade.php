@extends('adminlte::page')

@section('title', 'View User')

@section('content_header')
    <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">View User: {{ $user->name }}</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('users.index') }}">Users</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('users.show', $user->id) }}">View User</a></li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="content row">
        <div class="col-md-12 mt-4">
            <ul class="list-group">
                <li class="list-group-item">ID: {{ $user->id }}</li>
                <li class="list-group-item">Name: {{ $user->name }}</li>
                <li class="list-group-item">Email: {{ $user->email }}</li>
            </ul>
            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="DELETE" />
                <button type="submit" class="btn btn-danger mt-4">Delete</button>
            </form>
        </div>
    </div>
@stop
