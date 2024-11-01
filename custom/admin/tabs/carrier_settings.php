<?php

wp_enqueue_style( 'sp-formlayout-css' );

//for form validation

wp_enqueue_script( 'sp-validation-js' );

//for form validation plugin

wp_enqueue_script( 'sp-form-js' );


//notification
wp_enqueue_style( 'notification-css' );
wp_enqueue_script( 'notification-js' );


	global $sp_strings,$wpdb;
  $query="SELECT * from {$wpdb->prefix}store_enabled_carriers  WHERE shop=%s";
  $result=$wpdb->get_results($wpdb->prepare($query,$_SERVER['HTTP_HOST']),ARRAY_A);
  if(count($result)==1){
    $query="SELECT * from {$wpdb->prefix}carriers WHERE carrier_id=%s";
    $carrierName=$wpdb->get_results($wpdb->prepare($query,$result[0]['carrier_id']),ARRAY_A);
    $carrierName=$carrierName[0]['carrier_name'];
    $carrierName = strtolower( $carrierName );
    $carrierName = str_replace(' ', '-', $carrierName );

    $_POST['id']=$result[0]['carrier_id'];
    $_POST['carrier_id']=$result[0]['carrier_id'];
    $_POST['selectedcarrier']=$carrierName;

  }

  //if data is received using get
  if(isset($_GET['carrier_id']) AND isset($_GET['selectedcarrier'])){
    $_POST['id']=$_GET['carrier_id'];
    $_POST['carrier_id']=$_GET['carrier_id'];
    $_POST['selectedcarrier']=$_GET['selectedcarrier'];
  }

  if(count($result)<=0){//if no carrier is enabled than go to market place
    echo "<SCRIPT> 
        window.location.replace('?page=sp-settings&tab=marketplace');
    </SCRIPT>";
  }


  



	$tab_list = array(


		'connection_setting',


		'quote_settings',


	);



$carrier_id = isset( $_POST['carrier_id'] ) ? sanitize_text_field($_POST['carrier_id']) : '';
if($carrier_id==3){
  $tab_list[]='carriers';
}

$carrier_name = sp_get_carrier_name( $carrier_id ); 

$settings = array();



$license = $wpdb->prefix.'sp_license';
 $sql = "SELECT * from $license";

$rows=$wpdb->get_results($sql,ARRAY_A);
$level=(count($rows)>0?$rows[0]['level']:0);

?>

<?php

if( !isset( $_POST['selectedcarrier'] ) ){

?>

<script type="text/javascript">

jQuery(window).load(function(){

    jQuery('#sp_select_carrier_modal').show('show');

});

</script>

<?php } ?>

<!-- start row  -->

<div class="row sphometab">

	<div class="col-md-12">

  		<div class="tabbable-line">

  			<ul class="nav customtab nav-tabs" role="tablist">

  				<?php 

  					if( !empty($tab_list) ){

  						$count = 1;

  						foreach ($tab_list as $key => $item_key) {

  							$active = ($count == 1) ? 'active' : '';

  							?>

  							<li class="nav-item">

								<a href="#<?php echo $item_key; ?>" class="nav-link <?php echo $item_key; ?> <?php echo $active; ?>"  data-toggle="tab" ><?php echo $sp_strings[$item_key]; ?></a>

							</li>

  							<?php

  							$count++;

  						}

  					}

  				?>

			</ul>

			 <div class="tab-content">

			<?php 

  					if( !empty($tab_list) ){

  						$count = 1;

  						foreach ($tab_list as $key => $item_key) {

  							$active = ($count == 1) ? 'active' : '';

  							?>

  							<div class="tab-pane <?php echo $active; ?> fontawesome-demo" id="<?php echo $item_key?>">

  								<?php include 'home-tab/'.$item_key.'.php'; ?>

							   </div>

  							<?php

  							$count++;

  						}

  					}

  				?>

  			</div>

			

  		</div>

  	</div>
    <script type="text/javascript">
    if ( window.location !== window.parent.location  && window.name=="iframeSteps") {   
    // The page is in an iframe 
    document.getElementsByClassName('page-header')[0].remove();
    document.getElementById('adminmenuwrap').remove();
    document.getElementById('adminmenuback').remove();
    document.getElementById('wpadminbar').remove();
    // document.getElementsByClassName('page-content').style.display="none";
    // document.getElementsByClassName('sidebar-container').style.display="none";

    }
  </script>

</div>


<!-- end row  -->

<?php 

	include 'home-tab/model-popup.php'; 

