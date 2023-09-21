
<?php
  	include('connection.php');
    $conn = db();
    session_start();
	$status = "OK";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		// $email = $_POST['email'];
		$email = 'admin@gmail.com';
		$password = '1234';
		// $password = $_POST['password'];
	
	
		// if (empty($email)) {
		// 	$msg .= "Please Enter Your Email.<br>";
		// 	$status = "NOTOK";
		// }
	
	
		// if (empty($password)) {
		// 	$msg .= "Please Enter Your password.";	
		// 	$status = "NOTOK";
		// }
	
		if ($status == "OK") {	
			$result = mysqli_query($conn, "SELECT * FROM admin WHERE email='$email' and password='$password'");
			echo $count = mysqli_num_rows($result);	
	
			if ($count == 1) {
	
				$row = mysqli_fetch_array($result);
	
				echo $_SESSION['login'] = true;
	
				header("location: ../report-list.php");
			} else {	
				echo $msg = "Wrong Email or Password !!!";
			}
		}
	
	}

?>
