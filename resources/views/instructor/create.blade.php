@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
        <h5 class="card-header">Profile Details</h5>
        <div class="card-body">
            <form action="{{ route('instructor.store') }}" method="POST" enctype="multipart/form-data">
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
                <label for="profession_title" class="form-label">Professional Title</label>
                <input
                  class="form-control"
                  type="text"
                  id="profession_title"
                  name="profession_title"
                  placeholder="Enter profession title..."
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
              <div class="mb-3 col-md-6">
                <label for="facebook" class="form-label">Facebook</label>
                <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Facebook link...">
              </div>
              <div class="mb-3 col-md-6">
                <label for="twitter" class="form-label">Twitter</label>
                <input type="text" class="form-control" id="twitter" name="twitter" placeholder="Twitter link...">
              </div>
              <div class="mb-3 col-md-6">
                <label for="linkedin" class="form-label">Linkedin</label>
                <input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="Linkedin link...">
              </div>
              <div class="mb-3 col-md-6">
                <label for="pinterest" class="form-label">Pinterest</label>
                <input type="text" class="form-control" id="pinterest" name="pinterest" placeholder="Pinterest link...">
              </div>
            </div>
            <div class="mb-3 col-md-12">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Address" />
              </div>
            <div class="mb-3 col-md-12">
                <label for="about_instructor" class="form-label">About Instructor</label>
                <textarea name="about_instructor" id="about_instructor" class="form-control" cols="30" rows="2" placeholder="About instructor..."></textarea>
            </div>
            <div class="mt-2">
              <button type="submit" class="btn btn-primary me-2">Save</button>
            </div>
          </form>
        </div>
    </div>
</div>
@endsection