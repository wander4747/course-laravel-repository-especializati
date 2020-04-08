@extends('adminlte::page')

@section('title', 'Register Categories')

@section('content_header')
    <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Register Category</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('categories.index') }}">Categories</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('categories.create') }}">Register Category</a></li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="content row">
        <div class="col-md-12 mt-4">
            @include('admin.includes.alerts')
            <form action="{{ route('categories.store') }}" class="form" method="POST">
                @include('admin.categories._partials.form')
            </form>
        </div>
    </div>
@stop
