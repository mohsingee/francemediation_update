@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
        <h5 class="card-header">Update Password</h5>
        <div class="card-body">
            <form action="#" method="post">
			@csrf
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible" role="alert">
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br />
                    @endforeach
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row">
              <div class="mb-3 col-md-6">
                <label for="current_password" class="form-label">Current Password</label>
                <input class="form-control" type="text" name="current_password" placeholder="Enter current password..." id="current_password"/>
              </div>
              <div class="mb-3 col-md-6">
                <label for="new_password" class="form-label">New Password</label>
                <input class="form-control" type="text" name="new_password" placeholder="Enter new password..." id="new_password"/>
              </div>
              <div class="mb-3 col-md-4">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input class="form-control" type="password" name="confirm_password" placeholder="Enter confirm password..." id="confirm_password"/>
              </div>
            </div>
            <div class="mt-2">
            <button type="submit" class="btn btn-primary me-2">Update Password</button>
            </div>
          </form>
        </div>
    </div>
</div>
@endsection