
        <!-- header logo: style can be found in header.less -->
           <?php
                if(isset($_GET['err']) && $_GET['err'] == 1){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-warning alert-dismissable">
                <i class="fa fa-warning"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Simpan Gagal !</b>
               Pilih meja yang di booking 
                </div>
           
                </section>
                <?php
                }
				?>
                
                 <!-- Main content -->
                 <form action="<?= $action?>" method="post" enctype="multipart/form-data" role="form">
                <section class="content">
                  
                    <div class="row">
                      
                        <!-- right column -->
                        <div class="col-md-12">
                            <!-- general form elements disabled -->

                          
                          <div class="title_page"> <?= $title ?></div>

                             

                            <div class="box box-cokelat">
                                
                               
                                <div class="box-body">
                                    
                                       
                                        <div class="col-md-12">
                                        
                                         <div class="form-group">
             <label>Tanggal </label>
             <div class="input-group">
            
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" required class="form-control pull-right" id="date_picker1" name="i_date" value="<?= $row->date ?>"/>
                                        </div><!-- /.input group -->
            </div>
                                        
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input required type="text" name="i_name" class="form-control" placeholder="Masukkan nama ..." value="<?= $row->name ?>"/>
                                        </div>
                                        
                                        <div class="form-group">
                                        <label>Telepon</label>
                                        <div class="input-group">
                                        <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                        </div>
                                        <input required class="form-control" type="text" name="i_phone" placeholder="Masukkan telepon ..." value="<?= $row->phone?>">
                                        </div>
                                        </div>
                                      

                                          <div class="form-group">
                                            <label>Alamat</label>
                                            <input required type="text" name="i_address" class="form-control" placeholder="masukkan alamat ..." value="<?= $row->address ?>"/>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Jumlah Tamu</label>
                                            <input required type="text" name="i_amount" class="form-control" placeholder="Masukkan jumlah tamu ..." value="<?= $row->amount ?>"/>
                                        </div>
                                       
                                        <div class="bootstrap-timepicker">
                                        <div class="form-group">
                                            <label>Jam</label>
                                            <div class="input-group">                                            
                                                <input type="text" name="i_hour" class="form-control timepicker"/>
                                                <div class="input-group-addon">
                                                    <i class="fa fa-clock-o"></i>
                                                </div>
                                            </div><!-- /.input group -->
                                        </div><!-- /.form group -->
                                    </div>
                                       
                                        </div>
                                        <div style="clear:both;"></div>
                                     
                                </div><!-- /.box-body -->
                                
                                  
                            
                            </div><!-- /.box -->
                      
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
              
     
        
                    <div class="row">
                     <div class="col-xs-12"></div>
                        <div class="col-xs-12">
                            
                             <div class="title_page">Table (<?= $branch_name?>)</div>
                            
                            <div class="box">
                             
                                <div class="box-body2 table-responsive">
                               
                                
                                	 <table id="" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            <!--<th width="5%">No</th>-->
                                                <th>Nomor Meja</th>
                                                <th>Ruang</th>
                                                <th>Cabang</th>
                                                <th>Jumlah Kursi</th>
                                                   <th>Config</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no = 1;
										   while($row = mysql_fetch_array($query)){
											   
                                            ?>
                                            <tr>
                                            <!--<td><?= $no?></td>-->
                                               <td><?= $row['table_name']?></td>
                                                <td><?php echo $row['building_name']?></td>
                                                <td><?php echo $row['branch_name']?></td>
                                                <td><?php echo $row['chair_number']?></td>
                                              <td style="text-align:center;">

                                                    <label>
                                                    <input type="checkbox" name="i_table_id_<?= $row['table_id']?>" value="1"/>
                                                   
                                                </label>     

                                                </td> 
                                            </tr>
                                           
                                                
                                                <?php
													
											$no++;
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                          <tfoot>
                                            <tr>
                                                <td colspan="5">
                                                <input class="btn btn-primary" type="submit" value="Save"/>
                                               
                                                </td>
                                               
                                            </tr>
                                        </tfoot>
                                    </table>
                                
                                
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->
                 </form>
    