?>
<!-- DOCS for each carrier is listed here -->
<!-- FedEx LTL -->
<?php if(isset($_POST['carrier_id']) AND $_POST['carrier_id']==1){ ?>
<div class="card card-box ">
    <div class="card-body no-padding height-9 submitFade">
      <div class="row">
        <div class="col-md-6">
          <div class="container">
            <h2>How to Perform Connection Settings</h2>

          </div>
          <div class="container">
            <p> <span><a href="https://docs.shiprow.com/fedex-ltl-freight-quotes-for-woocommerce/#2621" target="_blank"><i class="fa fa-exclamation-circle"></i>How to obtain API authentication key for FedEx LTL</a></span></p>
          </div>
          <div class="container">
            <p><span><a href="https://docs.shiprow.com/fedex-ltl-freight-quotes-for-woocommerce/#2624" target="_blank"><i class="fa fa-exclamation-circle"></i> How to perform Connection Settings</a></span></p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="container">
            <h2><span class="fa fa-book">&nbsp;</span>Helpful Docs For Quote Settings</h2>
            <ul>
              <li class="nav-link"><i class="fa fa-book text-primary" aria-hidden="true"></i> <a href="https://docs.shiprow.com/fedex-ltl-freight-quotes-for-woocommerce/#2627" target="_blank">Find your complete guide to Quote Settings FedEx LTL</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
</div>
<?php } ?>

