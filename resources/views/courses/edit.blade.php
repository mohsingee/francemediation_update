@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <form action="{{ route('courses.update',$course->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
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
        <div class="card">
            <div class="card-body">
                <div class="row gutters">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">Select User</label>
                            <select name="instructor" id="" class="form-control">
                                <option disabled selected>Select Instructor</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" @if($course->instructor == $user->id) selected @endif>{{ $user->first_name.' '.$user->last_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlInput1">Course Title</label>
                            <input type="text" name="title" value="{{ $course->title }}" class="form-control" id="exampleFormControlInput1" placeholder="Enter title...">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                    </div>
                    <div class="col-2">
                        <img src="{{ asset('assets/courses/'.$course->image) }}" alt="" class="mt-4 img-fluid" width="90">
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">Category</label>
                            <select name="category" id="" class="form-control">
                                <option disabled selected>Select category</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" @if($course->category == $cat->id) selected @endif>{{ $cat->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">Sub Category</label>
                            <select name="sub_category" id="" class="form-control">
                                <option disabled selected>Select sub category</option>
                                <option value="1" @if($course->sub_category == 1) selected @endif>sub categroy 1</option>
                                <option value="2" @if($course->sub_category == 2) selected @endif>sub Category 2</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">Price</label>
                            <input type="text" name="price" value="{{ $course->price }}" class="form-control" placeholder="Enter price">
                        </div>
                    </div>
                </div>
                <br>
                <div class="actions clearfix">
                    <button type="submit" class="btn btn-primary"><span class="icon-save2"></span>
                            Update
                    </button>
                </div>
            </div></div>
    </form>
</div>
@endsection
