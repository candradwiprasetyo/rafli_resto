              
                    <div class="row">
                        <div class="col-xs-12">
                            
                            
                            <div class="box">
                             
                              <div class="box-body2 table-responsive">
                              <div class="box-header" style="cursor: move;">
<h3 class="box-title"><strong>Average</strong></h3>
</div>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            <th width="5%">No</th>
                                                <th>Tanggal</th>
                                                <th>Penjualan</th>
                                                <th>Pengunjung</th>
                                                <th>Average</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                 <?php
												$no_item = 1;
												$total_penjualan = 0;
												$total_pengunjung = 0;
												
												$date_awal = $date1;

												while(strtotime($date_awal) <= strtotime($date2)){
												?>
                                            <tr>
                                            <td><?= $no_item ?></td>
                      												<td><?= format_date($date_awal) ?></td>
                                                                      <td>
                                                                      <?php
                      												$penjualan = get_total_penjualan($date_awal);
                      												$penjualan = ($penjualan) ? $penjualan : 0;
                      												echo tool_format_number($penjualan);
                      												?>
                                                </td>
                                                 <td>
                                                                      <?php
                                              $pengunjung = get_total_pengunjung($date_awal);
                                              $pengunjung = ($pengunjung) ? $pengunjung : 0;
                                              echo tool_format_number($pengunjung);
                                              ?>
                                                </td>
                                                 <td>
                                              <?php
											   $pengunjung_tmp = ($pengunjung != 0) ? $pengunjung : 1;
                                              $average = $penjualan / $pengunjung_tmp;
                                              echo tool_format_number($average);
                                              ?>
                                                </td>
                                                
                                                 </tr>
                                        
                                              <?php
											  $date_awal = date("Y-m-d", strtotime("+1 day", strtotime($date_awal)));

											$total_penjualan = $total_penjualan + $penjualan;
											$total_pengunjung = $total_pengunjung + $pengunjung;
											
											$total_pengunjung_tmp = ($total_pengunjung != 0) ? $total_pengunjung : 1;
											$total_average = $total_penjualan / $total_pengunjung_tmp;
											$no_item++;
                                            }
                                            ?>
                                            </tbody>
                                            <tfoot>
											<tr>
                                            
                                                 <td colspan="2" align="right"  style="font-size:22px; font-weight:bold;">TOTAL</td>
                                                <td align="right"><?= tool_format_number($total_penjualan)?></td>
                                             <td align="right"><?= tool_format_number($total_pengunjung)?></td>
                                             <td align="right"><?= tool_format_number($total_average)?></td>
                                              </tr>
                                          </tfoot>
                                        
                                         
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                  

                