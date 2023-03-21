@extends('layouts.app')
@section('content')
<section class="content">
	<div class="">
		<div class="block-header">
			<div class="row">
				<div class="col-lg-7 col-md-6 col-sm-12">
					<h2>Dashboard</h2>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Aero</a></li>
						<li class="breadcrumb-item active">Dashboard 1</li>
					</ul>
					<button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
				</div>
				<div class="col-lg-5 col-md-6 col-sm-12">                
					<button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
				</div>
			</div>
		</div>
		@if(Auth::user()->role =='1')
		<div class="container-fluid">
			<div class="row clearfix">
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="card widget_2 big_icon traffic">
						<div class="body">
							<h6>Users</h6>
							<h2>{{$users}}
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="card widget_2 big_icon domains">
						<div class="body">
							<h6>CMS</h6>
							<h2>{{$cms}}
						</div>
					</div>
				</div>
			</div>
		</div>
		@endif
	</div>
</div>
@endsection