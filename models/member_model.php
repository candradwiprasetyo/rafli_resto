<?php

function select(){
	$query = mysql_query("select a.* 
							from members a	
												
							order by member_id");
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
							from member_items a
							join menus b on b.menu_id = a.menu_id	
							where member_id = '$id'	
							order by member_item_id");
	return $query;
}

function select_member(){
	$query = mysql_query("select * from members order by member_id ");
	return $query;
}


function read_id($id){
	$query = mysql_query("select *
			from members
			where member_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}


function create($data){
	mysql_query("insert into members values(".$data.")");
}

function create_item($data){
	mysql_query("insert into member_items values(".$data.")");
}

function update($data, $id){
	mysql_query("update members set ".$data." where member_id = '$id'");
}

function delete($id){
	mysql_query("delete from members where member_id = '$id'");
}

function delete_item($id){
	mysql_query("delete from member_items where member_item_id = '$id'");
}

function delete_member_item($member_id, $menu_id){
	mysql_query("delete from member_items where member_id = '$member_id' and menu_id = '$menu_id'");
}

function check_exist($member_id, $menu_id){
	$query = mysql_query("select count(member_item_id) as jumlah
							  from member_items
							  where member_id = '".$member_id."' and menu_id = '".$menu_id."'
							  ");
	$row = mysql_fetch_array($query);
	
	$jumlah = $row['jumlah'];
	return $jumlah;
}


?>