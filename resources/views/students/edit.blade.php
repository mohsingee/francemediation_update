@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
        <h5 class="card-header">Edit Profile Details</h5>
        <div class="card-body">
            <form action="{{ route('students.update',$student->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
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
                  value="{{ $student->first_name }}"
                  placeholder="Enter name..."
                  autofocus
                />
              </div>
              <div class="mb-3 col-md-6">
                <label for="lastName" class="form-label">Last Name</label>
                <input class="form-control" type="text" value="{{ $student->last_name }}" name="last_name" id="lastName" placeholder="Enter last name..."/>
              </div>
              <div class="mb-3 col-md-6">
                <label for="email" class="form-label">E-mail</label>
                <input
                  class="form-control"
                  type="text"
                  id="email"
                  name="email"
                  value="{{ $student->email }}"
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
                  value="{{ $student->password }}"
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
                  value="{{ $student->area_code }}"
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
                    value="{{ $student->phone_number }}"
                    placeholder="Enter phone number..."
                  />
                </div>
              </div>
              <div class="mb-3 col-md-6">
                <label for="address" class="form-label">Address</label>
                <input type="text" value="{{ $student->address }}" class="form-control" id="address" name="address" placeholder="Address" />
              </div>
              <div class="mb-3 col-md-6">
                <label for="postal_code" class="form-label">Postal Code</label>
                <input
                  type="text"
                  class="form-control"
                  id="postal_code"
                  name="postal_code"
                  value="{{ $student->postal_code }}"
                  placeholder="231465"
                  maxlength="6"
                />
              </div>
              <div class="mb-3 col-md-6">
                <label for="gender" class="form-label">Gender</label>
                <select id="gender" name="gender" class="select2 form-select">
                    <option value="male" @if($student->gender =="male") selected @endif>Male</option>
                    <option value="female" @if($student->gender =="female") selected @endif>Female</option>
                    <option value="other" @if($student->gender =="other") selected @endif>Other</option>
                </select>
              </div>
              <div class="mb-3 col-md-4">
                <label for="profile" class="form-label">Profile</label>
                <input type="file" class="form-control" id="profile" name="profile">
              </div>
              <div class="mb-3 col-md-2">
                <img src="{{ asset('assets/students/'.$student->profile) }}" class="img-fluid mt-4" alt="" width="70">
              </div>
            </div>
            <div class="mb-3 col-md-12">
                <label for="about_student" class="form-label">About Student</label>
                <textarea name="about_student" id="about_student" class="form-control" cols="30" rows="2" placeholder="About student...">{{ $student->about_student }}</textarea>
            </div>
            <div class="mt-2">
              <button type="submit" class="btn btn-primary me-2">Save changes</button>
              <button type="reset" class="btn btn-outline-secondary">Cancel</button>
            </div>
          </form>
        </div>
    </div>
</div>
@endsection