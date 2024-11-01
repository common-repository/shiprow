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

wp_enqueue_script( 'sp-form-js' );

//notification
wp_enqueue_style( 'notification-css' );
wp_enqueue_script( 'notification-js' );
//confirmbox
wp_enqueue_script( 'confirmbox-js' );







global $sp_strings,$wpdb;

//collect all warehouse

$warehouse_query = "SELECT * FROM {$wpdb->prefix}locations WHERE type=%s";

$warehouse_lists = $wpdb->get_results($wpdb->prepare($warehouse_query,'warehouse'));



//collect all drophouse

$drophouse_query = "SELECT * FROM {$wpdb->prefix}locations WHERE type=%s";

$drophouse_lists = $wpdb->get_results($wpdb->prepare($drophouse_query,'dropship'));

$sql="SELECT * FROM {$wpdb->prefix}countries";
$countries=$wpdb->get_results($sql,ARRAY_A);


?>



<style type="text/css">

    .page-container-bg-solid .page-bar, .page-content-white .page-bar {

    margin: 0px -20px 1px !important;

}

ul.dropdown-menu.pull-right.show {

    left: -40px !important;

}

</style>

<script type="text/javascript">

	jQuery(document).ready(function($) {

		// for tags inputs

		jQuery('.tags-input').tagsInput({

	        width: 'auto'

	    });



	});

</script>



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

		                      <header><?php echo $sp_strings['ware_house']; ?></header>

		                      

		                  </div>

		                  <div class="card-body">

		                      <div class="row">

		                          <div class="col-md-12 col-sm-12 col-12">

		                              <div class="btn-group pull-right">

		                   					<button type="button" class="btn btn-info" data-type="warehouse" data-toggle="modal" data-target="#addwarehouseModal">

		                      					<?php echo $sp_strings['add_warehouse']; ?> <i class="fa fa-plus"></i>

		                 					</button>

		   									<!-- Button trigger modal -->

		                              </div>

		                          </div>

		                      </div>

		                      <!-- table-scrollable -->
		                      <form onsubmit="return false;" novalidate="novalidate">
		                      	<div class="table-scrollable">

				                    <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="warehouse_table">

				                        <thead>

				                            <tr>

				                        	    <th> &nbsp; </th>

				                                <th> <?php echo $sp_strings['city']; ?> </th>

				                                <th> <?php echo $sp_strings['state']; ?> </th>

				                                <th> <?php echo $sp_strings['zip']; ?> </th>

				                                <th> <?php echo $sp_strings['country']; ?> </th>

				                                <th> <?php echo $sp_strings['action']; ?> </th>

				                            </tr>

				                        </thead>

				                        <tbody>

				                        	<?php 

				                        		if( !empty( $warehouse_lists ) ){

				                        			foreach ($warehouse_lists as $key => $warehouse) {

				                        				?>

				                        				<tr class="odd gradeX">

							                                <td class="patient-img"></td>

							                                <td><?php echo esc_textarea($warehouse->city); ?></td>

							                                <td class="left"><?php echo esc_textarea($warehouse->state); ?></td>

							                                <td class="left"><?php echo esc_textarea($warehouse->zipcode); ?></td>

							                                <td class="left"><?php echo esc_textarea($warehouse->country); ?></td>

							                                <td>

							                                <button type="button" class="btn btn-primary btn-xs" data-id="<?php echo $warehouse->location_id; ?>" data-type="warehouse" data-toggle="modal" data-target="#addwarehouseModal">

							                                  <i class="fa fa-pencil"></i>

							                                  </button>

							                                    <button class="btn btn-danger btn-xs delete-warehouse" data-id="<?php echo $warehouse->location_id; ?>">

							                                        <i class="fa fa-trash-o "></i>

							                                    </button>

							                                </td>

							                            </tr>

				                        				<?php

				                        			}

				                        		}

				                        	?>

				                         </tbody>

				                      </table>

		                     	 </div>
		                     	</form>

		                      <!-- /table-scrollable  -->

		                  </div>

		              </div>

		          </div>

		    	</div>

		    	<!-- /row for ware house -->

			  </div>

			  <!-- /tab content-->

		</div>

		<!-- /tabline -->

	</div>

	<!-- md-12 -->

</div>

<!-- row  warehouse end-->

