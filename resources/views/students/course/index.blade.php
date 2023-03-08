@extends('layouts.app')
@section('content')
@section('style')
<style>
.card-body {
    flex: 1 1 auto;
    padding: 0.5rem 0.5rem;
}
hr {
    margin: 0;
    color: #d9dee3;
    background-color: currentColor;
    border: 0;
    opacity: 1;
}
</style>
@endsection
<!-- Responsive Table -->
<div class="container-xxl flex-grow-1 container-p-y">
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {!! session()->get('success') !!}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!-- Form controls -->
    <div class="col-md-12">
        <div class="card mb-4">
          <h5 class="card-header">Search courses</h5>
          <div class="card-body">
            <div class="row">
                <div class="mb-3 col-md-6">
                  <label class="form-label" for="exampleFormControlTextarea1">Select Category</label>
                  <select name="category_id" id="categorySelected" class="form-select">
                      <option disabled selected>Select Category</option>
                      @foreach ($categories as $cat)
                          <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                      @endforeach
                  </select>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="exampleFormControlTextarea1">Select Sub Category</label>
                    <select name="category_id" id="subCategory" class="form-select">
                        <option disabled selected>Select Sub Category</option>
                    </select>
                </div>
            </div>
        </div>
      </div>
    </div>
    <div id="ajaxLoad"></div>
</div>
  <!--/ Responsive Table -->
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
$("body").on("change", "#subCategory", function () {
	let subcategory = $('#subCategory').val();
    var url = '{{ route("get-courses", ":subcategory") }}';
    url = url.replace(':subcategory', subcategory);
	$.ajax({
		type: "get",
		url: url,
		dataType: "json",
		success: function (response) {
			if (response.status==true) {
				$("#ajaxLoad").html(response.html);
			}
		},
		error: function (response) {},
	});
});
</script>
@endsection