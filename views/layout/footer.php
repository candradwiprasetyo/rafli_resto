
        
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        
       
       <!--calendar -->
   
    

    </body>
</html>
 <!-- jQuery 2.0.2 -->
      
        <script src="../js/function.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="../js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="../js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
       	<!-- date-range-picker -->
        <script src="../js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- InputMask -->
        <script src="../js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
        <script src="../js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
        <script src="../js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
        <!-- pop Modal-->
        <script src="../js/popup/popModal.js"></script>
       
        <!-- Datepicker -->
        <script src="../js/plugins/datepicker/bootstrap-datepicker.js"></script>
		<!-- select -->
		<script type="text/javascript" src="../js/lookup/bootstrap-select.js"></script>
        <!-- AdminLTE App -->
        <script src="../js/AdminLTE/app.js" type="text/javascript"></script>
         <!-- bootstrap time picker -->
        <script src="../js/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
        <!-- validasi -->
        <script src="../js/plugins/validate/jquery.validate.js" type="text/javascript"></script>
        <!-- button -->
        <script src="../js/button/modernizr.custom.js"></script>
		<script src="../js/button/classie.js"></script>
      <!-- bootstrap time picker -->
      
      <!-- export -->
      <script src="../js/export/dataTables.buttons.min.js"></script>
      <script src="../js/export/buttons.flash.min.js"></script>
      <script src="../js/export/jszip.min.js"></script>
      <script src="../js/export/pdfmake.min.js"></script>
      <script src="../js/export/vfs_fonts.js"></script>
      <script src="../js/export/buttons.html5.min.js"></script>
      <script src="../js/export/buttons.print.min.js"></script>
      
		
 <!-- page script -->
        <script type="text/javascript">
		$(document).ready(function() {
			$('#example1').DataTable( {
				dom: 'Bfrtip',
				buttons: [
					
					{
						extend: 'pageLength'
					},
					{
						extend: 'copy'
					},
					{
						extend: 'excel'
					},
					{
						extend: 'pdf'
					}
				],
				lengthMenu: [
					[ 10, 25, 50, -1 ],
					[ '10 rows', '25 rows', '50 rows', 'Show all' ]
				]
			} );
		} );
            $(function() {
                //$("#example1").dataTable();
                $('#example2').dataTable({
				dom: 'Bfrtip',
				buttons: [
					
					{
						extend: 'pageLength'
					},
					{
						extend: 'copy'
					},
					{
						extend: 'excel'
					},
					{
						extend: 'pdf'
					}
				],
				lengthMenu: [
					[ 10, 25, 50, -1 ],
					[ '10 rows', '25 rows', '50 rows', 'Show all' ]
				]
			});
				$("#example3").dataTable({
				dom: 'Bfrtip',
				buttons: [
					
					{
						extend: 'pageLength'
					},
					{
						extend: 'copy'
					},
					{
						extend: 'excel'
					},
					{
						extend: 'pdf'
					}
				],
				lengthMenu: [
					[ 10, 25, 50, -1 ],
					[ '10 rows', '25 rows', '50 rows', 'Show all' ]
				]
			});
				$("#example4").dataTable({
				dom: 'Bfrtip',
				buttons: [
					
					{
						extend: 'pageLength'
					},
					{
						extend: 'copy'
					},
					{
						extend: 'excel'
					},
					{
						extend: 'pdf'
					}
				],
				lengthMenu: [
					[ 10, 25, 50, -1 ],
					[ '10 rows', '25 rows', '50 rows', 'Show all' ]
				]
			});
                $("#example5").dataTable({
				dom: 'Bfrtip',
				buttons: [
					
					{
						extend: 'pageLength'
					},
					{
						extend: 'copy'
					},
					{
						extend: 'excel'
					},
					{
						extend: 'pdf'
					}
				],
				lengthMenu: [
					[ 10, 25, 50, -1 ],
					[ '10 rows', '25 rows', '50 rows', 'Show all' ]
				]
			});
                $("#example6").dataTable({
				dom: 'Bfrtip',
				buttons: [
					
					{
						extend: 'pageLength'
					},
					{
						extend: 'copy'
					},
					{
						extend: 'excel'
					},
					{
						extend: 'pdf'
					}
				],
				lengthMenu: [
					[ 10, 25, 50, -1 ],
					[ '10 rows', '25 rows', '50 rows', 'Show all' ]
				]
			});
                $("#example7").dataTable({
				dom: 'Bfrtip',
				buttons: [
					
					{
						extend: 'pageLength'
					},
					{
						extend: 'copy'
					},
					{
						extend: 'excel'
					},
					{
						extend: 'pdf'
					}
				],
				lengthMenu: [
					[ 10, 25, 50, -1 ],
					[ '10 rows', '25 rows', '50 rows', 'Show all' ]
				]
			});
                $("#example8").dataTable({
				dom: 'Bfrtip',
				buttons: [
					
					{
						extend: 'pageLength'
					},
					{
						extend: 'copy'
					},
					{
						extend: 'excel'
					},
					{
						extend: 'pdf'
					}
				],
				lengthMenu: [
					[ 10, 25, 50, -1 ],
					[ '10 rows', '25 rows', '50 rows', 'Show all' ]
				]
			});
                $("#example9").dataTable({
				dom: 'Bfrtip',
				buttons: [
					
					{
						extend: 'pageLength'
					},
					{
						extend: 'copy'
					},
					{
						extend: 'excel'
					},
					{
						extend: 'pdf'
					}
				],
				lengthMenu: [
					[ 10, 25, 50, -1 ],
					[ '10 rows', '25 rows', '50 rows', 'Show all' ]
				]
			});
                $("#example10").dataTable({
				dom: 'Bfrtip',
				buttons: [
					
					{
						extend: 'pageLength'
					},
					{
						extend: 'copy'
					},
					{
						extend: 'excel'
					},
					{
						extend: 'pdf'
					}
				],
				lengthMenu: [
					[ 10, 25, 50, -1 ],
					[ '10 rows', '25 rows', '50 rows', 'Show all' ]
				]
			});
				
				$('#example_scroll').dataTable({
                    "scrollX": true
				
                });
				
 				$('#example_simple').dataTable({
                    "bPaginate": false,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": false,
                    "bInfo": false,
                    "bAutoWidth": false
                });
				
				$('#example_no_order_by').dataTable({            
                    "bSort": false
                });
				
				$('#example99').dataTable({
                   
                    "bFilter": false,
                   
                });

                $("#example_nopagination1").dataTable({
                    "bPaginate": false,
                    "bFilter": false
                });
              
				/*
				$(function() {
				  $('#new_table').footable();
				});
				
				$('.footable').data('limit-navigation', 5);
				$('.footable').trigger('footable_initialized');
						
				$('#change-page-size').change(function (e) {
					//	e.preventcokelat();
						var pageSize = $(this).val();
						$('.footable').data('page-size', pageSize);
						$('.footable').trigger('footable_initialized');
				});
					*/
                //Datemask dd/mm/yyyy
                $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
                //Datemask2 mm/dd/yyyy
                $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
                //Money Euro
                $("[data-mask]").inputmask();
				
                /*
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
                });*/
				
				//Date range picker
                $('#reservation').daterangepicker();
				
				//date picker
				$('#date_picker1').datepicker({
					format: 'dd/mm/yyyy'
				});
				
				$('#date_picker2').datepicker({
					format: 'dd/mm/yyyy'
				});
				
				$('#date_picker3').datepicker({
					format: 'dd/mm/yyyy'
				});
                
                //Timepicker
                $(".timepicker").timepicker({
                    showInputs: false
                });
				
				
				
				
            });
			
			
$.fn.scrollView = function () {
    return this.each(function () {
      $('html, body').animate({
        scrollTop: $(this).offset().top
      }, 1000);
    });
  }


$('#scroll-link').click(function (event) {
  event.preventDefault();
  $('.header').scrollView();
});


$('#i_cari_checkout').change(function (event) {
  event.preventDefault();
  
   var keyword = document.getElementById("i_cari_checkout").value;
   window.find(keyword);
   
   /*
    $.ajax({
            url: 'transaction.php?page=get_menu&keyword='+keyword,
            type: 'POST',
			dataType: 'json',
            data: { keyword : keyword},
            success: function(data) {
				
				var menu_id = data.content['menu_id'];
                alert("test");
				console.log("success");
				
            }
        });
   //$('.header').scrollView();
  */
});

$('#button_search_checkout').change(function (event) {
  event.preventDefault();
  
   var keyword = document.getElementById("i_cari_checkout").value;
   window.find(keyword);
   
   
});
          
        </script>