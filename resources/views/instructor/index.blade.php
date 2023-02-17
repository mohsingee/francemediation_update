@extends('layouts.app')
@section('content')
<!-- Responsive Table -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
            <div class="daterange-container">
                <a data-toggle="tooltip" class="btn btn-primary btn-sm btn-create"
                    href="{{ route('instructor.create') }}"><i class="icon-plus"></i> Add Instructor</a>
            </div>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true" id="cross">×</span></button>
                {!! session()->get('success') !!}
            </div>
        @endif
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
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
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
            ajax: "{{ route('instructor.index') }}",
            columns: [{
                    data: 'check',
                    name: 'check',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'first_name',
                    name: 'first_name'
                },
                {
                    data: 'last_name',
                    name: 'last_name'
                },
                {
                    data: 'email',
                    name: 'email'
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
                        url: '{{ route('instructor.delete-all') }}',
                        type: 'post',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            ids: idsArr
                        },
                        success: function(data) {

                            if (data['success'] == true) {
                                $(".values:checked").each(function() {
                                    $(this).parents("tr").remove();
                                    $('#checkalluser').prop('checked', false);
                                });

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
    });
</script>
@endsection