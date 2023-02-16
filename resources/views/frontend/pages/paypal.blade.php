@extends('frontend.layouts.app')
@section('title','About us PAGE')
@section('main-content')
<div role="main" class="main">
    <section class="page-header page-header-classic page-header-sm" >
        <div class="container">
            <div class="row">
                <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                    <h1 data-title-border>À Propos De</h1>
                </div>
                <div class="col-md-4 order-1 order-md-2 align-self-center">
                    <ul class="breadcrumb d-block text-md-end">
                        <li><a href="{{url('/')}}">Accueil</a></li>
                        <li class="active">À Propos De</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">    	
            <div class="col-md-8 col-md-offset-2">        	
                <h3 class="text-center" style="margin-top: 30px;">Paypal Payment Gateway Integration In Laravel 8 - websolutionstuff.com</h3>
                <div class="panel panel-default" style="margin-top: 60px;">
    
                    @if ($message = Session::get('success'))
                    <div class="custom-alerts alert alert-success fade in">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                        {!! $message !!}
                    </div>
                    <?php Session::forget('success');?>
                    @endif
    
                    @if ($message = Session::get('error'))
                    <div class="custom-alerts alert alert-danger fade in">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                        {!! $message !!}
                    </div>
                    <?php Session::forget('error');?>
                    @endif
                    <div class="panel-heading"><b>Paywith Paypal</b></div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" id="payment-form" role="form" action="{!! URL::route('paypal') !!}" >
                            {{ csrf_field() }}
    
                            <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                                <label for="amount" class="col-md-4 control-label">Enter Amount</label>
    
                                <div class="col-md-6">
                                    <input id="amount" type="text" class="form-control" name="amount" value="{{ old('amount') }}" autofocus>
    
                                    @if ($errors->has('amount'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('amount') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Paywith Paypal
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
