@extends('adminlte::page')

@section('title', 'Edit Product')

@section('content_header')
    <div class="row">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Edit Product: {{ $product->title }}</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('products.index') }}">Products</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('products.edit', $product->id) }}">Edit Product</a></li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="content row">
        <div class="col-md-12 mt-4">
            {{ Form::model($product, ['route' => ['products.update', $product->id], 'class' => 'form']) }}
                @method('PUT')
                @include('admin.products._partials.form')
            {{ Form::close() }}
        </div>
    </div>
@stop