<!-- main row for drophouse -->

<div class="row">

    <div class="col-md-12">

          <div class="card card-box">

              <div class="card-head">

                  <header><?php echo $sp_strings['drop_ship']; ?></header>

                  

              </div>

              <div class="card-body ">

                  <div class="row">

                      <div class="col-md-12 col-sm-12 col-12">

                          <div class="btn-group pull-right">



                              <a href="javascript:void(0)"  class="btn btn-info" data-type="dropship" data-toggle="modal" data-target="#addwarehouseModal">

                                  <?php echo $sp_strings['add_dropship']; ?><i class="fa fa-plus"></i>

                              </a>

                          </div>

                      </div>

                  </div>
                  <form onsubmit="return false;" novalidate="novalidate">

                  <div class="table-scrollable">

                  <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="drophouse_table">

                      <thead>

                          <tr>

                              <th> &nbsp; </th>

                              <th> <?php echo $sp_strings['city']; ?> </th>

                              <th> <?php echo $sp_strings['state']; ?> </th>

                              <th> <?php echo $sp_strings['zip']; ?> </th>

                              <th> <?php echo $sp_strings['country']; ?> </th>

                              <th> <?php echo $sp_strings['action']; ?> </th>

                          </tr>

                      </thead>

                      <tbody>

                          

                          <?php 

	                		if( !empty( $drophouse_lists ) ){

	                			$i = 1;

	                			foreach ($drophouse_lists as $key => $drophouse) {

	                				?>

	                				<tr class="odd gradeX">

		                                <td class="patient-img"><?php echo $i; ?></td>

		                                <td><?php echo esc_textarea($drophouse->city); ?></td>

		                                <td class="left"><?php echo esc_textarea($drophouse->state); ?></td>

		                                <td class="left"><?php echo esc_textarea($drophouse->zipcode); ?></td>

		                                <td class="left"><?php echo esc_textarea($drophouse->country); ?></td>

		                                <td>

			                                <button type="button" class="btn btn-primary btn-xs" data-id="<?php echo $drophouse->location_id; ?>" data-type="dropship" data-toggle="modal" data-target="#addwarehouseModal">

			                                  <i class="fa fa-pencil"></i>

			                                  </button>

			                                    <button class="btn btn-danger btn-xs delete-dropship" data-id="<?php echo $drophouse->location_id; ?>">

			                                        <i class="fa fa-trash-o "></i>

			                                    </button>

			                                </td>

		                            </tr>

	                				<?php

	                				$i++;

	                			}

	                		}

	                	?>

                      </tbody>

                  </table>

                  </div>
              	</form>

              </div>

          </div>

    </div>

</div>

<!-- /drophouse end -->



<!-- Popup Modal warehouse -->

