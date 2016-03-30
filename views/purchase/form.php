<script type="text/javascript">

function CurrencyFormat(number)
{
   var decimalplaces = 0;
   var decimalcharacter = "";
   var thousandseparater = ".";
   number = parseFloat(number);
   var sign = number < 0 ? "-" : "";
   var formatted = new String(number.toFixed(decimalplaces));
   if( decimalcharacter.length && decimalcharacter != "." ) { formatted = formatted.replace(/\./,decimalcharacter); }
   var integer = "";
   var fraction = "";
   var strnumber = new String(formatted);
   var dotpos = decimalcharacter.length ? strnumber.indexOf(decimalcharacter) : -1;
   if( dotpos > -1 )
   {
      if( dotpos ) { integer = strnumber.substr(0,dotpos); }
      fraction = strnumber.substr(dotpos+1);
   }
   else { integer = strnumber; }
   if( integer ) { integer = String(Math.abs(integer)); }
   while( fraction.length < decimalplaces ) { fraction += "0"; }
   temparray = new Array();
   while( integer.length > 3 )
   {
      temparray.unshift(integer.substr(-3));
      integer = integer.substr(0,integer.length-3);
   }
   temparray.unshift(integer);
   integer = temparray.join(thousandseparater);
   return sign + integer + decimalcharacter + fraction;
}


		  function grand_total()
			{
				
				var harga = parseFloat(document.getElementById("i_harga").value);
				var qty = parseFloat(document.getElementById("i_qty").value);
				
					
				var	total = harga * qty;
				
				
				
				document.getElementById("i_total").value = total;
				
			}

function add_menu(id)
{
	//alert(id);

	if(id!=0){
		
		window.location.href = 'purchase.php?page=add_menu&item_id='+id;
	}

}

<?php
while($row_item2 = mysql_fetch_array($query_item2)){
?>
function edit_price_<?= $row_item2['purchase_detail_id']?>(data){
	
	//alert(data);
	if(data > 0){
				var qty = document.getElementById("i_qty_<?=  $row_item2['purchase_detail_id']; ?>").value;
				
	 			$.ajax({
					type: "GET",
					url: "purchase.php?page=edit_price",
					data:{id:<?= $row_item2['purchase_detail_id']?>, price:data,qty:qty}
				}).done(function( result ) {
				   //alert("Simpan berhasil");
				});
				
				document.getElementById("i_total_<?= $row_item2['purchase_detail_id']?>").value =  parseFloat(data);
				
				total = get_total();
				document.getElementById("i_total_transaction").value = CurrencyFormat(total);
				document.getElementById("i_total_transaction_real").value = total;
	}else{
		alert("Qty tidak boleh kurang dari 0");
		document.getElementById("i_total_<?= $row_item2['purchase_detail_id']?>").value =  0;
		total = get_total();
		document.getElementById("i_total_transaction").value = CurrencyFormat(total);
		document.getElementById("i_total_transaction_real").value = total;
	}
}
<?php

}
?>

<?php
while($row_item4 = mysql_fetch_array($query_item4)){
?>
function edit_qty_<?= $row_item4['purchase_detail_id']?>(data){
	
	//alert(data);
	if(data > 0){
				var price = document.getElementById("i_price_<?=  $row_item4['purchase_detail_id']; ?>").value;
				
	 			$.ajax({
					type: "GET",
					url: "purchase.php?page=edit_qty",
					data:{id:<?= $row_item4['purchase_detail_id']?>, qty:data,price:price}
				}).done(function( result ) {
				   //alert("Simpan berhasil");
				});
				
				document.getElementById("i_total_<?= $row_item4['purchase_detail_id']?>").value =  parseFloat(price);
				
				total = get_total();
				document.getElementById("i_total_transaction").value = CurrencyFormat(total);
				document.getElementById("i_total_transaction_real").value = total;
	}else{
		alert("Qty tidak boleh kurang dari 0");
		document.getElementById("i_total_<?= $row_item4['purchase_detail_id']?>").value =  0;
		total = get_total();
		document.getElementById("i_total_transaction").value = CurrencyFormat(total);
		document.getElementById("i_total_transaction_real").value = total;
	}
}

	

<?php

}
?>

