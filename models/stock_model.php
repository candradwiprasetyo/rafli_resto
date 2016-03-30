<?php

function select(){
	$query = mysql_query("select a.*,  c.unit_name
							from items a
							join units c on c.unit_id = a.unit_id
							order by item_id");
	return $query;
}

function select_resep($id){
	 $query = mysql_query("select a.*,c.item_name
							  from resep_details a
							  join items c on c.item_id = a.item_id
							  where a.resep_id = '$id' 
							  order by a.resep_id 
							  ");
	return $query;
}

function select_unit(){
	$query = mysql_query("select * from units order by unit_id");
	return $query;
}

function select_branch($where){
	$query = mysql_query("select * from branches $where order by branch_id");
	return $query;
}

function read_id($id){
	$query = mysql_query("select a.*,c.unit_name
			from items a
			join units c on c.unit_id = a.unit_id
			where item_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}


function create($data){
	mysql_query("insert into items values(".$data.")");
	$id = mysql_insert_id();
	return $id;
}

function create_stock($id){
	$query = mysql_query("select * from branches order by branch_id");
	while($row = mysql_fetch_array($query)){
		mysql_query("insert into item_stocks values('', '$id', '0', '".$row['branch_id']."')");
	}
}

function create_config($table, $data){
	mysql_query("insert into $table values(".$data.")");
}

function update($data, $id){
	mysql_query("update items set ".$data." where item_id = '$id'");
}

function get_stock($item_id, $branch_id){
	$query = mysql_query("select item_stock_qty as result from item_stocks where item_id = '$item_id' and branch_id = '$branch_id'");
	$row = mysql_fetch_array($query);
	
	$result = ($row['result']) ? $row['result'] : "0";
	return $result;
}

function delete($id){
	mysql_query("delete from items where item_id  = '$id'");
	
	mysql_query("delete from item_stocks where item_id  = '$id'");
}

function delete_item($id){
	mysql_query("delete from resep_details  where resep_detail_id = '$id'");
}

?>