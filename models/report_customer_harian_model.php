<?php

function get_total_customer1($date){
	$query = mysql_query("SELECT sum(customer_number) as jumlah 
							from transactions 
							WHERE  
							(HOUR(transaction_date) > 9 and hour(transaction_date) < 16)
							AND (transaction_date >= '$date 00:00:00' 
							and transaction_date <= '$date 23:59:59')
							 ");
	$result = mysql_fetch_array($query);
	$result = ($result['jumlah']) ? $result['jumlah'] : "0";
	//$result = 25 / 100 * $result; 
	return $result;
}

function get_total_customer2($date){
	$query = mysql_query("SELECT sum(customer_number) as jumlah 
							from transactions 
							WHERE  
							(HOUR(transaction_date) > 15 and hour(transaction_date) < 22)
							AND (transaction_date >= '$date 00:00:00' 
							and transaction_date <= '$date 23:59:59')
							 ");
	$result = mysql_fetch_array($query);
	$result = ($result['jumlah']) ? $result['jumlah'] : "0";
	//$result = 25 / 100 * $result; 
	return $result;
}

function get_total_customer_all($date){
	$query = mysql_query("SELECT sum(customer_number) as jumlah 
							from transactions 
							WHERE  
							(HOUR(transaction_date) > 11 and hour(transaction_date) < 21)
							AND (transaction_date >= '$date 00:00:00' 
							and transaction_date <= '$date 23:59:59')
							 ");
	$result = mysql_fetch_array($query);
	$result = ($result['jumlah']) ? $result['jumlah'] : "0";
	//$result = 25 / 100 * $result; 
	return $result;
}


?>