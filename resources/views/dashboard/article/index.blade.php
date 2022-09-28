@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-5">
        <a href="/article/create" class="btn btn-primary mx-2">Create Article</a>
    </div>

    <div class="row">
        @foreach ($articles as $article)
            <div class="col-md-4 col-lg-4">
                <div class="card mb-4">
                    <img src="{{ asset('image/'.$article->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{ $article->title }}</h5>
                      <p class="card-text">{{ $article->content }}</p>
                      <p class="card-text">
                        <small class="text-muted">{{ $article->created_at->diffForHumans() }}</small>
                      </p>
                      <a href="/article/edit/{{ $article->id }}" class="btn btn-primary">Edit</a>
                      <a href="/article/delete/{{ $article->id }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</div>
@endsection