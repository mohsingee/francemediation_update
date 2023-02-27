@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
        <h5 class="card-header">Events Detail</h5>
        <div class="card-body">
            <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
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
                <label class="form-label" for="exampleFormControlInput1">Event Title</label>
                <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Enter title...">
              </div>
              <div class="mb-3 col-md-6">
                <label class="form-label" for="exampleFormControlTextarea1">Event Date</label>
                <input type="date" name="event_date" class="form-control" placeholder="Event Date">
              </div>
              <div class="mb-3 col-md-6">
                <label class="form-label" for="exampleFormControlTextarea1">Event Duration</label>
                <input type="text" name="event_duration" class="form-control" placeholder="Event Duration">
              </div>
              <div class="mb-3 col-md-4">
                <label for="thumbnail_img" class="form-label">Thumbnail Image</label>
                <input class="form-control" type="file" name="thumbnail_img" id="thumbnail_img"/>
              </div>
              <div class="mb-3 col-md-4">
                <label for="banner_img" class="form-label">Banner Image</label>
                <input class="form-control" type="file" name="banner_img" id="banner_img"/>
              </div>
              <div class="mb-3 col-md-4">
                <label for="detail_img" class="form-label">Detail Image</label>
                <input class="form-control" type="file" name="detail_img" id="detail_img"/>
              </div>
            </div>
            <div class="mb-3 col-md-12">
                <label for="short_description" class="form-label">Short description</label>
                <textarea name="short_description" id="short_description" class="form-control" cols="30" rows="2" placeholder="Enter short description..."></textarea>
            </div>
            <div class="mb-3 col-md-12">
                <label for="long_description" class="form-label">Long description</label>
                <textarea name="long_description" id="long_description" class="form-control" cols="30" rows="2" placeholder="Enter long description..."></textarea>
            </div>
            <div class="mt-2">
            <button type="submit" class="btn btn-primary me-2">Save</button>
            </div>
          </form>
        </div>
    </div>
</div>
@endsection