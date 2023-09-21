
<script src="assets/jquery.min.js"></script>
<script src="assets/bootstrap.min.js"></script>
<script src="assets/summernote/summernote.min.js"></script>
<script src="assets/datatable/dataTables.min.js"></script>
<script src="assets/datepicker/datepicker.min.js"></script>


<script type="text/javascript">
	$(document).ready(function () {
		$('.table').DataTable();
	});

	$(document).ready(function () {
		$('.summernote').summernote();
	});

	$('#phone').change(function () {
		let total_length = this.value.length;
		if (total_length == '11') {
			$("#phone").val("88" + $("#phone").val());
		}
		else if (total_length == '10') {
			$("#phone").val("880" + $("#phone").val());
		}
		else {
			$("#phone").val();
		}
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

	$('.viewModal').click(function() {
		var id = $(this).data('id'); 

		<?php	
			$a='id';
		?>

		$('#id').val(<?php echo $a;?>);
	} );
</script>
