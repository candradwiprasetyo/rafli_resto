<?php

function select($param){
	$where = "";
	/*if($param){
		$where = "where menu_type_id = ".$param; 
	}*/
	$query = mysql_query("select a.branch_menu_price, b.* 
											from branch_menus a  
											join menus b on b.menu_id = a.menu_id
											where a.branch_id = '$param'
											order by b.menu_id");
	return $query;
}

function select_cat($param){
	$where = "";
	/*if($param){
		$where = "where menu_type_id = ".$param; 
	}*/

	$query = mysql_query("select * from menu_types $where order by menu_type_id");
	return $query;
}

function select_history($table_id){
	 $query = mysql_query("select b.*, c.menu_name 
							  from transactions_tmp a
							  join transaction_tmp_details b on b.transaction_id = a.transaction_id
							  join menus c on c.menu_id = b.menu_id
							  where table_id = '".$table_id."'
							  order by transaction_detail_id 
							  ");
	return $query;
}

function select_menu($keyword){
	$query = mysql_query("select * from menus where menu_name like '%$keyword%' order by menu_id");
	$row = mysql_fetch_array($query);
	return $row['menu_id'];
}

function get_compliment_status($id){
	$query = mysql_query("select wt_compliment_status from widget_tmp where wt_id = '$id'");
	$row = mysql_fetch_array($query);
	return $row['wt_compliment_status'];
}

function get_compliment_status_manual($menu_id, $table_id){
	$query = mysql_query("select wt_compliment_status from widget_tmp where menu_id = '$menu_id' and table_id = '$table_id' and user_id = '".$_SESSION['user_id']."'");
	$row = mysql_fetch_array($query);
	return $row['wt_compliment_status'];
}

function create_config($table, $data){
	mysql_query("insert into $table values(".$data.")");
}

function update_config($table, $data, $column, $id){
	mysql_query("update $table set $data where $column = $id");
}

function update_compliment($id, $status){
	
	
	mysql_query("update widget_tmp set wt_compliment_status = '$status' where wt_id = '$id'");
}


function update_config2($table, $data, $param){
	mysql_query("update $table set $data where $param");
}

function delete_config($table, $param){
	mysql_query("delete from $table where $param");
}




function delete_history($id){
	mysql_query("delete from transaction_tmp_details  where transaction_detail_id = '$id'");
}

function check_table($table_id){
	$query = mysql_query("select count(transaction_id) as jumlah
							  from transactions_tmp
							  where table_id = '".$table_id."'
							  ");
	$row = mysql_fetch_array($query);
	
	$jumlah = $row['jumlah'];
	return $jumlah;
}

function get_transaction_id_old($table_id){
	$query = mysql_query("select transaction_id
							  from transactions_tmp
							  where table_id = '".$table_id."'
							  ");
	$row = mysql_fetch_array($query);
	
	return $row['transaction_id'];
	
}


function get_note_desc($wt_id){
	$query = mysql_query("select wt_desc
							  from widget_tmp
							  where wt_id = '".$wt_id."'
							  ");
	$row = mysql_fetch_array($query);
	
	return $row['wt_desc'];
	
}

function get_note_active($note_id, $wt_id){
	$query = mysql_query("select count(wt_id) as result
							  from widget_tmp_details
							  where wt_id = '".$wt_id."' and note_id  = '$note_id'
							  ");
	$row = mysql_fetch_array($query);
	

	return ($row['result']) ? $row['result'] : 0;
	
}

function get_link_active($note_id, $wt_id){
	$query = mysql_query("select wtd_id as result
							  from widget_tmp_details
							  where wt_id = '".$wt_id."' and note_id  = '$note_id'
							  ");
	$row = mysql_fetch_array($query);
	

	return $row['result'];
	
}


function check_history($table_id, $menu_id){
	$query = mysql_query("select count(b.transaction_detail_id) as jumlah
							  from transactions_tmp a
							  join transaction_tmp_details b on b.transaction_id = a.transaction_id
							  where table_id = '".$table_id."' and menu_id = '$menu_id'
							  ");
	$row = mysql_fetch_array($query);
	
	$jumlah = $row['jumlah'];
	return $jumlah;
}

function get_data_history($table_id, $menu_id){
	$query = mysql_query("select b.*
							  from transactions_tmp a
							  join transaction_tmp_details b on b.transaction_id = a.transaction_id
							  where table_id = '".$table_id."' and menu_id = '$menu_id'
							  ");
	return $query;
}

function delete_reserved($table_id){
	mysql_query("delete from reserved where table_id = $table_id
							  ");
}

function get_widget($menu_id, $table_id){
	$query = mysql_query("select count(menu_id) as jumlah 
							from widget_tmp 
							where menu_id = '".$menu_id."' 
							and user_id = '".$_SESSION['user_id']."'
							and table_id = '$table_id'
							  ");
	$row = mysql_fetch_array($query);
	
	$jumlah = ($row['jumlah']) ? $row['jumlah'] : 0;
	return $jumlah;
}

function get_jumlah($menu_id, $table_id){
	$query = mysql_query("select (jumlah) as jumlah 
							from widget_tmp 
							where menu_id = '".$menu_id."' 
							and user_id = '".$_SESSION['user_id']."'
							and table_id = '$table_id'
							  ");
	$row = mysql_fetch_array($query);
	
	$jumlah = ($row['jumlah']) ? $row['jumlah'] : 0;
	return $jumlah;
}

function get_all_jumlah($table_id){
	$query = mysql_query("select a.jumlah, c.branch_menu_price, a.wt_compliment_status
							from widget_tmp a
							join branch_menus c on c.menu_id = a.menu_id
							where 
							
							user_id = '".$_SESSION['user_id']."'
							and table_id = '$table_id'
							and c.branch_id = '".$_SESSION['branch_id']."'
							  ");
	$total = 0;
	while($row = mysql_fetch_array($query)){
		if($row['wt_compliment_status']==1){
			$qty = $row['jumlah'] - 1;
		}else{
			$qty = $row['jumlah'];
		}
		$value = $qty * $row['branch_menu_price'];
		$total = $total + $value;
	}
	
	$jumlah = ($total) ? $total : 0;
	return $jumlah;
}


function get_all_jumlah_backup($table_id){
	$query = mysql_query("select sum(jumlah * c.branch_menu_price) as total 
							from widget_tmp a
							join branch_menus c on c.menu_id = a.menu_id
							where 
							
							user_id = '".$_SESSION['user_id']."'
							and table_id = '$table_id'
							and c.branch_id = '".$_SESSION['branch_id']."'
							  ");
	$row = mysql_fetch_array($query);
	
	$jumlah = ($row['total']) ? $row['total'] : 0;
	return $jumlah;
}

function get_building_id($table_id){
	$query = mysql_query("select building_id as result
							from tables 
							  where table_id = '".$table_id."'
							  ");
	$row = mysql_fetch_array($query);
	
	$result = $row['result'];
	return $result;
}

function get_member_id($table_id){
	$query = mysql_query("select member_id as result
							  from transactions_tmp
							  where table_id = '".$table_id."'
							  ");
	$row = mysql_fetch_array($query);
	
	$result = $row['result'];
	return $result;
}

function get_tot_id($table_id){
	$query = mysql_query("select tot_id as result
							  from transactions_tmp
							  where table_id = '".$table_id."'
							  ");
	$row = mysql_fetch_array($query);
	
	$result = $row['result'];
	return $result;
}


function get_table_type($table_id){
	$query = mysql_query("select table_type as result
							  from tables
							  where table_id = '".$table_id."'
							  ");
	$row = mysql_fetch_array($query);
	
	$result = $row['result'];
	return $result;
}


function cek_resep($menu_id, $branch_id){
	$query = mysql_query("select * 
							  from menu_recipes
							  where menu_id = '".$menu_id."'
							  ");
	$stock = 0;
	while($row = mysql_fetch_array($query)){
		$query_stock = mysql_query("select * from item_stocks where item_id = '".$row['item_id']."' and branch_id = '$branch_id'");
		$row_stock = mysql_fetch_array($query_stock);
		
		if($row_stock['item_stock_qty'] == 0 || $row_stock['item_stock_qty'] < $row['item_qty']){
			$stock = $stock + 1;
		}
		
	}
	
	return $stock;
}


?>