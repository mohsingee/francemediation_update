@extends('layouts.app')
@section('content')
<!-- Responsive Table -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
            <div class="daterange-container">
                <button id="delBtn" class="btn btn-danger btn-sm btn-edit">
                    <i class="icon-trash2"></i>
                    <span class="">Delete</span>
                </button>
            </div>
        </div>
        {{-- <div class="btn-group mt-2 pr-2 d-flex" style="float:right;">
            <button id="delBtn" class="btn btn-danger btn-sm btn-edit">
                <i class="icon-trash2"></i>
                <span class="">Delete</span>
            </button>
        </div> --}}
        <hr>
        <div class="table-responsive text-nowrap">
            <table id="datatable" class="table card-table">
                <thead>
                    <tr>
                        <th>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="checkalluser">
                                <label class="custom-control-label" for="checkalluser"></label>
                            </div>
                        </th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>User Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
  <!--/ Responsive Table -->
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('user.index') }}",
            columns: [{
                    data: 'check',
                    name: 'check',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'mergeColumn',
                    name: 'mergeColumn',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'username',
                    name: 'username'
                },
                {
                    data: 'status',
                    name: 'status',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

        $('#checkalluser').on('click', function(e) {
            if ($(this).is(':checked', true)) {
                $(".values").prop('checked', true);
            } else {
                $(".values").prop('checked', false);
            }
        });

        $("body").on('click', '.values', function(e) {
            if ($('.values:checked').length == $('.values').length) {
                $('#checkalluser').prop('checked', true);
            } else {
                $('#checkalluser').prop('checked', false);
            }
        });

        $('#delBtn').on('click', function(e) {
            var idsArr = [];
            $(".values:checked").each(function() {
                idsArr.push($(this).attr('id'));
            });
            if (idsArr.length <= 0) {
                alert("Please select atleast one record to delete.");
                return false;
            } else {
                var check = confirm("Are you sure you want to delete this row?");
                if (check == true) {
                    $.ajax({
                        url: '{{ route('user.delete-all') }}',
                        type: 'DELETE',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            ids: idsArr
                        },
                        success: function(data) {
                            if (data['success'] == true) {
                                $("#checkalluser").prop('checked', false);
                                table.ajax.reload();

                            } else {
                                alert('Something went wrong, Please try again!!');
                            }
                        },
                    });

                } else {
                    $(".values").prop('checked', false);
                    $("#checkalluser").prop('checked', false);
                }
            }
        });

        $("#cross").on('click', function() {
            $(".validation").hide();
        });
    });
</script>
@endsection