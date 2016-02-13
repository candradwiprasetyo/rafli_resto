<?php

function get_total_penjualan($date){
	$query = mysql_query("SELECT sum(transaction_grand_total) as jumlah 
							from transactions 
							WHERE  
							 (transaction_date >= '$date 00:00:00' 
							and transaction_date <= '$date 23:59:59')
							 ");
	$result = mysql_fetch_array($query);
	$result = ($result['jumlah']) ? $result['jumlah'] : "0";
	//$result = 25 / 100 * $result; 
	return $result;
}

function get_total_pengunjung($date){
	$query = mysql_query("SELECT sum(customer_number) as jumlah 
							from transactions 
							WHERE  
							 (transaction_date >= '$date 00:00:00' 
							and transaction_date <= '$date 23:59:59')
							 ");
	$result = mysql_fetch_array($query);
	$result = ($result['jumlah']) ? $result['jumlah'] : "0";
	//$result = 25 / 100 * $result; 
	return $result;
}


?>