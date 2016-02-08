<?php

function select($where){
	$query = mysql_query("select a.*,b.branch_name,c.resep_name from transaction_productions a 
						  join branches b on b.branch_id = a.branch_id
						  join reseps c on c.resep_id = a.resep_id
						  $where
						  order by transaction_production_id");
	return $query;
}


function read_id($table_id){
	$query = mysql_query("select * from transaction_productions where transaction_production_id = '$table_id'");
	$row = mysql_fetch_object($query);
	return $row;
}

function select_stock($branch_id,$item_id){
	$query = mysql_query("select * from item_stocks where branch_id = '$branch_id' and item_id = '$item_id'");
	$row = mysql_fetch_array($query);
	return $row;
}

function select_item($id){
	 $query = mysql_query("select a.*,b.branch_id
							  from transaction_production_details a
							  join transaction_productions b on b.transaction_production_id = a.transaction_production_id
							  where a.transaction_production_id = $id
							  order by a.transaction_production_detail_id 
							  ");
	return $query;
}

function select_resep($id){
	 $query = mysql_query("select a.*
							  from resep_details a
							  where a.resep_id = $id
							  order by a.resep_detail_id 
							  ");
	return $query;
}

function select_detail($id,$user_id){
	 $query = mysql_query("select a.*,c.item_name
							  from transaction_production_details a
							  join items c on c.item_id = a.item_id
							  where a.transaction_production_id = '$id' and a.user_id = $user_id
							  order by a.transaction_production_id 
							  ");
	return $query;
}



function create_config($table, $data){
	mysql_query("insert into $table values(".$data.")");
}

function update_production($id,$hasil){
	mysql_query("update transaction_productions set transaction_production_hasil = $hasil where transaction_production_id = $id");
}

function update_config($table, $data, $column, $id){
	mysql_query("update $table set $data where $column = $id");
}

function update_detail($id, $user_id){
	mysql_query("update transaction_production_details set transaction_production_id = $id where transaction_production_id = 0 and user_id = $user_id");
}

function update_stock($branch_id, $item_id,$new_stock){
	mysql_query("update item_stocks set item_stock_qty = $new_stock where item_id = $item_id and branch_id = $branch_id");
}

function get_resep($id){
	$query = mysql_query("select * from reseps where resep_id = '$id'");
	$row = mysql_fetch_array($query);
	return $row;
}

function delete_item($id){
	mysql_query("delete from transaction_production_details  where transaction_production_detail_id = '$id'");
}

?>