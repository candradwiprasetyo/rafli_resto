<?php

function select(){
	$query = mysql_query("select a.*, b.voucher_type_name
							from vouchers a	
							join voucher_types b on b.voucher_type_id = a.voucher_type_id
							where voucher_id <> 1					
							order by voucher_id");
	return $query;
}

function select_voucher(){
	$query = mysql_query("select * from vouchers order by voucher_id ");
	return $query;
}


function read_id($id){
	$query = mysql_query("select *
			from vouchers
			where voucher_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}


function create($data){
	mysql_query("insert into vouchers values(".$data.")");
}

function update($data, $id){
	mysql_query("update vouchers set ".$data." where voucher_id = '$id'");
}

function delete($id){
	mysql_query("delete from vouchers where voucher_id = '$id'");
}
?>