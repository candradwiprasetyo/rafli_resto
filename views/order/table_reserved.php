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
<?php
$query_res = mysql_query("select * from reserved where table_id = '".$row['table_id']."'");
$row_res = mysql_fetch_array($query_res);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="4">
  <tr>
    <td valign="top">Nama</td>
    <td valign="top">:</td>
    <td valign="top"><?= $row_res['name'] ?></td>
    <td valign="top">&nbsp;</td>
    <td valign="top">Alamat</td>
    <td valign="top">:</td>
    <td valign="top"><?= $row_res['address'] ?></td>
  </tr>
  <tr>
    <td valign="top">Telepon</td>
    <td valign="top">:</td>
    <td valign="top"><?= $row_res['phone'] ?></td>
    <td valign="top">&nbsp;</td>
    <td valign="top">Tanggal</td>
    <td valign="top">:</td>
    <td valign="top"><?= format_date_only($row_res['date']) ?></td>
  </tr>
  <tr>
    <td valign="top">Tamu</td>
    <td valign="top">:</td>
    <td valign="top"><?= $row_res['amount']?></td>
    <td valign="top">&nbsp;</td>
    <td valign="top">Jam</td>
    <td valign="top">:</td>
    <td valign="top"><?= get_hour($row_res['date']); ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

<div class="row">
<div class="form-group">
<div class="col-xs-4" style="padding:3px; "><a href="transaction.php?table_id=<?= $row['table_id']?>" style="text-decoration:none;"><div class="btn_add_order" style="height:70px; padding-top:20px;">PROCESS RESERVED</div></a>
</div>


<div class="col-xs-4" style="padding:3px;">
<form action="order.php?page=add_duration&reserved_id=<?= $row_res['reserved_id']?>&building_id=<?= $building_id?>" enctype="multipart/form-data" method="post">
<select class="form-control" name="i_duration">
<option value="15">15 Menit</option>
<option value="30">30 Menit</option>
<option value="60">1 Jam</option>
</select>
<input type="submit" name="button" id="button" value="ADD DURATION" class="btn_add_order" style="background:#DD4B39; width:100%; border:none; margin-top:4px;" />
</form>
</div>


<div class="col-xs-4" style="padding:3px;">
<a href="#" onclick="javascript: cancel_reserved(<?= $row['table_id']?>)" style="text-decoration:none;"><div class="btn_merger"  style="height:70px; padding-top:20px; ">CANCEL RESERVED</div></a>
</div>
</div>
</div>

   
   
</span>
