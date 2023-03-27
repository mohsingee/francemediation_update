@extends('layouts.app')
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Add New Course</h2>
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
                            <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                      <div class="form-group">   
                                        <select name="instructor" class="form-control show-tick ms select2" data-placeholder="Select Instructor">
                                          <option selected disabled>Select Instructor</option>
                                          @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->first_name.' '.$user->last_name }}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-sm-6">
                                      <div class="form-group">   
                                        <input type="text" class="form-control" name="title" placeholder="Course Title...">
                                      </div>
                                    </div>
                                </div>   
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                      <div class="form-group">   
                                        <select name="category" id="categorySelected" class="form-control show-tick ms select2" data-placeholder="Select Category">
                                          <option selected disabled>Select Category</option>
                                          @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-sm-6">
                                      <div class="form-group">   
                                        <select name="sub_category" id="subCategory" class="form-control show-tick ms select2" data-placeholder="Select Sub Category">
                                          <option disabled selected>Select sub category</option>
                                        </select>
                                      </div>
                                    </div>
                                </div>   
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">                                    
                                            <input type="file" class="form-control" name="image"/>
                                            <span class="text-danger">(Image perfect size: 300*168)</span>                                   
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">                                   
                                            <input type="number" class="form-control" name="price" placeholder="Course Price..."/>                                    
                                        </div>
                                    </div>
                                </div>   
                                <div class="row clearfix">
                                    <div class="col-sm-12 text-right">
                                        <button type="submit" class="btn btn-sm btn-primary">Save changes</button>                                   
                                    </div>
                                </div> 
                            </form>           
                        </div>
                    </div>
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
</script>
@endsection