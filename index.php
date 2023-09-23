<!doctype html>
<html lang="en">
<?php include('pages/head.php'); ?>

<body>
	<?php include('pages/navbar.php'); ?>

	<div class="alert alert-warning alert-dismissible fade show" role="alert" id="abc" style="display:none;">
		<strong > !</strong>
		<button type="button" class="btn-close border border-primary rounded-circle my-3 me-2 p-1" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>

	<main class="row justify-content-center my-2 mx-0">
		<div class="col-md-10">
			<div class="card">
				<h5 class="card-header bg-secondary text-center text-light">Add report</h5>
				<!-- <form action="action/insert.php" method="post" enctype="multipart/form-data"> -->

					<div class="card-body fw-bold add_report">
						<div class="row">
							<div class="form-group col-md-4">
								<label for="buyer">Full name*</label>
								<input type="text" class="form-control" name="buyer" id="buyer" placeholder="Enter name"
									required>

							</div>
							<div class="form-group col-md-4">
								<label for="email">Email*</label>
								<input type="email" class="form-control" name="email" id="email"
									placeholder="Enter email" required>						
							</div>
							<div class="form-group col-md-4">
								<label for="phone">Mobile number*</label>
								<input type="number" class="form-control" name="phone" id="phone"
									placeholder="Enter phone">
							</div>
						</div>
						<div class="row my-2">
							<div class="form-group col-md-4">
								<label for="city">City*</label>
								<input type="text" class="form-control" name="city" id="city" placeholder="Enter city"
									required>
							</div>
							<div class="form-group col-md-4">
								<label for="items">Items name*</label>
								<input type="text" class="form-control" name="items" id="items" placeholder="Enter item"
									required>
							</div>
							<div class="form-group col-md-4">
								<label for="amount">Amount*</label>
								<input type="number" class="form-control" name="amount" min="1" id="amount"
									placeholder="Enter amount">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-12">
								<label for="note">Note*</label>
								<textarea type="text" class="form-control summernote required" name="note" id="note"
									placeholder="Enter note"></textarea>
							</div>
						</div>
						<div class="row justify-content-md-center mt-2">
							<button type="submit" class="btn btn-success col-md-6" value="Add" onclick="addReport()">Save now</button>
						</div>
					</div>
				<!-- </form> -->
			</div>
		</div>
	</main>

	<!-- Modal -->
	<?php 
		include('pages/modal/loginModal.php');
		include('pages/footer.php');
		unset($_SESSION['response']);		
	?>

	<script>
		function addReport() {
            var buyer = $('.add_report #buyer').val();
            var email = $('.add_report #email').val();
            var phone = $('.add_report #phone').val();
            var city = $('.add_report #city').val();
            var items = $('.add_report #items').val();
            var amount = $('.add_report #amount').val();
            var note = $('.add_report #note').val();

            $.ajax({
                type: 'post',
				url: "action/insert.php",
                data: {
                    buyer: buyer,
                    email: email,
                    phone: phone,
                    city: city,
                    items: items,
                    amount: amount,
                    note: note,
                },
				dataType: 'json',
                success: function (data) {
					// var respons = JSON.parse(JSON.stringify(data));
					$('.add_report input[type="text"], input[type="number"], input[type="email"]').val('');
					$('.summernote').summernote('reset');				
					toastr.options.closeButton = true;
					toastr.options.closeMethod = 'fadeOut';
					toastr.options.closeDuration = 100;
					toastr.success(data.message);   
                }
            })
        }
	</script>
</body>
</html>