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
                                            <label>Nama Ruang</label>
                                            <input required type="text" name="i_name" class="form-control" placeholder="Masukkan nama ruang..." value="<?= $row->building_name ?>"/>
                                        </div>

                                         <div class="form-group">
                                          <label>Branch</label>
                                            <select id="basic" name="i_branch_id" size="1" class="selectpicker show-tick form-control" data-live-search="true" />
                                           <?php
                                           while($r_branch = mysql_fetch_array($query_branch)){
                                            ?>
                                             <option value="<?= $r_branch['branch_id'] ?>" <?php if($row->branch_id == $r_branch['branch_id']){ ?> selected="selected"<?php } ?>><?= $r_branch['branch_name']?></option>
                                             <?php
                                             }
                                             ?>
                                           </select>                                      
                                      </div>

                                      
                                    
            							 <div class="form-group">
                                         <label>Gambar Denah </label>
                                          <?php
                                        if($id){
											 $gambar = ($row->building_img) ? $row->building_img : "img_not_found.png";
										?>
                                        <br />
                                        <img src="<?= "../img/building/".$gambar ?>" style="max-width:100%;"/>
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
                       </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->