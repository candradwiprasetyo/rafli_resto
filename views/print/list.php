<?php
function format_date_print($data){
  $d = explode(" ",$data);
  $d2 = explode("-", $d[0]);

  $tgl = $d2[2]."/".$d2[1]."/".$d2[0];
  return $tgl;
}
/*
$outprint = "Just the test printer";
$printer = printer_open("58 Printer(1)");
printer_set_option($printer, PRINTER_MODE, "RAW");
printer_start_doc($printer, "Tes Printer");
printer_start_page($printer);
printer_write($printer, $outprint);
printer_end_page($printer);
printer_end_doc($printer);
printer_close($printer);
*/
?>
<style type="text/css">
body{
	font-family:"Palatino Linotype", "Book Antiqua", Palatino, serif;
}
.frame{
	border:1px solid #000;
	width:10%;
	margin-left:auto;
	margin-right:auto;
	padding:10px;
}
table{
	font-size:12px;
	
}
.header{
	text-align:center;
	font-weight:bold;
	font-size:11px;
	
}
.header_img{

	width:164px;
	height:79px;
	margin-left:auto;
	margin-right:auto;
	margin-bottom:10px;
}

.back_to_order{
	width:10%;
	margin-left:auto;
	margin-right:auto;
	color:#fff;
	font-weight:bold;
	background:#09F;
	text-align:center;
	border-radius:10px;
	margin-top:10px;
	padding:5px;height:30px;
}
.back_to_order:hover{
	background:#069;
}
</style>
<body  onload=print()>
<!--<body>-->

<div class="header">
<span style="font-size:18px;">Mochi Maco<br> </span><br>
Jl klampis jaya 10 E<br />
Surabaya

</div>
<br />

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Tanggal</td>
    <td>:</td>
    <td align="right" ><?= format_date_print($row['transaction_date']) ?></td>
  </tr>
  <tr>
    <td>No Meja</td>
    <td>:</td>
    <td align="right" ><?= $row['table_name']; ?></td>
  </tr>
  <tr>
    <td>Nama Kasir</td>
    <td>:</td>
    <td align="right" ><?= $row['user_name']; ?></td>
  </tr>
</table>
<br />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<?php
  $no_item = 1;
  $total_price = 0;
 
  while($row_item = mysql_fetch_array($query_item)){
  ?>
  <tr>
    <td><?php 
	echo $row_item['menu_name'];
	if($row_item['transaction_detail_compliment_status']){ echo "(C)"; }
	
	?></td>
    
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td><?= $row_item['transaction_detail_qty']." x ".number_format($row_item['transaction_detail_price'])?></td>
    <td align="right"><?= number_format($row_item['transaction_detail_total'])?></td>
  </tr>
  <?php
	if($row_item['transaction_detail_compliment_status'] == 1){
		$jumlah_comp = $row_item['transaction_detail_qty'] - 1;
	}else{
		$jumlah_comp = $row_item['transaction_detail_qty'];
	}
	$total_comp = $jumlah_comp * $row_item['transaction_detail_grand_price'];
 $total_price = $total_price + $total_comp;
 
  $no_item++;
  }
 ?>
</table>
<br />
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:14px;">
  <tr>
    <td><strong>Total</strong></td>
    <td align="right"><strong><?= number_format($total_price)?></strong></td>
  </tr>
   <tr>
    <td><strong>Diskon</strong></td>
    <td align="right"><strong><?= number_format($row['transaction_discount'])?></strong></td>
  </tr>
  <tr>
    <td><strong>Grand Total</strong></td>
    <td align="right"><strong><?= number_format($row['transaction_grand_total'])?></strong></td>
  </tr>
  <tr>
    <td><strong>Bayar</strong></td>
    <td align="right"><strong><?= number_format($row['transaction_payment'])?></strong></td>
  </tr>
  <tr>
    <td><strong>Kembali</strong></td>
    <td align="right"><strong><?= number_format($row['transaction_change'])?></strong></td>
  </tr>
</table>

<br />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center">TERIMA KASIH ATAS<br /> KUNJUNGAN ANDA<br>" <?php echo strtoupper($row['member_name']) ?> "</td>
  </tr>
</table>
<a href="order.php" style="text-decoration:none"><div class="back_to_order"></div></a>
</body>