@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
        <h5 class="card-header">Category Detail</h5>
        <div class="card-body">
            <form action="{{ route('sub_categories.update',$category->id) }}" method="POST">
            @csrf
            @method('put')
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible" role="alert">
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br />
                    @endforeach
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row">
              <div class="mb-3 col-md-6">
                <label for="title" class="form-label">Category Title</label>
                <input
                  class="form-control"
                  type="text"
                  id="title"
                  name="title"
                  value="{{ $category->title }}"
                  placeholder="Enter title..."
                  autofocus
                />
              </div>
              <div class="mb-3 col-md-4">
                <label for="image" class="form-label">Category Image</label>
                <input class="form-control" type="file" name="image" id="image"/>
              </div>
              <div class="mb-3 col-md-2">
                <img src="{{ asset('assets/category/'.$category->image) }}" alt="" width="70" class="img-fluid mt-4">
              </div>
            </div>
            <div class="mt-2">
            <button type="submit" class="btn btn-primary me-2">Save changes</button>
            </div>
          </form>
        </div>
    </div>
</div>
@endsection