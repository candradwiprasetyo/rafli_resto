<?php

if(!$_SESSION['login']){
    header("location: ../login.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>.: Kedai Taman :.</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="../css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- DATA TABLES -->
        <link href="../css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!-- Popup Modal -->
        <link href="../css/popModal.css" type="text/css" rel="stylesheet" >
        <!-- Preview -->
        <link href="../css/preview.css" type="text/css" rel="stylesheet" >
         <!-- iCheck for checkboxes and radio inputs -->
        <link href="../css/iCheck/all.css" rel="stylesheet" type="text/css" />
         <!-- daterange picker -->
        <link href="../css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- Bootstrap time Picker -->
        <link href="../css/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>
        <!-- datepicker -->
       <link href="../css/datepicker/datepicker.css" rel="stylesheet">
       
       <!-- lookup -->
       <link rel="stylesheet" type="text/css" href="../css/lookup/bootstrap-select.css">
       <!-- Button -->
	   <link rel="stylesheet" type="text/css" href="../css/button/component.css" />
       <!-- tooptip meja -->
       <link rel="stylesheet" type="text/css" href="../css/tooltip/tooltip-classic.css" />
      
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        
        <!-- footable 
           <link href="../css/footable/footable.core.css?v=2-0-1" rel="stylesheet" type="text/css"/>
            <link href="../css/footable/footable.standalone.css" rel="stylesheet" type="text/css"/>
           
           
            <script src="../js/footable/footable.js?v=2-0-1" type="text/javascript"></script>
            <script src="../js/footable/footable.sort.js?v=2-0-1" type="text/javascript"></script>
            <script src="../js/footable/footable.filter.js?v=2-0-1" type="text/javascript"></script>
            <script src="../js/footable/footable.paginate.js?v=2-0-1" type="text/javascript"></script>
            <script src="../js/footable/bootstrap-tab.js" type="text/javascript"></script>
         -->

        
       
      

    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
           <?php
                if(isset($_GET['err']) && $_GET['err'] == 1){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-warning alert-dismissable">
                <i class="fa fa-warning"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Simpan Gagal !</b>
               Pembayaran tidak boleh lebih kecil dari total
                </div>
           
                </section>
                <?php
                }
				?>
     
          <!-- Main content -->
                <section class="content">
                    <div class="row">
                     <div class="col-xs-3"></div>
                        <div class="col-xs-6">
                            
                             <div class="title_page">Table Merger (<?= $building_name?>)</div>
                            
                            <div class="box">
                             
                                <div class="box-body2 table-responsive">
                                <form action="<?= $action?>" method="post" enctype="multipart/form-data" role="form">
                                
                                	 <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            <!--<th width="5%">No</th>-->
                                                <th>Nomor Meja</th>
                                                <th>Ruang</th>
                                                <th>Jumlah Kursi</th>
                                                   <th>Config</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no = 1;
										   while($row = mysql_fetch_array($query_table_merger)){
											   
											   if($row['tms_id']==0){
											   
											   $query_exist = mysql_query("select count(table_id) as jumlah from table_mergers where table_parent_id = '".$table_id."' and table_id = '".$row['table_id']."'");
											   $row_exist = mysql_fetch_array($query_exist);
                                            ?>
                                            <tr>
                                            <!--<td><?= $no?></td>-->
                                               <td><?= $row['table_name']?></td>
                                                <td><?php echo $row['nama_gedung']?></td>
                                                <td><?php echo $row['chair_number']?></td>
                                              <td style="text-align:center;">

                                                    <label>
                                                    <input type="checkbox" name="i_table_id_<?= $row['table_id']?>" value="1" <?php if($row_exist['jumlah'] > 0){ ?> checked<?php }?>/>
                                                   
                                                </label>     

                                                </td> 
                                            </tr>
                                            <?php
											// jika statusnya adalah child merger
											}else if($row['tms_id']==2){
												// cek apakah child sendiri ?
												$query_exist = mysql_query("select count(table_id) as jumlah from table_mergers where table_parent_id = '".$table_id."' and table_id = '".$row['table_id']."'");
											   	$row_exist = mysql_fetch_array($query_exist);
												// jika ya tampilkan
											   	if($row_exist['jumlah'] > 0){
												?>
                                                
                                                 <tr>
                                            	<!--<td><?= $no?></td>-->
                                               	<td><?= $row['table_name']?></td>
                                                <td><?php echo $row['nama_gedung']?></td>
                                                <td><?php echo $row['chair_number']?></td>
                                              	<td style="text-align:center;">

                                                    <label>
                                                    <input type="checkbox" name="i_table_id_<?= $row['table_id']?>" value="1" <?php if($row_exist['jumlah'] > 0){ ?> checked<?php }?>/>
                                                   
                                                </label>     

                                                </td> 
                                            	</tr>
                                                
                                                <?php
													
												}
											}
											
											$no++;
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                          <tfoot>
                                            <tr>
                                                <td colspan="4">
                                                <input class="btn btn-primary" type="submit" value="Save"/>
                                                <?php
                                                if($jumlah_child > 0){
												?>&nbsp;<a href="<?= $delete_merger_action ?>" class="btn btn-danger " >Delete Merger</a><?php } ?>
                                                &nbsp;<a href="<?= $close_button ?>" class="btn btn-danger " >Cancel</a>
                                                </td>
                                               
                                            </tr>
                                        </tfoot>
                                    </table>
                                
                                </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->
       
    </body>
</html>

       

 <!-- page script -->
 
 <!-- jQuery 2.0.2 -->
       <script src="../js/jquery.js"></script>
        <script src="../js/function.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="../js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="../js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
         <!-- InputMask -->
        <script src="../js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
        <script src="../js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
        <script src="../js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
       
        <script src="../js/AdminLTE/app.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(function() {
               
 				$('#example_simple').dataTable({
                    "bPaginate": false,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": false,
                    "bInfo": false,
                    "bAutoWidth": false
                });
				
				//iCheck for checkbox and radio inputs
                $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                    checkboxClass: 'icheckbox_minimal',
                    radioClass: 'iradio_minimal'
                });
                //Red color scheme for iCheck
                $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                    checkboxClass: 'icheckbox_minimal-red',
                    radioClass: 'iradio_minimal-red'
                });
                //Flat red color scheme for iCheck
                $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                    checkboxClass: 'icheckbox_flat-red',
                    radioClass: 'iradio_flat-red'
                });
			
				
            });
			
		
          
        </script>