@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
        <h5 class="card-header">Sub Category Details</h5>
        <div class="card-body">
            <form action="{{ route('sub_categories.update',$sub_category->id) }}" method="POST" enctype="multipart/form-data">
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
              <div class="mb-3 col-md-12">
                <label class="form-label" for="exampleFormControlTextarea1">Select Category</label>
                <select name="category_id" id="" class="form-control">
                    <option disabled selected>Select Category</option>
                    @foreach($category as $cat)
                        <option value="{{ $cat->id }}" @if($sub_category->category_id == $cat->id) selected @endif>{{ $cat->title }}</option>
                    @endforeach
                </select>
              </div>
              <div class="mb-3 col-md-6">
                <label for="title" class="form-label">Sub Category Title</label>
                <input
                  class="form-control"
                  type="text"
                  id="title"
                  name="title"
                  value="{{ $sub_category->title }}"
                  placeholder="Enter title..."
                  autofocus
                />
              </div>
              <div class="mb-3 col-md-4">
                <label for="image" class="form-label">Category Image</label>
                <input class="form-control" type="file" name="image" id="image"/>
              </div>
              <div class="mb-3 col-md-2">
                <img src="{{ asset('assets/sub_category/'.$sub_category->image) }}" alt="" width="70" class="mt-4 img-fluid">
              </div>
            </div>
            <div class="mt-2">
            <button type="submit" class="btn btn-primary me-2">Save</button>
            </div>
          </form>
        </div>
    </div>
</div>
@endsection