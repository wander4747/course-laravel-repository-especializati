@extends('adminlte::page')

@section('title', 'Edit User')

@section('content_header')
    <div class="row">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Edit User: {{ $user->name }}</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('users.index') }}">Users</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('users.edit', $user->id) }}">Edit User</a></li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="content row">
        <div class="col-md-12 mt-4">
            @include('admin.includes.alerts')
            <form action="{{ route('users.update', $user->id) }}" class="form" method="POST">
                <input type="hidden" name="_method" value="PUT" />
                @include('admin.users._partials.form')
            </form>
        </div>
    </div>
@stop
