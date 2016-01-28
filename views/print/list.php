<?php
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
<span style="font-size:18px;">Hikaru<br>
Resto </span><br>
Jl. Taman Gayungsari Timur No.7 Surabaya<br />
(031) 8381 9381

</div>
<br />

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?= $row['table_name']?></td>
   
    <td align="right" ><?= $row['transaction_date'] ?></td>
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
    <td><?= $row_item['menu_name'] ?></td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td><?= $row_item['transaction_detail_qty']." x ".number_format($row_item['transaction_detail_price'])?></td>
    <td align="right"><?= number_format($row_item['transaction_detail_total'])?></td>
  </tr>
  <?php
 $no_item++;
 $total_price = $total_price + $row_item['transaction_detail_total'];
  }
 ?>
</table>
<br />
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:14px;">
  <tr>
    <td style="font-size:18px"><strong>Total</strong></td>
    <td style="font-size:18px" align="right"><strong><?= number_format($total_price)?></strong></td>
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