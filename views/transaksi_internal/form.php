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

function test(){
	alert("test");
}

function add_menu(id)
{
	//alert("test");

	if(id!=0){
		
		window.location.href = 'transaksi_internal.php?page=add_menu&item_id='+id;
	}

}

<?php
while($row_item2 = mysql_fetch_array($query_item2)){
?>
function edit_price_<?= $row_item2['transaction_internal_detail_id']?>(data){
	
	//alert(data);
	if(data > 0){
				var qty = document.getElementById("i_qty_<?=  $row_item2['transaction_internal_detail_id']; ?>").value;
				
	 			$.ajax({
					type: "GET",
					url: "transaksi_internal.php?page=edit_price",
					data:{id:<?= $row_item2['transaction_internal_detail_id']?>, price:data,qty:qty}
				}).done(function( result ) {
				   //alert("Simpan berhasil");
				});
				
				document.getElementById("i_total_<?= $row_item2['transaction_internal_detail_id']?>").value =  parseFloat(data);
				
				total = get_total();
				document.getElementById("i_total_transaction").value = CurrencyFormat(total);
				document.getElementById("i_total_transaction_real").value = total;
	}else{
		alert("Qty tidak boleh kurang dari 0");
		document.getElementById("i_total_<?= $row_item2['transaction_internal_detail_id']?>").value =  0;
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
function edit_qty_<?= $row_item4['transaction_internal_detail_id']?>(data){
	
	//alert(data);
	if(data > 0){
				var price = document.getElementById("i_price_<?=  $row_item4['transaction_internal_detail_id']; ?>").value;
				
	 			$.ajax({
					type: "GET",
					url: "transaksi_internal.php?page=edit_qty",
					data:{id:<?= $row_item4['transaction_internal_detail_id']?>, qty:data,price:price}
				}).done(function( result ) {
				   //alert("Simpan berhasil");
				});
				
				document.getElementById("i_total_<?= $row_item4['transaction_internal_detail_id']?>").value =  parseFloat(price);
				
				total = get_total();
				document.getElementById("i_total_transaction").value = CurrencyFormat(total);
				document.getElementById("i_total_transaction_real").value = total;
	}else{
		alert("Qty tidak boleh kurang dari 0");
		document.getElementById("i_total_<?= $row_item4['transaction_internal_detail_id']?>").value =  0;
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
		total = parseFloat(total) + parseFloat(document.getElementById("i_total_<?=  $row_item3['transaction_internal_detail_id']; ?>").value);
		<?php
		}
		?>
		return total;
	}
	
function go_to_payment(){
		
		var total = document.getElementById("i_total_transaction_real").value;
		
		//alert(total);
		
		
		if(total != 0){
			
			var i_code = document.getElementById("i_code").value;
			var i_date = document.getElementById("date_picker1").value;
			var i_pabrik = document.getElementById("i_pabrik").value;
			var i_cabang = document.getElementById("i_cabang").value;
			
			//alert(total);
			window.location.href = 'transaksi_internal.php?page=save&i_code='+i_code+'&i_pabrik='+i_pabrik+'&i_cabang='+i_cabang+'&i_date='+i_date;
			
		}else{
			alert("Simpan gagal. Order menu masih kosong");
		}
		
	}
</script>
	
                <?php
                if(isset($_GET['did']) && $_GET['did'] == 1){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Simpan Berhasil
                </div>
           
                </section>
                <?php
                }else if(isset($_GET['err']) && $_GET['err'] == 1){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-warning alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Simpan Gagal !</b>
               Menu masih kosong, Pilih menu terlebih dahulu !
                </div>
           
                </section>
                <?php
                }
                ?>
       
        
      
                

<!-- Main content -->
<section class="content">

            <div class="row">
            
            
            <div class="col-xs-4">
           <div class="form-group">
                                            <label>Code</label>
                                            <input required type="text" id="i_code" name="i_code" class="form-control" placeholder="Masukkan code transaksi....." value="<?=$row->transaction_internal_code ?>"/>
                                            <input type="hidden" name="i_user" value="<?=$row->user_id ?>" >
                                        </div>
            </div>
            
            <div class="col-xs-4">
            <div class="form-group">
             <label>Tanggal </label>
             <div class="input-group">
            
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" required class="form-control pull-right" id="date_picker1" name="i_date" value="<?=$row->transaction_internal_date ?>"/>
                                        </div><!-- /.input group -->
            </div>
            </div>
            
             <div class="col-xs-4">
             <div class="form-group">
                                         <label>Pabrik </label>
                                        <select name="i_pabrik" id="i_pabrik"  class="selectpicker show-tick form-control" data-live-search="true" onChange="load_data(this.value)" >
                                        <?php
                                        $query_branch = mysql_query("select a.*
																	from branches a	
																	where branch_type_id = 1															
																	order by branch_id
																	");
                                        while($row_branch = mysql_fetch_array($query_branch)){
                                        ?>
                                        <option value="<?= $row_branch['branch_id']?>"<?php if($row_branch['branch_id'] == $row->pabrik_branch_id){ ?> selected="selected" <?php }?>><?php
										
										echo $row_branch['branch_name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                        </select>
                                      	</div>
            </div>  
            
            <div class="col-xs-4">
             <div class="form-group">
                                         <label>Cabang </label>
                                        <select name="i_cabang" id="i_cabang"  class="selectpicker show-tick form-control" data-live-search="true" onChange="load_data(this.value)" >
                                        <?php
                                        $query_branch = mysql_query("select a.*
																	from branches a	
																	where branch_type_id = 2															
																	order by branch_id
																	");
                                        while($row_branch = mysql_fetch_array($query_branch)){
                                        ?>
                                        <option value="<?= $row_branch['branch_id']?>"<?php if($row_branch['branch_id'] == $row->cabang_branch_id){ ?> selected="selected" <?php }?>><?php
										
										echo $row_branch['branch_name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                        </select>
                                      	</div>
            </div>  
            
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
                                             <input <? if ($row->transaction_internal_id) {?> readonly="readonly" <? }?> name="i_qty_<?php echo $row_item['transaction_internal_detail_id']?>" type="text" id="i_qty_<?php echo $row_item['transaction_internal_detail_id']?>" value="<?php echo $row_item['transaction_internal_detail_qty']?>"  class="form-control" onchange="edit_qty_<?php echo $row_item['transaction_internal_detail_id']?>(this.value)" />
                                             
                                             
                                             <input name="i_total_<?php echo $row_item['transaction_internal_detail_id']?>" type="hidden" id="i_total_<?php echo $row_item['transaction_internal_detail_id']?>" value="<?php echo $row_item['transaction_internal_detail_total']?>" class="form-control"  readonly="readonly"/>
                                             </td>
                                             <td><input <? if ($row->transaction_internal_id) {?> readonly="readonly" <? }?> name="i_price_<?php echo $row_item['transaction_internal_detail_id']?>" type="text" id="i_price_<?php echo $row_item['transaction_internal_detail_id']?>" value="<?php echo $row_item['transaction_internal_detail_price']?>"  class="form-control" onchange="edit_price_<?php echo $row_item['transaction_internal_detail_id']?>(this.value)" />
                                               
                                               </td>
                                               <!--<td><input name="i_total_<?php echo $row_item['transaction_internal_detail_id']?>" type="text" id="i_total_<?php echo $row_item['transaction_internal_detail_id']?>" value="<?php echo $row_item['transaction_internal_detail_total']?>" class="form-control"  readonly="readonly"/></td>-->
                                               <td style="text-align:center;"><? if (!$row->transaction_internal_id) {?>
                                                    <a href="javascript:void(0)" onclick="confirm_delete(<?= $row_item['transaction_internal_detail_id']; ?>,'transaksi_internal.php?page=delete_item&id=')" class="btn btn-default" ><i class="fa fa-trash-o"></i></a><? }?>

                                                </td> 
                                            </tr>
                                            <?php
											$no++;
											$total = $total + $row_item['transaction_internal_detail_total'];
                                            }
										// }
											?>
                                          

                                          
                                        </tbody>
                                         <tfoot>
                                          <tr>
                                          <td></td>
                                          <td><? if (!$row->transaction_internal_id) {?>
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
                             
                   </div><!-- /.box -->
                            <? if (!$row->transaction_internal_id) {?>
                             <a href="javascript: go_to_payment()"  class="btn btn-success" >SAVE</a>
                             <? }?>

                        </div>
                        
                        
                    </div>
            
            <!-- list menu -->
     
 
  
 
</section><!-- /.content -->

              
              
           
              
              
            