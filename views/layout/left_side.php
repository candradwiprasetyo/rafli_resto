<aside class="left-side sidebar-offcanvas <?php /*if($_SESSION['menu_active'] == 3){ ?>collapse-left <?php }*/ ?>">                
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="image" style="margin-bottom:20px;">
                            <?php
                             $user_data = get_user_data();
              if($user_data[2]==""){
                $img = "../img/user/default.jpg";
              }else{
                $img = "../img/user/".$user_data[2];
              }
              ?>
                            <img src="<?= $img ?>" class="img-circle" alt="User Image" />
                        </div>
                        <div>
                            <p><b><?php
                                       
                                        echo "Welcome, ".$user_data[0];
                                        ?></b></p>
                                        

                            <?= $user_data[1]?> cabang <?= $user_data[3]?>
                        </div>

                       
                       
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                   
                 <ul class="sidebar-menu">  
                  <li class="treeview <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 1){ echo "active"; }?>">
                            <a href="#">
                                <i class="fa fa-list-alt"></i>
                                <span>Master</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="branch.php?page=list"><i class="fa fa-home"></i>Cabang</a></li> 
                                <li><a href="master_table.php?page=list"><i class="fa fa-cutlery"></i>Meja</a></li>
                                <li><a href="menu.php?page=list"><i class="fa fa-glass"></i>Menu</a></li>
                                <li><a href="member.php?page=list"><i class="fa fa-user"></i>Customer</a></li>
                                <li><a href="supplier.php?page=list"><i class="fa fa-shopping-cart"></i>Supplier</a></li>
                                <li><a href="bank.php?page=list"><i class="fa fa-list-alt"></i>Bank</a></li>
                                <li><a href="type_jurnal.php?page=list"><i class="fa fa-list-alt"></i>Tipe Jurnal</a></li>
                                <!--<li><a href="voucher.php?page=list"><i class="fa  fa-credit-card"></i>Voucher</a></li>
                                <li><a href="partner.php?page=list"><i class="fa fa-smile-o"></i>Partner</a></li>
                                <li><a href="building.php?page=list"><i class="fa fa-home"></i>Room</a></li> 
                                
                                
                                <li><a href="unit.php?page=list"><i class="fa fa-user"></i>Unit</a></li>
                                <li><a href="bank.php?page=list"><i class="fa fa-user"></i>Bank Account</a></li>
                                -->
                             
                            </ul>
                  </li>
                  
                  <li <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 2){ echo "class='active'"; } ?>>
                            <a href="order.php">
                                 <i class="fa fa-cutlery"></i>
                                <span>Order</span>
                            </a>
                            
                  </li>
                  
                  <li class="treeview <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 2){ echo "active"; }?>">
                            <a href="#">
                                <i class="fa fa-list-alt"></i>
                                <span>Transaksi</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="transaksi_produksi.php"><i class="fa fa-list-alt"></i>Transaksi Produksi</a></li> 
                                <li><a href="transaksi_internal.php"><i class="fa fa-list-alt"></i>Transaksi Internal</a></li>
                                <li><a href="purchase.php"><i class="fa fa-list-alt"></i>Transaksi Pembelian</a></li>
                                
                            </ul>
                  </li>
                  <!--
                  <li <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 4){ echo "class='active'"; } ?>>
                            <a href="transaction_new.php">
                                 <i class="fa fa-pencil-square-o"></i>
                                <span>Transaksi Baru</span>
                            </a>
                            
                  </li>
                  
                   <li <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 5){ echo "class='active'"; } ?>>
                            <a href="reserved.php">
                                 <i class="fa fa-list-alt"></i>
                                <span>Reservation</span>
                            </a>
                            
                  </li>
                  -->
                  <li <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 6){ echo "class='active'"; } ?>>
                            <a href="table.php">
                                 <i class="fa fa-asterisk"></i>
                                <span>Setting Table</span>
                            </a>
                            
                  </li>
                  <!--

                   <li <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 7){ echo "class='active'"; } ?>>
                            <a href="purchase.php">
                                 <i class="fa fa-list-alt"></i>
                                <span>Pembelian</span>
                            </a>
                            
                  </li>
                -->
                  
                  <li <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 8){ echo "class='active'"; } ?>>
                            <a href="stock.php">
                                 <i class="fa fa-list-alt"></i>
                                <span>Stok</span>
                            </a>
                            
                  </li>
                  
                  <li class="treeview <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 9){ echo "active"; }?>">
                            <a href="#">
                                <i class="fa fa-list-alt"></i>
                                <span>Accounting</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                              
                                <li><a href="arus_kas.php"><i class="fa fa-book"></i>Arus Kas</a></li>
                                <li><a href="jurnal_umum.php"><i class="fa fa-book"></i>Pemasukan dan Pengeluaran Lainnya</a></li>
                                
                             
                            </ul>
                  </li>

                  <li class="treeview <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 10){ echo "active"; }?>">
                            <a href="#">
                                <i class="fa fa-list-alt"></i>
                                <span>Laporan</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                              
                                <li><a href="report_detail.php"><i class="fa fa-book"></i>Laporan Detail</a></li>
                              
                                <li><a href="report_harian.php"><i class="fa fa-book"></i>Laporan Harian</a></li>
                                
                             
                            </ul>
                  </li>
                  
                  <li class="treeview <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 10){ echo "active"; }?>">
                            <a href="#">
                                <i class="fa fa-list-alt"></i>
                                <span>Laporan Customer</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                             
                                <li><a href="report_customer_harian.php"><i class="fa fa-book"></i>Customer Harian</a></li>
                                <li><a href="report_customer_average.php"><i class="fa fa-book"></i>Average</a></li>
                                <li><a href="report_kepuasan_customer.php"><i class="fa fa-book"></i>Kepuasan Customer</a></li>
                                <li><a href="report_customer_year.php"><i class="fa fa-book"></i>Ranking Customer</a></li>
                                
                             
                            </ul>
                  </li>
                  
                 
                             
                        
                    <?php
                    if($_SESSION['user_type_id'] == 1){
					?>
                 
                  
                  <li <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 11){ echo "class='active'"; } ?>>
                            <a href="user.php">
                                <i class="fa fa-user"></i>
                                <span>User</span>
                               
                            </a>
                            
                  </li>
                 <?php
					}
				 ?>
              
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>