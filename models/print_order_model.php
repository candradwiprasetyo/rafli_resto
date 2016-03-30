<?php

function select($table_id){
	$query = mysql_query("select a.*, b.table_name
							  from transactions_tmp a
							  join tables b on b.table_id = a.table_id
							  where a.table_id = '".$table_id."'");
	return $query;
}

function select_item($table_id, $mt_id){
	$query = mysql_query("select b.*, c.menu_name 
							  from transactions_tmp a
							  join transaction_tmp_details b on b.transaction_id = a.transaction_id
							  join menus c on c.menu_id = b.menu_id
							  join menu_types d on d.menu_type_id = c.menu_type_id
							  where a.table_id = '".$table_id."'
							  and transaction_detail_status = '0'
							  
							  ");
	return $query;
}

function get_menu_exist($table_id, $mt_id){
	$query = mysql_query("select count(*) as result
							  from transactions_tmp a
							  join transaction_tmp_details b on b.transaction_id = a.transaction_id
							  join menus c on c.menu_id = b.menu_id
							  join menu_types d on d.menu_type_id = c.menu_type_id
							  where a.table_id = '".$table_id."'
							  and transaction_detail_status = '0'
							  and d.menu_type_id = '$mt_id'
							  ");
	$row = mysql_fetch_array($query);
	$result = ($row['result']) ? $row['result'] : 0;
	return $result;
}


function get_mt_name($mt_id){
	$query = mysql_query("select menu_type_name as result from menu_types where menu_type_id = '$mt_id'");
	$row = mysql_fetch_array($query);
	
	return $row['result'];
}


?>