<div class="modal" id="addwarehouseModal" tabindex="-1" role="dialog" aria-labelledby="addwarehouseModalTitle" style="display: none;" aria-hidden="true">

	<div class="modal-dialog modal-dialog-centered" role="document">

		<div class="modal-content">

			<div class="modal-header">

				<h5 class="modal-title" id="exampleModalLongTitle"><?php echo $sp_strings['add_ware_house']; ?></h5>

				<button type="button" class="close" data-dismiss="modal" aria-label="Close">

					<span aria-hidden="true">×</span>

				</button>

			</div>

			<div class="modal-body">

				<!-- old form name -- form_sample_1 -->

				<form id="warehouse_form" class="" method="post" novalidate="novalidate"> 

					<input type="hidden" class="location_type type" name="type" value="warehouse">

					<input type="hidden" name="edit_id" class="warehouse_edit_id" value="">

					

					<div class="form-group">

						<label class="control-label"><?php echo $sp_strings['enter_your_zip_code']; ?></label>

						<input name="zipcode" type="text" class="form-control zipcode zipcode-change" required="required" />

						<span class="help-block"><?php echo $sp_strings['zip_code_help']; ?></span>

					</div>

					<div class="form-group">

						<label class="control-label"><?php echo $sp_strings['country']; ?></label>

						<input name="country" id="country" type="text" class="form-control country" />

					</div>




					<div class="form-group">

						<label class="control-label"><?php echo $sp_strings['city']; ?></label>

						<input name="city" type="text" class="form-control city" required="required"/>

					</div>



					<div class="form-group">

						<label class="control-label"><?php echo $sp_strings['state']; ?></label>

						<input name="state" type="text" class="form-control state" />

					</div>



					

					<div class="row">

						<!-- add later -->
						<!-- <div class="col-sm-6 col-xs-12">

							<div class="checkbox checkbox-icon-black p-0">

		                        <input id="instorecheckbox" type="checkbox" name="instore_pickup" class=" warehouse-checkbox instore_pickup" data-id="instore-pickup" value="1">

		                        <label for="instorecheckbox">

		                            <?php echo $sp_strings['instore_pickup']; ?>

		                        </label>

		                    </div>

						</div>

						<div class="col-sm-6 col-xs-12">

							<div class="checkbox checkbox-icon-black p-0">

		                        <input id="localdeliverycheckbox" type="checkbox" name="local_delivery" class=" warehouse-checkbox local_delivery" data-id="local-delivery" value="1">

		                        <label for="localdeliverycheckbox">

		                            <?php echo $sp_strings['local_delivery']; ?>

		                        </label>

		                    </div>

						</div> -->

					</div>

					<div class="warehouse-div"></div>

					<div class="instore-pickup hide">

						<div class="form-group">

							<label class="control-label"><?php echo $sp_strings['miles']; ?></label>

							<input name="instorepickup[miles]" type="text" class="form-control instore_pickup miles"  />

						</div>

						<div class="form-group">

							<label class="control-label"><?php echo $sp_strings['zip_codes']; ?></label>

							<input name="instorepickup[zip_codes]" type="text" class="form-control instore_pickup zip_codes tags-input"  />

						</div>

					</div>

					<div class="local-delivery hide">

						<div class="form-group">

							<label class="control-label"><?php echo $sp_strings['miles']; ?></label>

							<input name="localdelivery[miles]" type="text" class="form-control local_delivery miles"  />

						</div>

						<div class="form-group">

							<label class="control-label"><?php echo $sp_strings['zip_codes']; ?></label>

							<input name="localdelivery[zip_codes]" type="text" class="form-control local_delivery zip_codes tags-input" placeholder="Add Zip code"  />

						</div>

					</div>

					<div class="local-delivery hide">

						<div class="form-group">

							<label class="control-label"><?php echo $sp_strings['local_delivery_fee']; ?></label>

							<input name="local_delivery_fee" type="text" class="form-control local_delivery fees"  />

						</div>

					</div>

				<!-- 	<div class="checkbox checkbox-icon-black p-0">

                        <input id="suppresscheckbox" type="checkbox" name="suppress_other_rates" class="suppress_other_rates" data-id="suppress-rate" value="yes">

                        <label for="suppresscheckbox">

                            <?php echo $sp_strings['suppress_other_rates']; ?>

                        </label>

                    </div> -->

					

				</form>

			</div>

			<div class="modal-footer">

				<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $sp_strings['close']; ?></button>

				<button type="button" class="btn btn-primary add-warehouse-btn"><?php echo $sp_strings['add_warehouse']; ?></button>

			</div>

		</div>

	</div>

</div>

<div class="card card-box submitFade">
    <div class="card-body no-padding height-9">
      <div class="row">
        <div class="col-md-6">
          <div class="container">
            <h2><span class="fa fa-book">&nbsp;</span>Helpful Docs</h2>

          </div>
          <div class="container">
            <p> <span><a href="https://docs.shiprow.com/fedex-ltl-freight-quotes-for-woocommerce/#2629" target="_blank"><i class="fa fa-exclamation-circle"></i> Identify drop ship locations and warehouses </a></span></p>
          </div>
        </div>
     
      </div>
    </div>
</div>

  <script type="text/javascript">
  	if ( window.location !== window.parent.location  && window.name=="iframeSteps") {   
    // The page is in an iframe 
    document.getElementsByClassName('page-header')[0].remove();
    document.getElementsByClassName('page-bar')[0].remove();
    document.getElementById('adminmenuwrap').remove();
    document.getElementById('adminmenuback').remove();
    document.getElementById('wpadminbar').remove();
    // document.getElementsByClassName('page-content').style.display="none";
    // document.getElementsByClassName('sidebar-container').style.display="none";

    }
  </script>



<!-- Popup Modal drophouse -->

