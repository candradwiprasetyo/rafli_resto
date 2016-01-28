<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/transaction_new_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Transaksi");

$_SESSION['menu_active'] = 8;

switch ($page) {
	case 'list':
		get_header($title);
		
		$query_item = select_item();
		$query_item2 = select_item();
		$query_item3 = select_item();
		
		$date = format_date(date("Y-m-d"));
		if(isset($_GET['date'])){
			$date = format_date($_GET['date']);
		}
		$table_id = "";
		if(isset($_GET['table_id'])){
			$table_id = $_GET['table_id'];
			
			
		}
		
		$member_id = "";
		if(isset($_GET['member_id'])){
			$member_id = $_GET['member_id'];
			
		}
		
		if($table_id == ""){
			$check_table = 0;
		}else{
			$check_table = check_table($table_id);
		}
		$query_cat = select_cat();
		$query = select();
		$query2 = select();
		$query_find = select();
		$action = "transaction_new.php?page=save";
		

		include '../views/transaction_new/list.php';
		get_footer($query_find);
	break;
	
	case 'list_edit':
		get_header($title);
		
		if(isset($_GET['table_id'])){
			$table_id = $_GET['table_id'];
		}
				
		$query_item = select_item_edit($table_id );
		$query_item2 = select_item_edit($table_id );
		$query_item3 = select_item_edit($table_id );
		
		
		
		
		$query_item = select_item_edit($table_id);
		$query_item2 = select_item_edit($table_id);
		$query_item3 = select_item_edit($table_id);
		
		
		
		$row_edit = read_id($table_id);
		
		$date = format_date_only($row_edit['transaction_date']);
		$member_id = $row_edit['member_id'];
		
		$action = "transaction_new.php?page=edit";
	
		include '../views/transaction_new/list_edit.php';
		
		get_footer();
	break;
	
	case 'add_menu';
		$member_id = get_isset($_GET['member_id']);	
		$menu_id = get_isset($_GET['menu_id']);	
		$table_id = get_isset($_GET['table_id']);	
		$get_menu_price = get_menu_price($menu_id);
		
		$check_menu = check_menu($table_id, $menu_id);
		
		if($check_menu == 0){
		
		$get_discount = get_discount($member_id, $menu_id);
		//echo $get_discount;
		$tnt_discount = $get_discount / 100 * $get_menu_price['menu_price'];
		$tnt_grand_price = $get_menu_price['menu_price'] - $tnt_discount;
		
		$data = "'',
					'$table_id',
					'".$_SESSION['user_id']."',
					'$member_id', 
					'$menu_id',
					'".$get_menu_price['menu_price']."',
					'$tnt_discount',
					'$tnt_grand_price',
					'1',
					'$tnt_grand_price'
					
					
					
			";
			
			create_config("transaction_new_tmp", $data);
			
		}
		header("Location: transaction_new.php?page=list&table_id=$table_id&member_id=$member_id");
		
	break;
	
	case 'add_menu_edit';
		$member_id = get_isset($_GET['member_id']);	
		$menu_id = get_isset($_GET['menu_id']);	
		$table_id = get_isset($_GET['table_id']);	
		$get_menu_price = get_menu_price($menu_id);
		
		$check_menu = check_menu($table_id, $menu_id);
		
		if($check_menu == 0){
		
		$get_discount = get_discount($member_id, $menu_id);
		//echo $get_discount;
		$tnt_discount = $get_discount / 100 * $get_menu_price['menu_price'];
		$tnt_grand_price = $get_menu_price['menu_price'] - $tnt_discount;
		$get_transaction_id = get_transaction_id($table_id);
		
		$data = "'',
					'$get_transaction_id',
					'$menu_id', 
					'".$get_menu_price['menu_original_price']."',
					'".$get_menu_price['menu_margin_price']."',
					'".$get_menu_price['menu_price']."',
					'".$tnt_discount."',
					'$tnt_grand_price',
					'1',
					'$tnt_grand_price'
					
					
					
			";
			
			create_config("transaction_tmp_details", $data);
			
		}
		header("Location: transaction_new.php?page=list_edit&table_id=$table_id");
		
	break;
	

	case 'save':
	
		extract($_POST);

		$i_date = get_isset($_GET['date']);
		$i_date = format_back_date($i_date);
		$i_jam = date("h:i:s");
		$table_id = get_isset($_GET['table_id']);
		$member_id = get_isset($_GET['member_id']);
		$tanggal = $i_date." ".$i_jam;
		
		//echo "ok";
		$get_building_id = get_building_id($table_id);
		$get_total = get_total($table_id);
		
		$data = "'',
					'$table_id',	
					'$member_id',
					'$tanggal'
					
				";
		create_config("transactions_tmp", $data);
		$transaction_id = mysql_insert_id();
		
		$query_item = select_item();
		while($row_item = mysql_fetch_array($query_item)){
			
			$get_data_menu = get_data_menu($row_item['menu_id']);
			
			
			$data_item = "'',
							'$transaction_id',
							'".$row_item['menu_id']."',
							'".$get_data_menu['menu_original_price']."',
							'".$get_data_menu['menu_margin_price']."',
							'".$get_data_menu['menu_price']."',
							'".$row_item['tnt_discount']."',
							'".$row_item['tnt_grand_price']."',
							'".$row_item['tnt_qty']."',
							'".$row_item['tnt_total']."'
						
							";
						create_config("transaction_tmp_details", $data_item);	
		}
		
		
		delete($table_id);
		
		if($table_id == 0){
		
			header("Location: payment.php?table_id=$table_id&building_id=$get_building_id");
		
		}else{
			header("Location: order.php?building_id=$get_building_id");
		}
		
	break;
	
	case 'save_edit':
	
		extract($_POST);

		$i_date = get_isset($_GET['date']);
		$i_date = format_back_date($i_date);
		$i_jam = date("h:i:s");
		$table_id = get_isset($_GET['table_id']);
		$member_id = get_isset($_GET['member_id']);
		$tanggal = $i_date." ".$i_jam;
		
		$get_building_id = get_building_id($table_id);
		
		$data = "
					table_id = '$table_id',	
					member_id = '$member_id',
					transaction_date = '$tanggal'
					
				";
				
				
		update_config("transactions_tmp", $data, 'table_id', $table_id);
		
		if($table_id == 0){
		
			header("Location: payment.php?table_id=$table_id&building_id=$get_building_id");
		
		}else{
			header("Location: order.php?building_id=$get_building_id");
		}
		
		
	break;

	case 'edit_qty':

		$id = get_isset($_GET['id']);	
		$qty = get_isset($_GET['qty']);	
		$grand_price = get_isset($_GET['grand_price']);
		$total = $qty * $grand_price;
		
		$data = "tnt_grand_price = '$grand_price',
				tnt_qty = '$qty',
				tnt_total= '$total'
				
		";
		
		update_config("transaction_new_tmp", $data, "tnt_id", $id);


		

	break;

	case 'edit_qty_edit':

		$id = get_isset($_GET['id']);	
		$qty = get_isset($_GET['qty']);	
		$grand_price = get_isset($_GET['grand_price']);
		$total = $qty * $grand_price;
		
		$data = "transaction_detail_grand_price = '$grand_price',
				transaction_detail_qty = '$qty',
				transaction_detail_total= '$total'
				
		";
		
		update_config("transaction_tmp_details", $data, "transaction_detail_id", $id);


		

	break;


	case 'get_menu':
		
		$keyword = $_GET['keyword'];
		
		$data['menu_id'] = select_menu($keyword);
		
		return $data;
		
		
		break;
		
	case 'delete_history':

		$id = get_isset($_GET['id']);	
		$table_id = get_isset($_GET['table_id']);	
		
		
		
		delete_history($id);

		header("Location: transaction_new.php?table_id=$table_id&did=3");

	break;
	
	case 'delete_item':
	

		$id = get_isset($_GET['id']);
			
		$member_id = get_member_id($id);
		$table_id = get_table_id($id);
	
		
		
		delete_item($id);

		header("Location: transaction_new.php?table_id=$table_id&member_id=$member_id&did=3");

	break;
	
	case 'delete_item_edit':
	

		$id = get_isset($_GET['id']);
			
		$table_id = get_isset($_GET['table_id']);
	
		
		
		delete_item_edit($id);

		header("Location: transaction_new.php?page=list_edit&table_id=$table_id");

	break;
	
	case 'list_history':
		//get_header($title);
		$table_id = get_isset($_GET['table_id']);
		
		$check_table = check_table($table_id);
		if($check_table > 0){
			$query_history = select_history($table_id);
			include '../views/transaction_new/history_order.php';
		}
		//get_footer();
	break;
	
	case  'add_list_menu':
		$menu_id= get_isset($_GET['menu_id']);	
		
		//$action = "treatment.php?page=save&planting_process_id=$planting_process_id";
		
		include '../views/transaction_new/list_menu.php';
	break;
}

?>