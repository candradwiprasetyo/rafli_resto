<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/type_jurnal_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucwords("type jurnal");

$_SESSION['menu_active'] = 1;

switch ($page) {
	case 'list':
		get_header($title);
		
		$query = select();
		$add_button = "type_jurnal.php?page=form";

		include '../views/type_jurnal/list.php';
		get_footer();
	break;
	
	case 'form':
		get_header();

		$close_button = "type_jurnal.php?page=list";
		
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$query_item = select_item($id);
		

		if($id){


			$row = read_id($id);
			//$query_partner = select_partner();
		
			$action = "type_jurnal.php?page=edit&id=$id";
		} else{
			
			//inisialisasi
			$row = new stdClass();
	
			$row->journal_type_name = false;
			
			$action = "type_jurnal.php?page=save";
		}

		include '../views/type_jurnal/form.php';
		get_footer();
	break;

	case 'save':
	
		extract($_POST);

		$i_name = get_isset($i_name);
		
		$data = "'',
					'$i_name'
			";
			
			//echo $data;

			create($data);
		
			header("Location: type_jurnal.php?page=list&did=1");
		
		
	break;
	
	case 'add_menu':
	
		extract($_POST);

		$type_jurnal_id = $_GET['type_jurnal_id'];
		$menu_id = $_GET['menu_id'];
		
		$data = "'',
					'$type_jurnal_id',
					'$menu_id'
			";
			
			//echo $data;

		create_item($data);
		
		header("Location: type_jurnal.php?page=form&id=$type_jurnal_id&did=1");
		
		
	break;

	
	case 'edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_name = get_isset($i_name);
		
					$data = " journal_type_name = '$i_name'
							";
			
			update($data, $id);
			
			header("Location: type_jurnal.php");

		

	break;

	case 'delete':

		$id = get_isset($_GET['id']);	

		delete($id);

		header('Location: type_jurnal.php?page=list&did=3');

	break;
	
	case 'delete_item':

		$id = get_isset($_GET['id']);
		$type_jurnal_id = get_isset($_GET['type_jurnal_id']);	

		delete_item($id);

		header("Location: type_jurnal.php?page=form&id=$type_jurnal_id&did=3");

	break;
}

?>