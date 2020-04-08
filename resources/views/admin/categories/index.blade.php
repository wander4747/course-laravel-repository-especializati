@extends('adminlte::page')

@section('title', 'List Categories')

@section('content_header')
    <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Categories</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('categories.index') }}">Categories</a></li>
            </ol>
        </div>
    </div>
    
@stop

@section('content')
    <div class="content row">
        <div class="col-md-12 mt-4">
            <form class="form-inline" action="{{ route('categories.search') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ $data['title'] ?? '' }}">
                </div>
                <div class="form-group mx-sm-3">
                    <input type="text" class="form-control" id="url" name="url" placeholder="Url" value="{{ $data['url'] ?? '' }}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="{{ $data['description'] ?? '' }}">
                </div>
                <button type="submit" class="btn btn-primary mx-sm-3">Search</button>
            </form>
            @if (isset($data))
                <a href="{{ route('categories.index') }}">(X) Clear search result</a>
            @endif
        </div>
        <div class="col-md-12 mt-4">
            <a href="{{ route('categories.create') }}" class="btn btn-success">Add</a>

            @include('admin.includes.alerts')

            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">URL</th>
                        <th scope="col">Description</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td>{{ $category->title }}</td>
                            <td>{{ $category->url }}</td>
                            <td>{{ $category->description }}</td>
                            <td>
                                <a href="{{ route('categories.edit', $category->id) }}" class="badge badge-warning">Edit</a>
                                <a href="{{ route('categories.show', $category->id) }}" class="badge badge-secondary">Details</a>    
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            @if (isset($data))
                {!! $categories->appends($data)->links() !!}
            @else
                {!! $categories->links() !!}
            @endif
            
        </div>
    </div>
@stop
