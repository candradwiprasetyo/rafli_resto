<?php
if(!$_SESSION['login']){
    header("location: ../login.php");
}
?>
<!doctype html>
<html lang="en">
<head>
<title>.: Warung App :.</title>
<!-- bootstrap 3.0.2 -->
		<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        
         <!-- DATA TABLES -->
        <link href="../css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!-- iCheck for checkboxes and radio inputs -->
        <link href="../css/iCheck/all.css" rel="stylesheet" type="text/css" />

		<link rel="stylesheet" type="text/css" href="../css/style_table.css" />
		<!-- tooltip -->
 		<link rel="stylesheet" type="text/css" href="../css/tooltip/tooltip-classic.css" />
 		<!-- button component-->
 		<link rel="stylesheet" type="text/css" href="../css/button_component/normalize.css" />
		<link rel="stylesheet" type="text/css" href="../css/button_component/demo.css" />
		<link rel="stylesheet" type="text/css" href="../css/button_component/component.css" />
		<link rel="stylesheet" type="text/css" href="../css/button_component/content.css" />
        
        <!-- vertical scroll 
         <link rel="stylesheet" href="../css/vertical_scroll/main.css">-->
         
         <!-- vertical scroll new -->
         <link rel="stylesheet" href="../css/vertical_scroll_new/style.css">
		<link rel="stylesheet" href="../css/vertical_scroll_new/jquery.mCustomScrollbar.css">
        <!-- Bootstrap -->
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
         
        <!-- jQuery 2.0.2 -->
        <script src="../js/jquery.js"></script>
       
        <script type="text/javascript">
       		function save_all_position(){
				
				var scrollLeft = (window.pageXOffset !== undefined) ? window.pageXOffset : (document.documentElement || document.body.parentNode || document.body).scrollLeft;
				var scrollTop = (window.pageYOffset !== undefined) ? window.pageYOffset : (document.documentElement || document.body.parentNode || document.body).scrollTop;
				
				<?php
				$q_save = select_table($building_id);
				while($r_save = mysql_fetch_array($q_save)){
				?>
				
				var element = document.getElementById('makeMeDraggable_<?php echo $r_save['table_id']?>');
				var position = element.getBoundingClientRect();
				var x = position.left;
				var y = position.top;
				
				 $.ajax({
					type: "GET",
					url: "table.php?page=save_table_location",
					data:{id:<?= $r_save['table_id']?>, data_x:x, data_y:y, data_top:scrollTop}
				}).done(function( result ) {
				   
				});
				
				<?php
				}
				?>
				alert("Simpan berhasil");
				window.location.href = 'table.php?building_id=<?= $building_id?>';
			}
       </script>
    
    
		<script src="../js/button_component/modernizr.custom.js"></script>
<style>
.border_meja_edit{
	background:url(../img/building/<?= $building_img ?>) no-repeat;
}
<?php
	$q_building1 = 1;
	$q_building1 = mysql_query("select * from buildings where building_id = '$building_id' order by building_id");
	while($r_building1 = mysql_fetch_array($q_building1)){
		$color = array("", "#bbb", "#ccc", "#ddd", "#eee");
	?>
	
	
	<?php
	
	$q3 = mysql_query("select * from tables where building_id = '".$r_building1['building_id']."' order by table_id");
	while($r3 = mysql_fetch_array($q3)){
	?>
	
	#makeMeDraggable_<?= $r3['table_id']?> { 
	position: absolute;
	width: 100px; height: 100px; 
	margin-left:
	<?php
	$data_x = ($r3['data_x']) ? $r3['data_x'] : 0;
	echo $data_x ?>px; 
	margin-top:
	<?php
	$data_y = ($r3['data_y']) ? $r3['data_y'] : 0;
	echo $data_y ?>px; 
	background: red; cursor: pointer; 
	
	}
	<?php
	
	}
	
	$q_building1++;
	}
	?>
	.meja1 {
    background: url(../img/table_hikaru.png) no-repeat !important;
    display: table;
    width: 100%;
	}
</style>
 
<script type="text/javascript" src="../js/table/jquery.js"></script>
<script type="text/javascript" src="../js/table/jquery.min.js"></script>
 
