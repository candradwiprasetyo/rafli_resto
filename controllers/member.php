<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/member_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucwords("member");

$_SESSION['menu_active'] = 1;

switch ($page) {
	case 'list':
		get_header($title);
		
		$query = select();
		$add_button = "member.php?page=form";

		include '../views/member/list.php';
		get_footer();
	break;
	
	case 'form':
		get_header();

		$close_button = "member.php?page=list";
		
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$query_item = select_item($id);
		

		if($id){


			$row = read_id($id);
			$query_partner = select_partner();
		
			$action = "member.php?page=edit&id=$id";
		} else{
			
			//inisialisasi
			$row = new stdClass();
	
			$row->member_name = false;
			$row->member_phone = false;
			$row->member_email = false;
			$row->member_discount_type = 1;
			$row->member_discount = false;
			$row->member_settlement = 0;
			
			$action = "member.php?page=save";
		}

		include '../views/member/form.php';
		get_footer();
	break;

	case 'save':
	
		extract($_POST);

		$i_name = get_isset($i_name);
		$i_phone = get_isset($i_phone);
		$i_email = get_isset($i_email);
		$i_settlement = get_isset($i_settlement);
		$i_discount = get_isset($i_discount);
		$i_discount_type = get_isset($i_discount_type);
		
		$data = "'',
					'$i_name',
					'$i_phone',
					'$i_email',
					'$i_settlement',
					'$i_discount',
					'$i_discount_type'
			";
			
			//echo $data;

			create($data);
		
			header("Location: member.php?page=list&did=1");
		
		
	break;
	
	case 'add_menu':
	
		extract($_POST);

		$member_id = $_GET['member_id'];
		$menu_id = $_GET['menu_id'];
		
		$data = "'',
					'$member_id',
					'$menu_id'
			";
			
			//echo $data;

		create_item($data);
		
		header("Location: member.php?page=form&id=$member_id&did=1");
		
		
	break;

	
	case 'edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_name = get_isset($i_name);
		$i_phone = get_isset($i_phone);
		$i_email = get_isset($i_email);
		$i_settlement = get_isset($i_settlement);
		$i_discount = get_isset($i_discount);
		$i_discount_type = get_isset($i_discount_type);
		
					$data = " member_name = '$i_name',
							member_phone = '$i_phone',
							member_email = '$i_email',
							member_settlement = '$i_settlement',
							member_discount = '$i_discount',
							member_discount_type = '$i_discount_type'
							";
			
			update($data, $id);

			$query_partner = select_partner();
			while($row_partner = mysql_fetch_array($query_partner)){
				$query_menu = mysql_query("select a.*, b.menu_type_name
                                                from menus a    
                                                join menu_types b on b.menu_type_id = a.menu_type_id
                                                where partner_id = '".$row_partner['partner_id']."'
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
						
						delete_member_item($id, $row_menu['menu_id']);
					}
					

				}
			}
			
			
			header("Location: member.php?page=form&id=$id&did=1");

		

	break;

	case 'delete':

		$id = get_isset($_GET['id']);	

		delete($id);

		header('Location: member.php?page=list&did=3');

	break;
	
	case 'delete_item':

		$id = get_isset($_GET['id']);
		$member_id = get_isset($_GET['member_id']);	

		delete_item($id);

		header("Location: member.php?page=form&id=$member_id&did=3");

	break;
}

?>