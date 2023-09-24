
<!-- Modal -->
<div class="modal fade" id="login" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
	aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog fw-bold">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="modal-title" id="staticBackdropLabel">&nbsp;&nbsp; Admin login</h6>
				<button type="button" class="btn-close border border-primary rounded-circle m-0" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="action/login.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="email" class="col-form-label">Email :</label>
						<input type="email" class="form-control mt-0" id="email" name="email" value="admin@gmail.com">
					</div>
					<div class="form-group">
						<label for="password" class="col-form-label">Password :</label>
						<input type="password" class="form-control" id="password" name="password" value="admin">
					</div>
					<div class="modal-footer mt-2">
						<button type="submit" class="btn btn-sm btn-outline-success px-4">
							<i class="fa-solid fa-right-to-bracket"></i> &nbsp;&nbsp; Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>