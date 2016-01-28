<?php

function select(){
	$query = mysql_query("select a.*, b.branch_name
							from buildings a
							join branches b on b.branch_id = a.branch_id
							order by building_id");
	return $query;
}

function select_building(){
	$query = mysql_query("select * from buildings order by building_id ");
	return $query;
}

function select_branch(){
	$query = mysql_query("select * from branches order by branch_id ");
	return $query;
}


function read_id($id){
	$query = mysql_query("select *
			from buildings
			where building_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}


function create($data){
	mysql_query("insert into buildings values(".$data.")");
}

function update($data, $id){
	mysql_query("update buildings set ".$data." where building_id = '$id'");
}

function delete($id){
	mysql_query("delete from buildings where building_id = '$id'");
}
function get_img_old($id){
	$query = mysql_query("select building_img
			from buildings
			where building_id = '$id'");
	$result = mysql_fetch_array($query);
	return $result['building_img'];
}


?>