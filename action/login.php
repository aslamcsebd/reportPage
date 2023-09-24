
<?php
	include 'database.php';
	$db = new database();

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$email = $_POST['email'];
		$password = crc32($_POST['password']);
		
		$where = "email='$email' and password='$password'";
	
		$db->select("admin", "*", $where);
		$res = $db->sql;
		$result = mysqli_fetch_assoc($res);

		if ($result) {
			$_SESSION['login'] = true;
			$_SESSION['response'] = "You are login successfully";
			header("location: ../report-list.php");
		}else{	
			$_SESSION['response'] = "Wrong Email or Password !!!";
			header("location: ../index.php");
		}
	}
?>
