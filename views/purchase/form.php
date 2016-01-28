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
                                    
                                    
                                        <div class="col-md-12">
                                        
                                        <div class="form-group">
                                        <label>Tanggal</label>
                                        <div class="input-group">   
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" required class="form-control pull-right" id="date_picker1" name="i_date" value="<?= $row->purchase_date ?>"/>
                                        </div><!-- /.input group -->
            </div>
            
                                        
                                        <div class="form-group">
                                            <label>Nama Barang</label>
                                            <select id="basic" name="i_item_id" size="1" class="selectpicker show-tick form-control" data-live-search="true" />
                                           <?php
                                           while($r_item = mysql_fetch_array($query_item)){
										   ?>
                                             <option value="<?= $r_item['item_id'] ?>" <?php if($row->item_id == $r_item['item_id']){ ?> selected="selected"<?php } ?>><?= $r_item['item_name']." (".$r_item['unit_name'].")"?></option>
                                             <?php
										   }
											 ?>
                                           </select>                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Harga</label>
                                            <input required type="number" name="i_harga" id="i_harga" class="form-control" placeholder="Masukkan harga..." value="<?= $row->purchase_price ?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label>QTY</label>
                                            <input required type="number" name="i_qty" id="i_qty" class="form-control" placeholder="Masukkan jumlah..." value="<?= $row->purchase_qty ?>" onChange="grand_total()" />
                                        </div>
                                        <!--
                                        <div class="form-group">
                                            <label>Total Harga</label>
                                            <input required type="text" readonly name="i_total" id="i_total" class="form-control"  value="<?= $row->purchase_total ?>"/>
                                        </div>
                                      -->
                                        <div class="form-group">
                                          <label>Supplier</label>
                                           <select id="basic" name="i_supplier" size="1" class="selectpicker show-tick form-control" data-live-search="true" />
                                           <?php
                                           while($r_supplier = mysql_fetch_array($query_supplier)){
										   ?>
                                             <option value="<?= $r_supplier['supplier_id'] ?>" <?php if($row->supplier_id == $r_supplier['supplier_id']){ ?> selected="selected"<?php } ?>><?= $r_supplier['supplier_name']?></option>
                                             <?php
										   }
											 ?>
                                           </select>                                    
                                  		</div>
            								
                                             <div class="form-group">
                                            <label>Cabang</label>
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
                                        
                                        
                                        </div>
                                       
                                        <div style="clear:both;"></div>
                                     
                                </div><!-- /.box-body -->
                                
                                  <div class="box-footer">
                                  <?php
                                  if(!$id){
								  ?>
                                <input class="btn btn-danger" type="submit" value="Save"/>
                                <?php
								  }
								?>
                                <a href="<?= $close_button?>" class="btn btn-danger" >Close</a>
                             
                             </div>
                            
                            </div><!-- /.box -->
                       </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->