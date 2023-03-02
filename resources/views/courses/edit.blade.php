@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
        <h5 class="card-header">Edit Course Details</h5>
        <div class="card-body">
            <form action="{{ route('courses.update',$course->id) }}" method="POST" enctype="multipart/form-data">
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
                <label class="form-label" for="exampleFormControlTextarea1">Select Instructor</label>
                <select name="instructor" id="" class="form-control">
                    <option disabled selected>Select Instructor</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" @if($course->instructor == $user->id) selected @endif>{{ $user->first_name.' '.$user->last_name }}</option>
                    @endforeach
                </select>
              </div>
              <div class="mb-3 col-md-6">
                <label for="title" class="form-label">Course Title</label>
                <input class="form-control" type="text" value="{{ $course->title }}" name="title" id="title" placeholder="Enter course title..."/>
              </div>
              <div class="mb-3 col-md-6">
                <label class="form-label" for="exampleFormControlTextarea1">Category</label>
                <select name="category" id="categorySelected" class="form-control">
                    <option disabled selected>Select category</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" @if($course->category == $cat->id) selected @endif>{{ $cat->title }}</option>
                    @endforeach
                </select>
              </div>
              <div class="mb-3 col-md-6">
                <label class="form-label" for="exampleFormControlTextarea1">Sub Category</label>
                <select name="sub_category" id="subCategory" class="form-control">
                    @foreach($sub_categories as $subCat)
                        <option value="{{ $subCat->id }}" @if($course->sub_category == $subCat->id) selected @endif>{{ $subCat->title }}</option>
                    @endforeach
                </select>
              </div>
              <div class="mb-3 col-md-4">
                <label for="image" class="form-label">Image</label>
                <input class="form-control" type="file" name="image" id="image"/>
              </div>
              <div class="mb-3 col-md-2">
                <img src="{{ asset('assets/courses/'.$course->image) }}" alt="" class="mt-4 img-fluid" width="70">
              </div>
              <div class="mb-3 col-md-6">
                <label class="form-label" for="exampleFormControlTextarea1">Price</label>
                <input type="text" name="price" class="form-control" value="{{ $course->price }}" placeholder="Enter price">
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
@section('scripts')
<script>
$("body").on("change", "#categorySelected", function () {
	let category = $('#categorySelected').val();
    var url = '{{ route("get-sub-category", ":category") }}';
    url = url.replace(':category', category);
	$.ajax({
		type: "get",
		url: url,
		dataType: "json",
		success: function (response) {
			if (response) {
				$("#subCategory").empty();
                $("#subCategory").append('<option disabled selected>Select sub category</option>');
				$.each(response, function (key, value) {
					$("#subCategory").append('<option value="' + key + '">' + value + '</option>');
				});
			} else {
				$("#subCategory").empty();
				$("#subCategory").append('<option>Select Category First</option>');
			}
		},
		error: function (response) {},
	});
});
</script>
@endsection