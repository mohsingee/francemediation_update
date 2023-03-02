@extends('layouts.app')
@section('content')
<!-- Responsive Table -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <h5 class="card-header">Formations</h5>
        @if (session()->has('success'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true" id="cross">×</span></button>
                {!! session()->get('success') !!}
            </div>
        @endif
        <button class="btn btn-md btn-danger mb-2" id="delBtn">Delete Selected</button>
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

        $("#cross").on('click', function() {
            $(".validation").hide();
        });


        $('#myModal').on('shown.bs.modal', function() {
            $('#myInput').focus()
        })

        $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('formation.index') }}",
            columns: [{
                data: 'check',
                name: 'check',
                orderable: false,
                searchable: false
            },
                {
                    data: 'first_name',
                    name: 'first_name'
                },{
                    data: 'last_name',
                    name: 'last_name'
                },{
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
            // alert(idsArr);
            if (idsArr.length <= 0) {
                alert("Please select atleast one record to delete.");
                return false;
            } else {
                var check = confirm("Are you sure you want to delete this row?");
                if (check == true) {
                    //var join_selected_values = idsArr.join(",");
                    //alert(join_selected_values);
                    $.ajax({
                        url: '{{ route('formation.delete-all') }}',
                        type: 'DELETE',
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