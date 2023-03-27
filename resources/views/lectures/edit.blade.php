@extends('layouts.app')
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Add New Lecture</h2>
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
                            <form action="{{ route('lectures.update',$lecture->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                          <input type="text" class="form-control" value="{{ $lecture->course->title }}" disabled>
                                          <input type="hidden" class="form-control" name="course_id" value="{{ $lecture->course->id }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">                                   
                                            <input type="text" class="form-control" name="title" value="{{ $lecture->title }}" placeholder="Title..." />                                    
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">                                    
                                            <input type="date" class="form-control html-duration-picker" value="{{ $lecture->duration }}" name="duration" placeholder="Duration..." />                                   
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">                                   
                                            <input type="text" class="form-control" value="{{ $lecture->youtube_link }}" name="youtube_link" placeholder="Youtube link..." />                                    
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">                                    
                                            <input type="text" class="form-control" value="{{ $lecture->vimeo_link }}" name="vimeo_link" placeholder="Vimeo link..." />                                   
                                        </div>
                                    </div>
                                    @php if(empty($lecture->file)){
                                        $col = "col-sm-6";
                                    }else{
                                        $col = "col-sm-4";
                                    }
                                    @endphp
                                    <div class="{{ $col }}">
                                        <div class="form-group">                                   
                                            <input type="file" class="form-control" name="file"/>                                    
                                        </div>
                                    </div>
                                    @if($col =="col-sm-4")
                                    <div class="col-sm-2">
                                        <img src="{{ asset('assets/courses/lectures/'.$lecture->file) }}" alt="" width="80">
                                    </div>
                                    @endif
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