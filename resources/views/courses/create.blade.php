@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
        <h5 class="card-header">Course Details</h5>
        <div class="card-body">
            <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
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
                <label class="form-label" for="exampleFormControlTextarea1">Select Instructor</label>
                <select name="instructor" id="" class="form-control">
                    <option disabled selected>Select Instructor</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->first_name.' '.$user->last_name }}</option>
                    @endforeach
                </select>
              </div>
              <div class="mb-3 col-md-6">
                <label for="thumbnail_img" class="form-label">Course Title</label>
                <input class="form-control" type="file" name="thumbnail_img" id="thumbnail_img"/>
              </div>
              <div class="mb-3 col-md-6">
                <label for="thumbnail_img" class="form-label">Image</label>
                <input class="form-control" type="file" name="thumbnail_img" id="thumbnail_img"/>
              </div>
              <div class="mb-3 col-md-6">
                <label class="form-label" for="exampleFormControlTextarea1">Category</label>
                <select name="category" id="categorySelected" class="form-control">
                    <option disabled selected>Select category</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                    @endforeach
                </select>
              </div>
              <div class="mb-3 col-md-6">
                <label class="form-label" for="exampleFormControlTextarea1">Sub Category</label>
                <select name="sub_category" id="subCategory" class="form-control">
                    <option disabled selected>Select sub category</option>
                </select>
              </div>
              <div class="mb-3 col-md-6">
                <label class="form-label" for="exampleFormControlTextarea1">Price</label>
                <input type="text" name="price" class="form-control" placeholder="Enter price">
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