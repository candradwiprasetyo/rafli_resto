<?php

function select(){
	$query = mysql_query("select * from tables order by table_id");
	return $query;
}

function select_table_merger($building_id, $table_id){
	$query = mysql_query("select a.* , b.building_name as nama_gedung
							from tables a
							join buildings b on b.building_id = a.building_id
							where (a.building_id = '$building_id' and a.table_id <> '$table_id'
							and a.tms_id <> '1') and a.table_status_id = 1 
							order by table_name");
	return $query;
}

function save_table_location($id, $data_x, $data_y){
		$get_margin = (mysql_fetch_array(mysql_query("select * from tables where table_id = '$id' ")));
		$margin_x=($get_margin['data_x']);
		$margin_y=($get_margin['data_y']);
		
		$data_x = $data_x + $margin_x;
		$data_y = $data_y + $margin_y;
		
		$data_x = ($data_x < 0) ? 0 : $data_x;
		$data_y = ($data_y < 0) ? 0 : $data_y;
		
		$data_x = ($data_x > 1264) ? 1264 : $data_x;
		$data_y = ($data_y > 768) ? 768 : $data_y;
		
		$query = mysql_query("update tables set data_x = '$data_x', data_y ='$data_y' where table_id = '$id'");
		
}



function get_item_ordered($id){
	$query = mysql_query("select count(menu_id) as jumlah from transactions_tmp a
							join transaction_tmp_details b on b.transaction_id = a.transaction_id
							where table_id = '$id' and transaction_detail_status = '1'");
	$row = mysql_fetch_array($query);
	
	$result = ($row['jumlah']) ? $row['jumlah'] : 0 ; 
	return $result;
}

function get_item_not_ordered($id){
	$query = mysql_query("select count(menu_id) as jumlah from transactions_tmp a
							join transaction_tmp_details b on b.transaction_id = a.transaction_id
							where table_id = '$id' and transaction_detail_status = '0'");
	$row = mysql_fetch_array($query);
	
	$result = ($row['jumlah']) ? $row['jumlah'] : 0 ; 
	return $result;
}


function save_room($data){
		$query = mysql_query("insert into buildings values($data)");
		
}

function save_table($data){
		$query = mysql_query("insert into tables values($data)");
		
}

function save_merger_table($data){
		$query = mysql_query("insert into table_mergers values($data)");
		
}


function delete_merger_table($table_parent_id, $table_id){
		$query = mysql_query("delete from table_mergers where table_parent_id = '$table_parent_id' and table_id = '$table_id'");
		
}

function delete_config($table, $param){
	mysql_query("delete from $table where $param");
}

function update_merger_status($table_id, $status){
	mysql_query("update tables set tms_id = '$status' where table_id = '$table_id'");
}

function get_first_building_id($branch_id){
	$query = mysql_query("select min(building_id) as result from buildings where branch_id = '$branch_id'");
	$row = mysql_fetch_array($query);
	
	$result = ($row['result']) ? $row['result'] : 0 ; 
	return $result;
}

function get_first_branch_id(){
	$query = mysql_query("select min(branch_id) as result from branches");
	$row = mysql_fetch_array($query);
	
	$result = ($row['result']) ? $row['result'] : 0 ; 
	return $result;
}

function get_building_name($building_id){
	$query = mysql_query("select building_name as result from buildings where building_id = '$building_id'");
	$row = mysql_fetch_array($query);
	
	$result = ($row['result']);
	return $result;
}

function get_branch_name($branch_id){
	$query = mysql_query("select branch_name as result from branches where branch_id = '$branch_id'");
	$row = mysql_fetch_array($query);
	
	$result = ($row['result']);
	return $result;
}

function get_building_img($building_id){
	$query = mysql_query("select building_img as result from buildings where building_id = '$building_id'");
	$row = mysql_fetch_array($query);
	
	$result = ($row['result']);
	return $result;
}

function create_config($table, $data){
	mysql_query("insert into $table values(".$data.")");
}

function create_journal($data_id, $data_url, $journal_type_id, $journal_debit, $journal_desc, $bank_id, $branch_id){
	mysql_query("insert into journals values(
				'',
				'$journal_type_id',
				'$data_id',
				'$data_url',
				'$journal_debit',
				'0',
				'0',
				'0',
				'".date("Y-m-d")."',
				'$journal_desc',
				'$bank_id',
				'".$_SESSION['user_id']."',
				'$branch_id'
	)");
}

function delete_tmp($table_id){
		$query =  mysql_query("select * 
								from transactions_tmp a
								where a.table_id = '$table_id'
								");
		while($row = mysql_fetch_array($query)){
			
			
			
			mysql_query("delete from transaction_tmp_details where transaction_id = '".$row['transaction_id']."'");
			
		}
		mysql_query("delete from transactions_tmp where table_id = '$table_id'");
}

function delete_widget_tmp($table_id){
		mysql_query("delete from widget_tmp where table_id = '$table_id'");
}

function get_data_total($table_id){
	 $query = mysql_query("select sum(transaction_detail_total) as total
							  from transactions_tmp a
							  join transaction_tmp_details b on b.transaction_id = a.transaction_id
							  where table_id = '".$table_id."'");
	$row = mysql_fetch_array($query);
	
	return $row['total'];				 
}

function get_total_discount($table_id){
	 $query = mysql_query("select sum(transaction_detail_price_discount) as total
							  from transactions_tmp a
							  join transaction_tmp_details b on b.transaction_id = a.transaction_id
							  where table_id = '".$table_id."'");
	$row = mysql_fetch_array($query);
	
	return $row['total'];				 
}

function get_count_order_status($transaction_id){
	 $query = mysql_query("select count(transaction_id) as result 
	 							from transaction_tmp_details
							  where transaction_detail_status = '0'
							  and transaction_id = '".$transaction_id."'
							  ");
	$row = mysql_fetch_array($query);
	
	return $row['result'];				 
}

function cancel_order($table_id){
		$query =  mysql_query("select * 
								from transactions_tmp a
								where a.table_id = '$table_id'
								");
		while($row = mysql_fetch_array($query)){
			
			mysql_query("delete from transaction_tmp_details where transaction_id = '".$row['transaction_id']."'");
			
		}
		mysql_query("delete from transactions_tmp where table_id = '$table_id'");
		mysql_query("update tables set table_status_id = '1' where table_id = '$table_id'");
}

function cancel_reserved($table_id){
		
		mysql_query("delete from reserved where table_id = '".$table_id."'");
		mysql_query("update tables set table_status_id = '1' where table_id = '$table_id'");
}

function update_table_status($table_id){
		
		mysql_query("update tables set table_status_id = '1' where table_id = '$table_id'");
}

function update_order_status($id){
		mysql_query("update transaction_tmp_details set transaction_detail_status = '1' where transaction_detail_id = '$id'");
}

function update_stock($branch_id, $item_id, $new_stock){
		mysql_query("update item_stocks set item_stock_qty = item_stock_qty - $new_stock where branch_id = '$branch_id' and item_id = '$item_id'");
}



function get_jumlah_meja($building_id){
	$query = mysql_query("select count(a.table_id) as result  
							from tables a
							where a.building_id = '$building_id'");
	$row = mysql_fetch_array($query);
	
	$result = ($row['result']);
	return $result;
}


function get_discount_type($member_id){
	$query = mysql_query("select member_discount_type from members where member_id = '$member_id'");
	$row = mysql_fetch_array($query);
	
	$result = ($row['member_discount_type']);
	return $result;
}


function get_branch_id($building_id){
	$query = mysql_query("select branch_id from buildings where building_id = '$building_id'");
	$row = mysql_fetch_array($query);
	
	$result = ($row['branch_id']);
	return $result;
}

function get_table_name($table_id){
	$query = mysql_query("select table_name as result from tables where table_id = '$table_id'");
	$row = mysql_fetch_array($query);
	
	$result = ($row['result']);
	return $result;
}

function get_reservation_time($id){
	$query = mysql_query("select date as result from reserved where reserved_id = '$id'");
	$row = mysql_fetch_array($query);
	
	$result = ($row['result']);
	return $result;
}


function update_settlement($data, $member_id){
	mysql_query("update members set member_settlement = member_settlement + '$data' where member_id = '$member_id'");
}

function add_duration($id, $data){
	mysql_query("update reserved set date = '$data' where reserved_id = '$id'");
	
}

?>