@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <form id="SignUp" action="{{ isset($user->id) ? route('user.update', $user->id) : route('user.store') }}"
        method="POST" enctype="multipart/form-data">
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
        <input type="hidden" id="id" name="id" value="{{ isset($user) ? $user->id : '' }}">
        <div class="card">
            <div class="card-body">
                <div class="row gutters" >
                    @if (isset($user))
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <!-- Gallery start -->
                                <div class="baguetteBoxThree gallery">
                                    <!-- Row start -->
                                    <div class="row gutters" id="selectedImage">
                                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-6">
                                            @if ($user->image != '')
                                                <a href="{{ asset('assets/images/' . $user->image) }}" >
                                                    <img src="{{ asset('assets/images/' . $user->image) }}"
                                                        class="img-responsive" width="90">
                                                    <div class="overlay">
                                                        <span class="expand">+</span>
                                                    </div>
                                                </a>
                                            @else
                                                <a href="{{ asset('assets/images/user.png') }}">
                                                    <img src="{{ asset('assets/images/user.png') }}" class="img-responsive" width="90"/>
                                                    <div class="overlay">
                                                        <span class="expand">+</span>
                                                    </div>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <input type="text" class="form-control" id="firstname" name="firstname"
                                placeholder="First Name *"
                                value="{{ isset($user->firstname) ? $user->firstname : '' }}" />
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <input type="text" class="form-control" id="lastname" name="lastname"
                                placeholder="Last Name *"
                                value="{{ isset($user->lastname) ? $user->lastname : '' }}" />
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-4">
                        <div class="form-group">
                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="Username *"
                                value="{{ isset($user->username) ? $user->username : '' }}" />
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-4">
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Email Address *"
                                value="{{ isset($user->email) ? $user->email : '' }}" />
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-4">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" value="{{ isset($user->image) ? $user->image : '' }}" id="image" name="image" />
                            <label class="custom-file-label custom-file-label-primary" for="image">Choose
                                profile Image</label>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-4">
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password" />
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-4">
                        <div class="form-group"
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" placeholder="Confirm Password" />
                        </div>
                    </div>
                </div>
                        <div id="formmodel">
            		</div>
                    <br>
                <div class="actions clearfix">
                    <button type="submit" class="btn btn-primary"><span class="icon-save2"></span>
                        @if ($result['method'] == 'add')
                            Save
                        @else
                            Update
                        @endif
                    </button>
                </div>
            </div></div>
    </form>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('.datepicker').datetimepicker({
            format: 'Y-m-d',
            timepicker: false,
            closeOnDateSelect: true,
            scrollInput: false,
            maxDate: 'now()',
        });
        // $(".validation").hide();
        $("#cross").on('click', function() {
            $(".validation").hide();
        });
	@if(isset($user))
		var id = '{{$user->id}}';
		var url = "{{route('modulesetting.editattribute',$user->id)}}";
	@else
		var page = 'user';
		var url = "{{route('modulesetting.getattribute','user')}}";
	@endif
	$.ajax({

        "url": url,
        success: function(data){
        		if(data != "false"){
                $("#formmodel").html(data);
            }
            },
      
 	}); 
        var selDiv = "";
        var storedFiles = [];
        $(document).ready(function() {

            $("#image").on("change", handleFileSelect);
            selDiv = $("#selectedImage");

        });

        function handleFileSelect(e) {
            var files = e.target.files;
            var filesArr = Array.prototype.slice.call(files);

            filesArr.forEach(function(f) {
                if (!f.type.match("image.*")) {
                    return;
                }

                storedFiles.push(f);

                var reader = new FileReader();

                reader.onload = function(e) {
                    var html = '<img style="width: 186px; height: 186px;" src="' + e.target.result + '" />';
                    console.log(html);
                    selDiv.html(html);

                }
                reader.readAsDataURL(f);
            });
        }
    });
</script>
@endsection
