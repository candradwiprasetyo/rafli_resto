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
	alert("test");

	/*if(id!=0){
		
		window.location.href = 'resep.php?page=add_menu&item_id='+id+'&i_id='+i_id;
	}*/

}

</script>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            
                             <div class="title_page"> Resep</div>
                            
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
                                                    <a href="javascript:void(0)" onclick="confirm_delete(<?= $row_item['resep_detail_id']; ?>,'resep.php?page=delete_item&id=')" class="btn btn-default" ><i class="fa fa-trash-o"></i></a>

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
                            
                             
                            

                        </div>
                        
                        
                    </div>
            
            <!-- list menu -->
                        </div>
                    </div>

                </section><!-- /.content -->