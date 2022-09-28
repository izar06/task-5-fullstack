@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <h1 class="font-bold text-center mb-3">Edit Category</h1>
            <div class="card">
                <div class="card-body">
            <form method="post" action="{{ url('/category/update') }}">
              @csrf
                <div>
                    <input type="hidden" name="id" value="{{ $category->id }}">
                    <label for="name" class="form-label">Name</label>
                </div>
                <div class="col-9 mb-3">
                    <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
              </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

