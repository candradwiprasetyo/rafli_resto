<script type="text/javascript" src="../js/search2/jcfilter.min.js"></script>



<script type="text/javascript">

 

/*
function find_menu(keyword){
	//alert(keyword);
	window.find(keyword);
}
*/

function CurrencyFormat(number)
{
   var decimalplaces = 0;
   var decimalcharacter = "";
   var thousandseparater = ",";
   number = parseFloat(number);
   var sign = number < 0 ? "-" : "";
   var formatted = new String(number.toFixed(decimalplaces));
   if( decimalcharacter.length && decimalcharacter != "." ) { formatted = formatted.replace(/\./,decimalcharacter); }
   var integer = "";
   var fraction = "";
   var strnumber = new String(formatted);
   var dotpos = decimalcharacter.length ? strnumber.indexOf(decimalcharacter) : -1;
   if( dotpos > -1 )
   {
      if( dotpos ) { integer = strnumber.substr(0,dotpos); }
      fraction = strnumber.substr(dotpos+1);
   }
   else { integer = strnumber; }
   if( integer ) { integer = String(Math.abs(integer)); }
   while( fraction.length < decimalplaces ) { fraction += "0"; }
   temparray = new Array();
   while( integer.length > 3 )
   {
      temparray.unshift(integer.substr(-3));
      integer = integer.substr(0,integer.length-3);
   }
   temparray.unshift(integer);
   integer = temparray.join(thousandseparater);
   return sign + integer + decimalcharacter + fraction;
}



function add_menu(id)
{
	
	var jumlah = document.getElementById("i_jumlah_"+id).value;
	
	jumlah++;
	
	document.getElementById("i_jumlah_"+id).value = jumlah;
	get_total_price();
	// $("#table_treatment").load('treatment.php?page=form_add_treatment&planting_process_id='+id); 
}

function minus_menu(id)
{
	
	var jumlah = document.getElementById("i_jumlah_"+id).value;
	
	jumlah--;
	
	if(jumlah > 0){
		jumlah = jumlah;
	}else{
		jumlah = 0;
	}
	
	document.getElementById("i_jumlah_"+id).value = jumlah;
	get_total_price();
	// $("#table_treatment").load('treatment.php?page=form_add_treatment&planting_process_id='+id); 
}

function edit_menu(id)
{
	
	var jumlah = document.getElementById("i_jumlah_"+id).value;
	
	document.getElementById("i_jumlah_"+id).value = jumlah;
	get_total_price();
	// $("#table_treatment").load('treatment.php?page=form_add_treatment&planting_process_id='+id); 
}

function get_total_price(){
	
	var total_harga = 0;
	<?php
	while($row2 = mysql_fetch_array($query2)){
	?>
	var jumlah = document.getElementById("i_jumlah_"+<?= $row2['menu_id']?>).value; 
	var harga = document.getElementById("i_harga_"+<?= $row2['menu_id']?>).value; 
	
	var total = jumlah * harga;
	total_harga = total_harga + total;
	<?php
	}
	?>
	document.getElementById("i_total_harga").value = total_harga;
	document.getElementById("i_total_harga_rupiah").value = CurrencyFormat(total_harga);
}

function confirm_delete_history(id){
	var a = confirm("Anda yakin ingin menghapus order ini ?");
	var table_id = document.getElementById("i_table_id").value;
	
	if(a==true){
		window.location.href = 'transaction.php?page=delete_history&table_id=' + table_id + '&id=' + id;
	}
}

function load_data_history(id)
{
	//alert(id);
	$("#table_history").load('transaction.php?page=list_history&table_id='+id); 
}
	


