@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
        <h5 class="card-header">Add New Lecture</h5>
        <div class="card-body">
            <form action="{{ route('lectures.store') }}" method="POST" enctype="multipart/form-data">
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
              <div class="mb-3 col-md-6">
                <label class="form-label" for="exampleFormControlTextarea1">Select Course</label>
                <select name="course_id" id="" class="form-control">
                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                </select>
              </div>
              <div class="mb-3 col-md-6">
                <label for="title" class="form-label">Title</label>
                <input class="form-control" type="text" name="title" id="title" placeholder="Enter lecture title..."/>
              </div>
              <div class="mb-3 col-md-6">
                <label for="duration" class="form-label">Duration</label>
                <input class="form-control html-duration-picker" type="text" name="duration" id="duration"/>
              </div>
              <div class="mb-3 col-md-6">
                <label for="youtube_link" class="form-label">Youtube Link</label>
                <input class="form-control" type="text" name="youtube_link" id="youtube_link" placeholder="Enter youtube video link..."/>
              </div>
              <div class="mb-3 col-md-6">
                <label for="vimeo_link" class="form-label">Vimeo Link</label>
                <input class="form-control" type="text" name="vimeo_link" id="vimeo_link" placeholder="Enter vimeo video link..."/>
              </div>
              <div class="mb-3 col-md-6">
                <label for="file" class="form-label">Upload Files</label>
                <input class="form-control" type="file" name="file" id="file"/>
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