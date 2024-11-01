<?php

//$carrier_list = sp_get_all_carrier_list();

$carrier_list = sp_enable_carrier_list();



?>

<!-- Modal for Choose Service -->

<div class="modal" id="sp_select_carrier_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLongTitle"> Select Your Service</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

       <form method="post" name="select_service_form" id="select_service_form">

           <div class="form-group ">

              <label class="control-label">Select Your Service :

                  <span class="required" aria-required="true"> * </span>

              </label>

                  <input type="hidden" name="carrier_id" id="selected_carrier_id">

                  <select class="form-control" id="selectcarrier" name="selectedcarrier" required>

                      <?php

                      if( !empty( $carrier_list ) ){

                        echo '<option value="0">Please select the carrier</option>';

                        foreach ($carrier_list as $key => $carrier) {

                          $carrier_name = strtolower( esc_textarea($carrier->carrier_name) );

                          $carrier_name = str_replace(' ', '-', $carrier_name );

                          if( 'usps-ltl' != $carrier_name )

                          echo '<option value="'.$carrier_name.'" data-id="'.$carrier->carrier_id.'">'.$carrier->carrier_name.'</option>';

                        }

                      }else{

                        echo "Please enable any carrier";

                      }

                      ?>

                  </select>

              

          </div>

        </form>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="jQuery('#sp_select_carrier_modal').hide()">Close</button>

        <button type="button" class="btn btn-primary select-carrier-btn proceed-btn">Proceed</button>

      </div>

    </div>

  </div>

</div>

<!-- Modal for Choose Service -->