<script type="text/javascript">
 
$( init );
 
function init() {
	<?php
	$q_building2 = 1;
	$q_building2 = mysql_query("select * from buildings where building_id = '$building_id' order by building_id");
	while($r_building2 = mysql_fetch_array($q_building2)){
		
	$q2 = mysql_query("select * from tables where building_id = '".$r_building2['building_id']."' order by table_id");
	while($r2 = mysql_fetch_array($q2)){
	?>
	  $('#makeMeDraggable_<?= $r2['table_id']?>').draggable( {
	    containment: '#content',
	    cursor: 'move',
	    snap: '',
	    stop: ''
	  } );

 	<?php
	
	}
	$q_building2++;
	}
	?>

  $( "#makeMeDraggable1" ).dblclick(function() {
  alert( "test" );



});
}

<?php
	$q_building3 = 1;
	$q_building3 = mysql_query("select * from buildings where building_id = '$building_id' order by building_id");
	while($r_building3 = mysql_fetch_array($q_building3)){
		
	$q4 = mysql_query("select * from tables where building_id = '".$r_building3['building_id']."' order by table_id");
	while($r4 = mysql_fetch_array($q4)){
	?>

function handleDragStop_<?= $r4['table_id']?>( event, ui) {
	
  	var offsetXPos = parseInt( ui.offset.left );
  	var offsetYPos = parseInt( ui.offset.top );
	
  //alert(<?= $r2['table_id']?>);
  //alert( "Drag stopped!\n\nOffset: (" + offsetXPos + ", " + offsetYPos + ")\n");
   $.ajax({
        type: "GET",
        url: "table.php?page=save_table_location",
        data:{id:<?= $r4['table_id']?>, data_x:offsetXPos, data_y:offsetYPos}
    }).done(function( result ) {
       //alert("Simpan berhasil");
    });
}

<?php
	}
	$q_building3++;
	}
	?>

</script>
 
</head>
<body margin-left="0" margin-top="0">



 <div class="header_fixed"> 
 <div class="morph-button morph-button-modal morph-button-modal-3 morph-button-fixed">
						<button class="blue_color_button"  type="button">ADD ROOM</button>
						<div class="morph-content">
							<div>
								<div class="content-style-form content-style-form-2">
									<span class="icon icon-close">Close the dialog</span>
									<h2>ADD ROOM</h2>
									<form action="<?= $action_room?>" method="post" enctype="multipart/form-data" role="form">
										<p><label>Room Name</label><input type="text" name="i_room_name" required  /></p>
									
										<p>
										  <input type="submit" name="button" id="button" value="SAVE" class="button_building">
										</p>
									</form>
								</div>
							</div>
						</div>
					</div><!-- morph-button -->
                    
                    
                    
                     <div class="morph-button morph-button-modal morph-button-modal-3 morph-button-fixed">
						<button type="button" class="blue_color_button" >ADD TABLE</button>
						<div class="morph-content">
							<div>
								<div class="content-style-form content-style-form-2">
									<span class="icon icon-close">Close the dialog</span>
									<h2>ADD TABLE</h2>
									<form action="<?= $action_table?>" method="post" enctype="multipart/form-data" role="form">
										<p><label>Table Name</label><input type="text" name="i_table_name" required  /></p>
									
										<p>
										  <input type="submit" name="button" id="button" value="SAVE" class="button_building">
										</p>
									</form>
								</div>
							</div>
						</div>
					</div><!-- morph-button -->

					<div class="morph-button morph-button-modal morph-button-modal-3 morph-button-fixed">
						<button type="button" class="red_color_button"   onClick="javascript: window.location.href = 'home.php'; ">BACK TO MENU</button>
						
					</div><!-- morph-button -->

					<div class="morph-button morph-button-modal morph-button-modal-3 morph-button-fixed">
						
						 <button class="progress-button red_color_button" data-style="shrink" data-horizontal onClick="save_all_position(); ">SAVE</button>
					</div><!-- morph-button -->

 </div>
 
