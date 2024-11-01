<?php
// echo plugins_url( '../../assets/img/FedEx.png', __FILE__ );
// die();
$all_carrier = sp_get_all_carrier_list();
//notification
wp_enqueue_style( 'notification-css' );
wp_enqueue_script( 'notification-js' );

//confirmbox
wp_enqueue_script( 'confirmbox-js' );


?>
<style type="text/css">
	    <style type="text/css">
  body{margin:40px;}

.stepwizard-step p {
    margin-top: 10px;    
}

.stepwizard-row {
    display: table-row;
}

.stepwizard {
    display: table;     
    width: 100%;
    position: relative;
}

.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}

.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;
    
}

.stepwizard-step {    
    display: table-cell;
    text-align: center;
    position: relative;
}

.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
</style>
</style>
<script type="text/javascript">

	function carrierSetting(formId){
		$('#'+formId).submit();
	}
</script>
<div class="row">

	<?php 

		foreach( $all_carrier as $key => $item ){

			$carrier_name = strtolower( $item->carrier_name );

            $carrier_name = str_replace(' ', '-', $carrier_name );

            if( 456 != $item->carrier_id ){

			?>

			<div class="col-sm-3">

				<div class="card p-0">
					<img class="card-img-top" src="<?php echo plugins_url( '../../assets/img/'.$item->image, __FILE__ ) ?>" alt="Card image" style="width: 97%;height: 10vw;object-fit: cover;"> 

					<div class="card-body">

						<input type="hidden" id="level" value="<?=(isset($level)?$level:'')?>">
						<input type="hidden" id="enabledCarriers" value="<?=(isset($enabledCarriers)?$enabledCarriers:'')?>">

						<h4 class="card-title"><?php echo esc_textarea($item->carrier_name); ?></h4>

						<p class="card-text"></p>

						<div class="text-right">

							<?php

							$check_carrier = sp_check_carrier( $item->carrier_id );

							if($check_carrier){ ?>
								<a  class="text-dark remove-carrier" data-id="<?php echo $item->carrier_id; ?>" style="cursor:pointer;">

									<i class="fa fa-ban  fa-2x" aria-hidden="true"></i>

								</a>
								

								<i class="fa fa-check-circle text-success fa-2x" aria-hidden="true"></i> 
								
								<a  onclick="carrierSetting('carrierSetting<?php echo $item->carrier_id; ?>')"class="text-danger" style="cursor:pointer;">

									<i class="fa fa-cog fa-2x" aria-hidden="true"></i>

								</a>
								<form method="post" id="carrierSetting<?php echo $item->carrier_id; ?>"  action="<?php echo admin_url('admin.php?page=sp-settings&tab=carrier_settings'); ?> ">

						      		<input type="hidden" name="carrier_id" id="<?php echo $item->carrier_id; ?>" value="<?php echo $item->carrier_id; ?>">

						      		<input type="hidden" name="selectedcarrier" id="<?php echo $carrier_name; ?>" value="<?php echo $carrier_name; ?>">
				      		</form>

								


								<?php

							}else{

							?>

							<!-- -->
							<form method="post" name="enablecarrierform<?php echo $item->carrier_id; ?>"  action="<?php echo admin_url('admin.php?page=sp-settings&tab=marketplace'); ?> ">

				      		<input type="hidden" name="carrier_id" id="<?php echo $item->carrier_id; ?>" value="<?php echo $item->carrier_id; ?>">

				      		<input type="hidden" name="selectedcarrier" id="<?php echo $carrier_name; ?>" value="<?php echo $carrier_name; ?>">
				      		
					        <button style="background-color: Transparent;border: none; cursor:pointer;" type="submit" class=""><i class="fa fa-download fa-2x" aria-hidden="true"></i></button>

					    </form>
						

						<?php } ?>

						</div>

					</div>

				</div>

			</div>

			<?php

			}

		}

	?>

</div>

<!-- The Modal -->
  <div class="modal" id="setupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

      <div class="modal-content submitFade">

        <div class="modal-header">

          <div class="stepwizard">
    <div class="stepwizard-row">
        <div class="stepwizard-step">
            <button type="button" id="ibutton1" name="ibuttons" class="btn btn-primary btn-circle" onclick="window.location.reload()">1</button>
            <p>Enable Carrier</p>
        </div>
        <div class="stepwizard-step">
            <button type="button" id="ibutton2" name="ibuttons" class="btn btn-default btn-circle" onclick="carrierSettingShow()">2</button>
            <p>Save Setting</p>
        </div>
        <div class="stepwizard-step">
            <button type="button" id="ibutton3" name="ibuttons" class="btn btn-default btn-circle" onclick="locationAddShow()">3</button>
            <p>Add Location</p>
        </div> 
        <div class="stepwizard-step">
            <button type="button" id="ibutton4" name="ibuttons" class="btn btn-default btn-circle" onclick="visitProduct()">4</button>
            <p>Prroduct Setting</p>
        </div> 
    </div>
</div>

          <button type="button" class="close" onclick="window.location.reload()" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span>

          </button>


        </div>

        <div class="modal-body" >

          <div id="modalIframe">
          </div>
          
          <div class="modal-footer">

          <button type="button" class="btn btn-secondary"  onclick="window.location.reload()" data-dismiss="modal" id="close">Close</button>

          <button type="button" id="nextStep" class="btn btn-primary" onclick="checkStep()"><i class="fa " id="iSpinner"></i>Next</button>

        </div>
        </div>
      </div>
    </div>

<div class="modal" id="enableCarrierModal">

  <div class="modal-dialog modal-dialog-centered">

    <div class="modal-content">



      <!-- Modal Header -->

      <div class="modal-header d-block">

        <h5 class="modal-title text-center">Installing <span class="carrier_name"></span></h5>

        <button type="button" class="close" data-dismiss="modal">&times;</button>

      </div>



      <!-- Modal body -->

      <div class="modal-body">

	        <div class="row justify-content-center">

	        	<div class="carrier-description w-75">

	        		

	        	</div>

	        </div>

      </div>



      <!-- Modal footer -->

      <div class="modal-footer justify-content-center">

   


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
            <p> <span><a href="https://docs.shiprow.com/fedex-ltl-freight-quotes-for-woocommerce/#4958" target="_blank"><i class="fa fa-exclamation-circle"></i> How to enable or disable a carrier </a></span></p>
          </div>
        </div>
     
      </div>
    </div>
</div>
