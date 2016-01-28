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
<span style="font-size:18px;">Hikaru Resto<br>


</div>
<br />

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?= "Meja : ". $row['table_name']?></td>
   
    <td align="right" ><?= $row['transaction_date'] ?></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<?php
  $no_item = 1;
  $total_price = 0;
 	
 $query = mysql_query("select a.*, b.menu_name from widget_tmp a 
                                                                    join menus b on b.menu_id = a.menu_id
                                                                    where user_id = '".$_SESSION['user_id']."' 
                                                                    and table_id = '$table_id'
                                                                    order by a.wt_id");
  while($row = mysql_fetch_array($query)){
  ?>
  <tr>&nbsp;
    <td><?= $no_item. '. '.$row['menu_name'] ?></td>
    <td align="right"><?=  $row['jumlah'] ?></td>
  </tr>
  
<?php
                                            $query_widget_detail = mysql_query("select a.*, b.note_name
                                                                    from widget_tmp_details a
                                                                    join notes b on b.note_id = a.note_id
                                                                    where wt_id = '".$row['wt_id']."'
                                                                    order by wt_id

                                                                    ");
                                            while($row_widget_detail = mysql_fetch_array($query_widget_detail)){

                                            ?>
                                            
                                            <tr>
                                           
                                               <td>&nbsp;&nbsp;&nbsp;&nbsp;- <?= $row_widget_detail['note_name']?></td>
                                                <td></td>
                                              
                                            </tr>

                                            <?php
                                            }
                                            ?>

  <?php
 $no_item++;
 //$total_price = $total_price + $row_item['transaction_detail_total'];
  }
 ?>
</table>
<br />
<!--<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:14px;">
  <tr>
    <td style="font-size:18px"><strong>Total</strong></td>
    <td style="font-size:18px" align="right"><strong><?= number_format($total_price)?></strong></td>
  </tr>
  
</table>
-->
<br>
<br>
<hr>
<br />

<a href="order.php" style="text-decoration:none"><div class="back_to_order"></div></a>
</body>