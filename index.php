
<!doctype html>
<html lang="en">
	<?php include ('include/head.php'); ?>
	<body>
		<?php include ('include/navbar.php'); ?>

		<main class="row justify-content-center my-2 mx-0">
			<div class="col-md-10">
				<div class="card">
					<h5 class="card-header bg-secondary text-center text-light">Add report</h5>
					<form action="#" method="post" enctype="multipart/form-data">
						<div class="card-body fw-bold">
							<div class="row">
								<div class="form-group col-md-4">
									<label for="name">Full name*</label>
									<input type="text" class="form-control" name="name" id="name"
										placeholder="Enter name" required>

								</div>
								<div class="form-group col-md-4">
									<label for="email">Email*</label>
									<input type="email" class="form-control" name="email" id="email"
										placeholder="Enter email" required>
									<!-- <div id="nameHelpBlock" class="form-text text-danger">
										Email must me valid.
									</div> -->
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
									<input type="text" class="form-control" name="city" id="city"
										placeholder="Enter city" required>
								</div>
								<div class="form-group col-md-4">
									<label for="item">Item name*</label>
									<input type="text" class="form-control" name="item" id="item"
										placeholder="Enter item" required>
								</div>
								<div class="form-group col-md-4">
									<label for="amount">Amount*</label>
									<input type="number" class="form-control" name="amount" min="1"
										id="amount" placeholder="Enter amount">
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-12">
									<label for="note">Note*</label>
									<textarea type="text" class="form-control summernote required"
										name="note" id="note" placeholder="Enter note"></textarea>
								</div>
							</div>
							<div class="row justify-content-md-center mt-2">
								<button type="submit" class="btn btn-success col-md-6">Save now</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</main>

		<!-- Modal -->
		<?php include ('include/modal/loginModal.php'); ?>
		<?php include ('include/footer.php'); ?>
	</body>
</html>
