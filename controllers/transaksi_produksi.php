<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/transaksi_produksi_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Transaksi Produksi");

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
		$add_button = "transaksi_produksi.php?page=form";

		include '../views/transaksi_produksi/list.php';
		get_footer();
	break;
	
	case 'form':
		get_header();
		
		if($_SESSION['user_type_id']==1 || $_SESSION['user_type_id']==2){
			$where_branch = false;
		}else{
			$where_branch = $_SESSION['branch_id'];
		}

		$close_button = "transaksi_produksi.php?page=list";

		$id = (isset($_GET['id'])) ? $_GET['id'] : 0;
		if($id){

			$row = read_id($id);
		
			$action = "transaksi_produksi.php?page=edit&id=$id";
		} else{
			
			//inisialisasi
			$row = new stdClass();
			$item_id = (isset($_GET['item_id'])) ? $_GET['item_id'] : 0;
			if($item_id){
				$row->item_id = $item_id;
			}else{
				$row->item_id = false;
			}
			$row->transaction_production_id = false;
			$row->transaction_production_code = false;
			$row->transaction_production_date = date('d/m/Y');
			$row->transaction_production_target = false;
			$row->transaction_production_hasil = false;
			$row->branch_id = $where_branch;
			$row->user_id = $_SESSION['user_id'];
			
			$action = "transaksi_produksi.php?page=save";
		}
		$query_item = select_detail($id,$_SESSION['user_id']);
		$query_item2 = select_detail($id,$_SESSION['user_id']);
		$query_item3 = select_detail($id,$_SESSION['user_id']);
		$query_item4 = select_detail($id,$_SESSION['user_id']);

		include '../views/transaksi_produksi/form.php';
		get_footer();
	break;
	
	case 'add_menu';
		$item_id = get_isset($_GET['item_id']);	
		
		
		$data = "'',
					'0',
					'$item_id',
					'0', 
					'".$_SESSION['user_id']."'
					
			";
			
			create_config("transaction_production_details", $data);
			
		header("Location: transaksi_produksi.php?page=form");
		
	break;
	
	case 'add_resep';
		$item_id = get_isset($_GET['item_id']);	
		
		$query_resep = select_resep($item_id);
		
		while($row = mysql_fetch_array($query_resep)){
			$data = "'',
						'0',
						'".$row['item_id']."',
						'".$row['resep_detail_qty']."', 
						'".$_SESSION['user_id']."'
						
				";
				
				create_config("transaction_production_details", $data);
		}
			
		header("Location: transaksi_produksi.php?page=form&item_id=$item_id");
		
	break;

	case 'save':
	
		extract($_POST);
		
		//echo "test";
		
		$i_item = get_isset($_GET['i_item']);
		//$i_item = get_resep($i_resep);
		//$item_id = $i_item['item_id'];
		
		$row_id = get_isset($_GET['row_id']);

		$i_date = get_isset($_GET['i_date']);
		$i_date = format_back_date($i_date);
		$i_code = get_isset($_GET['i_code']);
		
		$i_cabang = get_isset($_GET['i_cabang']);
		$i_hasil = get_isset($_GET['i_hasil']);
		$i_target = get_isset($_GET['i_target']);
		$branch_id = $_SESSION['branch_id'];
		
		if(!$row_id){

		$data = "'',
					'$i_cabang',	
					'$i_code',
					'$i_date',
					'$i_item',
					'$i_target',
					'$i_hasil'
					
				";
		create_config("transaction_productions", $data);
		$transaction_production_id = mysql_insert_id();
		
		update_detail($transaction_production_id,$_SESSION['user_id']);
		
		$query_item = select_item($transaction_production_id);
		while($row_item = mysql_fetch_array($query_item)){
			//echo $row_item['transaction_production_detail_id'];
			//Minus stock
			$select_stock = select_stock($row_item['branch_id'],$row_item['item_id']);
			$stock_minus = $select_stock['item_stock_qty'] - $row_item['transaction_production_detail_qty'];
			update_stock($row_item['branch_id'],$row_item['item_id'],$stock_minus);	
			
		}
		
		}else{
			update_production($row_id,$i_hasil);
			//plus stock
			$select_stock2 = select_stock($i_cabang,$i_item);
			$stock_plus = $select_stock2['item_stock_qty'] + $i_hasil;
			update_stock($i_cabang,$i_item,$stock_plus);
		}
		
		header("Location: transaksi_produksi.php");
		
	break;
	
	case 'edit_price':

		$id = get_isset($_GET['id']);	
		$qty = get_isset($_GET['qty']);
		$price = get_isset($_GET['price']);		
		$total = $qty * $price;
		
		$data = "transaction_production_detail_qty = '$qty',
				transaction_production_detail_price = '$price',
				transaction_production_detail_total= '$total'
				
		";
		
		update_config("transaction_production_details", $data, "transaction_production_detail_id", $id);

	break;
	
	case 'edit_qty':
	
	//echo "test";

		$id = get_isset($_GET['id']);	
		$qty = get_isset($_GET['qty']);
		$price = get_isset($_GET['price']);		
		$total = $qty * $price;
		
		$data = "transaction_production_detail_qty = '$qty'
				
		";
		
		update_config("transaction_production_details", $data, "transaction_production_detail_id", $id);

	break;
	
	case 'edit_qty_now':
	
	echo "test";

		$id = get_isset($_GET['id']);	
		$qty = get_isset($_GET['qty']);
		
		$data = "transaction_production_detail_qty = '$qty'
				
		";
		
		update_config("transaction_production_details", $data, "transaction_production_detail_id", $id);

	break;
	
	case 'delete_item':
	
		$id = get_isset($_GET['id']);
			
		
		delete_item($id);

		header("Location: transaksi_produksi.php?page=form");

	break;


	case 'get_menu':
		
		$keyword = $_GET['keyword'];
		
		$data['menu_id'] = select_menu($keyword);
		
		return $data;
		
		
		break;
		
	
}

?>