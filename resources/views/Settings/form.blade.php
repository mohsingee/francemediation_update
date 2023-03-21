@extends('layouts.app')
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>General Setting</h2>
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
                            <form action="{{ isset($settings[0]->id) ? route('setting.update', $settings[0]->id) : route('setting.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @if(isset($settings[0]->id))
                                    @method('put')
                                @endif
                                <div class="row clearfix">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="image" class="form-label">Logo</label>                                    
                                            <input type="file" class="form-control" name="file"/>                                   
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <img class="favicon-img" width="120" src="{{ asset('assets/images/' . $settings[0]->logo) }}" />
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group"> 
                                            <label for="image" class="form-label">Favicon</label>                                  
                                            <input type="file" class="form-control" name="favicon"/>                                    
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <img class="favicon-img" width="120" src="{{ asset('assets/images/' . $settings[0]->favicon) }}" />
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">   
                                            <label for="image" class="form-label">Footer Text</label>                                 
                                            <input type="text" class="form-control" name="footer_text" value="{{ isset($settings[0]->footer_text) ? $settings[0]->footer_text : '' }}" placeholder="Footer text..." />                                   
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