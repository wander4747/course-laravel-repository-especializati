@extends('adminlte::page')

@section('title', 'Register Product')

@section('content_header')
    <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Register Product</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Product</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('products.create') }}">Register Product</a></li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="content row">
        <div class="col-md-12 mt-4">
            @include('admin.includes.alerts')
            
            {{ Form::open(['route' => 'products.store', 'class' => 'form']) }}
                @include('admin.products._partials.form')
            {{ Form::close() }}
        </div>
    </div>
@stop
