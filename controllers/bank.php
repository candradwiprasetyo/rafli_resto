<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/bank_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucwords("Bank");

$_SESSION['menu_active'] = 1;

switch ($page) {
	case 'list':
		get_header($title);
		
		$query = select();
		$add_button = "bank.php?page=form";

		include '../views/bank/list.php';
		get_footer();
	break;
	
	case 'form':
		get_header();

		$close_button = "bank.php?page=list";
		
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$query_item = select_item($id);
		

		if($id){


			$row = read_id($id);
			//$query_partner = select_partner();
		
			$action = "bank.php?page=edit&id=$id";
		} else{
			
			//inisialisasi
			$row = new stdClass();
	
			$row->bank_name = false;
			$row->bank_account_number = false;
			
			$action = "bank.php?page=save";
		}

		include '../views/bank/form.php';
		get_footer();
	break;

	case 'save':
	
		extract($_POST);

		$i_name = get_isset($i_name);
		$i_no_rek = get_isset($i_no_rek);
		
		$data = "'',
					'$i_name',
					'$i_no_rek'
			";
			
			//echo $data;

			create($data);
		
			header("Location: bank.php?page=list&did=1");
		
		
	break;
	
	case 'add_menu':
	
		extract($_POST);

		$bank_id = $_GET['bank_id'];
		$menu_id = $_GET['menu_id'];
		
		$data = "'',
					'$bank_id',
					'$menu_id'
			";
			
			//echo $data;

		create_item($data);
		
		header("Location: bank.php?page=form&id=$bank_id&did=1");
		
		
	break;

	
	case 'edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_name = get_isset($i_name);
		$i_no_rek = get_isset($i_no_rek);
		
					$data = " bank_name = '$i_name',
							bank_account_number = '$i_no_rek'
							";
			
			update($data, $id);
			
			header("Location: bank.php");

		

	break;

	case 'delete':

		$id = get_isset($_GET['id']);	

		delete($id);

		header('Location: bank.php?page=list&did=3');

	break;
	
	case 'delete_item':

		$id = get_isset($_GET['id']);
		$bank_id = get_isset($_GET['bank_id']);	

		delete_item($id);

		header("Location: bank.php?page=form&id=$bank_id&did=3");

	break;
}

?>