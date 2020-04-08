@extends('adminlte::page')

@section('title', 'View Categories')

@section('content_header')
    <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">View Category: {{ $category->title }}</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('categories.index') }}">Categories</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('categories.show', $category->id) }}">View Category</a></li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="content row">
        <div class="col-md-12 mt-4">
            <ul class="list-group">
                <li class="list-group-item">ID: {{ $category->id }}</li>
                <li class="list-group-item">Title: {{ $category->title }}</li>
                <li class="list-group-item">URL: {{ $category->url }}</li>
                <li class="list-group-item">Description: {{ $category->description }}</li>
            </ul>
            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="DELETE" />
                <button type="submit" class="btn btn-danger mt-4">Delete</button>
            </form>
        </div>
    </div>
@stop