</script>


	
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
                }else if(isset($_GET['err']) && $_GET['err'] == 1){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-warning alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Simpan Gagal !</b>
               Menu masih kosong, Pilih menu terlebih dahulu !
                </div>
           
                </section>
                <?php
                }
                ?>
       
        
      
                
 <form action="<?= $action ?>" method="post" enctype="multipart/form-data" role="form">
                <!-- Main content -->

                <section class="content" style="padding-top: 0">
                  
              <div class="row">
              <div class="col-md-12">
              <div class="box box-cokelat">
              <div class="box-body">    
              
              <div class="container">
        
			<!-- Top Navigation -->
		
			
			<section class="color-2">
            <div class="row">
            
            
            
            <div class="col-md-4">
            <div class="form-group">
             <label>Date </label>
             <div class="input-group">
            
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" required class="form-control pull-right" id="date_picker1" name="i_date" value="<?= $date ?>"/>
                                        </div><!-- /.input group -->
            </div>
            </div>

            <div class="col-md-4">
            <div class="form-group">
             <label>Order Type </label>
             <select name="i_tot_id" id="i_tot_id"  class="selectpicker show-tick form-control" data-live-search="true">
                     <?php
                    $query_tot = mysql_query("select * from transaction_order_types 
                                  ");
                                        while($row_tot = mysql_fetch_array($query_tot)){
                                        ?>
                                        <option value="<?= $row_tot['tot_id']?>">
                                          <?= $row_tot['tot_name']; ?></option>
                                        <?php
                                        }
                                        ?>
              </select>
            </div>
          </div>
            
             <div class="col-md-4">
             <div class="form-group">
                                        <label>Table </label>
                                        <select name="i_table_id" id="i_table_id"  class="selectpicker show-tick form-control" data-live-search="true" onChange="load_data_history(this.value)" >
                                        <?php
                                        $query_table = mysql_query("select a.*, b.building_name
																	from tables a
																	left join buildings b on b.building_id = a.building_id
                                  where tms_id <> '2'
																	order by building_id, table_name
																	");
                                        while($row_table = mysql_fetch_array($query_table)){
                                        ?>
                                        <option value="<?= $row_table['table_id']?>" <?php if($row_table['table_id'] == $table_id){ ?> selected="selected"<?php }?>><?php
										if($row_table['table_id'] != 0){
											$building = " (".$row_table['building_name'].")";
										}else{
											$building= "";
										}
										echo $row_table['table_name'].$building; ?></option>
                                        <?php
                                        }
                                        ?>
                                        </select>
                                      	</div>
            </div>
           
            
            </div>
            
              <div id="table_history">

             <?php
			 if($check_table > 0 ){
             include 'history_order.php';
			 }
			 ?>
			</div>  
           
      
            
               <div class="row">
               
               
               <?php
                while($row_cat = mysql_fetch_array($query_cat)){
			   ?>
               
               <!-- batas kategori -->
              
                <div class="col-md-12">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="row">
                            <div class="otheader_title"><?= $row_cat['menu_type_name']?></div>
                        </div>
                    </div>
                </div>
                
                
				<p>
                 
                  <!-- start menu -->
                  
                  
                   <?php
                    $no2 = 1;
					$query = mysql_query("select * from menus where menu_type_id = '".$row_cat['menu_type_id']."' order by menu_id");
                    while($row = mysql_fetch_array($query)){
                   ?>
                   
                  <div class="box-showcase jcorgFilterTextParent">

                  	<a onClick="add_menu(<?= $row['menu_id']?>)">
                        <div class="title_menu">
                          <?= $row['menu_name'] ?>
                        </div>
                        <div class="box-showcaseInner_frame">
                        <div class="box-showcaseInner">
                        <?php
                        $gambar = ($row['menu_img']) ? $row['menu_img'] : "default.jpg";
						?>
                            <img src="../img/menu/<?= $gambar ?>" class="img_class" />
                           
                        </div>
                      </div>
                        </a>
                        <div class="box-showcaseDesc ">
                            
                             <div class="box-showcaseDesc_price">Rp. <?= $row['menu_price'] ?></div>
                             </a>
                            <div class="box-showcaseDesc_by">
                            	<div class="col-xs-8" style="padding:0px;">
                                   	<input required type="text" name="i_jumlah_<?= $row['menu_id'] ?>" id="i_jumlah_<?= $row['menu_id'] ?>" class="form-control text_menu" value="0" onchange="edit_menu(<?= $row['menu_id'] ?>)"/>
                           			<input type="hidden" name="i_harga_<?= $row['menu_id'] ?>" id="i_harga_<?= $row['menu_id'] ?>" class="form-control text_menu" value="<?= $row['menu_price'] ?>"/>
                       			</div>
                                <div class="col-xs-4" style="padding:0px;">
                                	<a onClick="minus_menu(<?= $row['menu_id']?>)">
                                	<div class="box-showcaseDesc_button">
                                    	<i class="fa fa-minus"></i>
                                    </div>
                                    </a>
                                </div>
                            </div>
                            
                        </div>
                         <div class="jcorgFilterTextChild"><?= $row['menu_name'] ?></div>
                       
                     
                    </div>
                    
                    <?php
					$no2++;
                    }
                    ?>
                                
                    <div style="clear:both;"></div>       
                          
                  <!-- end menu -->
                            
				</p>
                
                  <!-- batas kategori -->
                  <?php
				  }
				  ?>
          </div>
          </div>
          </div>
          </div>    
				  </div>
                
			</section>
			
		</div><!-- /container -->
  <div style="height:100px; width:100%;"></div>
                
                
                
               
               
                </section><!-- /.content -->

                 <section class="content_checkout">
                 <div class="row">
                
                 
                   <div class="col-md-6">
                   
                 <div class="col-xs-8">
                   <div class="form-group">
                  <input required type="hidden" readonly="readonly" name="i_total_harga" id="i_total_harga" class="form-control total_checkout" value="0"/>
                   <input required type="text" readonly="readonly" name="i_total_harga_rupiah" id="i_total_harga_rupiah" class="form-control total_checkout" value="0"/>
                   </div>
                </div>
                 <div class="col-xs-4">
                   <div class="form-group">
                  <input class="btn btn-warning button_checkout" type="submit" value="SAVE"/>
                </div>
            </div>
                </div>
                
                 <div class="col-md-6">
                
                 <div class="col-xs-12">
               
                 <div class="form-group">
                   <input type="text" name="searchText" id="filter" class="form-control cari_checkout" value="" placeholder="Cari menu..."/>
                 </div>
                 </div>
                  <!--<div class="col-xs-4">
                   <div class="form-group">
                   <a id="button_search_checkout" class="btn btn-primary button_checkout"><i class="fa  fa-search" style="font-size:1em; padding-top:10px;"></i></a>
                   <input type="button" id="next" value="Next">
                   </div>
                </div>
                -->

                  </div>
               
                </div>
                
               
                
              </section>
              
              </form>
              
              
             <script type="text/javascript">
       jQuery(document).ready(function(){
          jQuery("#filter").jcOnPageFilter({animateHideNShow: true,
                    focusOnLoad:true,
                    highlightColor:'#E9F0F5',
                    textColorForHighlights:'#E9F0F5',
                    caseSensitive:false,
                    hideNegatives:true,
                    parentLookupClass:'jcorgFilterTextParent',
                    childBlockClass:'jcorgFilterTextChild'});
       });          
       </script>