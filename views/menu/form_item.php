<!-- Content Header (Page header) -->
        
                 <?php
                if(isset($_GET['did']) && $_GET['did'] == 1){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Simpan gagal !</b>
               Password dan confirm password tidak sama
                </div>
           
                </section>
                <?php
                }
                ?>

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
                                          <label>Item</label>
                                           <select id="basic" name="i_item_id" size="1" class="selectpicker show-tick form-control" data-live-search="true" />
                                           <?php
                                           while($r_item = mysql_fetch_array($query_item)){
										   ?>
                                             <option value="<?= $r_item['item_id'] ?>" <?php if($row->item_id == $r_item['item_id']){ ?> selected="selected"<?php } ?>><?= $r_item['item_name'] . " ( ".$r_item['unit_name']." )"?></option>
                                             <?php
										   }
											 ?>
                                           </select>                                    
                                  		</div>

										    <div class="form-group">
                                            <label>Qty</label>
                                            <input required type="number" name="i_item_qty" class="form-control" placeholder="Masukkan qty ..." value="<?= $row->item_qty ?>"/>
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