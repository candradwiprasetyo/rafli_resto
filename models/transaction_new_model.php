<?php

function select(){
	$query = mysql_query("select * from menus order by menu_id");
	return $query;
}

function select_cat(){
	$query = mysql_query("select * from menu_types order by menu_type_id");
	return $query;
}

function read_id($table_id){
	$query = mysql_query("select * from transactions_tmp where table_id = '$table_id'");
	$row = mysql_fetch_array($query);
	return $row;
}

function select_item(){
	 $query = mysql_query("select a.*, c.menu_name 
							  from transaction_new_tmp a
							  join menus c on c.menu_id = a.menu_id
							  where user_id = '".$_SESSION['user_id']."'
							  order by tnt_id 
							  ");
	return $query;
}


function select_item_edit($table_id){

	 $query = mysql_query("select a.*, c.menu_name 
							  from transaction_tmp_details a
							  join transactions_tmp b on b.transaction_id = a.transaction_id
							  join menus c on c.menu_id = a.menu_id
							  where b.table_id = '$table_id'
							  order by transaction_detail_id 
							  ");
	return $query;
}

function select_menu($keyword){
	$query = mysql_query("select * from menus where menu_name like '%$keyword%' order by menu_id");
	$row = mysql_fetch_array($query);
	return $row['menu_id'];
}

function create_config($table, $data){
	mysql_query("insert into $table values(".$data.")");
}

function update_config($table, $data, $column, $id){
	mysql_query("update $table set $data where $column = $id");
}

function delete_history($id){
	mysql_query("delete from transaction_tmp_details  where transaction_detail_id = '$id'");
}

function delete($table_id){
	mysql_query("delete from transaction_new_tmp");
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

function get_menu_price($menu_id){
	$query = mysql_query("select * from menus where menu_id = '$menu_id'
							  ");
	$row = mysql_fetch_array($query);
	
	return $row;
}



function get_discount($member_id, $menu_id){
	$query = mysql_query("select a.member_discount 
							from members a
							join member_items b on b.member_id = a.member_id
							where a.member_id = '$member_id'
							and b.menu_id = '$menu_id'
							  ");
	$row = mysql_fetch_array($query);
	
	$jumlah = $row['member_discount'];
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

function check_menu($table_id, $menu_id){
	$query = mysql_query("select count(table_id) as jumlah
							  from transaction_new_tmp a
							  where table_id = '".$table_id."' and menu_id = '$menu_id'
							  ");
	$row = mysql_fetch_array($query);
	
	$jumlah = $row['jumlah'];
	return $jumlah;
}

function get_member_id($id){
	$query = mysql_query("select member_id from transaction_new_tmp where tnt_id = '$id'
							  ");
	$row = mysql_fetch_array($query);
	
	$ressult = $row['member_id'];
	return $ressult;
}

function get_table_id($id){
	$query = mysql_query("select table_id from transaction_new_tmp where tnt_id = '$id'
							  ");
	$row = mysql_fetch_array($query);
	
	$ressult = $row['table_id'];
	return $ressult;
}


function get_total($table_id){
	$query = mysql_query("select sum(tnt_total) as jumlah from transaction_new_tmp where table_id = '$table_id'
							  ");
	$row = mysql_fetch_array($query);
	
	$result = $row['jumlah'];
	return $result;
}

function delete_item($id){
	
	
	mysql_query("delete from transaction_new_tmp where tnt_id = '$id'");
	
}

function delete_item_edit($id){
	
	
	mysql_query("delete from transaction_tmp_details where transaction_detail_id = '$id'");
	
}


function get_data_menu($menu_id){
	$query = mysql_query("select * from menus where menu_id = '$menu_id'
							  ");
	$row = mysql_fetch_array($query);
	
	
	return $row;
}

function get_building_id($table_id){
	$query = mysql_query("select building_id from tables where table_id = '$table_id'
							  ");
	$row = mysql_fetch_array($query);
	
	$result = $row['building_id'];
	return $result;
}

function get_transaction_id($table_id){
	$query = mysql_query("select transaction_id from transactions_tmp where table_id = '$table_id'
							  ");
	$row = mysql_fetch_array($query);
	
	$result = $row['transaction_id'];
	return $result;
}


?>