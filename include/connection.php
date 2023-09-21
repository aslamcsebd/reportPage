
<?php
	function db() {
		$conn =mysqli_connect('localhost', 'root', '', 'report');
		return $conn;
	}
?>
