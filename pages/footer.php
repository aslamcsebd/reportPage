
<script src="assets/jquery.min.js"></script>
<script src="assets/bootstrap.min.js"></script>
<script src="assets/summernote/summernote.min.js"></script>
<script src="assets/datatable/dataTables.min.js"></script>
<script src="assets/datepicker/datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$('.table').DataTable();
	});

	$(document).ready(function () {
		$('.summernote').summernote({
			inheritPlaceholder: true,
			placeholder: 'Please insert items note...',
		});
		$('.summernote').summernote('code', ''); //This line remove summercontent when load
	});


	// Room status
	$("#withUser").click(function () {
		var chkFormationDept = document.getElementById("withUser").checked;
		if (chkFormationDept) {
			$('#withUserStatus [data_id="withUserAction"]').parent().removeClass('active').css('display', 'block');
			$('#noUserStatus [data_id="noUserAction"]').parent().removeClass('active').css('display', 'none');
		}
	})
	$("#noUser").click(function () {
		var chkFormationDept = document.getElementById("noUser").checked;
		if (chkFormationDept) {
			$('#withUserStatus [data_id="withUserAction"]').parent().removeClass('active').css('display', 'none');
			$('#noUserStatus [data_id="noUserAction"]').parent().removeClass('active').css('display', 'block');
		}
	})

	$(".datepicker").datepicker({
         format: "dd-mm-yyyy",
         startDate: new Date()
         //  minDate:0,
         // startView: "months", 
         // minViewMode: "months"
    });	

	// Alert message duration
	window.setTimeout(function(){
		$(".alert").fadeTo(500, 0).slideUp(500, function(){
			$(this).remove(); 
		});
	}, 3000);
</script>
