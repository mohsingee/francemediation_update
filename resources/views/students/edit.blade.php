@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <form action="{{ route('students.update',$student->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
            <div class="validation error">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true" id="cross">×</span></button>
                <i class="icon-warning2"></i><strong>Oh snap!</strong><br>
                @foreach ($errors->all() as $error)
                    {{ $error }}<br />
                @endforeach
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <div class="row gutters">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlInput1">First Name</label>
                            <input type="text" name="first_name" value="{{ $student->first_name }}" class="form-control" id="exampleFormControlInput1" placeholder="Enter first name">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">Last Name</label>
                            <input type="text" name="last_name" value="{{ $student->last_name }}" class="form-control" placeholder="Enter last name">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $student->email }}" placeholder="Enter email">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">Password</label>
                            <input type="password" name="password" class="form-control" value="{{ $student->password }}" placeholder="Enter password">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">Area Code</label>
                            <input type="text" name="area_code" value="{{ $student->area_code }}" class="form-control" placeholder="Enter area code">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">Phone Number</label>
                            <input type="number" name="phone_number" value="{{ $student->phone_number }}" class="form-control" placeholder="Enter phone number">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">Address</label>
                            <input type="text" name="address" class="form-control" value="{{ $student->address }}" placeholder="Enter address">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">Postal Code</label>
                            <input type="text" name="postal_code" class="form-control" value="{{ $student->postal_code }}" placeholder="Enter postal code">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">Country</label>
                            <select name="country" id="" class="form-control">
                                <option value="Pak" @if($student->country =="Pak") selected @endif></option>)>Pakistan</option>
                                <option value="Ind" @if($student->country =="Ind") selected @endif>India</option>
                                <option value="Usa" @if($student->country =="Usa") selected @endif>America</option>
                                <option value="Fr" @if($student->country =="Fr") selected @endif>France</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">State</label>
                            <select name="state" id="" class="form-control">
                                <option value="punjab" @if($student->state =="punjab") selected @endif>Punjab</option>
                                <option value="kpk" @if($student->state =="kpk") selected @endif>KPK</option>
                                <option value="balochistan" @if($student->state =="balochistan") selected @endif>Balochistan</option>
                                <option value="sindh" @if($student->state =="sindh") selected @endif>Sindh</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">City</label>
                            <select name="city" id="" class="form-control">
                                <option value="lahore" @if($student->city =="lahore") selected @endif>Lahore</option>
                                <option value="islamabad" @if($student->city =="islamabad") selected @endif>Islamabad</option>
                                <option value="faislabad" @if($student->city =="faislabad") selected @endif>Faislabad</option>
                                <option value="karachi" @if($student->city =="karachi") selected @endif>Karachi</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">Gender</label>
                            <select name="gender" id="" class="form-control">
                                <option value="male" @if($student->gender =="male") selected @endif>Male</option>
                                <option value="female" @if($student->gender =="female") selected @endif>Female</option>
                                <option value="other" @if($student->gender =="other") selected @endif>Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">About Student</label>
                            <textarea class="form-control" name="about_student" id="exampleFormControlTextarea1" rows="3">{{ $student->about_student }}</textarea>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">Profile</label>
                            <input type="file" class="form-control" name="profile">
                        </div>
                    </div>
                    <div class="col-2">
                        <img src="{{ asset('assets/students/'.$student->profile) }}" class="img-fluid mt-4" alt="" width="90">
                    </div>
                    
                </div>
                <br>
                <div class="actions clearfix">
                    <button type="submit" class="btn btn-primary"><span class="icon-save2"></span>
                            Update
                    </button>
                </div>
            </div></div>
    </form>
</div>
@endsection