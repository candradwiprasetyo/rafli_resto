
            

             
                            <div style="position:fixed;">

                             <div class="box" style="margin-bottom:0px; padding-bottom:0px;">
                           
                             
                               
                                    <table id="" class="" style="margin-bottom:0px;">
                                        <thead style="color:#fff; background:#D82827; height:30px; line-height:30px;">
                                            <tr>
                                            <th width="5%" style="padding:10px">Jumlah</th>
                                                <th  style="padding:10px">Nama Menu</th>
                                               
                                            </tr>
                                        </thead>
                                      
                                    </table>

                               


                            </div><!-- /.box -->
                            
                            <div class="box" style="margin-bottom:0px; padding-bottom:0px; overflow-y:auto; overflow-x:hidden; height:335px; background:#fff;">
                           
                             
                                <div class="">
                                    <table id="" class="table table-bordered">
                                        
                                        <tbody >
                                            <?php
                                           $no = 1;
                                           $query_widget = mysql_query("select a.*, b.menu_name from widget_tmp a 
                                                                    join menus b on b.menu_id = a.menu_id
                                                                    where user_id = '".$_SESSION['user_id']."' 
                                                                    and table_id = '$table_id'
                                                                    order by a.wt_id

                                                                    ");
                                            while($row_widget = mysql_fetch_array($query_widget)){
                                            ?>
                                            <tr>
                                           
                                               <td width="20%"><?= $row_widget['jumlah']?></td>
                                                <td><?= $row_widget['menu_name']?></td>
                                                  <td style="text-align:center;">

                                                    <a href="transaction.php?page=note&table_id=<?= $table_id?>&wt_id=<?= $row_widget['wt_id']?>" class="btn btn-default" ><i class="fa fa-book"></i></a>
                                                    <a href="javascript:void(0)" onclick="confirm_delete(<?= $row_widget['wt_id']; ?>, 'transaction.php?page=delete_widget&table_id=<?= $table_id ?>&id=')" class="btn btn-default" ><i class="fa fa-trash-o"></i></a>

                                                </td> 
                                             
                                            </tr>
                                            <?php
                                            $query_widget_detail = mysql_query("select a.*, b.note_name
                                                                    from widget_tmp_details a
                                                                    join notes b on b.note_id = a.note_id
                                                                    where wt_id = '".$row_widget['wt_id']."'
                                                                    order by wt_id

                                                                    ");
                                            while($row_widget_detail = mysql_fetch_array($query_widget_detail)){

                                            ?>
                                            
                                            <tr>
                                           
                                               <td width="20%"></td>
                                                <td>- <?= $row_widget_detail['note_name']?></td>
                                                  <td style="text-align:center;">

                                                   
                                                </td> 
                                             
                                            </tr>

                                            <?php
                                            }
											$no++;
                                            }
                                            ?>

                                            </tbody>
                                        
                                          
                                      
                                    </table>
                               

                                </div><!-- /.box-body -->


                            </div><!-- /.box -->
                        
                        <div class="box" style="padding:10px;">
                        <div class="row">
                        <div class="col-md-6">    
                            <a href="transaction.php?page=reset&table_id=<?= $table_id ?>" class="btn btn-danger btn-block " >Reset</a>
                        </div>

                          <div class="col-md-6">    
                            <a href="transaction.php?page=close&table_id=<?= $table_id ?>" class="btn btn-default btn-block " >Close</a>
                        </div>
                        </div>
                        </div>
                        </div>
                      