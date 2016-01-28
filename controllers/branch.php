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
					'$i_city'
			";
			
			//echo $data;

		create($data);
		
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
		
		$path = "../img/branch/";
		$i_img_tmp = $_FILES['i_img']['tmp_name'];
		$i_img = ($_FILES['i_img']['name']) ? $_FILES['i_img']['name'] : "";
		$i_img = str_replace(" ","",$i_img);
		
		$date = time();

		echo $i_phone;
		
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
							branch_city = '$i_city'

					";
				}
			
			
			}else{
				$data = "branch_name = '$i_name',
							branch_desc = '$i_desc',
							branch_address = '$i_address',
							branch_phone = '$i_phone',
							branch_city = '$i_city'
					";
			}
			
		update($data, $id);
			
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