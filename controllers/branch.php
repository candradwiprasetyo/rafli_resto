<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/branch_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucwords("Cabang");

$_SESSION['menu_active'] = 1;

switch ($page) {
	case 'list':
		get_header($title);
		
		$query = select();
		$add_button = "branch.php?page=form";

		include '../views/branch/list.php';
		get_footer();
	break;
	
	case 'form':
		get_header();

		$close_button = "branch.php?page=list";
		
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){

			$row = read_id($id);
		
			$action = "branch.php?page=edit&id=$id";
		} else {
			
			//inisialisasi
			$row = new stdClass();
	
			$row->branch_name = false;
			$row->branch_address = false;
			$row->branch_phone = false;
			$row->branch_city = false;
			$row->branch_desc = false;
			$row->branch_img = false;
			$row->branch_type_id = false;
			
			$action = "branch.php?page=save";
		}

		include '../views/branch/form.php';
		get_footer();
	break;

	case 'save':
	
		extract($_POST);

		$i_name = get_isset($i_name);
		$i_address = get_isset($i_address);
		$i_phone = get_isset($i_phone);
		$i_city = get_isset($i_city);
		$i_desc = get_isset($i_desc);
		$i_type_id = get_isset($i_type_id);
		
		$path = "../img/branch/";
		$i_img_tmp = $_FILES['i_img']['tmp_name'];
		$i_img = ($_FILES['i_img']['name']) ? $_FILES['i_img']['name'] : "";
		$i_img = str_replace(" ","",$i_img);
		
		$date = time();

		if($i_img){
			$image = $date."_".$i_img;
		}else{
			$image = "";
		}
		
		$data = "'',
					'$i_name',
					'".$image."',
					'$i_desc',
					'$i_address',
					'$i_phone',
					'$i_city',
					'$i_type_id'
			";
			
		//echo $data;

		$branch_id = create($data);
		
		// buat ruangan otomatis
		$data_building = "'',
					'$i_name',
					'',
					'$branch_id'
					
			";
		$building_id = create_building($data_building);

		// buat meja untuk take away / delivery
		$data_table = "'',
					'$building_id', 
					'-',
					'965', 
					'520',
					'0',
					'1',
					'0',
					'2'
			";
		create_table($data_table);

		
		if($i_img){
			move_uploaded_file($i_img_tmp, $path.$image);
		}
			
		header("Location: branch.php?page=list&did=1");
		
		
	break;

	case 'edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_name = get_isset($i_name);
		$i_address = get_isset($i_address);
		$i_phone = get_isset($i_phone);
		$i_city = get_isset($i_city);
		$i_desc = get_isset($i_desc);
		$i_type_id = get_isset($i_type_id);
		
		$path = "../img/branch/";
		$i_img_tmp = $_FILES['i_img']['tmp_name'];
		$i_img = ($_FILES['i_img']['name']) ? $_FILES['i_img']['name'] : "";
		$i_img = str_replace(" ","",$i_img);
		
		$date = time();

		//echo $i_phone;
		
				if($i_img){

				$image = $date."_".$i_img;

				if(move_uploaded_file($i_img_tmp, $path.$image)){
					$get_img_old = get_img_old($id);
					if($get_img_old){
						if(file_exists($path.$get_img_old)){
							unlink("../img/branch/" .$path.$get_img_old);
						}
					}
					
					$data = "branch_name = '$i_name',
							branch_img = '$image',
							branch_desc = '$i_desc',
							branch_address = '$i_address',
							branch_phone = '$i_phone',
							branch_city = '$i_city',
							branch_type_id = '$i_type_id'
							

					";
				}
			
			
			}else{
				$data = "branch_name = '$i_name',
							branch_desc = '$i_desc',
							branch_address = '$i_address',
							branch_phone = '$i_phone',
							branch_city = '$i_city',
							branch_type_id = '$i_type_id'
					";
			}
			
		update($data, $id);
		
		$data_building = "building_name = '$i_name'";
		
		update_building($data_building, $id);

		// edit list menu
		$query_menu = mysql_query("select a.*, b.menu_type_name
                                                from menus a    
                                                join menu_types b on b.menu_type_id = a.menu_type_id
                                                order by menu_id");
                while($row_menu = mysql_fetch_array($query_menu)){
                	
                	$i_check = (isset($_POST['i_check_'.$row_menu['menu_id']])) ? $_POST['i_check_'.$row_menu['menu_id']] : "";
                	
                	
                	if($i_check){
	                	$check_exist = check_exist($id, $row_menu['menu_id']);

	                	if($check_exist == 0){

	                		$data = "'',
									'$id',
									'".$row_menu['menu_id']."'
							";

	                		create_item($data);
	                	}

					}else{
						//echo "gagal"."<br>";
						delete_item($id, $row_menu['menu_id']);
					}
					

				}
			
		header('Location: branch.php?page=list&did=2');
		
		

	break;

	case 'delete':

		$id = get_isset($_GET['id']);	

		$path = "../img/branch/";
		
		$get_img_old = get_img_old($id);
					if($get_img_old){
						if(file_exists($path.$get_img_old)){
							unlink("../img/branch/" .$path.$get_img_old);
						}
					}


		delete($id);

		header('Location: branch.php?page=list&did=3');

	break;
}



?>