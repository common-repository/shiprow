<?php

global $sp_strings;


$licensekey = '';


?>

<!-- Connection setting -->



  <div class="row">

    <div class="col-md-12 col-sm-12">

      <div class="card card-box">

        <div class="card-head">

          <header>Connection Setting : <?php echo $carrier_name; ?>  </header>

            <!-- <button id = "panel-button1" class = "mdl-button mdl-js-button mdl-button--icon pull-right" data-upgraded = ",MaterialButton">

              <i class = "material-icons">more_vert</i>

            </button>

            <ul class = "mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" data-mdl-for = "panel-button1">

                <li class = "mdl-menu__item"><i class="material-icons">assistant_photo</i>Action</li>

                <li class = "mdl-menu__item"><i class="material-icons">print</i>Another action</li>

                <li class = "mdl-menu__item"><i class="material-icons">favorite</i>Something else here</li>

            </ul> -->

        </div>

        <div class="card-body" id="bar-parent1">



          <?php 

          if(!empty( $carrier_id ) ){

              

              $settings = sp_get_connection_settings($carrier_id);

              $licensekey = isset( $settings->license_key ) ? $settings->license_key : '';

              /*echo '<pre>';

              print_r($settings);

              echo '</pre>'; */

          }

          

            if(isset( $_POST['selectedcarrier'] ) && file_exists( SPROW_CARRIER_FORM_DIR.$_POST['selectedcarrier'].'.php' ) ){

                ?>

                <form id="connectionSettingForm" class="form-horizontal">

                    <?php if( isset( $settings->id ) && !empty( $settings->id ) ){ ?>

                        <input type="hidden" name="edit_id" value="<?php echo $settings->id; ?>" />

                    <?php } ?> 

                    <input type="hidden" name="carrierId" value="<?php echo esc_textarea($_POST['carrier_id']); ?>" />

                    <input type="hidden" id="selected_carrier_name" name="selected_carrier" value="<?php echo esc_textarea($_POST['selectedcarrier']);?>">

                    

                    <!-- <div class="form-group">

                        <label class="control-label">License key 

                            <span class="required"> * </span>

                        </label>

                        <input name="licenseKey" type="number" data-msg-required="License key is required" class="form-control" required value="<?php echo $licensekey; ?>"/>

                        

                    </div> -->

                <?php

                include SPROW_CARRIER_FORM_DIR.sanitize_text_field($_POST['selectedcarrier']).'.php';  



                ?>

              </form>

                <div class="response pull-right">

                  <button class="btn btn-secondary  mr-2" onclick="TestCarrier()">Test Carrier</button>

                  <button class="btn btn-primary " onclick="submitConnectionSetting()">Save</button>

                </div>

                <?php

            }else{

              echo 'Please select the carrier';

            }

            

          ?>

        </div>

      </div>

    </div>

  </div>



<!-- Connection Setting End -->