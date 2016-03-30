<?php

function select($where){
	$query = mysql_query("select a.* , b.supplier_name, e.branch_name,(select sum(purchase_detail_price) from purchase_details z where z.purchase_id = a.purchase_id) as total
							from purchases a
							join suppliers b on b.supplier_id = a.supplier_id
							join branches e on e.branch_id = a.branch_id
							$where
							order by purchase_id");
	return $query;
}

function select_supplier(){
	$query = mysql_query("select * from suppliers order by supplier_id ");
	return $query;
}

function select_item(){
	$query = mysql_query("select a.*, b.unit_name 
							from items a 
							join units b on b.unit_id = a.unit_id
							order by item_id");
	return $query;
}

function select_branch(){
	$query = mysql_query("select * from branches order by branch_id");
	return $query;
}

function select_detail($id,$user_id){
	 $query = mysql_query("select a.*,c.item_name
							  from purchase_details a
							  join items c on c.item_id = a.item_id
							  where a.purchase_id = '$id' and a.user_id = $user_id
							  order by a.purchase_detail_id 
							  ");
	return $query;
}

function read_id($id){
	$query = mysql_query("select a.*,b.supplier_name
			from purchases a
			join suppliers b on b.supplier_id = a.supplier_id
			
			where purchase_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}


function create($data){
	mysql_query("insert into purchases values(".$data.")");
}


function create_journal($data_id, $data_url, $journal_type_id, $journal_credit, $journal_desc, $bank_id, $branch_id){
	mysql_query("insert into journals values(
				'',
				'$journal_type_id',
				'$data_id',
				'$data_url',
				'0',
				'$journal_credit',
				'0',
				'0',
				'".date("Y-m-d")."',
				'$journal_desc',
				'$bank_id',
				'".$_SESSION['user_id']."',
				'$branch_id'
	)");
}

function add_stock($item_id, $branch_id, $qty){
	$query = mysql_query("select count(item_stock_id) as result from item_stocks where item_id = '$item_id' and branch_id = '$branch_id'");
	$result = mysql_fetch_array($query);
	
	if($result['result'] > 0){
		mysql_query("update item_stocks set item_stock_qty = item_stock_qty + $qty where item_id = $item_id and branch_id = '$branch_id'");
	}else{
		mysql_query("insert into item_stocks values('', '$item_id', '$qty', '$branch_id')");
	}
}



function update($data, $id){
	mysql_query("update purchases set ".$data." where purchase_id = '$id'");
}

function delete($id){
	mysql_query("delete from purchases where purchase_id = '$id'");
}

function payment($id){
	mysql_query("update purchases set purchase_status = '1', purchase_payment_date = '".date("Y-m-d")."'  where purchase_id = '$id'");
}

function get_item_name($item_id){
	$query = mysql_query("select item_name as result from items where item_id= '$item_id'");
	$row = mysql_fetch_array($query);
	
	$result = ($row['result']);
	return $result;
}

function create_config($table, $data){
	mysql_query("insert into $table values(".$data.")");
}

function update_config($table, $data, $column, $id){
	mysql_query("update $table set $data where $column = $id");
}

function update_detail($id, $user_id){
	mysql_query("update purchase_details set purchase_id = $id where purchase_id = 0 and user_id = $user_id");
}

function select_detail_tmp($id){
	 $query = mysql_query("select a.*,b.branch_id
							  from purchase_details a
							  join purchases b on b.purchase_id = a.purchase_id
							  where a.purchase_id = $id
							  order by a.purchase_detail_id 
							  ");
	return $query;
}

function select_stock($branch_id,$item_id){
	$query = mysql_query("select * from item_stocks where branch_id = '$branch_id' and item_id = '$item_id'");
	$row = mysql_fetch_array($query);
	return $row;
}

function update_stock($branch_id, $item_id,$new_stock){
	mysql_query("update item_stocks set item_stock_qty = $new_stock where item_id = $item_id and branch_id = $branch_id");
}

function delete_item($id){
	mysql_query("delete from purchase_details where purchase_detail_id = '$id'");
}

function get_total($id){
	$query = mysql_query("select (sum(purchase_detail_price)) as total from purchase_details where purchase_id = $id");
	$row = mysql_fetch_array($query);
	return $row;
}
?>