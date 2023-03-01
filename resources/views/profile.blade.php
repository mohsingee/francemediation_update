@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
        <h5 class="card-header">User Profile</h5>
        <div class="card-body">
            <form id="SignUp" action="{{route('admin.storeProfile')}}" method="post" enctype="multipart/form-data">
            @csrf
            @if (session()->has('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true" id="cross">×</span></button>
                    {!! session()->get('success') !!}
                </div>
            @endif
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
            <div class="row">
            @if ($user->image != '')
                <div class="mb-3 col-md-12">
                    @if ($user->image_flag == '0')
                        <a href="{{ asset('assets/images/' . $user->image) }}"
                            class="effects">
                            <img src="{{ asset('assets/images/' . $user->image) }}"
                                class="img-responsive">
                            <div class="overlay">
                                <span class="expand">+</span>
                            </div>
                        </a>
                    @else
                        <a href="{{ asset('assets/images/' . $user->image) }}"
                            class="effects">
                            <img src="{{ asset('assets/images/' . $user->image) }}"
                                class="img-responsive">
                            <div class="overlay">
                                <span class="expand">+</span>
                            </div>
                        </a>
                    @endif
                </div>
            @endif
                <div class="mb-3 col-md-6">
                    <label for="firstname" class="form-label">First Name</label>
                    <input class="form-control" type="text" id="firstname" name="firstname" value="{{ isset($user->firstname) ? $user->firstname : '' }}" placeholder="Enter title..."/>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="lastname" class="form-label">Last Name</label>
                    <input class="form-control" type="text" id="lastname" name="lastname" value="{{ isset($user->lastname) ? $user->lastname : '' }}" placeholder="Enter author name..."/>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="username" class="form-label">User Name</label>
                    <input class="form-control" id="username" type="text" name="username" value="{{ isset($user->username) ? $user->username : '' }}"/>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="image" class="form-label">Image</label>
                    <input class="form-control" type="file" name="image" id="image"/>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input class="form-control" type="text" id="email" value="{{ isset($user->email) ? $user->email : '' }}" name="email"/>
                </div>   
            </div>
            <div class="mt-2">
            <button type="submit" class="btn btn-primary me-2">
                @if ($result['method'] == 'add')
                    Save
                @else
                    Update
                @endif
            </button>
            </div>
          </form>
        </div>
    </div>
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
        //$(".validation").hide();
        $("#SignUp").on('submit', function(e) {
            //prevent Default functionality
            e.preventDefault();

            //get the action-url of the form
            var actionurl = e.currentTarget.action;
            //do your own request an handle the results
            $.ajax({
                url: actionurl,
                type: 'post',
                data: $("#SignUp").serialize(),
                success: function(data) {
                    var d = JSON.parse(data);
                    if (d.status === false) {
                        $(".validation").show();
                        var html =
                            '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" id="cross">×</span></button><i class="icon-warning2"></i><strong>Oh snap!</strong><ul></ul></div>';
                        $(".validation").html(html);
                        $(".validation").find("ul").html(d.validation);
                    } else {
                        window.location = "url('admin/user')";
                    }
                }
            });
        });

        $("#cross").on('click', function() {
            $(".validation").hide();
        })
        var id = 'user';
        var url = "{{route('modulesetting.editattribute',Auth::user()->id)}}";
        $.ajax({
            "url": url,
            success: function(data){
                if(data != "false"){
                    $("#div1").html(data);
                }
            },
        }); 
    });
</script>
@endsection