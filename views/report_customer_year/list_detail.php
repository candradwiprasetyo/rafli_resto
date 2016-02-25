
             
                    <div class="row">
                        <div class="col-xs-12">
                            
                           
                            
                            <div class="box">
                             
                                <div class="box-body2 table-responsive">
                                 <div class="box-header" style="cursor: move;">
<h3 class="box-title"><strong>List Customer</strong></h3>
</div>
                                    <table id="example3" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            	<th width="5%">No</th>
                                                <th>Customer</th>
                                                <?
                                                for($i=1;$i <= 12; $i++){
													switch($i){
														case 1: $bulan = "Januari"; break;
														case 2: $bulan = "Februari"; break;
														case 3: $bulan = "Maret"; break;
														case 4: $bulan = "April"; break;
														case 5: $bulan = "Mei"; break;
														case 6: $bulan = "Juni"; break;
														case 7: $bulan = "Juli"; break;
														case 8: $bulan = "Agustus"; break;
														case 9: $bulan = "September"; break;
														case 10: $bulan = "Oktober"; break;
														case 11: $bulan = "November"; break;
														case 12: $bulan = "Desember"; break;
														
													}
													?>
														<th><?=$bulan?></th>
                                                        <?
                                                }?>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no_cus = 1;
										   $grand_total = 0;
										   while($row_cus = mysql_fetch_array($query_customer)){
                                            ?>
                                            <tr>
                                            	<td><?= $no_cus?></td>
                                              	<td><?= $row_cus['member_name']?></td>
                                                <?
                                                for($i=1;$i <= 12; $i++){
													$jml = get_jumlah_customer($year,$i,$row_cus['member_id']);
													if(!$jml){
														$value = 0;
													}else{
														$value = $jml;
													}
												?>
                                                <td><?=$value?></td>
	                                                <? }?>
                                                    
                                                 <?
                                                 $total = get_jumlah_customer_total($year,$row_cus['member_id']);
													if(!$total){
														$value_total = 0;
													}else{
														$value_total = $total;
													}
												 ?>
                                                <td><?=$value_total?></td>
                                            </tr>
                                            <?php
											$no_cus++;
											$grand_total = $grand_total + $value_total;
                                            }
                                            ?>
                                            
                                        </tbody>
                                        <tfoot>
											<tr>
                                                 <td colspan="2" align="right"  style="font-size:18px; font-weight:bold;">TOTAL</td>
                                                 <?
                                                for($i=1;$i <= 12; $i++){
													$total_mounth = get_jumlah_total_mounth($year,$i);
													if(!$total_mounth){
														$value_mounth = 0;
													}else{
														$value_mounth = $total_mounth;
													}
												?>
                                                <td style="font-weight:bold; font-size:18px;"><?=$value_mounth?></td>
	                                                <? }?>
                                                <td style="font-weight:bold; font-size:18px;"><?=$grand_total?></td>
                                              
                                              </tr>
                                          </tfoot>
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>