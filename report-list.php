<?php
session_start();
if (!isset($_SESSION['login'])) {
	header("location: index.php");
}
?>
<!doctype html>
<html lang="en">
<?php include('pages/head.php'); ?>

<body>
	<?php include('pages/navbar.php'); ?>

	<main class="container-fluid row justify-content-center my-2 mx-0">
		<div class="col-md-12">
			<div class="card-body p-1">
				<form action="#" method="post" enctype="multipart/form-data">
					<fieldset class="form-group py-2 mb-1">
						<legend class="mb-0">Search report</legend>
						<div class="row justify-content-center fw-bold">
							<div class="form-group col-auto">
								<label for="start">Filter type*</label>
								<div class="border border-secondary rounded py-1 mt-2">
									<div class="radio-toolbar form-check form-check-inline">
										<div class="form-check form-check-inline">
											<input type="radio" id="withUser" class="form-check-input" name="filterType"
												value="withUser" checked required>
											<label for="withUser">Date range</label>
										</div>
										<div class="form-check form-check-inline">
											<input type="radio" id="noUser" class="form-check-input" name="filterType"
												value="noUser" required>
											<label for="noUser">User id</label>
										</div>
									</div>
								</div>
							</div>
							<div class="col-auto" id="withUserStatus">
								<div class="row justify-content-center" data_id="withUserAction">
									<div class="form-group col-md-4">
										<label for="startDate">Start date*</label>
										<input type="text" class="form-control datepicker mt-2 text-center"
											name="startDate" id="startDate"
											value="<?php ($startDate = $startDate ?? '') ?>"
											placeholder="Day-Month-Year" required onfocus="clearInput(this)" />
									</div>

									<div class="form-group col-md-4">
										<label for="endDate">End date*</label>
										<input type="text" class="form-control datepicker mt-2 text-center"
											name="endDate" id="endDate" value="<?php ($endDate = $endDate ?? '') ?>"
											placeholder="Day-Month-Year" required onfocus="clearInput2(this)" />
									</div>

									<div class="form-group col-md-4">
										<label for="userId">User id*</label>
										<input type="text" class="form-control mt-2 p-1 text-center" name="userId"
											id="userId" value="" placeholder="Enter user id" required />
									</div>
								</div>
							</div>

							<div class="hide col-auto" id="noUserStatus">
								<div class="row justify-content-center" data_id="noUserAction">
									<div class="form-group col-md-6">
										<label for="startDate">Start date*</label>
										<input type="text" class="form-control datepicker mt-2 text-center"
											name="startDate" id="startDate"
											value="<?php ($startDate = $startDate ?? '') ?>"
											placeholder="Day-Month-Year" required onfocus="clearInput(this)" />
									</div>

									<div class="form-group col-md-6">
										<label for="endDate">End date*</label>
										<input type="text" class="form-control datepicker mt-2 text-center"
											name="endDate" id="endDate" value="<?php ($endDate = $endDate ?? '') ?>"
											placeholder="Day-Month-Year" required onfocus="clearInput2(this)" />
									</div>
								</div>
							</div>

							<div class="form-group col-auto pt-2">
								<button type="submit" class="btn btn-outline-success mt-4 py-1" {{ isset($disabled)
									? 'disabled' : '' }}>
									<i class="fa-solid fa-magnifying-glass"></i> &nbsp; Search now
								</button>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
		<div class="col-md-12">
			<div class="card">
				<h6 class="card-header bg-secondary text-center text-light py-1 m-1">Report list</h6>
				<div class="card-body p-1">
					<table class="table table-bordered">
						<thead class="bg-info">
							<th>Sl</th>
							<th>Name</th>
							<th>Email</th>
							<th>Mobile</th>
							<th>City</th>
							<th>Item</th>
							<th>Amount</th>
							<th>Action</th>
						</thead>
						<tbody>
							<?php for ($i = 0; $i <= 10; $i++) { ?>
								<tr>
									<td>
										<?= $i ?>
									</td>
									<td>
										<?= $i ?>
									</td>
									<td>
										<?= $i ?>
									</td>
									<td>
										<?= $i ?>
									</td>
									<td>
										<?= $i ?>
									</td>
									<td>
										<?= $i ?>
									</td>
									<td>
										<?= $i ?>
									</td>
									<td width="30">
										<a href="javascript:;" class="btn btn-sm btn-outline-primary px-4 viewModal" data-bs-toggle="modal" data-bs-target="#viewModal" 
											data-name="This is name">View
										</a>
									</td>
								</tr>
							<?php } ?>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</main>

	<!-- Modal -->
	<?php 	include('pages/modal/viewModal.php'); 
			include('pages/footer.php');
			unset($_SESSION['response']);
	?>
	<script>
		$('.viewModal').click(function() {
		var name = $(this).data('name'); 

		<?php	
			$a='name';
		?>

		$('#name').val(<?php echo $a;?>);
	} );
	</script>
</body>
</html>
