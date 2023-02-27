@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
        <h5 class="card-header">Edit Blog Detail</h5>
        <div class="card-body">
            <form action="{{ route('blogs.update',$blog->id) }}" method="POST" enctype="multipart/form-data">
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
                <label for="title" class="form-label">Blog Title</label>
                <input
                  class="form-control"
                  type="text"
                  id="title"
                  name="title"
                  value="{{ $blog->title }}"
                  placeholder="Enter title..."
                  autofocus
                />
              </div>
              <div class="mb-3 col-md-6">
                <label for="author" class="form-label">Blog Author</label>
                <input class="form-control" value="{{ $blog->author }}" type="text" name="author" id="author" placeholder="Enter author name..."/>
              </div>
              <div class="mb-3 col-md-3">
                <label for="thumbnail_img" class="form-label">Thumbnail Image</label>
                <input class="form-control" type="file" name="thumbnail_img" id="thumbnail_img"/>
              </div>
              <div class="mb-3 col-md-1">
                <img src="{{ asset('assets/blogs/'.$blog->thumbnail_img) }}" alt="" width="70" class="mt-4">
              </div>
              <div class="mb-3 col-md-3">
                <label for="banner_img" class="form-label">Banner Image</label>
                <input class="form-control" type="file" name="banner_img" id="banner_img"/>
              </div>
              <div class="mb-3 col-md-1">
                <img src="{{ asset('assets/blogs/'.$blog->banner_img) }}" alt="" width="70" class="mt-4">
              </div>
              <div class="mb-3 col-md-3">
                <label for="detail_img" class="form-label">Detail Image</label>
                <input class="form-control" type="file" name="detail_img" id="detail_img"/>
              </div>
              <div class="mb-3 col-md-1">
                <img src="{{ asset('assets/blogs/'.$blog->detail_img) }}" alt="" width="70" class="mt-4">
              </div>
            </div>
            <div class="mb-3 col-md-12">
                <label for="short_description" class="form-label">Short description</label>
                <textarea name="short_description" id="short_description" class="form-control" cols="30" rows="2" placeholder="Enter short description...">{{ $blog->short_description }}</textarea>
            </div>
            <div class="mb-3 col-md-12">
                <label for="long_description" class="form-label">Long description</label>
                <textarea name="long_description" id="long_description" class="form-control" cols="30" rows="2" placeholder="Enter long description...">{{ $blog->long_description }}</textarea>
            </div>
            <div class="mt-2">
            <button type="submit" class="btn btn-primary me-2">Save changes</button>
            </div>
          </form>
        </div>
    </div>
</div>
@endsection