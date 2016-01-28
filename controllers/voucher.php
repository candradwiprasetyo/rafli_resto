<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/voucher_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucwords("voucher");

$_SESSION['menu_active'] = 1;

switch ($page) {
	case 'list':
		get_header($title);
		
		$query = select();
		$add_button = "voucher.php?page=form";

		include '../views/voucher/list.php';
		get_footer();
	break;
	
	case 'form':
		get_header();

		$close_button = "voucher.php?page=list";
		
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){

			$row = read_id($id);
			$row->voucher_date = format_date($row->voucher_date);
		
			$action = "voucher.php?page=edit&id=$id";
		} else{
			
			//inisialisasi
			$row = new stdClass();
		
			$row->voucher_code = false;
			$row->voucher_type_id = false;
			$row->voucher_value = false;
			$row->voucher_date = false;

			$action = "voucher.php?page=save";
		}

		include '../views/voucher/form.php';
		get_footer();
	break;

	case 'save':
	
		extract($_POST);

		$i_code = get_isset($i_code);
		$i_type_id = get_isset($i_type_id);
		$i_value = get_isset($i_value);
		$i_date = format_back_date($i_date);
		
		

		$data = "'',
					'$i_code',
					'$i_type_id',
					'$i_value',
					'$i_date'
					
			";
			
			//echo $data;

			create($data);
		
			header("Location: voucher.php?page=list&did=1");
		
		
	break;

	case 'edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_code = get_isset($i_code);
		$i_type_id = get_isset($i_type_id);
		$i_value = get_isset($i_value);
		$i_date = format_back_date($i_date);
		
					$data = " voucher_code = '$i_code',
					voucher_type_id = '$i_type_id',
					voucher_value = '$i_value',
					voucher_date = '$i_date'
					";
			
			update($data, $id);
			
			header('Location: voucher.php?page=list&did=2');

		

	break;

	case 'delete':

		$id = get_isset($_GET['id']);	

		delete($id);

		header('Location: voucher.php?page=list&did=3');

	break;
}

?>