@extends('adminlte::page')

@section('title', 'View Product')

@section('content_header')
    <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">View Product: {{ $product->name }}</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('products.index') }}">Products</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('products.show', $product->id) }}">View Product</a></li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="content row">
        <div class="col-md-12 mt-4">
            <ul class="list-group">
                <li class="list-group-item">ID: {{ $product->id }}</li>
                <li class="list-group-item">Name: {{ $product->name }}</li>
                <li class="list-group-item">URL: {{ $product->url }}</li>
                <li class="list-group-item">Category: {{ $product->category->title }}</li>
                <li class="list-group-item">Description: {{ $product->description }}</li>
            </ul>
            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger mt-4">Delete</button>
            </form>
        </div>
    </div>
@stop
