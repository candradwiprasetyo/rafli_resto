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
                                    
                                    
                                        <div class="col-md-9">
                                        
                                        <div class="form-group">
                                            <label>Nama Menu</label>
                                            <input required type="text" name="i_name" class="form-control" placeholder="Masukkan nama menu ..." value="<?= $row->menu_name ?>"/>
                                        </div>
                                      
                                        <div class="form-group">
                                          <label>Type</label>
                                           <select id="basic" name="i_menu_type_id" size="1" class="selectpicker show-tick form-control" data-live-search="true" />
                                           <?php
                                           while($r_type = mysql_fetch_array($query_menu_type)){
										   ?>
                                             <option value="<?= $r_type['menu_type_id'] ?>" <?php if($row->menu_type_id == $r_type['menu_type_id']){ ?> selected="selected"<?php } ?>><?= $r_type['menu_type_name']?></option>
                                             <?php
										   }
											 ?>
                                           </select>                                    
                                  		</div>

										    <div class="form-group">
                                            <label>HPP</label>
                                            <input required type="number" name="i_original_price" class="form-control" placeholder="Masukkan harga original ..." value="<?= $row->menu_original_price ?>"/>
                                        </div>
                                        
                                            <div class="form-group">
                                            <label>Margin</label>
                                            <input required type="number" name="i_margin_price" class="form-control" placeholder="Masukkan margin ..." value="<?= $row->menu_margin_price ?>"/>
                                        </div>
                                        
                                          <div class="form-group">
                                            <label>Harga Jual</label>
                                            <input required type="number" name="i_price" class="form-control" placeholder="Masukkan harga ..." value="<?= $row->menu_price ?>"/>
                                        </div>
                                        
                                        
                                       
                                          <div class="form-group">
                                          <label>Owner</label>
                                           <select id="basic" name="i_partner_id" size="1" class="selectpicker show-tick form-control" data-live-search="true" />
                                           <?php
                                           while($r_partner = mysql_fetch_array($query_partner)){
										   ?>
                                             <option value="<?= $r_partner['partner_id'] ?>" <?php if($row->partner_id == $r_partner['partner_id']){ ?> selected="selected"<?php } ?>><?= $r_partner['partner_name']?></option>
                                             <?php
										   }
											 ?>
                                           </select>                                    
                                  		</div>
                                        
                                        <div class="form-group">
                                            <label>Waktu limit order (minute)</label>
                                            <input required type="number" name="i_out_time" class="form-control" placeholder="Masukkan waktu limit order ..." value="<?= $row->out_time ?>"/>
                                        </div>
                                        
                                        </div>
                                        <div class="col-md-3">
                                         <div class="form-group">
                                         <label>Images</label>
                                          <?php
                                        if($id){
											 $gambar = ($row->menu_img) ? $row->menu_img : "default.jpg";
										?>
                                        <br />
                                        <img src="<?= "../img/menu/".$gambar ?>" style="width:100%;"/>
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
                    
                    <?php
                    if($id){
					?>
                     <div class="row">
                        <div class="col-xs-12">
                            
                             <div class="title_page"> Recipe</div>
                            
                            <div class="box">
                             
                                <div class="box-body2 table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            <th width="5%">No</th>
                                                <th>Nama Bahan</th>
                                                <th>Qty</th>
                                                  <th>Satuan</th>
                                                   <th>Config</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no = 1;
                                            while($row_recipe = mysql_fetch_array($query_recipe)){
                                            ?>
                                            <tr>
                                            <td><?= $no?></td>
                                               <td><?= $row_recipe['item_name']?></td>
                                                <td><?= $row_recipe['item_qty']?></td>
                                                <td><?= ($row_recipe['unit_name'])?></td>
                                               
                                              <td style="text-align:center;">

                                                    <a href="menu.php?page=form_item&id=<?= $row_recipe['menu_recipe_id']?>&menu_id=<?= $row->menu_id ?>" class="btn btn-default" ><i class="fa fa-pencil"></i></a>
                                                    <a href="javascript:void(0)" onclick="confirm_delete(<?= $row_recipe['menu_recipe_id']; ?>,'menu.php?page=delete_item&menu_id=<?= $row->menu_id ?>&id=')" class="btn btn-default" ><i class="fa fa-trash-o"></i></a>

                                                </td> 
                                            </tr>
                                            <?php
											$no++;
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                          <tfoot>
                                            <tr>
                                                <td colspan="5"><a href="<?= $add_button_item ?>" class="btn btn-danger " >Add Item</a></td>
                                               
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                    <?php
					}
					?>

                    
                </section><!-- /.content -->