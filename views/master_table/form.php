<!-- Content Header (Page header) -->
        

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                      
                        <!-- right column -->
                        <div class="col-md-12">
                            <!-- general form elements disabled -->

                          
                          <div class="title_page"> <?= $title ?></div>

                             <form action="<?= $action?>" method="post" enctype="multipart/form-data" role="form">

                            <div class="box box-cokelat">
                                
                               
                                <div class="box-body">
                                    
                                    
                                        <div class="col-md-12">
                                        
                                        <div class="form-group">
                                            <label>Nomor Meja</label>
                                            <input required type="text" name="i_name" class="form-control" placeholder="Masukkan nomor meja..." value="<?= $row->table_name ?>"/>
                                        </div>
                                      
                                        <div class="form-group">
                                          <label>Ruang</label>
                                           <select id="basic" name="i_building_id" size="1" class="selectpicker show-tick form-control" data-live-search="true" />
                                           <?php
                                           while($r_building = mysql_fetch_array($query_building)){
										   ?>
                                             <option value="<?= $r_building['building_id'] ?>" <?php if($row->building_id == $r_building['building_id']){ ?> selected="selected"<?php } ?>><?= $r_building['building_name']?> (<?= $r_building['branch_name']?>)</option>
                                             <?php
										   }
											 ?>
                                           </select>                                    
                                  		</div>
            							
                                        <div class="form-group">
                                            <label>Jumlah Kursi</label>
                                            <input required type="text" name="i_chair_number" class="form-control" placeholder="Masukkan jumlah kursi..." value="<?= $row->chair_number ?>"/>
                                        </div>
                                        
                                        
                                        </div>
                                       
                                        <div style="clear:both;"></div>
                                     
                                </div><!-- /.box-body -->
                                
                                  <div class="box-footer">
                                <input class="btn btn-danger" type="submit" value="Save"/>
                                <a href="<?= $close_button?>" class="btn btn-danger" >Close</a>
                             
                             </div>
                            
                            </div><!-- /.box -->
                       </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->