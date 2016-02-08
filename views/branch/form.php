<!-- Content Header (Page header) -->
        

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
                                            <label>Nama</label>
                                            <input required type="text" name="i_name" class="form-control" placeholder="Masukkan nama ..." value="<?= $row->branch_name ?>"/>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Type</label>
                                           <select id="basic" name="i_type_id" size="1" class="selectpicker show-tick form-control" data-live-search="true" />
                                             <option value="1" <?php if($row->branch_type_id == 1){ ?> selected="selected"<?php } ?>>Pabrik</option>
                                             <option value="2" <?php if($row->branch_type_id == 2){ ?> selected="selected"<?php } ?>>Cabang Resto</option>
                                           </select>  
                                        </div>
	
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input required type="text" name="i_phone" class="form-control" placeholder="Masukkan telepon..." value="<?= $row->branch_phone ?>"/>
                                        </div>

                                         <div class="form-group">
                                            <label>Address</label>
                                            <input required type="text" name="i_address" class="form-control" placeholder="Masukkan alamat..." value="<?= $row->branch_address ?>"/>
                                        </div>
                                        
                                         

                                         <div class="form-group">
                                            <label>City</label>
                                            <input required type="text" name="i_city" class="form-control" placeholder="Masukkan kota..." value="<?= $row->branch_city ?>"/>
                                        </div>

                                         <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="i_desc" class="form-control" rows="5"><?= $row->branch_desc ?></textarea>
                                        </div>
                                    
            							               <div class="form-group">
                                         <label>Images </label>
                                          <?php
                                        if($id){
											                  $gambar = ($row->branch_img) ? "../img/branch/".$row->branch_img : "../img/img_not_found.png";
										                    ?>
                                        <br />
                                        <img src="<?= $gambar ?>" style="max-width:100%;"/>
                                        <?php
                    										}
                    										?>
                                           <input type="file" name="i_img" id="i_img" />
                                        </div>
                                        
                                        
                                        </div>
                                       
                                        <div style="clear:both;"></div>
                                     
                                </div><!-- /.box-body -->
                                
                                  <div class="box-footer">
                                <input class="btn btn-danger" type="submit" value="Save"/>
                                <a href="<?= $close_button?>" class="btn btn-danger" >Close</a>
                             
                             </div>
                            
                            </div><!-- /.box -->
                       
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->

                      <?php
                    if($id){
                       include 'list_menu.php';
                    }
                    ?>

                </section><!-- /.content -->
                 </form>