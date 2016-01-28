<script type="text/javascript">
		  function grand_total()
			{
				
				var harga = parseFloat(document.getElementById("i_harga").value);
				var qty = parseFloat(document.getElementById("i_qty").value);
				
					
				var	total = harga * qty;
				
				
				
				document.getElementById("i_total").value = total;
				
			}

		   </script>
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
                                    
                                    

                                    <?php
                                        $query_note_category = mysql_query("select * from note_categories order by note_category_id");
                                        while($row_note_category = mysql_fetch_array($query_note_category)){

                                        ?>
                                       

                                        <div class="col-md-3">
                                        <div class="row">


                                        <div class="form-group note_frame">
                                            <legend><?= $row_note_category['note_category_name']?></legend>
                                           
                                             <div id="donate">
                                             <?php
                                             $active = 0;

                                            $query_note = mysql_query("select * from notes where note_category_id = '".$row_note_category['note_category_id']."' order by note_id");
                                            while($row_note = mysql_fetch_array($query_note)){
                                              $get_note_active = get_note_active($row_note['note_id'], $wt_id);
                                              
                                              
                                              if($get_note_active > 0){
                                                 $checked = "checked = 'checked'";
                                                 $active++;
                                                 $link = get_link_active($row_note['note_id'], $wt_id);
                                              }else{
                                                $checked = '';

                                              }

                                            ?>  
                                            <div class="form-group">  
                                              
                                                  <input type="radio" name="i_note_<?= $row_note_category['note_category_id'] ?>" class="flat-red" value="<?= $row_note['note_id'] ?>" <?= $checked ?>/> <?= $row_note['note_name'] ?>
                                              
                                            </div>
                                              <?php
                                              }

                                              ?>
                                            </div>
                                              <?php
                                              if($active!=0){
                                              ?>
                                              <div style="text-align:right">
                                              <a href="transaction.php?page=delete_note&table_id=<?= $table_id ?>&wt_id=<?= $wt_id?>&id=<?= $link ?>" class="btn btn-danger" ><i class="fa fa-trash-o"></i></a>
                                            </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        </div>
                                      </div>
                                        <?
                                        }
                                        ?>
                                      
                                      <br>
                                      <div class="row">
                                        <div class="col-md-12">
                                        <label>Keterangan</label>
                                        <div class="form-group">  
                                             <textarea class="form-control" rows="10" name="i_desc" ><?= $get_note_desc; ?></textarea>
                                            </div>
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