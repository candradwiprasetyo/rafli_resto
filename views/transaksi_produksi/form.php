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
		
		window.location.href = 'transaksi_produksi.php?page=add_menu&item_id='+id;
	}

}


<?php
while($row_item4 = mysql_fetch_array($query_item4)){
?>
function edit_qty_<?= $row_item4['transaction_production_detail_id']?>(data){
	
	//alert(data);
	if(data > 0){
				
	 			$.ajax({
					type: "GET",
					url: "transaksi_produksi.php?page=edit_qty",
					data:{id:<?= $row_item4['transaction_production_detail_id']?>, qty:data}
				}).done(function( result ) {
				   //alert("Simpan berhasil");
				});
				
	}else{
		alert("Qty tidak boleh kurang dari 0");
	}
}

	

<?php

}
?>

	
function go_to_payment(){
		
		var total = document.getElementById("i_total").value;
		
		//alert(total);
		
		
		if(total > 1){
			
			var i_code = document.getElementById("i_code").value;
			var i_date = document.getElementById("date_picker1").value;
			var i_item = document.getElementById("i_item").value;
			var i_cabang = document.getElementById("i_cabang").value;
			var i_target = document.getElementById("i_target").value;
			var i_hasil = document.getElementById("i_hasil").value;
			var row_id = document.getElementById("row_id").value;
			
			//alert(total);
			window.location.href = 'transaksi_produksi.php?page=save&i_code='+i_code+'&i_item='+i_item+'&i_cabang='+i_cabang+'&i_target='+i_target+'&i_hasil='+i_hasil+'&row_id='+row_id+'&i_date='+i_date;
			
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
                                            <input <? if ($row->transaction_production_id) {?> readonly <? }?> required type="text" id="i_code" name="i_code" class="form-control" placeholder="Masukkan code transaksi....." value="<?=$row->transaction_production_code ?>"/>
                                            <input type="hidden" name="i_user" value="<?=$row->user_id ?>" >
                                            <input type="hidden" name="row_id" id="row_id" value="<?=$row->transaction_production_id ?>" >
                                        </div>
            </div>
            
            <div class="col-xs-4">
            <div class="form-group">
             <label>Tanggal </label>
             <div class="input-group">
            
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" <? if ($row->transaction_production_id) {?> readonly <? }?> required class="form-control pull-right" id="date_picker1" name="i_date" value="<?=$row->transaction_production_date ?>"/>
                                        </div><!-- /.input group -->
            </div>
            </div>
            
             <div class="col-xs-4">
             <div class="form-group">
                                         <label>Items </label>
                                        <select name="i_item" id="i_item" <? if ($row->transaction_production_id) {?> disabled <? }?>  class="selectpicker show-tick form-control" data-live-search="true" onChange="load_data(this.value)" >
                                         <?php
                                        $query_item7 = mysql_query("select * from items order by item_id
																	");
                                        while($row_item7 = mysql_fetch_array($query_item7)){
                                        ?>
                                        <option value="<?= $row_item7['item_id']?>"><?php
										
										echo $row_item7['item_name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                        </select>
                                      	</div>
            </div>  
            
            <div class="col-xs-4">
             <div class="form-group">
                                         <label>Cabang  </label>
                                        <select name="i_cabang" id="i_cabang" <? if ($row->transaction_production_id) {?> disabled <? }?>  class="selectpicker show-tick form-control" data-live-search="true" onChange="load_data(this.value)" >
                                        <?php
                                        $query_branch = mysql_query("select a.*
																	from branches a	
																	where branch_type_id = 2															
																	order by branch_id
																	");
                                        while($row_branch = mysql_fetch_array($query_branch)){
                                        ?>
                                        <option value="<?= $row_branch['branch_id']?>"<?php if($row_branch['branch_id'] == $row->branch_id){ ?> selected="selected" <?php }?>><?php
										
										echo $row_branch['branch_name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                        </select>
                                      	</div>
            </div> 
            
            <div class="col-xs-4">
           <div class="form-group">
                                            <label>Target</label>
                                            <input required type="text" <? if ($row->transaction_production_id) {?> readonly <? }?> id="i_target" name="i_target" class="form-control" placeholder="Masukkan code target....." value="<?=$row->transaction_production_target ?>"/>
                                        </div>
            </div>
            
            <div class="col-xs-4">
           <div class="form-group">
                                            <label>Hasil</label>
                                            <input required <? if (!$row->transaction_production_id) {?> readonly <? }?> type="text" id="i_hasil" name="i_hasil" class="form-control" placeholder="Masukkan code hasil....." value="<?=$row->transaction_production_hasil ?>"/>
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
                                                   <th width="10%">Config</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                         <?php
										 //if($table_id!=""){
                                           $no = 1;
										   while($row_item = mysql_fetch_array($query_item)){
                                            ?>
                                            <tr>
                                            	<td><?= $no?></td>
                                               <td><?= $row_item['item_name']?></td>
                                               <td>
                                             <input <? if ($row->transaction_production_id) {?> readonly="readonly" <? }?> name="i_qty_<?php echo $row_item['transaction_production_detail_id']?>" type="text" id="i_qty_<?php echo $row_item['transaction_production_detail_id']?>" value="<?php echo $row_item['transaction_production_detail_qty']?>"  class="form-control" onchange="edit_qty_<?php echo $row_item['transaction_production_detail_id']?>(this.value)" />
                                             
                                             </td>
                                               <td style="text-align:center;"><? if (!$row->transaction_production_id) {?>
                                                    <a href="javascript:void(0)" onclick="confirm_delete(<?= $row_item['transaction_production_detail_id']; ?>,'transaksi_produksi.php?page=delete_item&id=')" class="btn btn-default" ><i class="fa fa-trash-o"></i></a><? }?>

                                                </td> 
                                            </tr>
                                            <?php
											$no++;
                                            }
										// }
											?>
                                          

                                          
                                        </tbody>
                                         <tfoot>
                                          <tr>
                                          <td></td>
                                          <td><? if (!$row->transaction_production_id) {?>
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
                                          <td><input type="hidden" id="i_total" value="<?=$no?>"></td>
                                            <td align="right" valign="middle" style="font-size:22px;"><strong</strong></td>
                                              
                                           
                                           </tr>
                                           
                                         </tfoot>
                                         
                                    </table>
                             
                   </div><!-- /.box -->
                             <a href="javascript: go_to_payment()"  class="btn btn-success" >SAVE</a>

                        </div>
                        
                        
                    </div>
            
            <!-- list menu -->
     
 
  
 
</section><!-- /.content -->

              
              
           
              
              
            