@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <form action="{{ route('sub_categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
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
                            <label class="form-label" for="exampleFormControlTextarea1">Select Category</label>
                            <select name="category_id" id="" class="form-control">
                                <option disabled selected>Select Category</option>
                                @foreach($category as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlInput1">Title</label>
                            <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Enter title...">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                    </div>
                </div>
                <br>
                <div class="actions clearfix">
                    <button type="submit" class="btn btn-primary"><span class="icon-save2"></span>
                            Save
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection