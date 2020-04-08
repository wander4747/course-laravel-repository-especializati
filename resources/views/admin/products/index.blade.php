@extends('adminlte::page')

@section('title', 'List Products')

@section('content_header')
    <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Products</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('products.index') }}">Products</a></li>
            </ol>
        </div>
    </div>

@stop

@section('content')
    <div class="content row">
        <div class="col-md-12 mt-4">
            <form class="form-inline" action="{{ route('products.search') }}" method="POST">
                @csrf
                <div class="form-group">
                    <select name="category" class="form-control">
                        <option value="">Select category</option>
                        @foreach ($categories as $key => $category)
                            <option value="{{ $key }}"
                                @if (isset($filters['category'])  && $filters['category'] == $key) selected @endif
                            >{{ $category }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mx-sm-3">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ $data['name'] ?? '' }}">
                </div>
                <div class="form-group ">
                    <input type="text" class="form-control" id="price" name="price" placeholder="Price" value="{{ $data['price'] ?? '' }}">
                </div>
                <button type="submit" class="btn btn-primary mx-sm-3">Search</button>
            </form>
            @if (isset($filters))
                <a href="{{ route('products.index') }}">(X) Clear search result</a>
            @endif
        </div>
        <div class="col-md-12 mt-4">
            <a href="{{ route('products.create') }}" class="btn btn-success">Add</a>

            @include('admin.includes.alerts')

            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Price</th>
                        <th scope="col">Category</th>
                        <th scope="col">Description</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <th scope="row">{{ $product->id }}</th>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->category->title }}</td>
                            <td>{{ $product->description }}</td>
                            <td>
                                <a href="{{ route('products.edit', $product->id) }}" class="badge badge-warning">Edit</a>
                                <a href="{{ route('products.show', $product->id) }}" class="badge badge-secondary">Details</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @if (isset($filters)) 
                {!! $products->appends($filters)->links() !!}
            @else
                {!! $products->links() !!}
            @endif
        </div>
    </div>
@stop
