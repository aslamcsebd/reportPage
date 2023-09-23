
<?php
	include 'database.php';
		
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$buyer			= $_POST['buyer'];
		$buyer_email	= $_POST['email'];
		$phone			= $_POST['phone'];
		$city			= $_POST['city'];
		$items			= $_POST['items'];
		$amount			= $_POST['amount'];
		$note			= $_POST['note'];
		
		// str_pad(2, 6, "0", STR_PAD_LEFT); need 1st primary key for supur unique
		$receipt_id		= rand(10, 99) . substr(time(), -4);
		
		$browser_ip = explode(' ', $_SERVER['HTTP_USER_AGENT']);
		$buyer_ip		= end($browser_ip);

		$hash_key		= hash("sha512", $receipt_id, FALSE);
		$entry_at		= date("Y-m-d");
		$entry_by		= 'Customer';

		$db = new database();
		$db->insert('reports',[
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

		$data = [
			'status'=>'ok',
			'success'=>true,
			'message'=>'Report created succesfully!'
		];		
		echo json_encode($data);
	}
?>
