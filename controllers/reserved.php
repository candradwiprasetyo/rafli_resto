<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/reserved_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Reserved");

$_SESSION['menu_active'] = 5;

switch ($page) {
	
	case 'list_backup':
		get_header($title);
		
		if($_SESSION['user_type_id'] == 1 || $_SESSION['user_type_id'] == 2){
			$where = "";
		}else{
			$where = " and c.branch_id = '".$_SESSION['branch_id']."'";
		}
		
		$query = select($where);
		$add_button = "reserved.php?page=form";

		include '../views/reserved/list.php';
		get_footer();
	break;
	
	case 'list':
	
		get_header($title);
		
		if($_SESSION['user_type_id'] == 1 || $_SESSION['user_type_id'] == 2){
			$where = "";
			$branch_name = "Semua Cabang";
		}else{
			$where = " and c.branch_id = '".$_SESSION['branch_id']."'";
			$branch_name = get_branch_name($_SESSION['branch_id']);
		
		}
			
		$query = select_table($where);
		
			//inisialisasi
			$row = new stdClass();
	
			$row->name = false;
			$row->phone = false;
			$row->address = false;
			$row->amount = false;
			$row->date = date("d/m/Y");
			$row->hour = false;
			
		$action = "reserved.php?page=save";
		
		include '../views/reserved/form.php';
		get_footer();
		
	break;
	

	
	case 'save':
		
		if($_SESSION['user_type_id'] == 1 || $_SESSION['user_type_id'] == 2){
			$where = "";
			$branch_name = "Semua Cabang";
		}else{
			$where = " and c.branch_id = '".$_SESSION['branch_id']."'";
			$branch_name = get_branch_name($_SESSION['branch_id']);
		
		}
		
		extract($_POST);
		$i_name = get_isset($i_name);
		$i_phone = get_isset($i_phone);
		$i_address = get_isset($i_address);
		$i_amount = get_isset($i_amount);
		$i_date = get_isset($i_date);
		$i_date = format_back_date($i_date);
		$i_hour = get_isset($i_hour);
		
		$i_h = explode(" ", $i_hour);
		
		$hour = explode(":", $i_h[0]);
		
		
		
		if($i_h[1] == "PM"){
			if($hour[0] == 12){
				$new_hour = $hour[0];
			}else{
				$new_hour = $hour[0] + 12;
			}
			$new_hour = $new_hour.":".$hour[1];
		}else{
			if($hour[0] == 12){
				$new_hour = $hour[0] - 12;
			}else{
				$new_hour = $hour[0];
			}
			
			if(strlen($new_hour)==1){
				$new_hour = "0".$new_hour;
			}
			
			$new_hour = $new_hour.":".$hour[1];
		}

		
		$query_count = select_table($where);		
		
		$count = 0;
	
		while($row_count = mysql_fetch_array($query_count)){
					if(isset($_POST['i_table_id_'.$row_count['table_id']]) && $_POST['i_table_id_'.$row_count['table_id']]  == 1){
						$count++;
					}
		}
		

		if($count > 0){
		
			$query = select_table($where);
			while($row = mysql_fetch_array($query)){
				
				
						
						if($_POST['i_table_id_'.$row['table_id']] == 1){
							$data = "'',
								'".$row['table_id']."',
								'$i_name',
								'$i_phone',
								'$i_address',
								'$i_amount',
								'$i_date $new_hour',
								'0'
								";
							save($data);
							update_status($row['table_id'], 3);
						}
					
				
			}
			header("location: order.php");
		}else{
			header("Location: reserved.php?err=1");
		}
		
		
	break;
	
	
}

?>