<div class="border_meja_edit">
  <img src="../img/building/<?= $building_img ?>" style="visibility:hidden;" />
  </div>
 
 <?php
	$q_building4 = mysql_query("select * from buildings where building_id = '$building_id' order by building_id");
	while($r_building4 = mysql_fetch_array($q_building4)){
		?>
        
<div id="content_new">
	<span class="tooltip tooltip-effect-1">
	<?php
	$query =  mysql_query("select * from tables where building_id = '".$r_building4['building_id']."' order by table_id");
	while($row = mysql_fetch_array($query)){
		
		$get_item = get_item($row['table_id']);
		
	?>
	<div id="makeMeDraggable_<?= $row['table_id']?>" class="meja1">
	
				<span class="">
				<div class="tooltip-item"><?= $row['table_name'] ?>
			
                </div>
				
			</span> 
	 </div>
     </span>
	<?php
	
	}
	?>
  
</div>
<?php
	}
?>

<div class="footer_fixed"> 

			<div class="morph-button morph-button-sidebar morph-button-fixed">
			<button type="button" class="green_color_button"><?= $building_name?></button>
			<div class="morph-content">
				<div>
					<div class="content-style-sidebar">
						<span class="icon icon-close">Close the overlay</span>
						<h2>Room</h2>
						<ul>
                       <?php
						$q_building5 = mysql_query("select * from buildings order by building_id");
						while($r_building5 = mysql_fetch_array($q_building5)){
							?>
							<li><a href="table.php?building_id=<?= $r_building5['building_id']?>"><?= $r_building5['building_name']?></a></li>
                            <?php
						}
							?>
                       
							
						</ul>
					</div>
				</div>
			</div>
		</div><!-- morph-button -->
        
       </div>
   

	<script src="../js/progress_button/classie.js"></script>
		<script src="../js/button_component/uiMorphingButton_fixed.js"></script>
		<script>
			(function() {
				var docElem = window.document.documentElement, didScroll, scrollPosition;

				// trick to prevent scrolling when opening/closing button
				function noScrollFn() {
					window.scrollTo( scrollPosition ? scrollPosition.x : 0, scrollPosition ? scrollPosition.y : 0 );
				}

				function noScroll() {
					window.removeEventListener( 'scroll', scrollHandler );
					window.addEventListener( 'scroll', noScrollFn );
				}

				function scrollFn() {
					window.addEventListener( 'scroll', scrollHandler );
				}

				function canScroll() {
					window.removeEventListener( 'scroll', noScrollFn );
					scrollFn();
				}

				function scrollHandler() {
					if( !didScroll ) {
						didScroll = true;
						setTimeout( function() { scrollPage(); }, 60 );
					}
				};

				function scrollPage() {
					scrollPosition = { x : window.pageXOffset || docElem.scrollLeft, y : window.pageYOffset || docElem.scrollTop };
					didScroll = false;
				};

				scrollFn();

				[].slice.call( document.querySelectorAll( '.morph-button' ) ).forEach( function( bttn ) {
					new UIMorphingButton( bttn, {
						closeEl : '.icon-close',
						onBeforeOpen : function() {
							// don't allow to scroll
							noScroll();
						},
						onAfterOpen : function() {
							// can scroll again
							canScroll();
						},
						onBeforeClose : function() {
							// don't allow to scroll
							noScroll();
						},
						onAfterClose : function() {
							// can scroll again
							canScroll();
						}
					} );
				} );

				// for demo purposes only
				[].slice.call( document.querySelectorAll( 'form button' ) ).forEach( function( bttn ) { 
					bttn.addEventListener( 'click', function( ev ) { ev.preventDefault(); } );
				} );
			})();
		</script>

			<!-- progress button -->
        <script src="../js/progress_button/progressButton.js"></script>
		<script>
			[].slice.call( document.querySelectorAll( 'button.progress-button' ) ).forEach( function( bttn ) {
				new ProgressButton( bttn, {
					callback : function( instance ) {
						var progress = 0,
							interval = setInterval( function() {
								progress = Math.min( progress + Math.random() * 0.1, 1 );
								instance._setProgress( progress );

								if( progress === 1 ) {
									instance._stop(1);
									clearInterval( interval );
								}
							}, 200 );
					}
				} );
				
			} );
		</script>
    
		
</body>
</html>