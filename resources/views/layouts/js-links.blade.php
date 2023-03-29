<!-- Jquery Core Js --> 
<script src="{{ asset('assets/admin/bundles/libscripts.bundle.js') }}"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) --> 
<script src="{{ asset('assets/admin/bundles/vendorscripts.bundle.js') }}"></script> <!-- slimscroll, waves Scripts Plugin Js -->

<script src="{{ asset('assets/admin/bundles/jvectormap.bundle.js') }}"></script> <!-- JVectorMap Plugin Js -->
<script src="{{ asset('assets/admin/bundles/sparkline.bundle.js') }}"></script> <!-- Sparkline Plugin Js -->
<script src="{{ asset('assets/admin/bundles/c3.bundle.js') }}"></script>
<!-- Jquery DataTable Plugin Js --> 
<script src="{{ asset('assets/admin/bundles/datatablescripts.bundle.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/jquery-datatable/buttons/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/jquery-datatable/buttons/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/jquery-datatable/buttons/buttons.flash.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/jquery-datatable/buttons/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/jquery-datatable/buttons/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/pages/tables/jquery-datatable.js') }}"></script>

<script src="{{ asset('assets/admin/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/admin/js/pages/index.js') }}"></script>
<script src="{{ asset('sweetalert/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/duration-picker.js') }}"></script>
<script>
$("form").on('submit',function(e) {
    "use strict";
    e.preventDefault();
    var actionurl = e.currentTarget.action;
    $.ajax({
        url: actionurl,
        method: 'post',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(data) {
            if(data.status === false){
                Swal.fire({
					position: 'top-end',
					toast: true,
					timer: 2000,
					icon: 'error',
					text: data.message,
				});
            }else{
                Swal.fire({
                    position: 'top-end',
					toast: true,
					timer: 2000,
					icon: 'success',
					text: data.message,
				});
                window.setTimeout(function(){
                    window.location.reload()
                }, 2000)
            }
        }
    });
});

$('body').on('click', '.delete_btn', function () {
	let id = $(this).attr("data-id");
	let url = $(this).attr("data-url");
	Swal.fire({
		title: "Are you sure?",
		text: "You won't be able to revert this!",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Yes, delete it!",
	}).then((result) => {
		if (result.value) {
			$.ajaxSetup({
				headers: {
					"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
						"content"
					),
				},
			});
			$.ajax({
				type: "DELETE",
				url: url + "/" + id,
				dataType: "json",
				success: function (response) {
					Swal.fire("Deleted!", response.message, "success");
				},
				complete: function () {
					setTimeout(function () {
						location.reload();
					}, 2000);
				},
				error: function () {
					swal.fire(
						"!Opps ",
						"Something went wrong, try again later",
						"error"
					);
				},
			});
		}
	});
});
</script>

