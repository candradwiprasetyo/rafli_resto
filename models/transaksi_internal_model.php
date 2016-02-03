<?php

function select($where){
	$query = mysql_query("select a.*,(b.branch_name) as pabrik,(c.branch_name) as cabang from transaction_internals a 
						  join branches b on b.branch_id = a.pabrik_branch_id
						  join branches c on c.branch_id = a.cabang_branch_id
						  $where
						  order by transaction_internal_id");
	return $query;
}


function read_id($table_id){
	$query = mysql_query("select * from transaction_internals where transaction_internal_id = '$table_id'");
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
							  from transaction_internal_details a
							  join transaction_internals b on b.transaction_internal_id = a.transaction_internal_id
							  where a.transaction_internal_id = $id
							  order by a.transaction_internal_detail_id 
							  ");
	return $query;
}

function select_detail($id,$user_id){
	 $query = mysql_query("select a.*,c.item_name
							  from transaction_internal_details a
							  join items c on c.item_id = a.item_id
							  where a.transaction_internal_id = '$id' and a.user_id = $user_id
							  order by a.transaction_internal_id 
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
	mysql_query("update transaction_internal_details set transaction_internal_id = $id where transaction_internal_id = 0 and user_id = $user_id");
}

function update_stock($branch_id, $item_id,$new_stock){
	mysql_query("update item_stocks set item_stock_qty = $new_stock where item_id = $item_id and branch_id = $branch_id");
}

function delete_item($id){
	mysql_query("delete from transaction_internal_details  where transaction_internal_detail_id = '$id'");
}

?>