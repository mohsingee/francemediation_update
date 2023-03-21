@extends('layouts.app')
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Edit Instructor</h2>
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
                </div>
            </div>
        </div>
        
        <div class="container-fluid">
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <form action="{{ route('instructor.update',$instructor->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">                                    
                                            <input type="text" class="form-control" name="first_name" value="{{ $instructor->first_name }}" placeholder="First Name..." />                                   
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">                                   
                                            <input type="text" class="form-control" name="last_name" value="{{ $instructor->last_name }}" placeholder="Last Name..."/>                                    
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">                                    
                                            <input type="text" class="form-control" name="email" value="{{ $instructor->email }}" placeholder="Email..." />                                   
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">                                   
                                            <input type="password" class="form-control" name="password" placeholder="Password..."/>                                    
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">                                    
                                            <input type="text" class="form-control" name="area_code" value="{{ $instructor->area_code }}" placeholder="Area code..." />                                   
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">                                   
                                            <input type="text" class="form-control" name="phone_number" value="{{ $instructor->phone_number }}" placeholder="Phone Number..."/>                                    
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">                                    
                                            <input type="text" class="form-control" name="postal_code" value="{{ $instructor->postal_code }}" placeholder="Postal code..." />                                   
                                        </div>
                                    </div>
                                    <div class="col-sm-6">                             
                                          <select id="gender" name="gender" class="form-control show-tick ms select2" data-placeholder="Select Gender">
                                            <option selected disabled>Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                          </select>                                   
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">                                    
                                            <input type="text" class="form-control" value="{{ $instructor->profession_title }}" name="profession_title" placeholder="Profession title..." />                                   
                                        </div>
                                    </div>
                                    <div class="col-sm-6">                             
                                      <div class="form-group">                                    
                                        <input type="file" class="form-control" name="profile" placeholder="Profile Image..." />                                   
                                      </div>                                   
                                    </div>
                                </div>
                                <div class="row clearfix">
                                  <div class="col-sm-6">
                                      <div class="form-group">                                    
                                          <input type="text" class="form-control" value="{{ $instructor->facebook }}" name="facebook" placeholder="Facebook..." />                                   
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="form-group">                                   
                                          <input type="text" class="form-control" value="{{ $instructor->twitter }}" name="twitter" placeholder="Twitter..."/>                                    
                                      </div>
                                  </div>
                                </div>
                                <div class="row clearfix">
                                  <div class="col-sm-6">
                                      <div class="form-group">                                    
                                          <input type="text" class="form-control" value="{{ $instructor->linkedin }}" name="linkedin" placeholder="Likedin..." />                                   
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="form-group">                                   
                                          <input type="text" class="form-control" value="{{ $instructor->pinterest }}" name="pinterest" placeholder="Pintrest..."/>                                    
                                      </div>
                                  </div>
                                </div>     
                                <div class="row clearfix">
                                  <div class="col-sm-12">
                                      <div class="form-group">                                    
                                          <input type="text" class="form-control" value="{{ $instructor->address }}" name="address" placeholder="Address..." />                                   
                                      </div>
                                  </div>
                                </div>     
                                <div class="row clearfix">
                                  <div class="col-sm-12">
                                      <div class="form-group">                                    
                                        <div class="form-line">
                                          <textarea rows="4" class="form-control no-resize" name="about_instructor" placeholder="About Instructor...">{{ $instructor->about_instructor }}</textarea>
                                        </div>                                   
                                      </div>
                                  </div>
                                </div>     
                                <div class="row clearfix">
                                    <div class="col-sm-12 text-right">
                                        <button type="submit" class="btn btn-sm btn-primary">Save changes</button>                                   
                                    </div>
                                </div> 
                            </form>           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection