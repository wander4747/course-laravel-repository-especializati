@extends('adminlte::page')

@section('title', 'List Users')

@section('content_header')
    <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Users</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('users.index') }}">Users</a></li>
            </ol>
        </div>
    </div>

@stop

@section('content')
    <div class="content row">
        <div class="col-md-12 mt-4">
            <form class="form-inline" action="{{ route('users.search') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" id="filter" name="filter" placeholder="Search" value="{{ $data['title'] ?? '' }}">
                </div>
                <button type="submit" class="btn btn-primary mx-sm-3">Search</button>
            </form>
            @if (isset($data))
                <a href="{{ route('users.index') }}">(X) Clear search result</a>
            @endif
        </div>
        <div class="col-md-12 mt-4">
            <a href="{{ route('users.create') }}" class="btn btn-success">Add</a>

            @include('admin.includes.alerts')

            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ route('users.edit', $user->id) }}" class="badge badge-warning">Edit</a>
                                <a href="{{ route('users.show', $user->id) }}" class="badge badge-secondary">Details</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @if (isset($data))
                {!! $users->appends($data)->links() !!}
            @else
                {!! $users->links() !!}
            @endif

        </div>
    </div>
@stop
