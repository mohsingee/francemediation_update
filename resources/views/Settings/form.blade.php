@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{!! $message !!}</strong>
        </div>
    @endif
    @if ($errors->any())
        <div class="validation error">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" id="cross">×</span></button>
            <i class="icon-warning2"></i><strong>Oh snap!</strong><br>
            @foreach ($errors->all() as $error)
            {{ $error }}<br />
            @endforeach
        </div>
        @endif
    <form id="Settings" action="{{ isset($settings[0]->id) ? route('setting.update', $settings[0]->id) : route('setting.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row gutters">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        @if (isset($settings[0]->logo))
                            <div class="form-group">
                                <img class="logo-img" width="120" src="{{ asset('assets/images/' . $settings[0]->logo) }}" />
                            </div>
                        @endif
                        <div class="custom-file">
                            <label for="image" class="form-label">Logo</label>
                            <input class="form-control" type="file" name="logo" id="logo" accept="image/*"/>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        @if (isset($settings[0]->favicon))
                            <div class="form-group">
                                <img class="favicon-img" width="120" src="{{ asset('assets/images/' . $settings[0]->favicon) }}" />
                            </div>
                        @endif
                        <div class="custom-file">
                            <label for="image" class="form-label">Favicon</label>
                            <input class="form-control" type="file" name="favicon" id="favicon" accept="image/*"/>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <input type="text" class="form-control" style="margin-top: 10px;" id="footer_text"
                                name="footer_text" placeholder="Put your copyright text here *"
                                value="{{ isset($settings[0]->footer_text) ? $settings[0]->footer_text : '' }}" />
                        </div>
                    </div>
                </div>
                <div class="actions clearfix">
                    <button type="submit" class="btn btn-primary" style="margin-top: 10px;"><span
                            class="icon-save2"></span>
                        @if ($result['method'] == 'add')
                            Save
                        @else
                            Update
                        @endif
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection