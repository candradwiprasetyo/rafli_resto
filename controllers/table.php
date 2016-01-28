<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/table_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("table");

$_SESSION['menu_active'] = 6;

switch ($page) {
	case 'list':
		
		$first_building_id = get_first_building_id();
		$building_id = (isset($_GET['building_id'])) ? $_GET['building_id'] : $first_building_id; 
		$building_name = get_building_name($building_id);
		$building_img = get_building_img($building_id);
		//get_header2($title);
		
		//$query = select();
		$action_room = "table.php?page=save_room";
		$action_table = "table.php?page=save_table&building_id=$building_id";
		$action_logout = "logout.php";
		
		//$building_next();
		//$building_prev();

		include '../views/table/list.php';
		//get_footer();
	break;
	
	case 'save_table_location':

		$id=$_GET['id'];
		$data_x=$_GET['data_x'];
		$data_y=$_GET['data_y'];
		$data_top = $_GET['data_top'];
		
		save_table_location($id, $data_x, $data_y, $data_top);
		
	
	break;
	
	case 'save_room':
		$room_name = $_POST['i_room_name'];
		$data = "'','".$room_name."'";
		save_room($data);
		header('location: table.php');
	break;
	
	case 'save_table':
		$building_id = $_GET['building_id'];
		$table_name = $_POST['i_table_name'];
		$data = "'',
				'$building_id',
				'".$table_name."',
				'200',
				'200',
				'2',
				'1',
				'0'
				";
		save_table($data);
		header("location: table.php?building_id=$building_id");
	break;
	
	case 'save_payment':
		$table_id = $_GET['table_id'];
		$building_id = $_GET['building_id'];
		
		$query =  mysql_query("select * 
								from transactions_tmp a
								where a.table_id = '$table_id'
								");
		while($row = mysql_fetch_array($query)){
			$data = "'',
					'$table_id',
					'".$row['transaction_date']."', 
					'".$row['transaction_total']."'
			";
			create_config("transactions", $data);
			$transaction_id = mysql_insert_id();
			
			$query_detail =  mysql_query("select * 
								from transaction_tmp_details a
								where a.transaction_id = '".$row['transaction_id']."'
								");
			while($row_detail = mysql_fetch_array($query_detail)){
				$data_detail = "'',
									'$transaction_id',
									'".$row_detail['menu_id']."',
									'".$row_detail['transaction_detail_price']."',
									'".$row_detail['transaction_detail_qty']."',
									'".$row_detail['transaction_detail_total']."'
									";
					create_config("transaction_details", $data_detail);
			}
			
			delete_tmp($table_id);
			
		}
		header("location: table.php?building_id=$building_id");
	break;
	
	
}

?>