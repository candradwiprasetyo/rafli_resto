<?php

function select(){
	$query = mysql_query("select a.* 
							from journal_types a	
												
							order by journal_type_id");
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
							from journal_type_items a
							join menus b on b.menu_id = a.menu_id	
							where journal_type_id = '$id'	
							order by journal_type_item_id");
	return $query;
}

function select_journal_type(){
	$query = mysql_query("select * from journal_types order by journal_type_id ");
	return $query;
}


function read_id($id){
	$query = mysql_query("select *
			from journal_types
			where journal_type_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}


function create($data){
	mysql_query("insert into journal_types values(".$data.")");
}

function create_item($data){
	mysql_query("insert into journal_type_items values(".$data.")");
}

function update($data, $id){
	mysql_query("update journal_types set ".$data." where journal_type_id = '$id'");
}

function delete($id){
	mysql_query("delete from journal_types where journal_type_id = '$id'");
}

function delete_item($id){
	mysql_query("delete from journal_type_items where journal_type_item_id = '$id'");
}

function delete_journal_type_item($journal_type_id, $menu_id){
	mysql_query("delete from journal_type_items where journal_type_id = '$journal_type_id' and menu_id = '$menu_id'");
}

function check_exist($journal_type_id, $menu_id){
	$query = mysql_query("select count(journal_type_item_id) as jumlah
							  from journal_type_items
							  where journal_type_id = '".$journal_type_id."' and menu_id = '".$menu_id."'
							  ");
	$row = mysql_fetch_array($query);
	
	$jumlah = $row['jumlah'];
	return $jumlah;
}


?>