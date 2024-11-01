<?php

//for datatable design

wp_enqueue_style( 'sp-datatable-bootstrap-css' );

//datatable js

wp_enqueue_script( 'sp-datatable-js' );

//datatable bootstrap css

wp_enqueue_script( 'sp-datatable-bootstrap-js' );

//custom js for datatable

wp_enqueue_script( 'sp-table-js' );

//tag script

wp_enqueue_script( 'sp-tag-js' );

// tag css

wp_enqueue_style( 'sp-tag-css' );

//for form validation

wp_enqueue_script( 'sp-validation-js' );

//for form validation plugin

//notification
wp_enqueue_style( 'notification-css' );
wp_enqueue_script( 'notification-js' );

wp_enqueue_script( 'sp-form-js' );
global $wpdb;
  $license='';
$licenseTbl = "SELECT * FROM {$wpdb->prefix}sp_license ";
 $rows = $wpdb->get_results($licenseTbl,ARRAY_A);
 if(count($rows)>0){
  esc_textarea($license=$rows[0]['license']);
 }

$query="SELECT * FROM {$wpdb->prefix}store_enabled_carriers";
$enabledCarriers=$wpdb->get_results($query,ARRAY_A);

?>




<!-- main row  warehouse-->

<div class="row">

  <div class="col-md-12">

    <div class="tabbable-line">

        <div class="tab-content">

          <!-- row for warehouse -->

          <div class="row">

              <div class="col-md-12">

                  <div class="card card-box">

                      <div class="card-head">

                          <header>License</header>

                          

                      </div>

                      <div class="card-body">
                        <div class="form-group">
                          <p> <span><a href="https://shiprow.com/admin/index.php?module=plans&action=load" target="_blank"><i class="fa fa-exclamation-circle"></i> Obtain license key?</a></span></p>
                        </div>

                        <form id="licenseForm">
                          <div class="row">
                            <input type="text" class="form-control col-md-6" placeholder="enter licese" id="licenseText" value="<?=$license?>">
                          </div>
                          <div class="row">
                            <div class="row">
                            &nbsp
                            <input type="hidden" id="shop" value="<?=$_SERVER['HTTP_HOST']?>">

                          </div>
                          </div>
                            <button type="button" onclick="licenseSave()" class="btn btn-primary" ><?=(isset($license)?'Update':'Save')?></button>
                        </form>
                        
                        
                        </div>

 

                      </div>

                  </div>

              </div>

          </div>

          <!-- /row for ware house -->

        </div>

        <!-- /tab content-->

    </div>
    <div class="card card-box">
    <div class="card-body no-padding height-9">
      <div class="row">
        <div class="col-md-6">
          <div class="container">
            <h2><span class="fa fa-book">&nbsp;</span>Helpful Docs</h2>

          </div>
          <div class="container">
            <p> <span><a href="https://docs.shiprow.com/fedex-ltl-freight-quotes-for-woocommerce/#2646" target="_blank"><i class="fa fa-exclamation-circle"></i>How to Manage your License </a></span></p>
          </div>
          <div class="container">
            <p> <span><a href="https://docs.shiprow.com/fedex-ltl-freight-quotes-for-woocommerce/#4845" target="_blank"><i class="fa fa-exclamation-circle"></i> SHIPROW WooCommerce Sign up </a></span></p>
          </div>
        </div>
     
      </div>
    </div>
</div>

    <!-- /tabline -->

  </div>

  <!-- md-12 -->


<!-- row  warehouse end-->



<!-- Popup Modal disable carrier -->
<div class="modal" id="enabledCarriersCheckboxes" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content submitFade">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle">Enable carrier limit is reached. please disable carrier to update the current plan</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <div class="row" id="enabledCarriersDiv">
   <?foreach ($enabledCarriers as $carrier) {
    $query="SELECT * FROM {$wpdb->prefix}carriers WHERE carrier_id=%d";
    $carrierName=$wpdb->get_results($wpdb->prepare($query,$carrier['carrier_id']),ARRAY_A);
    $carrierName=$carrierName[0]['carrier_name'];
     echo '
     <div class=col-md-4>
     <input id="'.$carrier['carrier_id'].'" type="checkbox" >
                      <label for="'.$carrier['carrier_id'].'">
                         '.$carrierName.'
                      </label>
     </div>
     ';
   }
   ?>
   </div>
   <button type="button" class="btn btn-primary" onclick="disableCarriers()">Disable</button>

  </div>
</div>
</div>
</div>
