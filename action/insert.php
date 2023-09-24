<?php
	include 'database.php';
		
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$db = new database();
		$where = "id !='null' order by id desc limit 1";
		$db->select("reports", "*", $where);
		$last_id = (($i = mysqli_fetch_assoc($db->sql)['id']) == null ? 1 : $i+1);

		// Data load here
		$buyer_id		= str_pad($last_id, 4, "0", STR_PAD_LEFT);
		$buyer			= $_POST['buyer'];
		$buyer_email	= $_POST['email'];
		$phone			= $_POST['phone'];
		$city			= $_POST['city'];
		$items			= $_POST['items'];
		$amount			= $_POST['amount'];
		$note			= $_POST['note'];		
		$receipt_id		= rand(10, 99).str_pad($last_id, 6, "0", STR_PAD_LEFT);		
		$buyer_ip		= $_COOKIE['PHPSESSID'];
		$hash_key		= hash("sha512", $receipt_id, FALSE);
		$entry_at		= date("Y-m-d");
		$entry_by		= 'Customer';

		$db = new database();
		$db->insert('reports',[
			'buyer_id' 		=> $buyer_id,
			'buyer' 		=> $buyer,
			'buyer_email' 	=> $buyer_email,
			'phone' 		=> $phone,
			'city' 			=> $city,
			'items' 		=> $items,
			'amount' 		=> $amount,
			'note' 			=> $note,
			'receipt_id' 	=> $receipt_id,
			'buyer_ip' 		=> $buyer_ip,
			'hash_key' 		=> $hash_key,
			'entry_at' 		=> $entry_at,
			'entry_by' 		=> $entry_by,
		]);
		
		$_SESSION['postTimer'] = (time()+(24*60*60))*1000;
		$data = [
			'status'=>'ok',
			'success'=>true,
			'message'=>'Report created succesfully!'
		];		
		echo json_encode($data);
	}
?>
