<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/master_table_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("master table");

$_SESSION['menu_active'] = 1;

switch ($page) {
	case 'list':
		get_header($title);
		
		$query = select();
		$add_button = "master_table.php?page=form";

		include '../views/master_table/list.php';
		get_footer();
	break;
	
	case 'form':
		get_header();

		$close_button = "master_table.php?page=list";
		$query_building = select_building();

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){

			$row = read_id($id);
		
			$action = "master_table.php?page=edit&id=$id";
		} else{
			
			//inisialisasi
			$row = new stdClass();
	
			$row->table_name = false;
			$row->building_id = false;
			$row->chair_number = false;
			
			$action = "master_table.php?page=save";
		}

		include '../views/master_table/form.php';
		get_footer();
	break;

	case 'save':
	
		extract($_POST);

		$i_name = get_isset($i_name);
		$i_building_id = get_isset($i_building_id);
		$i_chair_number = get_isset($i_chair_number);
		
		$data = "'',
					'$i_building_id', 
					'$i_name',
					'100', 
					'100',
					'$i_chair_number',
					'1',
					'0'
			";
			
			//echo $data;

			create($data);
		
			header("Location: master_table.php?page=list&did=1");
		
		
	break;

	case 'edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_name = get_isset($i_name);
		$i_building_id = get_isset($i_building_id);
		$i_chair_number = get_isset($i_chair_number);
		
					$data = " table_name = '$i_name', 
							building_id = '$i_building_id',
							chair_number = '$i_chair_number'

					";
			
			update($data, $id);
			
			header('Location: master_table.php?page=list&did=2');

		

	break;

	case 'delete':

		$id = get_isset($_GET['id']);	

		delete($id);

		header('Location: master_table.php?page=list&did=3');

	break;
}

?>