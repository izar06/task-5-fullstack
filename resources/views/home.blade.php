@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Home Page</h1>
    <div class="row">
        <div class="col-md-4 mb-3">
          <div class="card text-bg-light">
            <div class="card-header">
                <h5 class="card-title">Article</h5>
            </div>
            <div class="card-body">
              <a href="/article" class="btn btn-primary">Go to Article</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-3 ">
          <div class="card">
            <div class="card-header">
                <h5 class="card-title">Category</h5>
            </div>
            <div class="card-body">
              <a href="/category" class="btn btn-primary">Go to category</a>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection