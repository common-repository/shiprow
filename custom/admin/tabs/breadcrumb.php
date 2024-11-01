<?php 

global $sp_strings;

$activetab = ( isset( $_GET['tab'] ) ) ? sanitize_text_field($_GET['tab']) : 'carrier_settings'; 

$remove_bread = array( 'carrier_settings' );

if( !in_array( $activetab, $remove_bread ) ){

?>

<!-- breadcrumb -->

<div class="page-bar">

	<div class="page-title-breadcrumb">

		<div class="pull-left">

    		<div class="page-title"><?php echo ( isset( $sp_strings[$activetab] ) ) ? $sp_strings[$activetab] : ''; ?></div>

		</div>

	<!-- 	<ol class="breadcrumb page-breadcrumb pull-right">

	    	<li>

	    		<i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="?page=sp-settings&tab=home"><?php echo $sp_strings['carrier_settings']; ?></a>&nbsp;<i class="fa fa-angle-right"></i>

	    	</li>

	    	<li class="active">Ware house & Dropbox List</li>

		</ol> -->

	</div>

</div>

<?php } ?>