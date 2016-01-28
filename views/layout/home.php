

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
                }
                ?>

                <!-- Main content -->
                <section class="content">
                  
                      <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-white home_back1">
                                <div class="inner">
                                    <h3>
                                        <?= $date_now ?>
                                    </h3>
                                    <p>
                                       Tanggal
                                    </p>
                                </div>
                                <div class="icon home_icon1">
                                    
                                </div>
                                
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-white home_back2">
                                <div class="inner">
                                    <h3>
                                        <?= $jumlah_penjualan ?>
                                    </h3>
                                    <p>
                                        Jumlah Penjualan
                                    </p>
                                </div>
                                <div class="icon home_icon2">
                                </div>
                               
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-white home_back3">
                                <div class="inner">
                                    <h3>
                                        <?php echo "<span style='font-size:20px'>Rp. </span>".$total_omset ?>
                                    </h3>
                                    <p>
                                        Total Omset 
                                    </p>
                                </div>
                                <div class="icon home_icon3">
                                </div>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-white home_back4" >
                                <div class="inner" style="height:90px;">
                                    <h3 style="font-size:16px;">
                                       <?= $menu_terlaris?>
                                    </h3>
                                    <p>
                                       Menu Terlaris
                                    </p>
                                </div>
                                <div class="icon home_icon4">
                                   
                                </div>
                              
                            </div>
                        </div><!-- ./col -->
                    </div><!-- /.row -->

                    <div class="row">
                    <div class="col-xs-12">
                   <img src="../img/new/home.jpg" style="width:100%;" />
                    </div>
                        <div class="col-xs-12">
                            
                            <div class="box">
                                <div class="box-body2 table-responsive" style="padding:20px; text-align:center;">
                                   <h2>Hikaru</h2>
                                  <h4>Resto</h4>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                        
                    </div>
                    
                  <!-- TOP Food-->
                  <div class="row">
                        <div class="col-md-6">
                        	
                            <form role="form" action="<?= $action?>" method="post">

                            <div class="box box-primary">
                                
                                <div class="box-header">
                                    <h3 class="box-title">Top Food</h3>                                    
                                </div>
                                <div class="box-body">
                                    	<div class="col-md-9">
                                          <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" required class="form-control pull-left" id="reservation" name="i_date" value="<?= $date_default?>"/>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                 </div>
                                   
                                   <div class="col-md-3">
                                          <div class="form-group">
                                        
                                        <div class="input-group">
                                           
                                            <input class="btn btn-danger" type="submit" value="Preview"/>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                 </div>
                                              
                                              <div style="clear:both;"></div>
                                      
                                     <table id="" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            <th width="5%">No</th>
                                                <th>Nama Menu</th>
                                                <th>Qty</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no = 1;
										   while($row_top_food = mysql_fetch_array($query_top_food)){
                                            ?>
                                            <tr <?php if($no == 1){ ?> class="top_food_tr"<?php } ?>>
                                            <td><?php if($no == 1){ ?><div class="top_food"><?= $no ?></div><?php }else{ ?><?= $no ?><?php } ?></td>
                                            <td><?= $row_top_food['menu_name']?></td>
                                            <td><?= $row_top_food['jumlah']?></td>
                                            
                                            </tr>
                                            <?php
											$no++;
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                        
                                    </table>
                                </div><!-- /.box-body -->
                             
                  
                            
                            </div><!-- /.box -->
                             
                            
                       </form>
                        
                          
                        </div>
                  

						<!-- stok limit -->
                        <div class="col-md-6">
                        	
                           <div class="box">
                              <div class="box-header">
                                    <h3 class="box-title">Crisis Raw Inventory Stock</h3>                                    
                                </div>
                                <div class="box-body2 table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            	<th>Item</th>
                                            	<th>Stok</th>
                                                <th>Cabang</th>
                                                
                                            </tr>
                                        </thead>
                                        <?php
										$query_stock_limit = select_stock_limit();
										   while($row_stock_limit = mysql_fetch_array($query_stock_limit)){
                                            ?>
                                            <tr>
                                           
                                               <td><?= ($row_stock_limit['item_name']); ?></td>
                                                <td><?= $row_stock_limit['item_stock_qty']."(".$row_stock_limit['unit_name'].")"?></td>
                                                <td><?= $row_stock_limit['branch_name']?></td>
                                                
                                                </tr>
                                            <?php
											
                                            }
                                            ?>
                                         
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        
                          
                        </div>
                    </div>
                    
                    <dic class="row">
                    
                    <!-- history waiter -->
                        <div class="col-md-12">
                        	
                           <div class="box">
                              <div class="box-header">
                                    <h3 class="box-title">History Waiter</h3>                                    
                                </div>
                                <div class="box-body2 table-responsive">
                                    <table id="example2" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            	<th>Tanggal</th>
                                            	<th>Cabang</th>
                                                <th>Ruang</th>
                                                <th>Meja</th>
                                                <th>Total</th>
                                                <th>Waiter</th>
                                            </tr>
                                        </thead>
                                        <?php
										$query_history = select_history();
										   while($row_history = mysql_fetch_array($query_history)){
                                            ?>
                                            <tr>
                                           
                                               <td><?= ($row_history['transaction_date']); ?></td>
                                                <td><?= $row_history['branch_name'] ?></td>
                                                <td><?= $row_history['building_name']?></td>
                                                 <td><?= $row_history['table_name']?></td>
                                                  <td><?= $row_history['transaction_total']?></td>
                                                 <td><?= $row_history['user_name']?></td>
                                                </tr>
                                            <?php
											
                                            }
                                            ?>
                                         
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        
                          
                        </div>
                    </div>


                </section><!-- /.content -->
                
       