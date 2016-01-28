<?php

function get_jumlah_penjualan($date, $where){
	$query = mysql_query("SELECT count(transaction_id) as jumlah 
							from transactions 
							WHERE  transaction_date >= '$date 00:00:00'
							AND transaction_date <= '$date 23:59:59'
							$where
							 ");
	$result = mysql_fetch_object($query);
	return $result->jumlah;
}

function get_total_omset($date, $where){
	$query = mysql_query("SELECT sum(transaction_total) as jumlah 
							from transactions 
							WHERE  transaction_date >= '$date 00:00:00'
							AND transaction_date <= '$date 23:59:59'
							$where
							 ");
	$result = mysql_fetch_array($query);
	$result = ($result['jumlah']) ? $result['jumlah'] : "0"; 
	return $result;
}
function get_menu_terlaris($date, $where){
	$query = mysql_query("SELECT a.menu_id, a.menu_price, a.menu_name, jumlah
								FROM menus a
								JOIN (
								
									SELECT sum( transaction_detail_qty ) AS jumlah, menu_id
									FROM transaction_details a
									JOIN transactions b on b.transaction_id = a.transaction_id
									WHERE  b.transaction_date >= '$date 00:00:00'
									AND b.transaction_date <= '$date 23:59:59'
									$where
									GROUP BY menu_id
								) AS b ON b.menu_id = a.menu_id
								order by jumlah desc, menu_id asc
								limit 1
								
							 ");
	$result = mysql_fetch_array($query);
	$result = ($result['menu_name']) ? $result['menu_name'] : "-"; 
	return $result;
}

function select_top_food($date1, $date2, $where){
	$where_date1 = "";
	if($date1){
		$where_date1 = " AND  b.transaction_date >= '$date1 00:00:00' ";
	}
	$where_date2 = "";
	if($date2){
		$where_date2 = " AND b.transaction_date <= '$date2 23:59:59' ";
	}
	$query = mysql_query("SELECT a.menu_id, a.menu_price, a.menu_name, jumlah
								FROM menus a
								JOIN (
								
									SELECT sum( transaction_detail_qty ) AS jumlah, menu_id
									FROM transaction_details a
									JOIN transactions b on b.transaction_id = a.transaction_id
									where transaction_detail_id <> 0
									$where_date1
									$where_date2
									$where
									GROUP BY menu_id
								) AS b ON b.menu_id = a.menu_id
								order by jumlah desc, menu_id asc
								
								
							 ");
	return $query;
}

function select_history(){
	$where_branch = "";
		if($_SESSION['user_type_id']==1 || $_SESSION['user_type_id']==2){
			$where_branch = "";
		}else{
			$where_branch = " where b.branch_id = '".$_SESSION['branch_id']."' ";
		}
	
	$query = mysql_query("select b.*, c.table_name, d.building_name , e.branch_name, f.user_name
									from transactions b 
									left join tables c on c.table_id = b.table_id
									left join buildings d on d.building_id = c.building_id
									join branches e on e.branch_id = d.branch_id
									left join users f on f.user_id = b.user_id
									order by transaction_id
						");
	return $query;
}


?>