<!-- UPS LTL -->
<?php if(isset($_POST['carrier_id']) AND $_POST['carrier_id']==2){ ?>
<div class="card card-box ">
  <div class="card-body no-padding height-9 submitFade">
    <div class="row">
      <div class="col-md-6">
        <div class="container">
          <h2>How to Perform Connection Settings </h2>

        </div>
        <div class="container">
          <p> <span><a href="https://docs.shiprow.com/ups-ltl-freight-quotes-for-woocommerce/#2700" target="_blank"><i class="fa fa-exclamation-circle"></i> How to Obtain API Access Key for UPS LTL</a></span></p>
        </div>
        <div class="container">
          <p><span><a href="https://docs.shiprow.com/ups-ltl-freight-quotes-for-woocommerce/#2702" target="_blank"><i class="fa fa-exclamation-circle"></i> How to perform Connection Settings</a></span></p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="container">
          <h2><span class="fa fa-book">&nbsp;</span>Helpful Docs For Quote Settings</h2>
          <ul>
            <li class="nav-link"><i class="fa fa-book text-primary" aria-hidden="true"></i> <a href="https://docs.shiprow.com/ups-ltl-freight-quotes-for-woocommerce/#2704" target="_blank">Find your complete guide to Quote Settings for UPS LTL</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<!-- WWE LTL -->
<?php if(isset($_POST['carrier_id']) AND $_POST['carrier_id']==3){ ?>
<div class="card card-box ">
    <div class="card-body no-padding height-9 submitFade">
      <div class="row">
        <div class="col-md-6">
          <div class="container">
            <h2>How to Perform Connection Settings</h2>

          </div>
          <div class="container">
            <p> <span><a href="https://docs.shiprow.com/wwe-ltl-freight-quotes-for-woocommerce/#2859" target="_blank"><i class="fa fa-exclamation-circle"></i> Obtain Your Worldwide Express Authentication Key </a></span></p>
          </div>
          <div class="container">
            <p><span><a href="https://docs.shiprow.com/wwe-ltl-freight-quotes-for-woocommerce/#2861" target="_blank"><i class="fa fa-exclamation-circle"></i> How to perform Connection Settings </a></span></p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="container">
            <h2><span class="fa fa-book">&nbsp;</span>Helpful Docs For Quote Settings</h2>
            <ul>
              <li class="nav-link"><i class="fa fa-book text-primary" aria-hidden="true"></i> <a href="https://docs.shiprow.com/wwe-ltl-freight-quotes-for-woocommerce/#2865" target="_blank">Find your complete guide to Quote Settings for WWE LTL</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
</div>
<?php } ?>

<!-- ABF LTL -->
<?php if(isset($_POST['carrier_id']) AND $_POST['carrier_id']==4){ ?>
<div class="card card-box ">
    <div class="card-body no-padding height-9 submitFade">
      <div class="row">
        <div class="col-md-6">
          <div class="container">
            <h2>How to Perform Connection Settings</h2>

          </div>
          <div class="container">
            <p> <span><a href="https://docs.shiprow.com/abf-ltl-freight-quotes-for-woocommerce/#2729" target="_blank"><i class="fa fa-exclamation-circle"></i> How to obtain an ABF Freight API ID </a></span></p>
          </div>
          <div class="container">
            <p><span><a href="https://docs.shiprow.com/abf-ltl-freight-quotes-for-woocommerce/#2732" target="_blank"><i class="fa fa-exclamation-circle"></i> How to perform Connection Settings </a></span></p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="container">
            <h2><span class="fa fa-book">&nbsp;</span>Helpful Docs For Quote Settings</h2>
            <ul>
              <li class="nav-link"><i class="fa fa-book text-primary" aria-hidden="true"></i> <a href="https://docs.shiprow.com/abf-ltl-freight-quotes-for-woocommerce/#2734" target="_blank">Find your complete guide to Quote Settings ABF LTL</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
</div>
<?php } ?>

<!-- RL  -->
<?php if(isset($_POST['carrier_id']) AND $_POST['carrier_id']==5){ ?>
<div class="card card-box ">
    <div class="card-body no-padding height-9 submitFade">
      <div class="row">
        <div class="col-md-6">
          <div class="container">
            <h2>How to Perform Connection Settings</h2>

          </div>
          <div class="container">
            <p> <span><a href="https://docs.shiprow.com/rl-ltl-freight-quotes-for-woocommerce/#2761" target="_blank"><i class="fa fa-exclamation-circle"></i> How to accept external rate requests on your R+L account? </a></span></p>
          </div>
          <div class="container">
            <p><span><a href="https://docs.shiprow.com/rl-ltl-freight-quotes-for-woocommerce/#2763" target="_blank"><i class="fa fa-exclamation-circle"></i> How to perform Connection Settings </a></span></p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="container">
            <h2><span class="fa fa-book">&nbsp;</span>Helpful Docs For Quote Settings</h2>
            <ul>
              <li class="nav-link"><i class="fa fa-book text-primary" aria-hidden="true"></i> <a href="https://docs.shiprow.com/rl-ltl-freight-quotes-for-woocommerce/#2765" target="_blank">Find your complete guide to Quote Settings for R+L</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
</div>
<?php } ?>

<!-- FedEx small -->
<?php if(isset($_POST['carrier_id']) AND $_POST['carrier_id']==6){ ?>
<div class="card card-box ">
    <div class="card-body no-padding height-9 submitFade">
      <div class="row">
        <div class="col-md-6">
          <div class="container">
            <h2>How to Perform Connection Settings</h2>

          </div>
          <div class="container">
            <p> <span><a href="https://docs.shiprow.com/fedex-small-package-quotes-for-woocommerce/#2661" target="_blank"><i class="fa fa-exclamation-circle"></i> How to obtain web service credentials for FedEx Small</a></span></p>
          </div>
          <div class="container">
            <p><span><a href="https://docs.shiprow.com/fedex-small-package-quotes-for-woocommerce/#2663" target="_blank"><i class="fa fa-exclamation-circle"></i> How to perform Connection Settings service</a></span></p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="container">
            <h2><span class="fa fa-book">&nbsp;</span>Helpful Docs For Quote Settings</h2>
            <ul>
              <li class="nav-link"><i class="fa fa-book text-primary" aria-hidden="true"></i> <a href="https://docs.shiprow.com/fedex-small-package-quotes-for-woocommerce/#2665" target="_blank">Find your complete guide to Quote Settings for FedEx small</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
</div>
<?php } ?>

<!-- WWE small -->
<?php if(isset($_POST['carrier_id']) AND $_POST['carrier_id']==7){ ?>
<div class="card card-box ">
    <div class="card-body submitFade no-padding height-9">
      <div class="row">
        <div class="col-md-6">
          <div class="container">
            <h2>How to Perform Connection Settings</h2>

          </div>
          <div class="container">
            <p> <span><a href="https://docs.shiprow.com/wwe-small-package-quotes-for-woocommerce/#2929" target="_blank"><i class="fa fa-exclamation-circle"></i> Obtain Your Worldwide Express Authentication Key </a></span></p>
          </div>
          <div class="container">
            <p><span><a href="https://docs.shiprow.com/wwe-small-package-quotes-for-woocommerce/#2931" target="_blank"><i class="fa fa-exclamation-circle"></i> How to perform Connection Settings </a></span></p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="container">
            <h2><span class="fa fa-book">&nbsp;</span>Helpful Docs For Quote Settings</h2>
            <ul>
              <li class="nav-link"><i class="fa fa-book text-primary" aria-hidden="true"></i> <a href="https://docs.shiprow.com/wwe-small-package-quotes-for-woocommerce/#2933" target="_blank">Find your complete guide to Quote Settings for WWE small</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
</div>
<?php } ?>

<!-- UPS small -->
<?php if(isset($_POST['carrier_id']) AND $_POST['carrier_id']==8){ ?>
<div class="card card-box ">
    <div class="card-body no-padding height-9 submitFade">
      <div class="row">
        <div class="col-md-6">
          <div class="container">
            <h2>How to Perform Connection Settings</h2>

          </div>
          <div class="container">
            <p> <span><a href="https://docs.shiprow.com/ups-small-package-quotes-for-woocommerce/#2892" target="_blank"><i class="fa fa-exclamation-circle"></i> How to Obtain API Access Key for UPS small</a></span></p>
          </div>
          <div class="container">
            <p><span><a href="https://docs.shiprow.com/ups-small-package-quotes-for-woocommerce/#2894" target="_blank"><i class="fa fa-exclamation-circle"></i> How to perform Connection Settings </a></span></p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="container">
            <h2><span class="fa fa-book">&nbsp;</span>Helpful Docs For Quote Settings</h2>
            <ul>
              <li class="nav-link"><i class="fa fa-book text-primary" aria-hidden="true"></i> <a href="https://docs.shiprow.com/ups-small-package-quotes-for-woocommerce/#2896" target="_blank">Find your complete guide to Quote Settings for UPS small</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
</div>
<?php } ?>


