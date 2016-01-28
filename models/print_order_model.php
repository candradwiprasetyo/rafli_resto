<?php

function select($table_id){
	$query = mysql_query("select a.*, b.table_name
							  from transactions_tmp a
							  join tables b on b.table_id = a.table_id
							  where a.table_id = '".$table_id."'");
	return $query;
}

function select_item($table_id){
	$query = mysql_query("select b.*, c.menu_name 
							  from transactions_tmp a
							  join transaction_tmp_details b on b.transaction_id = a.transaction_id
							  join menus c on c.menu_id = b.menu_id
							  where a.table_id = '".$table_id."'
							  and transaction_detail_status = '0'
							  ");
	return $query;
}



?>