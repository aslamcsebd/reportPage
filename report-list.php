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
				<fieldset class="form-group py-2 mb-1">
					<legend class="mb-0">Search report</legend>
					<div class="row justify-content-center fw-bold">							
						<div class="form-group col-auto">
							<label for="start">Filter type*</label>
							<div class="border border-secondary rounded pt-1 mt-2">
								<div class="radio-toolbar form-check form-check-inline">
									<div class="form-check form-check-inline">
										<input type="radio" id="withUser" class="form-check-input" name="filterType"
											value="withUser" required checked>
										<label for="withUser">Date range(User id)</label>
									</div>
									<div class="form-check form-check-inline">
										<input type="radio" id="noUser" class="form-check-input" name="filterType"
											value="noUser" required>
										<label for="noUser">Date range</label>
									</div>
								</div>
							</div>
						</div>

						<div class="col-auto" id="withUserStatus">
							<form action="#" method="post" data_id="withUserAction">
								<div class="row justify-content-center">
									<div class="form-group col-md-3">
										<label for="startDate">Start date*</label>
										<input type="text" class="form-control datepicker mt-2 text-center"
											name="startDate" id="startDate"
											value="<?php ($startDate = $startDate ?? '') ?>"
											placeholder="Day-Month-Year" required onfocus="clearInput(this)" />
									</div>

									<div class="form-group col-md-3">
										<label for="endDate">End date*</label>
										<input type="text" class="form-control datepicker mt-2 text-center"
											name="endDate" id="endDate" value="<?php ($endDate = $endDate ?? '') ?>"
											placeholder="Day-Month-Year" required onfocus="clearInput2(this)" />
									</div>

									<div class="form-group col-md-3">
										<label for="userId">Buyer id*</label>
										<input type="text" class="form-control mt-2 p-1 text-center" name="userId"
											id="userId" value="" placeholder="Enter user id" required />
									</div>

									<div class="form-group col-auto pt-2">
										<button type="submit" class="btn btn-outline-success mt-4 py-1">
											<i class="fa-solid fa-magnifying-glass"></i> &nbsp; Search now
										</button>
									</div>
								</div>
							</form>
						</div>

						<div class="hide col-auto" id="noUserStatus">
							<form action="#" method="post" data_id="noUserAction">
								<div class="row justify-content-center">
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

									<div class="form-group col-auto pt-2">
										<button type="submit" class="btn btn-outline-success mt-4 py-1">
											<i class="fa-solid fa-magnifying-glass"></i> &nbsp; Search now
										</button>
									</div>
								</div>
							</form>
						</div>							
					</div>
				</fieldset>				
			</div>
		</div>
		<div class="col-md-12">
			<div class="card">
				<h6 class="card-header bg-secondary text-center text-light py-1 m-1">Report list</h6>
				<div class="card-body p-1">
					<table class="table table-bordered">
						<thead class="bg-info">
							<th>Buyer id</th>
							<th>Name</th>
							<th>Email</th>
							<th>Mobile</th>
							<th>City</th>
							<th>Item</th>
							<th>Amount</th>
							<th>Date</th>
							<th>Action</th>
						</thead>
						<tbody>
							<?php 
								include 'action/database.php';
								$db = new database();
								
								if ($_SERVER["REQUEST_METHOD"] == "POST") {
									
									if(isset($_POST['userId'])){
										$userId = 'and buyer_id='. "'" .$_POST['userId']. "'";										
									}
									else {
										$userId = '';
									}
									$startDate = date_format(date_create($_POST['startDate']), "Y-m-d");
									$endDate = date_format(date_create($_POST['endDate']), "Y-m-d");

									$where = "entry_at BETWEEN '$startDate' AND '$endDate' $userId";
								}
								else {
									$where = null;
								}

								$db->select("reports", "*", $where);
								$result = $db->sql;						
							?>
							<?php while ($row = mysqli_fetch_assoc($result)) { ?>
								<tr>
									<td><?=$row['buyer_id']?></td>
									<td><?=$row['buyer']?></td>
									<td><?=$row['buyer_email']?></td>
									<td><?=$row['phone']?></td>
									<td><?=$row['city']?></td>
									<td><?=$row['items']?></td>
									<td><?=$row['amount']?></td>
									<td><?=$row['entry_at']?></td>
									<td width="30">
										<a href="javascript:;" class="btn btn-sm btn-outline-primary px-4 viewModal" data-bs-toggle="modal" data-bs-target="#viewModal" 
											
											<?php
												$fields = array("buyer_id", "buyer", "buyer_email", "phone", "city", "items", "amount", "note", "receipt_id", "buyer_ip", "hash_key", "entry_at", "entry_by");
												foreach ($fields as $field) { ?>
													data-<?=$field?>="<?=$row[$field]?>"
											<?php } ?>
										
										>View</a>
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
	<?php 	
		include('pages/modal/viewModal.php'); 
		include('pages/footer.php');
		unset($_SESSION['response']);
	?>

	<script>
		// Report search dependency
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
	</script>

	<script>
		$('.viewModal').click(function() {
			<?php
				$fields = array("buyer_id", "buyer", "buyer_email", "phone", "city", "items", "amount", "note", "receipt_id", "buyer_ip", "hash_key", "entry_at", "entry_by");
				foreach ($fields as $field) { ?>
					var <?=$field?> = $(this).data('<?=$field?>');
					$('#<?=$field?>').val(<?=$field?>);
			<?php } ?>

			//	Main code was bellow [Upper code save 22 line]
			// var name = $(this).data('name');	
			// $('#name').val(name);
		} );
	</script>
</body>
</html>
