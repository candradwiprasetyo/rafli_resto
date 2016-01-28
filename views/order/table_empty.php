<div class="table_total_item" style="margin-bottom:10px; margin-top:10px; text-align:center;">

<?php

$q_t = mysql_query("select table_name from tables where table_id = '".$row['table_id']."'");
$r_t = mysql_fetch_array($q_t);
echo "No Meja : ".$r_t['table_name'];
$q_c_t = mysql_query("select b.table_name 
						from table_mergers a 
						join tables b on b.table_id = a.table_id
						where table_parent_id = '".$row['table_id']."'");


$i = 1;
$merged = "";
while($r_c_t = mysql_fetch_array($q_c_t)){
	if($i == 1){
		if($r_c_t['table_name']){ echo " ("; }
	}
	$merged .= $r_c_t['table_name'].",";
$i++;
}

echo substr($merged,0, -1);

if($i > 1){ echo ")"; }
?>
</div>
<span class="tooltip-text">
<div class="table_total_item" style="margin-bottom:10px; text-align:center;">
Meja masih kosong
</div>

<div class="row">
<div class="form-group">
<div class="col-xs-6" style="padding:3px;"><a href="transaction.php?table_id=<?= $row['table_id']?>" style="text-decoration:none;"><div class="btn_add_order">ADD ORDER</div></a>
</div>

<div class="col-xs-6" style="padding:3px;">
<a href="order.php?page=merger_table&table_id=<?= $row['table_id']?>&building_id=<?= $building_id?>" style="text-decoration:none;"><div class="btn_merger">MERGER</div></a>
</div>
</div>
</div>

   
   
</span>
