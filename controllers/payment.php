<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/payment_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucwords("Pembayaran");

$_SESSION['table_active'] = 1;

switch ($page) {
	case 'list':
		
		$table_id = get_isset($_GET['table_id']);
		$building_id = (isset($_GET['building_id'])) ? $_GET['building_id'] : 0;
		$query = select($table_id);
		$query2 = select($table_id);

		$action = "order.php?page=save_payment&table_id=".$table_id."&building_id=".$building_id;

		$table_name = get_table_name($table_id);
		$building_name = get_table_name($building_id);
		$transaction_code = get_transaction_code($table_id);


		if($table_id == 0 ){
			$button_back = "";
		}else{
			$button_back = "order.php?building_id=$building_id";
		}

		include '../views/payment/list.php';
		
	break;
	
	

	case 'save':
	
		extract($_POST);

		$i_name = get_isset($i_name);
		
		$data = "'',
					
					'$i_name'
					
			";
			
			//echo $data;

			create($data);
		
			header("Location: payment.php?page=list&did=1");
		
		
	break;

	
}

?>