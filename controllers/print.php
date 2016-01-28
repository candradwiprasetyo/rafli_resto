<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/print_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucwords("Pembayaran");

$_SESSION['table_active'] = 1;

switch ($page) {
	case 'list':
		
		$transaction_id = get_isset($_GET['transaction_id']);
		$query = select($transaction_id);
		$row = mysql_fetch_array($query);
		$query_item = select_item($transaction_id);
		
		include '../views/print/list.php';
		
	break;
	
	

	
}

?>