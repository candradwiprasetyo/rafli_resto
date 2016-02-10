              
                    <div class="row">
                        <div class="col-xs-12">
                            
                            
                            <div class="box">
                             
                              <div class="box-body2 table-responsive">
                              <div class="box-header" style="cursor: move;">
<h3 class="box-title"><strong>Jumlah tamu per hari</strong></h3>
</div>
                                    <table id="" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            <th width="5%">No</th>
                                                <th>Tanggal</th>
                                                <th>12:00 - 16:00</th>
                                                <th>16:00 - 20:00</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                 <?php
												$no_item = 1;
												$total_customer1 = 0;
                        $total_customer2 = 0;
                        $total_customer_all = 0;
												$date_awal = $date1;

												while(strtotime($date_awal) <= strtotime($date2)){
												?>
                                            <tr>
                                            <td><?= $no_item ?></td>
                      												<td><?= format_date($date_awal) ?></td>
                                                                      <td>
                                                                      <?php
                      												$total_cus1 = get_total_customer1($date_awal);
                      												$total_cus1 = ($total_cus1) ? $total_cus1 : 0;
                      												echo tool_format_number($total_cus1);
                      												?>
                                                </td>
                                                 <td>
                                                                      <?php
                                              $total_cus2 = get_total_customer2($date_awal);
                                              $total_cus2 = ($total_cus2) ? $total_cus2 : 0;
                                              echo tool_format_number($total_cus2);
                                              ?>
                                                </td>
                                                 <td>
                                                                      <?php
                                              $total_cus_all = get_total_customer_all($date_awal);
                                              $total_cus_all = ($total_cus_all) ? $total_cus_all : 0;
                                              echo tool_format_number($total_cus_all);
                                              ?>
                                                </td>
                                                
                                                 </tr>
                                        
                                              <?php
											  $date_awal = date("Y-m-d", strtotime("+1 day", strtotime($date_awal)));

											  $total_customer1 = $total_customer1 + $total_cus1;
                        $total_customer2 = $total_customer2 + $total_cus2;
                        $total_customer_all = $total_customer_all + $total_cus_all;
											$no_item++;
                                            }
                                            ?>
                                            </tbody>
                                            <tfoot>
											<tr>
                                            
                                                 <td colspan="2" align="right"  style="font-size:22px; font-weight:bold;">TOTAL</td>
                                                <td align="right"><?= ($total_customer1)?></td>
                                             <td align="right"><?= ($total_customer2)?></td>
                                             <td align="right"><?= ($total_customer_all)?></td>
                                              </tr>
                                          </tfoot>
                                        
                                         
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                  

                