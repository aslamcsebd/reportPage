
<?php
	include 'database.php';
	$conn =mysqli_connect('localhost','root','','report');
	$status = "OK";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$email = $_POST['email'];
		$password = $_POST['password'];
	
		if ($status == "OK") {	
			$result = mysqli_query($conn, "SELECT * FROM admin WHERE email='$email' and password='$password'");
			echo $count = mysqli_num_rows($result);
	
			if ($count == 1) {
	
				$row = mysqli_fetch_array($result);
	
				$_SESSION['login'] = true;
				$_SESSION['response'] = "You are login successfully";
				header("location: ../report-list.php");
			} else {	
				echo $msg = "Wrong Email or Password !!!";
			}
		}
	
	}

?>
