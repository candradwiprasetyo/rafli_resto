<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/resep_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("resep");

$_SESSION['menu_active'] = 3;

switch ($page) {
	case 'list':
		get_header($title);
		
		$query = select();
		$add_button = "resep.php?page=form";

		include '../views/resep/list.php';
		get_footer();
	break;
	
	case 'form':
		get_header();
		
		$close_button = "resep.php?page=list";

		$id = (isset($_GET['id'])) ? $_GET['id'] : 0;
		if($id){

			$row = read_id($id);
		
			$action = "resep.php?page=edit&id=$id";
		} else{
			
			//inisialisasi
			$row = new stdClass();
			
			$row->resep_id = false;
			$row->resep_name = false;
			$row->item_id = false;
			
			$action = "resep.php?page=save";
		}
		$query_item = select_detail($id,$_SESSION['user_id']);
		$query_item2 = select_detail($id,$_SESSION['user_id']);
		$query_item3 = select_detail($id,$_SESSION['user_id']);
		$query_item4 = select_detail($id,$_SESSION['user_id']);

		include '../views/resep/form.php';
		get_footer();
	break;
	
	case 'add_menu';
		$item_id = get_isset($_GET['item_id']);	
		$i_id = get_isset($_GET['i_id']);	
		
		if(!$i_id){
		$data = "'',
					'0',
					'$item_id',
					'0', 
					'".$_SESSION['user_id']."'
					
			";
		}else{
		$data = "'',
					'$i_id',
					'$item_id',
					'0', 
					'".$_SESSION['user_id']."'
					
			";
		}
			create_config("resep_details", $data);
			
		if(!$i_id){
			header("Location: resep.php?page=form");
		}else{
			header("Location: resep.php?page=form&id=$i_id");
		}
		
	break;

	case 'save':
	
		extract($_POST);
		
		//echo "test";

		$i_id = get_isset($_GET['i_id']);
		$i_name = get_isset($_GET['i_name']);
		$i_item_produck = get_isset($_GET['i_item_produck']);

		if(!$i_id){
		$data = "'',
					'$i_name',	
					'$i_item_produck'
					
				";
		create_config("reseps", $data);
		$resep_id = mysql_insert_id();
		
		}else{
		$data = "resep_name = '$i_name',
				item_id = '$i_item_produck'
				
				";
		update_config("reseps", $data, "resep_id", $i_id);
		$resep_id = $i_id;
		}
		
		update_detail($resep_id,$_SESSION['user_id']);
		
		header("Location: resep.php");
		
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
		
		$data = "resep_detail_qty = '$qty'
			
		";
		
		update_config("resep_details", $data, "resep_detail_id", $id);

	break;
	
	case 'delete':
	
		$id = get_isset($_GET['id']);
			
		
		delete($id);

		header("Location: resep.php");

	break;
	
	case 'delete_item':
	
		$id = get_isset($_GET['id']);
			
		
		delete_item($id);

		header("Location: stock.php?page=form");

	break;


	case 'get_menu':
		
		$keyword = $_GET['keyword'];
		
		$data['menu_id'] = select_menu($keyword);
		
		return $data;
		
		
		break;
		
	
}

?>