
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
               Delete Berhasil
                </div>
           
                </section>
                <?php
                }else if(isset($_GET['did']) && $_GET['did'] == 4){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Pembayaran Berhasil
                </div>
           
                </section>
                <?php
                }
                ?>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            
                             <div class="title_page"> <?= $title ?></div>
                            
                            <div class="box">
                             
                                <div class="box-body2 table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            	<th width="5%">No</th>
                                                <th>Kode Transaksi</th>
                                            	<th width="5%">Tanggal</th>
                                                <!--<th>Nama Barang</th>
                                                <th width="5%">Jumlah</th>-->
                                                <th>Harga</th>
                                                <th>Supplier</th>
                                                <th>Cabang</th>
                                                <th>Tipe pembayaran</th>
                                                <th>Status</th>
                                               <th>Config</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no = 1;
										   while($row = mysql_fetch_array($query)){
                                            ?>
                                            <tr>
                                            <td><?= $no?></td>
                                               <td><?= $row['purchase_code']?></td>
                                               <td><?= format_date($row['purchase_date']); ?></td>
                                                <!--<td><?= $row['item_name']?></td>
                                               
                                                <td><?= $row['purchase_qty']." (".$row['unit_name'].")"; ?></td>-->
                                                <td><?= $row['total']?></td>
                                               
                                                <td><?= $row['supplier_name']?></td>
                                                <td><?= $row['branch_name']?></td>
                                                <td><?= ($row['purchase_payment_type']==1) ? "Tunai" : "Hutang"; ?></td>
                                                <td><?= ($row['purchase_status']==1) ? "Lunas" : "Belum Lunas"; ?>
                                                    <?php
                                                    if($row['purchase_payment_type'] == 2 && $row['purchase_status']==1){ ?><br>(<?php echo format_date($row['purchase_payment_date']).")"; }
                                                    ?>
                                                </td>
                                              <td style="text-align:center;">

                                                    <a href="purchase.php?page=form&id=<?= $row['purchase_id']?>" class="btn btn-default" >View</a>
                                                    <?php
                                                    if($row['purchase_payment_type']==2 && $row['purchase_status']==2){
                                                    ?>
                                                    <a href="javascript:void(0)" onclick="confirm_payment(<?= $row['purchase_id']; ?>,'purchase.php?page=payment&id=')" class="btn btn-success" >Bayar</a>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                            <?php
											$no++;
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                          <tfoot>
                                            <tr>
                                                <td colspan="11"><a href="<?= $add_button ?>" class="btn btn-danger " >Add</a></td>
                                               
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->