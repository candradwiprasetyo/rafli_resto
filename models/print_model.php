<?php

function select($transaction){
	$query = mysql_query("select a.*, b.table_name, c.member_name
							  from transactions a
							  left join members c on c.member_id = a.member_id
							  join tables b on b.table_id = a.table_id
							  where transaction_id = '".$transaction."'");
	return $query;
}

function select_item($transaction){
	$query = mysql_query("select b.*, c.menu_name 
							  from transactions a
							  join transaction_details b on b.transaction_id = a.transaction_id
							  join menus c on c.menu_id = b.menu_id
							  where a.transaction_id = '".$transaction."'");
	return $query;
}



?>