@extends('layouts.app')
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Add Sub Category</h2>
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
                            <form action="{{ route('sub_categories.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                      <div class="form-group">   
                                        <select name="category_id" class="form-control show-tick ms select2" data-placeholder="Select Category">
                                          <option selected disabled>Select Category</option>
                                          @foreach($category as $cat)
                                              <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                    </div>
                                </div>   
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">                                    
                                            <input type="text" class="form-control" name="title" placeholder="Sub Category Title..." />                                   
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">                                   
                                            <input type="file" class="form-control" name="image" placeholder="Sub Category Image..."/>                                    
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