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



function add_menu(id)
{

	if(id!=0){
		var member_id = document.getElementById("i_member_id").value;
		var table_id = document.getElementById("i_table_id").value;
		
		window.location.href = 'transaction_new.php?page=add_menu_edit&member_id='+member_id+'&menu_id='+id+'&table_id='+table_id;
	}
	/*$("#MyTable").append('<tr valign="top"><th scope="row"><label for="customFieldName">Custom Field</label></th><td><input type="text" class="code" name="customFieldName[]" value="" placeholder="Input Name" /> &nbsp; <input type="text" class="code" name="customFieldValue[]" value="" placeholder="Input Value" /> &nbsp; <a href="javascript:void(0);" class="remCF">Remove</a></td></tr>');
*/
}
<?php
while($row_item2 = mysql_fetch_array($query_item2)){
?>
function edit_qty_<?= $row_item2['transaction_detail_id']?>(data){
	
	if(data > 0){
				var grand_price = document.getElementById("i_grand_price_<?=  $row_item2['transaction_detail_id']; ?>").value;
				
	 			$.ajax({
					type: "GET",
					url: "transaction_new.php?page=edit_qty_edit",
					data:{id:<?= $row_item2['transaction_detail_id']?>, qty:data, grand_price : grand_price}
				}).done(function( result ) {
				   //alert("Simpan berhasil");
				});
				
				document.getElementById("i_total_<?= $row_item2['transaction_detail_id']?>").value =  parseFloat(data) * parseFloat(grand_price);
				
				total = get_total();
				document.getElementById("i_total_transaction").value = CurrencyFormat(total);
				document.getElementById("i_total_transaction_real").value = total;
	}else{
		alert("Qty tidak boleh kurang dari 0");
		document.getElementById("i_total_<?= $row_item2['transaction_detail_id']?>").value =  0;
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

		
		
		total = parseFloat(total) + parseFloat(document.getElementById("i_total_<?=  $row_item3['transaction_detail_id']; ?>").value);
		
		
		
		<?php
		}
		?>
		
		return total;
	}
	
	function go_to_payment(){
		
		var total = document.getElementById("i_total_transaction_real").value;
		
		//alert(total);
		
		
		if(total > 0){
			
			var table_id = document.getElementById("i_table_id").value;
			var member_id = document.getElementById("i_member_id").value;
			var i_date = document.getElementById("date_picker1").value;
			
			window.location.href = 'transaction_new.php?page=save_edit&member_id='+member_id+'&table_id='+table_id+'&date='+i_date;
			
		}else{
			alert("Simpan gagal. Order menu masih kosong");
		}
		
	}
	/* 
 function addRow() {
        var myRow = '<tr><td>C</td><td>3</td><td>C</td><td>3</td><td>C</td><td><a href="javascript:void(0);" class="delete_row">Remove</a></td></tr>';
            $("#MyTable tbody tr:last").after(myRow);
 }*/
 


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
             <label>Tanggal </label>
             <div class="input-group">
            
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" required class="form-control pull-right" id="date_picker1" name="i_date" value="<?= $date ?>"/>
                                        </div><!-- /.input group -->
            </div>
            </div>
            
             <div class="col-xs-4">
             <div class="form-group">
                                         <label>Member </label>
                                        <select name="i_member_id" id="i_member_id"  class="selectpicker show-tick form-control" data-live-search="true" onChange="load_data(this.value)" >
                                        <option value="0">Non Member</option>
                                        <?php
                                        $query_member = mysql_query("select a.*
																	from members a																
																	order by member_id
																	");
                                        while($row_member = mysql_fetch_array($query_member)){
                                        ?>
                                        <option value="<?= $row_member['member_id']?>"<?php if($row_member['member_id'] == $member_id){ ?> selected="selected" <?php }?>><?php
										
										echo $row_member['member_name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                        </select>
                                      	</div>
            </div>  
            
             <div class="col-xs-4">
             <div class="form-group">
                                         <label>Meja </label>
                                        <select name="i_table_id" id="i_table_id"  class="selectpicker show-tick form-control" data-live-search="true" onChange="load_data(this.value)" >
                                        <?php
                                        $query_table = mysql_query("select a.*, b.building_name
																	from tables a
																	left join buildings b on b.building_id = a.building_id
																	order by table_id
																	");
                                        while($row_table = mysql_fetch_array($query_table)){
                                        ?>
                                        <option value="<?= $row_table['table_id']?>" <?php if($row_table['table_id'] == $table_id){ ?> selected="selected"<?php }?>><?php
										if($row_table['table_id'] != 0){
											$building = " (".$row_table['building_name'].")";
										}else{
											$building= "";
										}
										echo $row_table['table_name'].$building; ?></option>
                                        <?php
                                        }
                                        ?>
                                        </select>
                                      	</div>
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
                                                <th width="20%">Nama Menu</th>
												<th width="20%">Price</th>
                                                <th width="20%">Discount</th>
                                                  <th width="10%">Qty</th>
                                                  <th width="15%">Total Price</th>
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
                                               <td><?= $row_item['menu_name']?></td>
                                               <td><?= $row_item['transaction_detail_price']?></td>
                                               <td><?= $row_item['transaction_detail_price_discount']?></td>
                                               <td>
                                             <input name="i_qty_<?php echo $row_item['transaction_detail_id']?>" type="text" id="i_qty_<?php echo $row_item['transaction_detail_id']?>" value="<?php echo $row_item['transaction_detail_qty']?>"  class="form-control" onchange="edit_qty_<?php echo $row_item['transaction_detail_id']?>(this.value)" />
                                               <input name="i_grand_price_<?php echo $row_item['transaction_detail_id']?>" type="hidden" id="i_grand_price_<?php echo $row_item['transaction_detail_id']?>"  value="<?php echo $row_item['transaction_detail_grand_price']?>"  class="form-control"/>
                                             </td>
                                               <td><input name="i_total_<?php echo $row_item['transaction_detail_id']?>" type="text" id="i_total_<?php echo $row_item['transaction_detail_id']?>" value="<?php echo $row_item['transaction_detail_total']?>" class="form-control"  readonly="readonly"/></td>
                                               <td style="text-align:center;">
                                                    <a href="javascript:void(0)" onclick="confirm_delete(<?= $row_item['transaction_detail_id']; ?>,'transaction_new.php?page=delete_item_edit&table_id=<?= $_GET['table_id'] ?>&id=')" class="btn btn-default" ><i class="fa fa-trash-o"></i></a>

                                                </td> 
                                            </tr>
                                            <?php
											$no++;
											$total = $total + $row_item['transaction_detail_total'];
                                            }
										// }
											?>
                                          

                                          
                                        </tbody>
                                         <tfoot>
                                          <tr>
                                          <td></td>
                                          <td>     <select name="i_menu_id" id="i_menu_id"  class="selectpicker show-tick form-control" data-live-search="true" onchange="add_menu(this.value)" >
                                          <option value="0">Add menu</option>
                                        <?php
                                        $query_menu = mysql_query("select * from menus order by menu_id
																	");
                                        while($row_menu = mysql_fetch_array($query_menu)){
                                        ?>
                                        <option value="<?= $row_menu['menu_id']?>"><?php
										
										echo $row_menu['menu_name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                        </select></td>
                                          <td></td>
                                            <td align="right" valign="middle" style="font-size:22px;"><strong>TOTAL (Rp)</strong></td>
                                              
                                           <td colspan="3" ><strong>
                                          <input name="i_total_transaction" type="text" id="i_total_transaction" value="<?php echo number_format($total, 0, ",", ".") ?>" class="form-control"  readonly="readonly" style="font-size:30px; height:50px; text-align:right;" />
                                            <input name="i_total_transaction_real" type="hidden" id="i_total_transaction_real" value="<?php echo $total ?>" class="form-control"  readonly="readonly" style="font-size:30px; height:50px; text-align:right;" />
                                          
                                           </strong>                                            </td>
                                           </tr>
                                           
                                         </tfoot>
                                         
                                    </table>
                             
                   </div><!-- /.box -->
                            
                             <a href="javascript: go_to_payment()"  class="btn btn-success" >SAVE</a>

                        </div>
                        
                        
                    </div>
            
            <!-- list menu -->
     
 
  
 
</section><!-- /.content -->

              
              
           
              
              
            