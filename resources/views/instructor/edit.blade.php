@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <form action="{{ route('instructor.update',$instructor->id) }}" method="POST" enctype="multipart/form-data">
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
                            <input type="text" name="first_name" value="{{ $instructor->first_name }}" class="form-control" id="exampleFormControlInput1" placeholder="Enter first name">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">Last Name</label>
                            <input type="text" name="last_name" value="{{ $instructor->last_name }}" class="form-control" placeholder="Enter last name">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $instructor->email }}" placeholder="Enter email">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">Password</label>
                            <input type="password" name="password" class="form-control" value="{{ $instructor->password }}" placeholder="Enter password">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">Professional Title</label>
                            <input type="text" name="profession_title" value="{{ $instructor->profession_title }}" class="form-control" placeholder="Enter professional title">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">Area Code</label>
                            <input type="text" name="area_code" value="{{ $instructor->area_code }}" class="form-control" placeholder="Enter area code">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">Phone Number</label>
                            <input type="number" name="phone_number" value="{{ $instructor->phone_number }}" class="form-control" placeholder="Enter phone number">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">Address</label>
                            <input type="text" name="address" class="form-control" value="{{ $instructor->address }}" placeholder="Enter address">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">Postal Code</label>
                            <input type="text" name="postal_code" class="form-control" value="{{ $instructor->postal_code }}" placeholder="Enter postal code">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">Country</label>
                            <select name="country" id="" class="form-control">
                                <option value="Pak" @if($instructor->country =="Pak") selected @endif></option>)>Pakistan</option>
                                <option value="Ind" @if($instructor->country =="Ind") selected @endif>India</option>
                                <option value="Usa" @if($instructor->country =="Usa") selected @endif>America</option>
                                <option value="Fr" @if($instructor->country =="Fr") selected @endif>France</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">State</label>
                            <select name="state" id="" class="form-control">
                                <option value="punjab" @if($instructor->state =="punjab") selected @endif>Punjab</option>
                                <option value="kpk" @if($instructor->state =="kpk") selected @endif>KPK</option>
                                <option value="balochistan" @if($instructor->state =="balochistan") selected @endif>Balochistan</option>
                                <option value="sindh" @if($instructor->state =="sindh") selected @endif>Sindh</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">City</label>
                            <select name="city" id="" class="form-control">
                                <option value="lahore" @if($instructor->city =="lahore") selected @endif>Lahore</option>
                                <option value="islamabad" @if($instructor->city =="islamabad") selected @endif>Islamabad</option>
                                <option value="faislabad" @if($instructor->city =="faislabad") selected @endif>Faislabad</option>
                                <option value="karachi" @if($instructor->city =="karachi") selected @endif>Karachi</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">Gender</label>
                            <select name="gender" id="" class="form-control">
                                <option value="male" @if($instructor->gender =="male") selected @endif>Male</option>
                                <option value="female" @if($instructor->gender =="female") selected @endif>Female</option>
                                <option value="other" @if($instructor->gender =="other") selected @endif>Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">Facebook</label>
                            <input type="text" class="form-control" value="{{ $instructor->facebook }}" name="facebook" placeholder="https://facebook.com">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">Twitter</label>
                            <input type="text" class="form-control" name="twitter" value="{{ $instructor->twitter }}" placeholder="https://twitter.com">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">Linkedin</label>
                            <input type="text" class="form-control" name="linkedin" value="{{ $instructor->linkedin }}" placeholder="https://linkedin.com">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">Pinterest</label>
                            <input type="text" class="form-control" name="pinterest" value="{{ $instructor->pinterest }}" placeholder="https://pinterest.com">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">About Instructor</label>
                            <textarea class="form-control" name="about_instructor" id="exampleFormControlTextarea1" rows="3">{{ $instructor->about_instructor }}</textarea>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">Profile</label>
                            <input type="file" class="form-control" name="profile">
                        </div>
                    </div>
                    <div class="col-2">
                        <img src="{{ asset('assets/instructor/'.$instructor->profile) }}" class="img-fluid mt-4" alt="" width="90">
                    </div>
                    
                </div>
                <br>
                <div class="actions clearfix">
                    <button type="submit" class="btn btn-primary"><span class="icon-save2"></span>
                            Save
                    </button>
                </div>
            </div></div>
    </form>
</div>
@endsection