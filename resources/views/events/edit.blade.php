@extends('layouts.app')
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Edit Event</h2>
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
                            <form action="{{ route('events.update',$event->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">                                    
                                            <input type="text" class="form-control" value="{{ $event->title }}" name="title" placeholder="Event Title..." />                                   
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">                                   
                                            <input type="text" class="form-control" value="{{ $event->author }}" name="author" placeholder="Event Author..." />                                    
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">                                    
                                            <input type="date" class="form-control" value="{{ $event->event_date }}" name="event_date" placeholder="Event Date..." />                                   
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">                                   
                                            <input type="text" class="form-control" value="{{ $event->event_duration }}" name="event_duration" placeholder="Event Duration..." />                                    
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-3">
                                        <div class="form-group">                                    
                                            <input type="file" class="form-control" name="thumbnail_img" placeholder="Thumbnail Image..." />                                   
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                      <img src="{{ asset('assets/events/'.$event->thumbnail_img) }}" alt="" width="70" class="mt-4">
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">                                   
                                            <input type="file" class="form-control" name="banner_img" placeholder="Banner Image..." />                                    
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                      <img src="{{ asset('assets/events/'.$event->banner_img) }}" alt="" width="70" class="mt-4">
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">                                   
                                            <input type="file" class="form-control" name="detail_img" placeholder="Detail Image..." />                                    
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                      <img src="{{ asset('assets/events/'.$event->detail_img) }}" alt="" width="70" class="mt-4">
                                    </div>
                                </div>           
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">                                    
                                          <div class="form-line">
                                            <textarea rows="4" class="form-control no-resize" name="short_description" placeholder="Short Descritpion...">{{ $event->short_description }}</textarea>
                                        </div>                                   
                                        </div>
                                    </div>
                                </div>           
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">                                    
                                          <div class="form-line">
                                            <textarea rows="4" class="form-control no-resize" name="long_description" placeholder="Long Description...">{{ $event->long_description }}</textarea>
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