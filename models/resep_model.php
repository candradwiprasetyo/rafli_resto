<?php

function select(){
	$query = mysql_query("select a.*,b.item_name from reseps a 
						  join items b on b.item_id = a.item_id
						  order by resep_id");
	return $query;
}


function read_id($table_id){
	$query = mysql_query("select * from reseps where resep_id = '$table_id'");
	$row = mysql_fetch_object($query);
	return $row;
}

function select_stock($branch_id,$item_id){
	$query = mysql_query("select * from item_stocks where branch_id = '$branch_id' and item_id = '$item_id'");
	$row = mysql_fetch_array($query);
	return $row;
}

function select_item($id){
	 $query = mysql_query("select a.*,b.*
							  from resep_details a
							  join reseps b on b.resep_id = a.resep_id
							  where a.resep_id = $id
							  order by a.resep_detail_id 
							  ");
	return $query;
}

function select_detail($id,$user_id){
	 $query = mysql_query("select a.*,c.item_name
							  from resep_details a
							  join items c on c.item_id = a.item_id
							  where a.resep_id = '$id' and a.user_id = $user_id
							  order by a.resep_id 
							  ");
	return $query;
}



function create_config($table, $data){
	mysql_query("insert into $table values(".$data.")");
}

function update_config($table, $data, $column, $id){
	mysql_query("update $table set $data where $column = $id");
}

function update_detail($id, $user_id){
	mysql_query("update resep_details set resep_id = $id where resep_id = 0 and user_id = $user_id");
}

function update_stock($branch_id, $item_id,$new_stock){
	mysql_query("update item_stocks set item_stock_qty = $new_stock where item_id = $item_id and branch_id = $branch_id");
}

function delete($id){
	mysql_query("delete from reseps where resep_id = '$id'");
}

function delete_item($id){
	mysql_query("delete from resep_details  where resep_detail_id = '$id'");
}

?>