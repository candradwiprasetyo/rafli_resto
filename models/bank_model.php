<?php

function select(){
	$query = mysql_query("select a.* 
							from banks a	
												
							order by bank_id");
	return $query;
}

function select_partner(){
	$query = mysql_query("select a.* 
							from partners a	
							order by partner_id");
	return $query;
}

function select_menu($partner_id){
	$query = mysql_query("select a.* 
							from menus a	
							where partner_id = '$partner_id'
							order by menu_id");
	return $query;
}

function select_item($id){
	$query = mysql_query("select a.*, b.menu_name
							from bank_items a
							join menus b on b.menu_id = a.menu_id	
							where bank_id = '$id'	
							order by bank_item_id");
	return $query;
}

function select_bank(){
	$query = mysql_query("select * from banks order by bank_id ");
	return $query;
}


function read_id($id){
	$query = mysql_query("select *
			from banks
			where bank_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}


function create($data){
	mysql_query("insert into banks values(".$data.")");
}

function create_item($data){
	mysql_query("insert into bank_items values(".$data.")");
}

function update($data, $id){
	mysql_query("update banks set ".$data." where bank_id = '$id'");
}

function delete($id){
	mysql_query("delete from banks where bank_id = '$id'");
}

function delete_item($id){
	mysql_query("delete from bank_items where bank_item_id = '$id'");
}

function delete_bank_item($bank_id, $menu_id){
	mysql_query("delete from bank_items where bank_id = '$bank_id' and menu_id = '$menu_id'");
}

function check_exist($bank_id, $menu_id){
	$query = mysql_query("select count(bank_item_id) as jumlah
							  from bank_items
							  where bank_id = '".$bank_id."' and menu_id = '".$menu_id."'
							  ");
	$row = mysql_fetch_array($query);
	
	$jumlah = $row['jumlah'];
	return $jumlah;
}


?>