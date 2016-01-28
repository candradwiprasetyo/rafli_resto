<?php

function select($table_id){
	$query = mysql_query("select b.*, c.menu_name 
							  from transactions_tmp a
							  join transaction_tmp_details b on b.transaction_id = a.transaction_id
							  join menus c on c.menu_id = b.menu_id
							  where table_id = '".$table_id."'");
	return $query;
}

function create($data){
	mysql_query("insert into buildings values(".$data.")");
}

function get_table_name($table_id){
	$query = mysql_query("select table_name as result from tables where table_id = '$table_id'");
	$row = mysql_fetch_array($query);
	
	return $row['result'];
}
function get_building_name($id){
	$query = mysql_query("select building_name as result from buildings where building_id = '$id'");
	$row = mysql_fetch_array($query);
	
	return $row['result'];
}

function get_transaction_code($id){
	$query = mysql_query("select transaction_code as result from transactions_tmp where table_id = '$id'");
	$row = mysql_fetch_array($query);
	
	return $row['result'];
}


?>