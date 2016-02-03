<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/transaksi_internal_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Transaksi Internal");

$_SESSION['menu_active'] = 3;

switch ($page) {
	case 'list':
		get_header($title);
		
		if($_SESSION['user_type_id']==1 || $_SESSION['user_type_id']==2){
			$where_branch = "";
		}else{
			$where_branch = " where a.branch_id = '".$_SESSION['branch_id']."' ";
		}
		
		$query = select($where_branch);
		$add_button = "transaksi_internal.php?page=form";

		include '../views/transaksi_internal/list.php';
		get_footer();
	break;
	
	case 'form':
		get_header();
		
		if($_SESSION['user_type_id']==1 || $_SESSION['user_type_id']==2){
			$where_branch = false;
		}else{
			$where_branch = $_SESSION['branch_id'];
		}

		$close_button = "transaksi_internal.php?page=list";

		$id = (isset($_GET['id'])) ? $_GET['id'] : 0;
		if($id){

			$row = read_id($id);
		
			$action = "transaksi_internal.php?page=edit&id=$id";
		} else{
			
			//inisialisasi
			$row = new stdClass();
			
			$row->transaction_internal_id = false;
			$row->transaction_internal_code = false;
			$row->transaction_internal_date = date('d/m/Y');
			$row->pabrik_branch_id = false;
			$row->cabang_branch_id = $where_branch;
			$row->user_id = $_SESSION['user_id'];
			
			$action = "transaksi_internal.php?page=save";
		}
		$query_item = select_detail($id,$_SESSION['user_id']);
		$query_item2 = select_detail($id,$_SESSION['user_id']);
		$query_item3 = select_detail($id,$_SESSION['user_id']);
		$query_item4 = select_detail($id,$_SESSION['user_id']);

		include '../views/transaksi_internal/form.php';
		get_footer();
	break;
	
	case 'add_menu';
		$item_id = get_isset($_GET['item_id']);	
		
		$data = "'',
					'0',
					'$item_id',
					'0', 
					'0',
					'0',
					'".$_SESSION['user_id']."'
					
			";
			
			create_config("transaction_internal_details", $data);
			
		header("Location: transaksi_internal.php?page=form");
		
	break;

	case 'save':
	
		extract($_POST);
		
		//echo "test";

		$i_date = get_isset($_GET['i_date']);
		$i_date = format_back_date($i_date);
		$i_code = get_isset($_GET['i_code']);
		$i_pabrik = get_isset($_GET['i_pabrik']);
		$i_cabang = get_isset($_GET['i_cabang']);
		$branch_id = $_SESSION['branch_id'];

		$data = "'',
					'$i_code',	
					'$i_date',
					'$i_pabrik',
					'$i_cabang',
					'$branch_id'
					
				";
		create_config("transaction_internals", $data);
		$transaction_internal_id = mysql_insert_id();
		
		update_detail($transaction_internal_id,$_SESSION['user_id']);
		
		$query_item = select_item($transaction_internal_id);
		while($row_item = mysql_fetch_array($query_item)){
			//echo $row_item['transaction_internal_detail_id'];
			//pabrik
			$select_stock_pabrik = select_stock($row_item['pabrik_branch_id'],$row_item['item_id']);
			$stock_pabrik = $select_stock_pabrik['item_stock_qty'] - $row_item['transaction_internal_detail_qty'];
			update_stock($row_item['pabrik_branch_id'],$row_item['item_id'],$stock_pabrik);	
			
			//cabang
			$select_stock_cabang = select_stock($row_item['cabang_branch_id'],$row_item['item_id']);
			$stock_cabang = $select_stock_cabang['item_stock_qty'] + $row_item['transaction_internal_detail_qty'];
			update_stock($row_item['cabang_branch_id'],$row_item['item_id'],$stock_cabang);	
			
		}
		
		header("Location: transaksi_internal.php");
		
	break;
	
	case 'edit_price':

		$id = get_isset($_GET['id']);	
		$qty = get_isset($_GET['qty']);
		$price = get_isset($_GET['price']);		
		$total = $qty * $price;
		
		$data = "transaction_internal_detail_qty = '$qty',
				transaction_internal_detail_price = '$price',
				transaction_internal_detail_total= '$total'
				
		";
		
		update_config("transaction_internal_details", $data, "transaction_internal_detail_id", $id);

	break;
	
	case 'edit_qty':

		$id = get_isset($_GET['id']);	
		$qty = get_isset($_GET['qty']);
		$price = get_isset($_GET['price']);		
		$total = $qty * $price;
		
		$data = "transaction_internal_detail_qty = '$qty',
				transaction_internal_detail_price = '$price',
				transaction_internal_detail_total= '$total'
				
		";
		
		update_config("transaction_internal_details", $data, "transaction_internal_detail_id", $id);

	break;
	
	case 'delete_item':
	
		$id = get_isset($_GET['id']);
			
		
		delete_item($id);

		header("Location: transaksi_internal.php?page=form");

	break;


	case 'get_menu':
		
		$keyword = $_GET['keyword'];
		
		$data['menu_id'] = select_menu($keyword);
		
		return $data;
		
		
		break;
		
	
}

?>