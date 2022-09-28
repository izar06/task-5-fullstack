@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mb-5">
            <a href="/category/create" class="btn btn-primary mx-2">Create Category</a>
        </div>

        <div class="row">
            <div class="col-md-8">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $index => $data)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $data->name }}</td>
                                <td>
                                    <a href="/category/edit/{{ $data->id }}" class="btn btn-warning">Edit</a>
                                    <a href="/category/destroy/{{ $data->id }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection