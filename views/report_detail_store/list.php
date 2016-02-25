<style>
#example_scroll_wrapper{
	overflow-x:scroll;
	overflow-y:hidden;
}
</style>
                    <div class="row">
                        <div class="col-xs-12">
                            
                            
                            <div class="box" >
                             
                              <div class="box-body2 table-responsive">
                              <div class="box-header" style="cursor: move; ">
<h3 class="box-title"><strong>Detail Per Menu</strong></h3>
</div>
                                    <table id="example_scroll"  class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                            <th width="5%">No</th>
                                            
                                                <th>Nama Menu</th>
                                                <th>Owner</th>
                                                 <?
												$date_from = strtotime($date1);
												$date_to = strtotime($date2);
												
												$tot = 0;
											   for ($i=$date_from; $i<=$date_to; $i+=86400) { 
												?>
												<th><?= date("d", $i)?></th>
												<? 
												$tot++;
												}  
												?>
                                                <th>Qty</th>
                                                
                                                <th>Omset</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                                 <?php
                                           $no_item = 1;
										   $grand_total_dasar = 0;
										   $grand_total_omset = 0;
                                            while($row_item = mysql_fetch_array($query_item)){
												$jumlah = ($row_item['jumlah']) ? $row_item['jumlah'] : 0;
												$total = $jumlah * $row_item['menu_price'];
                                       ?>
                                            <tr>
                                            <td><?= $no_item ?></td>
												<td><?= $row_item['menu_name']; ?></td>
                                              	<td><?= $row_item['partner_name']; ?></td>
                                                <?
												$date_from = strtotime($date1);
												$date_to = strtotime($date2);
											
											   for ($i=$date_from; $i<=$date_to; $i+=86400) { 
											   
											   $jml_sum = get_detail_date(date("Y-m-d", $i),$row_item['menu_id']);
											   $jml = ($jml_sum) ? $jml_sum : 0; 
												?>
												<td><?= $jml?></td>
												<? 
												}  
												?>
                                                <td><?= tool_format_number($jumlah)?></td>
                                               
                                             	<td><?= tool_format_number($row_item['jumlah_omset'])?></td>
                                                 </tr>
                                        

                                              <?php
											  $grand_total_dasar = $grand_total_dasar + $row_item['jumlah_dasar'];
											   $grand_total_omset = $grand_total_omset + $row_item['jumlah_omset'];
											$no_item++;
                                            }
                                            ?>
                                            </tbody>
                                            <tfoot>
											<tr>
                                            
                                                 <td colspan="<?=$tot + 4?>" align="right"  style="font-size:22px; font-weight:bold;">TOTAL</td>
                                               
                                              <td><?= tool_format_number_report($grand_total_omset)?></td>
                                              </tr>
                                          </tfoot>
                                        
                                         
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                  

                