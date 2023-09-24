
<div class="modal fade" id="viewModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
	aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg fw-bold">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">&nbsp; Report full information</h5>
				<button type="button" class="btn-close border border-primary rounded-circle m-0" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="card-body fw-bold">
					<div class="row">
						<?php
							$fields = array("buyer_id", "buyer", "buyer_email", "phone", "city", "items", "note", "amount", "receipt_id", "buyer_ip", "hash_key", "entry_at", "entry_by");
							foreach ($fields as $field) { ?>

								<div class="form-group mb-1 <?php echo ($field == 'note' ? 'col-md-12' : 'col-md-4'); ?>">
									<label class="text-capitalize"><?=$field?></label>
									<input class="form-control" id="<?=$field?>" readonly>
								</div>

						<?php } ?>
					</div>
				</div>
				<div class="modal-footer row justify-content-md-center mt-2">
					<button type="button" class="btn btn-danger col-md-4" data-bs-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</div>
