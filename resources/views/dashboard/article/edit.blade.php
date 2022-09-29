@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <h1 class="font-bold text-center mb-3">Edit Article</h1>
            <div class="card">
                <div class="card-body">
            <form method="post" action="{{ url('article/update/'. $articles->id) }}" enctype="multipart/form-data">
              @csrf
              {{-- @method('PUT') --}}
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $articles->title }}">
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select" name="category_id">
                      <option selected value="">Select category</option>
                      @foreach ($categories as $data)
                          <option value="{{ $data->id }}" @if($data->id == $articles->category_id) selected
                              @endif>{{ $data->name }}
                          </option>
                      @endforeach
                  </select>
                  </div>
                <div class="mb-3">
                  <label for="content" class="form-label">Content</label>
                  <textarea name="content" id="content" cols="20" rows="5" class="form-control">{{ $articles->content }}</textarea>
              </div>
              <div class="mb-3" style="max-height: 350px;">
                <label for="file" class="form-label">Upload image</label>
                <input class="form-control" type="file" name="image" id="file" required>
              </div>
                <button type="submit" class="btn btn-primary">Update</button>
              </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

