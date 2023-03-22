@extends('layouts.app')
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Add New Event</h2>
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
                            <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group"> 
                                            <label for="">Event Title</label>                                      
                                            <input type="text" class="form-control" name="title" placeholder="Event Title..." />                                   
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group"> 
                                            <label for="">Author Name</label>                                     
                                            <input type="text" class="form-control" name="author" placeholder="Event Author..." />                                    
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">  
                                            <label for="">Event Date</label>                                    
                                            <input type="date" class="form-control" name="event_date" placeholder="Event Date..." />                                   
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group"> 
                                            <label for="">Event Duration</label>                                     
                                            <input type="text" class="form-control" name="event_duration" placeholder="Event Duration..." />                                    
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-4">
                                        <div class="form-group"> 
                                            <label for="">Thumbnail Image</label>                                   
                                            <input type="file" class="form-control" name="thumbnail_img" placeholder="Thumbnail Image..." />                                   
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group"> 
                                            <label for="">Banner Image</label>                                   
                                            <input type="file" class="form-control" name="banner_img" placeholder="Banner Image..." />                                    
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group"> 
                                            <label for="">Detail Image</label>                                   
                                            <input type="file" class="form-control" name="detail_img" placeholder="Detail Image..." />                                    
                                        </div>
                                    </div>
                                </div>           
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">                                    
                                          <div class="form-line">
                                            <label for="">Short Description</label>   
                                            <textarea rows="4" class="form-control no-resize" name="short_description" placeholder="Short Descritpion..."></textarea>
                                        </div>                                   
                                        </div>
                                    </div>
                                </div>           
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">                                    
                                          <div class="form-line">
                                            <label for="">Long Description</label>
                                            <textarea rows="4" class="form-control no-resize" name="long_description" placeholder="Long Description..."></textarea>
                                        </div>                                   
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