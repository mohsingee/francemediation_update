@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <form action="{{ route('sub_categories.update',$category->id) }}" method="POST">
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
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlInput1">Category Title</label>
                            <input type="text" name="title" value="{{ $category->title }}" class="form-control" id="exampleFormControlInput1" placeholder="Enter title...">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                    </div>
                    <div class="col-2">
                        <img src="{{ asset('assets/category/'.$category->image) }}" alt="" width="90" class="img-fluid mt-4">
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