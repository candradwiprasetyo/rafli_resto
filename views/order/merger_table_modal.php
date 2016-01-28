
<div class="md-modal md-effect-1" id="modal-1">
  <form action="<?= $action?>" method="post" enctype="multipart/form-data" role="form">			
  <div class="md-content">
				<h3>Merger Table (<?= $building_name?>)</h3>
				<div>
					
                  
                    <section class="content" style="max-width:100%; margin:0px; height:250px;">
                    <div class="row">
                            
                            
                            <div class="box">
                             
                                <div class="box-body table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                          
                                                <th style="text-align:center;">Nomor Meja</th>
                                              
                                                   <th style="text-align:center;">Config</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no = 1;
										  
										   while($row_table_merger = mysql_fetch_array($query_table_merger)){
                                            ?>
                                            <tr>
                                            
                                               <td style="text-align:center;"><?= $row_table_merger['table_name']?></td>
                                               
                                                
                                              <td style="text-align:center;">

                                                <label>
                                                    <input type="checkbox"/>
                                                   
                                                </label>                                                
                                            

                                                </td> 
                                            </tr>
                                            <?php
											$no++;
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                         
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                       
                    </div>

                </section><!-- /.content -->
                    
                    <br>
                    <div class="row">
                        <div class="form-group">
                           
                            <div class="col-md-12" style="padding:0px; text-align:center;">
                            	<input class="btn btn-success" type="submit" value="Save"/>&nbsp;
                                <button class="md-close btn btn-danger" style="text-align:left;">Close</button>
                            </div>
                        </div>
                    </div>
                   
					
                    <br>
				</div>
			</div>
            </form>
</div>


<div style="clear:both;"></div>