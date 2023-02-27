@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
        <h5 class="card-header">Profile Details</h5>
        <div class="card-body">
            <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
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
                <label for="firstName" class="form-label">First Name</label>
                <input
                  class="form-control"
                  type="text"
                  id="firstName"
                  name="first_name"
                  placeholder="Enter name..."
                  autofocus
                />
              </div>
              <div class="mb-3 col-md-6">
                <label for="lastName" class="form-label">Last Name</label>
                <input class="form-control" type="text" name="last_name" id="lastName" placeholder="Enter last name..."/>
              </div>
              <div class="mb-3 col-md-6">
                <label for="email" class="form-label">E-mail</label>
                <input
                  class="form-control"
                  type="text"
                  id="email"
                  name="email"
                  placeholder="john.doe@example.com"
                />
              </div>
              <div class="mb-3 col-md-6">
                <label for="email" class="form-label">Password</label>
                <input
                  class="form-control"
                  type="password"
                  id="password"
                  name="password"
                  placeholder="Enter password..."
                />
              </div>
              <div class="mb-3 col-md-6">
                <label for="email" class="form-label">Area Code</label>
                <input
                  class="form-control"
                  type="text"
                  id="area_code"
                  name="area_code"
                  placeholder="Enter area code..."
                />
              </div>
              <div class="mb-3 col-md-6">
                <label class="form-label" for="phoneNumber">Phone Number</label>
                <div class="input-group input-group-merge">
                  <input
                    type="number"
                    id="phone_number"
                    name="phone_number"
                    class="form-control"
                    placeholder="Enter phone number..."
                  />
                </div>
              </div>
              <div class="mb-3 col-md-6">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Address" />
              </div>
              <div class="mb-3 col-md-6">
                <label for="postal_code" class="form-label">Postal Code</label>
                <input
                  type="text"
                  class="form-control"
                  id="postal_code"
                  name="postal_code"
                  placeholder="231465"
                  maxlength="6"
                />
              </div>
              <div class="mb-3 col-md-6">
                <label for="gender" class="form-label">Gender</label>
                <select id="gender" name="gender" class="select2 form-select">
                  <option selected disabled>Select Gender</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                  <option value="other">Other</option>
                </select>
              </div>
              <div class="mb-3 col-md-6">
                <label for="profile" class="form-label">Profile</label>
                <input type="file" class="form-control" id="profile" name="profile">
              </div>
            </div>
            <div class="mb-3 col-md-12">
                <label for="about_student" class="form-label">About Student</label>
                <textarea name="about_student" id="about_student" class="form-control" cols="30" rows="2" placeholder="About student..."></textarea>
            </div>
            <div class="mt-2">
              <button type="submit" class="btn btn-primary me-2">Save</button>
              <button type="reset" class="btn btn-outline-secondary">Cancel</button>
            </div>
          </form>
        </div>
    </div>
</div>
@endsection