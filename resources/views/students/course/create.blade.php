@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
        <h5 class="card-header">Select Course</h5>
        <div class="card-body">
            <form action="{{ route('user-course.store') }}" method="POST" enctype="multipart/form-data">
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
                <input type="hidden" name="cat_id" id="cat_id">
                <select name="sub_category" id="subCategory" class="form-control">
                    <option disabled selected>Select sub category</option>
                </select>
              </div>
              <div class="mb-3 col-md-6">
                <label class="form-label" for="exampleFormControlTextarea1">Courses</label>
                <select name="course" id="course" class="form-control">
                    <option disabled selected>Select course</option>
                </select>
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
				$("#cat_id").val(category);
                $("#subCategory").append('<option disabled selected>Select sub category</option>');
                $("#course").empty();
                $("#course").append('<option disabled selected>Select course</option>');
				$.each(response, function (key, value) {
					$("#subCategory").append('<option value="' + key + '">' + value + '</option>');
				});
			}
		},
		error: function (response) {},
	});
});
$("body").on("change", "#subCategory", function () {
	let category = $('#cat_id').val();
	let subCategory = $('#subCategory').val();
	$.ajax({
		type: "get",
		url: '{{ route("get-courses") }}',
		dataType: "json",
        data: {
			'category': category,
			'subCategory': subCategory,
		},
		success: function (response) {
			if (response) {
				$("#course").empty();
                $("#course").append('<option disabled selected>Select course</option>');
				$.each(response, function (key, value) {
					$("#course").append('<option value="' + key + '">' + value + '</option>');
				});
			}
		},
		error: function (response) {},
	});
});
</script>
@endsection