@extends('layouts.app')
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Formations</h2>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
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
            </div>
        </div>

        <div class="container-fluid">

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <form id="Settings" action="{{ isset($settings[0]->id) ? route('setting.update', $settings[0]->id) : route('setting.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
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
                                    <button type="submit" class="btn btn-primary" style="margin-top: 10px;">
                                        <span class="icon-save2"></span>
                                        @if ($result['method'] == 'add')
                                            Save
                                        @else
                                            Update
                                        @endif
                                    </button>
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