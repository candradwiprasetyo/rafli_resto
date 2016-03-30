
<!-- Content Header (Page header) -->
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
	var i_id = document.getElementById("i_id").value;
	//alert(id);

	if(id!=0){
		
		window.location.href = 'stock.php?page=add_menu&item_id='+id+'&i_id='+i_id;
	}

}

function confirm_delete_resep(id)
{
	var i_id = document.getElementById("i_id").value;
	
	var a = confirm("Anda yakin ingin menghapus record ini ?");
	if(a==true){
		window.location.href = 'stock.php?page=delete_item&id='+id+'&i_id='+i_id;
	}

}


<?php
while($row_resep2 = mysql_fetch_array($query_resep2)){
?>
function edit_qty_<?= $row_resep2['resep_detail_id']?>(data){
	
	//alert(data);
	if(data > 0){
				
	 			$.ajax({
					type: "GET",
					url: "resep.php?page=edit_qty",
					data:{id:<?= $row_resep2['resep_detail_id']?>, qty:data}
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
		
		alert(total);
		
		
		if(total > 1){
			
			var i_name = document.getElementById("i_nama").value;
			var i_item_produck = document.getElementById("i_item_produck").value;
			var i_id = document.getElementById("i_id").value;
			
			//alert(total);
			window.location.href = 'resep.php?page=save&i_name='+i_name+'&i_item_produck='+i_item_produck+'&i_id='+i_id;
			
		}else{
			alert("Simpan gagal. Order menu masih kosong");
		}
		
	}
</script>       

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
                                        
                                        <div class="form-group">
                                       
            
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input required type="text" name="i_name" class="form-control" placeholder="Masukkan nama barang..." value="<?= $row->item_name ?>"/>
                                            <input type="hidden" id="i_id" name="i_id" value="<?=$row->item_id ?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Satuan</label>
                                            <select id="basic" name="i_unit_id" size="1" class="selectpicker show-tick form-control" data-live-search="true" />
                                           <?php
                                           while($r_unit = mysql_fetch_array($query_unit)){
										   ?>
                                             <option value="<?= $r_unit['unit_id'] ?>" <?php if($row->unit_id == $r_unit['unit_id']){ ?> selected="selected"<?php } ?>><?= $r_unit['unit_name']?></option>
                                             <?php
										   }
											 ?>
                                           </select>                                            
                                        </div>
                                      <div class="form-group">
                                            <label>Limit</label>
                                            <input required type="text" name="i_item_limit" class="form-control" placeholder="Masukkan limit stok..." value="<?= $row->item_limit ?>"/>
                                        </div>
                                       
                                        
                                        </div>
                                        </div>
                                       
                                        <div style="clear:both;"></div>
                                     
                                </div><!-- /.box-body -->
                                
                                  <div class="box-footer">
                                <input class="btn btn-danger" type="submit" value="Save"/>
                                <a href="<?= $close_button?>" class="btn btn-danger" >Close</a>
                             
                             </div>
                            
                            </div><!-- /.box -->
                       </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
                    
                    <?php
                    if($id){
					?>
                    
                    <div class="row">
                        <div class="col-xs-12">
                            
                            <div class="title_page"> Resep	</div>
                            
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
                                           $no = 1;
										   while($row_item = mysql_fetch_array($query_resep)){
                                            ?>
                                            <tr>
                                            	<td><?= $no?></td>
                                               <td><?= $row_item['item_name']?></td>
                                               <td>
                                             <input name="i_qty_<?php echo $row_item['resep_detail_id']?>" type="text" id="i_qty_<?php echo $row_item['resep_detail_id']?>" value="<?php echo $row_item['resep_detail_qty']?>"  class="form-control" onchange="edit_qty_<?php echo $row_item['resep_detail_id']?>(this.value)" />
                                             
                                             </td>
                                               <td style="text-align:center;">
                                                    <a href="javascript:void(0)" onclick="confirm_delete_resep(<?= $row_item['resep_detail_id']; ?>)" class="btn btn-default" ><i class="fa fa-trash-o"></i></a>

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
                                          <td>
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
                                         </td>
                                          <td><input type="hidden" id="i_total" value="<?=$no?>"></td>
                                            <td align="right" valign="middle" style="font-size:22px;"><strong></strong></td>
                                              
                                           </tr>
                                           
                                         </tfoot>
                                         
                                    </table>
                             
                   </div><!-- /.box -->
                            
                            <!-- <a href="javascript: go_to_payment()"  class="btn btn-success" >SAVE</a>-->
                            

                        </div>
                        
                        <?php
                        }
						?>
                        
                    </div>
                </section><!-- /.content -->