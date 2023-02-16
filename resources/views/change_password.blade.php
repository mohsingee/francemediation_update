@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
		<form id="SignUp" action="#" method="post">
			@csrf
			<div class="card">
                <div class="card-body">
					<div class="row gutters">
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class="form-group">
								<input type="password" class="form-control" id="current_password" name="current_password" placeholder="Current Password *" />
							</div>
						</div>
					</div>
					<div class="row gutters">
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class="form-group">
								<input type="password" class="form-control" id="password" name="password" placeholder="New Password *" />
							</div>
						</div>
					</div>
					<div class="row gutters">
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class="form-group">
								<input type="password" class="form-control" id="confirm_assword" name="confirm_password" placeholder="Confirm Password *" />
							</div>
						</div>
					</div>
					<div class="actions clearfix">
						<button type="submit" class="btn btn-primary"><span class="icon-save2"></span> Update Password</button>
					</div>
				</div>
			</div>
		</form>
	</div>
@endsection