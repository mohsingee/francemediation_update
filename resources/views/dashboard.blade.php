@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
	<div class="row">
	  <div class="col-lg-12 mb-4 order-0">
		<div class="card">
		  <div class="d-flex align-items-end row">
			<div class="col-sm-7">
			  <div class="card-body">
				<h5 class="card-title text-primary">Welcome! 🎉</h5>
				<p class="mb-4">
				  You have done <span class="fw-bold">72%</span> more sales today. Check your new badge in
				  your profile.
				</p>

				<a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>
			  </div>
			</div>
			<div class="col-sm-5 text-center text-sm-left">
			  <div class="card-body pb-0 px-0 px-md-4">
				<img
				  src="{{ asset('assets/admin/img/illustrations/man-with-laptop-light.png') }}"
				  height="140"
				  alt="View Badge User"
				  data-app-dark-img="illustrations/man-with-laptop-dark.png"
				  data-app-light-img="illustrations/man-with-laptop-light.png"
				/>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	  @if(Auth::user()->role =='1')
	  <div class="col-lg-12 col-md-4 order-1">
		<div class="row">
		  <div class="col-lg-6 col-md-12 col-6 mb-4">
			<div class="card">
			  <div class="card-body">
				<div class="card-title d-flex align-items-start justify-content-between">
				  <div class="avatar flex-shrink-0">
					<img
					  src="{{ asset('assets/admin/img/icons/unicons/users.png') }}"
					  alt="chart success"
					  class="rounded"
					/>
				  </div>
				  <div class="dropdown">
					<button
					  class="btn p-0"
					  type="button"
					  id="cardOpt3"
					  data-bs-toggle="dropdown"
					  aria-haspopup="true"
					  aria-expanded="false"
					>
					  <i class="bx bx-dots-vertical-rounded"></i>
					</button>
					<div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
					  <a class="dropdown-item" href="javascript:void(0);">View More</a>
					  <a class="dropdown-item" href="javascript:void(0);">Delete</a>
					</div>
				  </div>
				</div>
				<span class="fw-semibold d-block mb-1">Users</span>
				<h3 class="card-title mb-2">{{$users}}</h3>
			  </div>
			</div>
		  </div>
		  <div class="col-lg-6 col-md-12 col-6 mb-4">
			<div class="card">
			  <div class="card-body">
				<div class="card-title d-flex align-items-start justify-content-between">
				  <div class="avatar flex-shrink-0">
					<img
					  src="{{ asset('assets/admin/img/icons/unicons/wallet-info.png') }}"
					  alt="Credit Card"
					  class="rounded"
					/>
				  </div>
				  <div class="dropdown">
					<button
					  class="btn p-0"
					  type="button"
					  id="cardOpt6"
					  data-bs-toggle="dropdown"
					  aria-haspopup="true"
					  aria-expanded="false"
					>
					  <i class="bx bx-dots-vertical-rounded"></i>
					</button>
					<div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
					  <a class="dropdown-item" href="javascript:void(0);">View More</a>
					  <a class="dropdown-item" href="javascript:void(0);">Delete</a>
					</div>
				  </div>
				</div>
				<span>CMS</span>
				<h3 class="card-title text-nowrap mb-1">{{$cms}}</h3>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	  @endif
	</div>
  </div>
@endsection