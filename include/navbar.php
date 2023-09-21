<nav class="navbar navbar-expand-lg bg-body-tertiary">
	<div class="container-fluid">
		<a class="navbar-brand" href="index.php">Home</a>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<?php if (isset($_SESSION['login'])) { ?>
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="report-list.php">Report list</a>
					</li>
				<?php } ?>
			</ul>
			<div class="d-flex">
				<?php if (!isset($_SESSION['login'])) { ?>
					<button type="button" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#login">
						<i class="fa-solid fa-right-to-bracket"></i> &nbsp;
						Login
					</button>
					
				<?php } else { ?>
						
						<a class="btn btn-sm btn-outline-danger" href="include/logout.php">
							<i class="fa-solid fa-right-from-bracket"></i> &nbsp;
							Logout
						</a>
				<?php } ?>
			</div>
		</div>
	</div>
</nav>