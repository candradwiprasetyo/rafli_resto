
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
                }else if(isset($_GET['did']) && $_GET['did'] == 2){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Edit Berhasil
                </div>
           
                </section>
                <?php
                }else if(isset($_GET['did']) && $_GET['did'] == 3){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Delete order berhasil
                </div>
           
                </section>
                <?php
                }
                ?>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            
                             <div class="title_page"> List Order</div>
                            
                            <div class="box">
                             
                                <div class="box-body2 table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            <th width="5%">No</th>
                                                <th>Nama Menu</th>
												<th>Price</th>
                                                  <th>Qty</th>
                                                  <th>Total Price</th>
                                                   <th>Config</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no_history = 1;
										   $total = 0;
                                            while($row_history = mysql_fetch_array($query_history)){
                                            ?>
                                            <tr>
                                            <td><?= $no_history?></td>
                                               <td><?= $row_history['menu_name']?></td>
                                            
                                                <td><?= tool_format_number($row_history['transaction_detail_price'])?></td>
                                               <td><?= ($row_history['transaction_detail_qty'])?></td>
                                           <td><?= tool_format_number($row_history['transaction_detail_total'])?></td>
                                              <td style="text-align:center;">

                                                 
                                                    <a href="javascript:void(0)" onclick="confirm_delete_history(<?= $row_history['transaction_detail_id']; ?>)" class="btn btn-default" ><i class="fa fa-trash-o"></i></a>

                                                </td> 
                                            </tr>
                                            <?php
											$total = $total + $row_history['transaction_detail_total'];
											$no_history++;
                                            }
                                            ?>

                                          
                                        </tbody>
                                         <tfoot>
                                          <tr>
                                            <td colspan="4" align="right" style="font-size:22px;"><strong>TOTAL</strong></td>
                                              
                                           <td style="font-size:22px;"><strong>
                                           <?= tool_format_number($total)?>
                                           </strong></td>
                                              <td style="text-align:center;">

                                             
                                            </td> 
                                           </tr>
                                           
                                         </tfoot>
                                         
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->