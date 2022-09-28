@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <h1 class="font-bold text-center mb-3">Create Article</h1>
            <div class="card">
                <div class="card-body">
            <form method="post" action="/article/store" enctype="multipart/form-data">
              @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select" name="category_id">
                      <option selected value="">Select category</option>
                      @foreach ($categories as $data)
                          <option value="{{ $data->id }}" 
                              @isset($articles) 
                                  @if ($data->id === $articles->data->id)
                                      selected
                                  @endif 
                              @endisset
                          >
                              {{ $data->name }}
                          </option>
                      @endforeach
                  </select>
                  </div>
                <div class="mb-3">
                  <label for="content" class="form-label">Content</label>
                  <textarea name="content" id="content" cols="20" rows="5" class="form-control"></textarea>
              </div>
              <div class="mb-3">
                <label for="file" class="form-label">Upload image</label>
                <input class="form-control" type="file" name="image" id="file">
              </div>
                <button type="submit" class="btn btn-primary">Create</button>
              </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

