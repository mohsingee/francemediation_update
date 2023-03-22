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
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Search Courses</h2>
                    @if ($errors->any())
                        <div class="validation error">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true" id="cross">×</span></button>
                            <i class="icon-warning2"></i><strong>Oh snap!</strong><br>
                            @foreach ($errors->all() as $error)
                                {{ $error }}<br />
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="container-fluid">
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label" for="exampleFormControlTextarea1">Select Category</label>
                                        <select name="category_id" id="categorySelected" class="form-control show-tick ms select2">
                                            <option disabled selected>Select Category</option>
                                            @foreach ($categories as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label" for="exampleFormControlTextarea1">Select Sub Category</label>
                                        <select name="category_id" id="subCategory" class="form-control show-tick ms select2">
                                            <option disabled selected>Select Sub Category</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="ajaxLoad"></div>
                </div>
            </div>
        </div>
    </div>
</section>
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