function get_total(){
		var total = 0;
		<?php
		while($row_item3 = mysql_fetch_array($query_item3)){
		?>
		total = parseFloat(total) + parseFloat(document.getElementById("i_total_<?= $row_item3['purchase_detail_id']; ?>").value);
		<?php
		}
		?>
		return total;
		
	}


</script>
<!-- Content Header (Page header) -->
        

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                      
                        <!-- right column -->
                        <div class="col-md-12">
                            <!-- general form elements disabled -->

                          
                          <div class="title_page"> <?= $title ?></div>

                             <form action="<?= $action?>" method="post" enctype="multipart/form-data" role="form">

                            <div class="box box-cokelat">
                                
                               
                                <div class="box-body">
                                    
                                    
                                        <div class="col-md-12">
                                        
                                        <!-- list menu -->
            
             <div class="row">
                        <div class="col-xs-12">
                            
                            
                            
                            <div class="box">
                             
                               
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            	<th width="5%">No</th>
                                                <th width="30%">Nama Item</th>
                                                  <th width="10%">Qty</th>
                                                  <th width="15%">Harga</th>
                                                  <!--<th width="15%">Total Price</th>-->
                                                   <th width="10%">Config</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                         <?php
										 //if($table_id!=""){
											 $total = 0;
                                           $no = 1;
										   while($row_item = mysql_fetch_array($query_item)){
                                            ?>
                                            <tr>
                                            	<td><?= $no?></td>
                                               <td><?= $row_item['item_name']?></td>
                                               
                                               <td>
                                             <input <? if ($row->purchase_id) {?> readonly="readonly" <? }?> name="i_qty_<?php echo $row_item['purchase_detail_id']?>" type="text" id="i_qty_<?php echo $row_item['purchase_detail_id']?>" value="<?php echo $row_item['purchase_detail_qty']?>"  class="form-control" onchange="edit_qty_<?php echo $row_item['purchase_detail_id']?>(this.value)" />
                                             
                                             
                                             <input name="i_total_<?php echo $row_item['purchase_detail_id']?>" type="hidden" id="i_total_<?php echo $row_item['purchase_detail_id']?>" value="<?php echo $row_item['purchase_detail_price']?>" class="form-control"  readonly="readonly"/>
                                             </td>
                                             <td><input <? if ($row->purchase_id) {?> readonly="readonly" <? }?> name="i_price_<?php echo $row_item['purchase_detail_id']?>" type="text" id="i_price_<?php echo $row_item['purchase_detail_id']?>" value="<?php echo $row_item['purchase_detail_price']?>"  class="form-control" onchange="edit_price_<?php echo $row_item['purchase_detail_id']?>(this.value)" />
                                               
                                               </td>
                                               <td style="text-align:center;"><? if (!$row->purchase_id) {?>
                                                    <a href="javascript:void(0)" onclick="confirm_delete(<?= $row_item['purchase_detail_id']; ?>,'purchase.php?page=delete_item&id=')" class="btn btn-default" ><i class="fa fa-trash-o"></i></a><? }?>

                                                </td> 
                                            </tr>
                                            <?php
											$no++;
											$total = $total + $row_item['purchase_detail_price'];
                                            }
										// }
											?>
                                          

                                          
                                        </tbody>
                                         <tfoot>
                                          <tr>
                                          <td></td>
                                          <td><? if (!$row->purchase_id) {?>
                                          <select name="i_menu_id" id="i_menu_id"  class="selectpicker show-tick form-control" data-live-search="true" onchange="add_menu(this.value)" >
                                          <option value="0">Add Item</option>
                                        <?php
                                        $query_item = mysql_query("select * from items order by item_id
																	");
                                        while($row_item = mysql_fetch_array($query_item)){
                                        ?>
                                        <option value="<?= $row_item['item_id']?>"><?php
										
										echo $row_item['item_name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                        </select>
                                         <? }?></td>
                                            <td align="right" valign="middle" style="font-size:22px;"><strong>TOTAL (Rp)</strong></td>
                                              
                                           <td colspan="2" ><strong>
                                          <input name="i_total_transaction" type="text" id="i_total_transaction" value="<?php echo number_format($total, 0, ",", ".") ?>" class="form-control"  readonly="readonly" style="font-size:30px; height:50px; text-align:right;" />
                                            <input name="i_total_transaction_real" type="hidden" id="i_total_transaction_real" value="<?php echo $total ?>" class="form-control"  readonly="readonly" style="font-size:30px; height:50px; text-align:right;" />
                                          
                                           </strong>                                            </td>
                                           </tr>
                                           
                                         </tfoot>
                                         
                                    </table>
                             
                   </div><!-- /.box
                            <? if (!$row->transaction_internal_id) {?>
                             <a href="javascript: go_to_payment()"  class="btn btn-success" >SAVE</a>
                             <? }?> -->

                        </div>
                        
                        
                    </div>
            
            <!-- list menu -->
                                        <div class="form-group">
                                        <label>Tanggal</label>
                                        <div class="input-group">   
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" required class="form-control pull-right" id="date_picker1" name="i_date" value="<?= $row->purchase_date ?>"/>
                                        </div><!-- /.input group -->
            </div>
            
                                        <div class="form-group">
                                            <label>Kode Transaksi</label>
                                            <input required type="text" name="i_code" id="i_code" class="form-control" placeholder="Masukkan kode transaksi..." value="<?= $row->purchase_code ?>"/>
                                        </div>

                                        <!--<div class="form-group">
                                            <label>Nama Barang</label>
                                            <select id="basic" name="i_item_id" size="1" class="selectpicker show-tick form-control" data-live-search="true" />
                                           <?php
                                           while($r_item = mysql_fetch_array($query_item)){
										   ?>
                                             <option value="<?= $r_item['item_id'] ?>" <?php if($row->item_id == $r_item['item_id']){ ?> selected="selected"<?php } ?>><?= $r_item['item_name']." (".$r_item['unit_name'].")"?></option>
                                             <?php
										   }
											 ?>
                                           </select>                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Harga</label>
                                            <input required type="number" name="i_harga" id="i_harga" class="form-control" placeholder="Masukkan harga..." value="<?= $row->purchase_price ?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label>QTY</label>
                                            <input required type="number" name="i_qty" id="i_qty" class="form-control" placeholder="Masukkan jumlah..." value="<?= $row->purchase_qty ?>" onChange="grand_total()" />
                                        </div>
                                        <!--
                                        <div class="form-group">
                                            <label>Total Harga</label>
                                            <input required type="text" readonly name="i_total" id="i_total" class="form-control"  value="<?= $row->purchase_total ?>"/>
                                        </div>
                                      -->
                                        <div class="form-group">
                                          <label>Supplier</label>
                                           <select id="basic" name="i_supplier" size="1" class="selectpicker show-tick form-control" data-live-search="true" />
                                           <?php
                                           while($r_supplier = mysql_fetch_array($query_supplier)){
										   ?>
                                             <option value="<?= $r_supplier['supplier_id'] ?>" <?php if($row->supplier_id == $r_supplier['supplier_id']){ ?> selected="selected"<?php } ?>><?= $r_supplier['supplier_name']?></option>
                                             <?php
										   }
											 ?>
                                           </select>                                    
                                  		</div>
            								
                                             <div class="form-group">
                                            <label>Cabang</label>
                                            <select id="basic" name="i_branch_id" size="1" class="selectpicker show-tick form-control" data-live-search="true" />
                                           <?php
                                           while($r_branch = mysql_fetch_array($query_branch)){
										   ?>
                                             <option value="<?= $r_branch['branch_id'] ?>" <?php if($row->branch_id == $r_branch['branch_id']){ ?> selected="selected"<?php } ?>><?= $r_branch['branch_name']?></option>
                                             <?php
										   }
											 ?>
                                           </select>                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Tipe pembayaran</label>
                                            
                                           <select id="basic" name="i_payment_type" size="1" class="form-control"/>
                                           
                                             <option value="1" <?php if($row->purchase_payment_type == 1){ ?> selected="selected"<?php } ?>>Tunai</option>
                                            <option value="2" <?php if($row->purchase_payment_type == 2){ ?> selected="selected"<?php } ?>>Hutang</option>
                                           
                                           </select>    

                                        </div>
                                        
                                        
                                        </div>
                                       
                                        <div style="clear:both;"></div>
                                     
                                </div><!-- /.box-body -->
                                
                                  <div class="box-footer">
                                  <?php
                                  if(!$id){
								  ?>
                                <input class="btn btn-danger" type="submit" value="Save"/>
                                <?php
								  }
								?>
                                <a href="<?= $close_button?>" class="btn btn-danger" >Close</a>
                             
                             </div>
                            
                            </div><!-- /.box -->
                       </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->