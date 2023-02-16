@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <form action="{{ route('instructor.store') }}" method="POST" enctype="multipart/form-data">
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
                            <input type="text" name="first_name" class="form-control" id="exampleFormControlInput1" placeholder="Enter first name">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">Last Name</label>
                            <input type="text" name="last_name" class="form-control" placeholder="Enter last name">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter email">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter password">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">Professional Title</label>
                            <input type="text" name="profession_title" class="form-control" placeholder="Enter professional title">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">Area Code</label>
                            <input type="text" name="area_code" class="form-control" placeholder="Enter area code">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">Phone Number</label>
                            <input type="number" name="phone_number" class="form-control" placeholder="Enter phone number">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">Address</label>
                            <input type="text" name="address" class="form-control" placeholder="Enter address">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">Postal Code</label>
                            <input type="text" name="postal_code" class="form-control" placeholder="Enter postal code">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Country</label>
                            <select name="country" id="" class="form-control">
                                <option value="Pak">Pakistan</option>
                                <option value="Ind">India</option>
                                <option value="Usa">America</option>
                                <option value="Fr">France</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">State</label>
                            <select name="state" id="" class="form-control">
                                <option value="punjab">Punjab</option>
                                <option value="kpk">KPK</option>
                                <option value="balochistan">Balochistan</option>
                                <option value="sindh">Sindh</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">City</label>
                            <select name="city" id="" class="form-control">
                                <option value="lahore">Lahore</option>
                                <option value="islamabad">Islamabad</option>
                                <option value="faislabad">Faislabad</option>
                                <option value="karachi">Karachi</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Gender</label>
                            <select name="gender" id="" class="form-control">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">Facebook</label>
                            <input type="text" class="form-control" name="facebook" placeholder="https://facebook.com">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">Twitter</label>
                            <input type="text" class="form-control" name="twitter" placeholder="https://twitter.com">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">Linkedin</label>
                            <input type="text" class="form-control" name="linkedin" placeholder="https://linkedin.com">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">Pinterest</label>
                            <input type="text" class="form-control" name="pinterest" placeholder="https://pinterest.com">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">About Instructor</label>
                            <textarea class="form-control" name="about_instructor" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">Profile</label>
                            <input type="file" class="form-control" name="profile">
                        </div>
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