<?php

if(!$_SESSION['login']){
    header("location: ../login.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>.: Hikaru Resto :.</title>
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

       <link rel="stylesheet" type="text/css" href="../css/style_table.css" />
    <!-- tooltip -->
    <link rel="stylesheet" type="text/css" href="../css/tooltip/tooltip-classic.css" />
    <!-- button component-->
    <link rel="stylesheet" type="text/css" href="../css/button_component/component.css" />
    <link rel="stylesheet" type="text/css" href="../css/button_component/content.css" />
       
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

        <!-- jQuery 2.0.2 -->
       <script src="../js/jquery.js"></script>
        <script src="../js/function.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="../js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="../js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

        <!-- select -->
    <script type="text/javascript" src="../js/lookup/bootstrap-select.js"></script>
        
        
    </head>
    <body class="skin-blue">


 <div class="header_fixed"> 
 

          <div class="morph-button morph-button-modal morph-button-modal-3 morph-button-fixed">
            <button class="blue_color_button"  type="button"  onClick="javascript: window.location.href = 'order.php'; ">BACK TO ORDER</button>
            
          </div><!-- morph-button -->

          <div class="logo_order"></div>

         
 </div>

<br>
<br>
<br>
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
          <br>
                <section class="content">
                  <div class="container">
                    <div class="row">
                        <div class="col-md-7 col-md-offset-1">
                            
                            <div class="box_payment">
                             <div class="payment_title">bayar bill</div>
                                
                                <div class="box-body2 table-responsive">

                                   <form action="<?= $action?>" method="post" enctype="multipart/form-data" role="form">
                               <div class="col-md-8">
                                  <div class="row">
                                    <div class="payment_group">
                                     <b> Tipe Pembayaran</b>
                                      <br>
                                      <br>
                                       <div id="payment_type">
                                       
                                       

                                                <label class="blue" style="background-color: #eee;">
                                                    <input checked type="radio" name="i_payment_method" id="i_payment_method" value="1" checked onclick="payment_method(1)" style="position: absolute;
    opacity: 0;">
                                                   <span  onclick="get_change(1)" id="i_span_1" class="i_span" style="background:#ccc;">
                                                  Cash </span>
                                                </label>
                                      
                                                <label>
                                                    <input style="position: absolute;
    opacity: 0;" type="radio" name="i_payment_method" id="i_payment_method" value="2" onclick="payment_method(2)">
                                                    <span  onclick="get_change(2)" id="i_span_2" class="i_span">
                                                  Debit </span>
                                                </label>

                                                <label>
                                                    <input style="position: absolute;
    opacity: 0;" type="radio" name="i_payment_method" id="i_payment_method" value="3" onclick="payment_method(3)">
                                                    <span  onclick="get_change(3)" id="i_span_3" class="i_span">
                                                  Credit </span>
                                                </label>

                                                <label>
                                                    <input style="position: absolute;
    opacity: 0;" type="radio" name="i_payment_method" id="i_payment_method" value="4" onclick="payment_method(4)">
                                                    <span  onclick="get_change(4)" id="i_span_4" class="i_span">
                                                  Voucher </span>
                                                </label>
                                        </div>

                                    </div>

 <div class="payment_group" id="bank_frame" style="display:none; width:100%;"> 
                                     <b> Bank</b>
                                      <br>
                                      <div class="row">
                                      <div class="col-md-6" style="padding-left:0px; ">
                                       <select id="basic" name="i_bank_id" size="1" class="selectpicker show-tick form-control" data-live-search="true" style="min-height:100px;" />
                                           <?php
                       $q_bank = mysql_query("select * from banks order by bank_id");
                                           while($r_bank = mysql_fetch_array($q_bank)){
                                            ?>
                                             <option value="<?= $r_bank['bank_id'] ?>"><?= $r_bank['bank_name']?></option>
                                             <?php
                                             }
                                             ?>
                                           </select>    
                                         </div>
                                         <div class="col-md-6" style="padding-left:0px; ">
                                            <input type="text" name="i_bank_account" id="i_bank_account" class="form-control" value="" placeholder="No Kartu" style="text-align:right; font-size:20px;"/>
                                        
                                         </div>
                                       </div>
                                    </div>

                                     <div class="payment_group" id="voucher_frame" style="display:none; width:100%;">
                                     <b> Voucher</b>
                                      <br>
                                       <select  id="basic" name="i_voucher_id" size="1" class="selectpicker show-tick form-control" data-live-search="true" style="min-height:100px;" onchange="update_voucher(this.value)" />
                                           <option value="0">Pilih Voucher</option>
                                           <?php
                                            $q_voucher = mysql_query("select * from vouchers where voucher_active_status = '0' order by voucher_id");
                                            while($r_voucher = mysql_fetch_array($q_voucher)){
                                            ?>
                                             <option value="<?= $r_voucher['voucher_id'] ?>"><?= $r_voucher['voucher_code']." ( Rp. ". $r_voucher['voucher_value']." )" ?></option>
                                             <?php
                                             }
                                             ?>
                                           </select>    
                                         </div>


                                   

                                     <?php
                                           
                                            $total_price2 = 0;
                                           while($row_item2 = mysql_fetch_array($query2)){
                                            ?>
                                           
                                            <?php
                     
                                              $total_price2 = $total_price2 + $row_item2['transaction_detail_total'];
                                            }
                                            ?>

                                    <div class="col-md-12" style="padding:0px;">
                                      <div class="payment_group">
                                        <div class="calc_title">
                                        <b>Nominal</b>
                                        </div>

                                         <input required type="text" name="i_payment" id="i_payment" class="form-control calc_nominal" value="<?= ($total_price2) ?>" style="text-align:right; font-size:20px;" onChange="update_change()"/>
                                        
                                         <div class="row" style="margin-top:10px;">
                                          
                                          <div class="col-md-5" style="padding:0px;">

                                                  <div>
                                                    <div class="col-md-6" style="padding:0px; padding-right:2px; padding-bottom:2px;"><div class="calc_button_right">S</div></div>
                                                    <div class="col-md-6" style="padding:0px; padding-right:2px; padding-bottom:2px;"><div class="calc_button_right" onclick="add_clear(160000)">160</div></div>
                                                    </div>
                                                  <div>
                                                    <div class="col-md-6" style="padding:0px; padding-right:2px; padding-bottom:2px;"><div class="calc_button_right" onclick="add_clear(200000)">200</div></div>
                                                    <div class="col-md-6" style="padding:0px; padding-right:2px; padding-bottom:2px;"><div class="calc_button_right" onclick="add_clear(250000)">250</div></div>
                                                  </div>
                                                  <div>
                                                    <div class="col-md-6" style="padding:0px; padding-right:2px; padding-bottom:2px;"><div class="calc_button_right" onclick="add_numeric(10000)">+10</div></div>
                                                    <div class="col-md-6" style="padding:0px; padding-right:2px; padding-bottom:2px;"><div class="calc_button_right" onclick="add_numeric(20000)">+20</div></div>
                                                  </div>
                                                  <div>
                                                    <div class="col-md-6" style="padding:0px; padding-right:2px; padding-bottom:2px;"><div class="calc_button_right" onclick="add_numeric(50000)">+50</div></div>
                                                    <div class="col-md-6" style="padding:0px; padding-right:2px; padding-bottom:2px;"><div class="calc_button_right">Sisa</div></div>
                                                  </div>
                                            
                                            </div>
                                            <div class="col-md-7" style="padding:0px;">
                                                  <div style="border-top-left-radius:5px; border-top-right-radius:5px;">
                                                    <div class="col-md-4" style="padding:0px;"><div class="calc_button" style="border-top-left-radius:5px;" onclick="add_non_numeric(1)">1</div></div>
                                                    <div class="col-md-4" style="padding:0px;"><div class="calc_button"  onclick="add_non_numeric(2)">2</div></div>
                                                    <div class="col-md-4" style="padding:0px;"><div class="calc_button" style="border-top-right-radius:5px;"  onclick="add_non_numeric(3)">3</div></div>
                                                  </div>
                                                  <div>
                                                    <div class="col-md-4" style="padding:0px;"><div class="calc_button" onclick="add_non_numeric(4)">4</div></div>
                                                    <div class="col-md-4" style="padding:0px;"><div class="calc_button" onclick="add_non_numeric(5)">5</div></div>
                                                    <div class="col-md-4" style="padding:0px;"><div class="calc_button" onclick="add_non_numeric(6)">6</div></div>
                                                  </div>
                                                  <div>
                                                    <div class="col-md-4" style="padding:0px;"><div class="calc_button" onclick="add_non_numeric(7)">7</div></div>
                                                    <div class="col-md-4" style="padding:0px;"><div class="calc_button" onclick="add_non_numeric(8)">8</div></div>
                                                    <div class="col-md-4" style="padding:0px;"><div class="calc_button" onclick="add_non_numeric(9)">9</div></div>
                                                  </div>

                                                  <div>
                                                    <div class="col-md-4" style="padding:0px;"><div class="calc_button" style="border-bottom-left-radius:5px;" onclick="add_clear(0)">C</div></div>
                                                    <div class="col-md-4" style="padding:0px;"><div class="calc_button" onclick="add_non_numeric('0')">0</div></div>
                                                    <div class="col-md-4" style="padding:0px;"><div class="calc_button" style="border-bottom-right-radius:5px;">.</div></div>
                                                  </div>
                                                 

                                            </div>

                                         </div>

                                      </div>
                                    </div>

                                    <div class="col-md-12" style="padding:0px;">
                                    <div class="payment_group">
                                      <table id="" class="" width="100%">
                                        <tbody>
                                           

                                           
                                          
                                        </tbody>
                                         <tfoot>
                                            
                                            <tr>
                                                <td colspan="2" width="50%">Grand Total </td>
                                                
                                               
                                            </tr>
                                            <tr>
                                              <td colspan="3" style="text-align:right; font-size:20px;" ><?= number_format($total_price2)?> 
                                                 <input required type="hidden" name="i_total" id="i_total" class="form-control" value="<?= ($total_price2)?>" style="text-align:right; font-size:30px; height:50px;" readonly/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Penerimaan </td>
                                                
                                               
                                            </tr>
                                            <tr>
                                              <td colspan="3" style="text-align:right; " >
                                                 <input required type="text" name="i_discount" id="i_discount" class="form-control" value="0" style="text-align:right; font-size:20px;" onChange="update_discount()"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Sisa </td>
                                               
                                               
                                            </tr>
                                            <tr>
                                            <td colspan="3" style="text-align:right; " >
                                                 <input required type="text" name="i_grand_total" id="i_grand_total" class="form-control" value="<?= ($total_price2)?>" style="text-align:right; font-size:20px;" readonly/>
                                                </td>
                                            </tr>
                                           
                                            <tr>
                                              <td colspan="3" style="text-align:right; " >
                                                 </td>
                                            </tr>
                                             <tr>
                                                <td colspan="2">Kembalian </td>
                                               
                                               
                                            </tr>

                                            <tr>
                                               <td colspan="3" style="text-align:right; " >
                                                 <input required type="text" name="i_change" id="i_change" class="form-control" value="0" style="text-align:right; font-size:20px;" readonly/>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td colspan="5" style="font-size:36px;"> 
                                                
                                                

                                                
                                                 </td>
                                               
                                               
                                            </tr>
                                            
                                           
                                            
                                        </tfoot>
                                    </table>
                                    </div>

                                       
                                
                               
                                      <table width="100%">
                                         <tr>
                                                <td colspan="5"> 
                                                  <button type="submit" class="btn button_save_payment btn-block"><i class="fa fa-save"></i> Simpan</button> 
                                                
                                                 </td>
                                                  <td colspan="5" align="right"> 
                                                  <a href="order.php?building_id=<?= $building_id?>" class="btn button_close_payment"><i class="fa fa-times-circle"></i> close</a> 
                                                
                                                 </td>
                                               
                                               
                                            </tr>
                                      </table>

                                    </div>
                                   

                                  </div>
                                </div>

                                <div class="col-md-4" style="padding-left:0px;">  
                                    <div class="payment_group">
                                      <div class="struk_frame">
                                    <div class="struk_title">
                                      <b>HIKARU</b>


                                    </div>

                                    <table width="100%">
                                      <tr>
                                        <td>Table :</td>
                                        <td><?= $table_name ?></td>
                                        <td width="20%"></td>
                                        <td>Date :</td>
                                        <td><?= date("d/m/Y"); ?></td>
                                      </tr>
                                      <tr>
                                        <td>Room :</td>
                                        <td><?= $building_name ?></td>
                                        <td width="20%"></td>
                                        <td>Time :</td>
                                        <td><?= date("H:i:s"); ?></td>
                                      </tr>
                                    </table>

                                    <div style="border-bottom:1px #000 dotted; padding-bottom:5px; margin-bottom:5px;"  ></div>
                                    <table id="" class="" width="100%">
                                        <tbody>
                                            <?php
                                           $no_item = 1;
  											$total_price = 0;
										   while($row_item = mysql_fetch_array($query)){
                                            ?>
                                            <tr>
                                            <td width="10%" valign="top"><?= $row_item['transaction_detail_qty'] ?></td>
                                            <td valign="top"><?= $row_item['menu_name'] ?></td>
                                            
                                            <td align="right" valign="top"><?= number_format($row_item['transaction_detail_total']) ?></td>
                                            </tr>
                                            <?php
											$no_item++;
											 $total_price = $total_price + $row_item['transaction_detail_total'];
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                          </table>

                                          <div style="border-bottom:1px #000 dotted; padding-bottom:5px; margin-bottom:5px;"  ></div>
                                          
                                          <table width="100%">
                                       
                                         <tfoot>
                                            
                                            <tr>
                                                <td colspan="2" style="font-size:20px;">Total </td>
                                                <td colspan="3" style="text-align:right; font-size:20px;" ><?= number_format($total_price)?> 
                                                 </td>
                                               
                                            </tr>
                                         
                                        </tfoot>
                                    
                                        
                                    </table>
						                      </div>
                                </div>
                                </form>
                                </div><!-- /.box-body -->

                              </div>


                            </div><!-- /.box -->
                        </div>

                        <div class="col-md-3">
                          <div class="payment_widget_frame">
                            <div class="payment_widget_header">
                              <div style="margin-bottom:10px; font-size:20px;"><?= "Table ". $table_name ?></div>
                              <div><?= $transaction_code ?></div>
                            </div>
                            <div class="payment_widget_content">
                              <div class="form-group">
                              <div class="row">
                                
                                  <div class="col-md-6" style="padding:0px">
                                    <a href="" class="btn payment_widget_button">Navigasi</a>
                                  </div>
                                  <div class="col-md-6"  style="padding-right:0px">
                                    <a href="" class="btn payment_widget_button">Info</a>
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group">
                                 <a href="" class="btn payment_widget_button">Split Bill</a>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group">
                                 <a href="" class="btn payment_widget_button">Laporan</a>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group">
                                 <a href="order.php?building_id=<?= $building_id?>" class="btn payment_widget_button">Daftar Transaksi</a>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group">
                                 <a href="reserved.php" class="btn payment_widget_button">Reservasi</a>
                                </div>
                              </div>

                              <div class="form-group">
                              <div class="row">
                                
                                  <div class="col-md-6" style="padding:0px">
                                    <a href="" class="btn payment_widget_button">About</a>
                                  </div>
                                  <div class="col-md-6"  style="padding-right:0px">
                                    <a href="" class="btn payment_widget_button">Setting</a>
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group">
                                 <a href="logout.php" class="btn payment_widget_button">Logout</a>
                                </div>
                              </div>

                            </div>
                          </div>
                        </div>

                    </div>
                  </div>
                </section><!-- /.content -->
       
    </body>
</html>

       

 <!-- page script -->
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
			
				
            });
			
		        function get_change(id){

                 
                    var color = "#eee";
                 
                  $(".i_span").css("background-color", color);
                 
                  document.getElementById("i_span_"+id).style.backgroundColor = "#ccc";
                  //document.getElementById("i_span_"+id).style.color = "white";
                }

    function update_discount(){
       var total = parseFloat(document.getElementById("i_total").value);
       var discount = parseFloat(document.getElementById("i_discount").value);
       
        if(discount > total){
         alert("Discount tidak boleh melebihi total harga");
         document.getElementById("i_discount").value = 0;
         document.getElementById("i_grand_total").value = total;
         }else{
        var grand_total = total - discount;
        document.getElementById("i_grand_total").value = grand_total;
        document.getElementById("i_payment").value = grand_total;
       }
      }
      
      function update_change()
      {
        
        var bayar = parseFloat(document.getElementById("i_payment").value);
        var total = parseFloat(document.getElementById("i_grand_total").value);
        
        
        if(bayar < total ){
          //alert("Pembayaran tidak boleh lebih kecil dari Total Pembelian");
          kembali = 0;
        }else{
          
          kembali = bayar - total;
        }
        
        
        document.getElementById("i_change").value = kembali;
        
      }
      
      
      function payment_method(id){
        var bank_frame = document.getElementById("bank_frame");
        var voucher_frame = document.getElementById("voucher_frame");
        if(id == 1){
          bank_frame.style.display = 'none';
          voucher_frame.style.display = 'none';
        }else if(id==2 || id==3){
          bank_frame.style.display = 'table';
          voucher_frame.style.display = 'none';
        }else{
          bank_frame.style.display = 'none';
          voucher_frame.style.display = 'table';
       }
      }

      function add_non_numeric(data){

         var bayar = parseFloat(document.getElementById("i_payment").value);
          if(bayar){
            bayar = bayar;
          }else{
            bayar = '';
          }
         document.getElementById("i_payment").value = bayar.toString() + data.toString();
         update_change();
      }

      function add_numeric(data){

         var bayar = parseFloat(document.getElementById("i_payment").value);
          if(bayar){
            bayar = bayar;
          }else{
            bayar = '';
          }
         document.getElementById("i_payment").value = bayar + data;
         update_change();
      }


      function add_clear(data){

        
         document.getElementById("i_payment").value = data;
        update_change();
      }

      function update_voucher(data){
        alert(data);

      }
          
        </script>

