
<?php
	if(session_status()===PHP_SESSION_NONE) session_start();
	$_SESSION['resonse'] = "Logout successfully";
	session_destroy();
	header("location: ../index.php");
?>
