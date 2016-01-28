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
                }
                ?><!-- Content Header (Page header) -->
<script>
function add_menu(id)
{
	if(id!=0){
	window.location.href = 'member.php?page=add_menu&menu_id='+id+'&member_id=<?php echo $id ?>';
	}
}
</script>
 <form action="<?= $action?>" method="post" enctype="multipart/form-data" role="form">
                <!-- Main content -->
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
                                            <label>Nama </label>
                                            <input required type="text" name="i_name" class="form-control" placeholder="Masukkan nama member..." value="<?= $row->member_name ?>"/>
                                        </div>
                                        
                                         <div class="form-group">
                                            <label>Telepon</label>
                                            <input required type="text" name="i_phone" class="form-control" placeholder="Masukkan telepon member..." value="<?= $row->member_phone ?>"/>
                                        </div>
                                        
                                         <div class="form-group">
                                            <label>Email</label>
                                            <input required type="email" name="i_email" class="form-control" placeholder="Masukkan email member..." value="<?= $row->member_email ?>"/>
                                        </div>
                  						
                                         <div class="form-group">
                                          <label>Type</label>
                                           <select name="i_discount_type" size="1" class="form-control"/>
                                             <option value="1"  <?php if($row->member_discount_type == 1){ echo "selected='selected'"; } ?>>Diskon Langsung</option>
                                           <option value="2" <?php if($row->member_discount_type == 2){ echo "selected='selected'"; } ?>>Diskon POIN</option>       
                                           </select>                                    
                                  		</div>
                                                            
                                     <div class="form-group">
                                            <label>Diskon (%)</label>
                                            <input required type="text" name="i_discount" class="form-control" placeholder="Masukkan diskon..." value="<?= $row->member_discount ?>"/>
                                        </div>
                                        <?php
                                        if($id){
										?>
                                         <div class="form-group">
                                            <label>Settlement (Rp)</label>
                                            <input required type="text" name="i_settlement" class="form-control" placeholder="Masukkan diskon..." value="<?= $row->member_settlement ?>" readonly="readonly"/>
                                        </div>
                                        <?php
										}
										?>
            
                                        
                                        
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
				

                 // include 'list_menu.php';
					}
?>
                    
                </section><!-- /.content --> 

                <?php

                if(!$id){ 
                    ?>

                    </form>

                    <?php
                    }
                    ?>