<?php

function select(){
	$query = mysql_query("select a.* 
							from branches a
							
							order by branch_id");
	return $query;
}

function select_branch(){
	$query = mysql_query("select * from branches order by branch_id ");
	return $query;
}


function read_id($id){
	$query = mysql_query("select *
			from branches
			where branch_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}


function create($data){
	mysql_query("insert into branches values(".$data.")");
	$id = mysql_insert_id();
	return $id;
}

function create_building($data){
	mysql_query("insert into buildings values(".$data.")");
	$id = mysql_insert_id();
	return $id;
}

function create_table($data){
	mysql_query("insert into tables values(".$data.")");
	$id = mysql_insert_id();
	return $id;
}

function update($data, $id){
	mysql_query("update branches set ".$data." where branch_id = '$id'");
}

function update_item($price, $id){
	mysql_query("update branch_menus set branch_menu_price = '$price' where branch_menu_id = '$id'");
}

function update_building($data, $id){
	mysql_query("update buildings set ".$data." where branch_id = '$id'");
}

function delete($id){
	mysql_query("delete from branches where branch_id = '$id'");
	
	mysql_query("delete from buildings where branch_id = '$id'");
}
function get_img_old($id){
	$query = mysql_query("select branch_img
			from branches
			where branch_id = '$id'");
	$result = mysql_fetch_array($query);
	return $result['branch_img'];
}

function check_exist($branch_id, $menu_id){
	$query = mysql_query("select count(branch_menu_id) as jumlah
							  from branch_menus
							  where branch_id = '".$branch_id."' and menu_id = '".$menu_id."'
							  ");
	$row = mysql_fetch_array($query);
	
	$jumlah = $row['jumlah'];
	return $jumlah;
}

function get_exist($branch_id, $menu_id){
	$query = mysql_query("select branch_menu_id as result
							  from branch_menus
							  where branch_id = '".$branch_id."' and menu_id = '".$menu_id."'
							  ");
	$row = mysql_fetch_array($query);
	
	$jumlah = $row['result'];
	return $jumlah;
}

function create_item($data){
	mysql_query("insert into branch_menus values(".$data.")");
}	

function delete_item($branch_id, $menu_id){
	mysql_query("delete from branch_menus where branch_id = '$branch_id' and menu_id = '$menu_id'");
}

function get_menu_price($branch_id, $menu_id){
	$query = mysql_query("select branch_menu_price as result
							  from branch_menus
							  where branch_id = '".$branch_id."' and menu_id = '".$menu_id."'
							  ");
	$row = mysql_fetch_array($query);
	
	$jumlah = $row['result'];
	return $jumlah;
}


?>