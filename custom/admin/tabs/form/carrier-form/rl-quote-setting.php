<?php

$quoteSettings["carrier_label"] = isset( $qs->carrier_label ) ?esc_textarea( $qs->carrier_label) : '';

$quoteSettings['standard_service'] = isset( $qs->standard_service ) ?esc_textarea( $qs->standard_service) : '';

$quoteSettings['guranteed_pm'] = isset( $qs->guranteed_pm ) ?esc_textarea( $qs->guranteed_pm) : '';

$quoteSettings['guaranteed_am'] = isset( $qs->guaranteed_am ) ?esc_textarea( $qs->guaranteed_am) : '';

$quoteSettings['guaranteed_hourly'] = isset( $qs->guaranteed_hourly ) ?esc_textarea( $qs->guaranteed_hourly) : '';


$quoteSettings['show_delivery_estimate'] = isset( $qs->show_delivery_estimate ) ?esc_textarea( $qs->show_delivery_estimate) : '';

$quoteSettings['holdAtTerminal'] = isset( $qs->holdAtTerminal ) ?esc_textarea( $qs->holdAtTerminal) : '';

$quoteSettings['holdAtTerminalFee'] = isset( $qs->holdAtTerminalFee ) ?esc_textarea( $qs->holdAtTerminalFee) : '';

$quoteSettings['handling_fee'] = isset( $qs->handling_fee ) ?esc_textarea( $qs->handling_fee) : '';

$quoteSettings['free_shipping_threshhold'] = isset( $qs->free_shipping_threshhold ) ?esc_textarea( $qs->free_shipping_threshhold) : '';

$quoteSettings['po_box_services'] = isset( $qs->po_box_services ) ?esc_textarea( $qs->po_box_services) : '';

$quoteSettings['residential_delivery'] = isset( $qs->residential_delivery ) ?esc_textarea( $qs->residential_delivery) : '';

$quoteSettings['lift_gate_delivery'] = isset( $qs->lift_gate_delivery ) ?esc_textarea( $qs->lift_gate_delivery) : '';

$quoteSettings['carrier_lift_gate_delivery_as_option'] = isset( $qs->carrier_lift_gate_delivery_as_option ) ?esc_textarea( $qs->carrier_lift_gate_delivery_as_option) : '';

$quoteSettings['residential_auto_detection'] = isset( $qs->residential_auto_detection ) ?esc_textarea( $qs->residential_auto_detection) : '';

$quoteSettings['liftgate_auto_detection'] = isset( $qs->liftgate_auto_detection ) ?esc_textarea( $qs->liftgate_auto_detection) : '';

$quoteSettings['orderNote'] = isset( $qs->orderNote ) ?esc_textarea( $qs->orderNote) : '';





?>

<input type="hidden" name="carrier_id" value="<?php echo esc_textarea($_POST['carrier_id']); ?>" />
<div class="form-group">

            <label><b>R+L Services</b></label>

          </div>

          <div class="form-group">

            <label><p>Please select the required services and their detail will be shown on the checkout page and order page.</p></label>

          </div>
<div class="row">

              <div class="col-md-6 col-sm-6">

                  <div class="form-group">

                      <label>Mark As</label>

                      <?php 

                        echo '<input type="text" id="carrier_label" name="carrier_label" class="form-control" placeholder="" value="'.$quoteSettings["carrier_label"].'">' 

                      ?>

                      <span class="help-block"><small>(User will be shown "Freight" during checkout, leaving it blank will display name of carrier.)</small> </span>

                  </div>



                <div class="form-group">

                  <label><b>Choose Quote Services</b></label>

               

                <div class="checkbox checkbox-icon-black p-0">

                          <input id="selectAll" name="selectAll" type="checkbox" value="1"

                          <?php //to enabel select all if all check boxees got are selected

                                    echo( 

                                      (($quoteSettings['standard_service']==1)&

                                      ($quoteSettings['guranteed_pm']==1)&

                                      ($quoteSettings['guaranteed_am']==1)&

                                        ($quoteSettings['guaranteed_hourly']==1)==1)?'checked':''

                                        ); 

                              ?>>

                          <label for="selectAll">

                              Select All

                          </label>

                      </div>

                    



                <div class="checkbox checkbox-icon-black p-0">

                          <input id="standard_service" name="standard_service" type="checkbox" value="1" <?php echo( ($quoteSettings['standard_service']==1)?'checked':''); ?>/>

                          <label for="standard_service">

                              Standard Service

                          </label>

                      </div>

                  



              <div class="checkbox checkbox-icon-black p-0">

                          <input id="guranteed_pm" name="guranteed_pm" type="checkbox" value="1" <?php echo( ($quoteSettings['guranteed_pm']==1 )?'checked':''); ?>>

                          <label for="guranteed_pm">

                              PM Service

                          </label>

                      </div>

              <div class="checkbox checkbox-icon-black p-0">

                          <input id="guaranteed_am" name="guaranteed_am" type="checkbox" value="1" <?php echo( ($quoteSettings['guaranteed_am']==1 )?'checked':''); ?>>

                          <label for="guaranteed_am">

                              AM Service

                          </label>

                      </div>

              <div class="checkbox checkbox-icon-black p-0">

                          <input id="guaranteed_hourly" name="guaranteed_hourly" type="checkbox" value="1" <?php echo( ($quoteSettings['guaranteed_hourly']==1)?'checked':''); ?>>

                          <label for="guaranteed_hourly">

                              Hourly Window Service

                          </label>

                      </div>

                    </div>



                    <div class="form-group">

                 <div class="checkbox checkbox-icon-black p-0">

                          <input id="show_delivery_estimate" name="show_delivery_estimate" type="checkbox"  value="1" <?php echo( ($quoteSettings['show_delivery_estimate']==1)?'checked':''); ?>>

                          <label for="show_delivery_estimate">

                              Show Estimate Delivery

                          </label>

                      </div>

                </div>



              

<!-- add later -->
<!-- 
                  <div class="form-group">

                  <label><b>Keep at station</b></label>

                  

                      <div class="checkbox checkbox-icon-black p-0">

                          <input id="holdAtTerminal" name="holdAtTerminal" type="checkbox" value="1" <?php echo( ($quoteSettings['holdAtTerminal']== 1)?'checked':''); ?>>

                          <label for="holdAtTerminal">

                              Display Keep at Station as an option

                          </label>

                      </div>

            



                  

                    <input type="text" id="holdAtTerminalFee" name="holdAtTerminalFee" class="form-control" placeholder="" value=<?php echo( (isset($quoteSettings['holdAtTerminalFee']))?$quoteSettings['holdAtTerminalFee']:''); ?>>

                      <span class="help-block"><small>(Set the fee for Keep at Station option, it can be an amount or percentage, carrier returned rates will be shown if left blank.)</small> </span>



                    </div> -->

                      <div class="form-group">

                      <label>Handling Fee</label>

                      <input type="text" id="handling_fee" name="handling_fee" class="form-control" placeholder="" value=<?php echo( (isset($quoteSettings['handling_fee']))?$quoteSettings['handling_fee']:''); ?>>

                      <span class="help-block"><small>(Enter percentage or amount, leaving it blank will disable this feature.)</small> </span>

                       </div>
                      <!-- add later -->
                      <!-- <div class="form-group">

                      <label>Free delivery if order exceeds $$</label>

                      <input type="text" id="free_shipping_threshhold" name="free_shipping_threshhold" class="form-control" placeholder="" value=<?php echo( (isset($quoteSettings['free_shipping_threshhold']))?$quoteSettings['free_shipping_threshhold']:''); ?>>

                      <span class="help-block"><small>(Enter amount without tax or leave it blank to disable this feature)</small> </span>


                  
                    <div class="checkbox checkbox-icon-black p-0">

                          <input id="po_box_services" name="po_box_services" type="checkbox" value="1" <?php echo( ($quoteSettings['po_box_services']==1)?'checked':''); ?>>

                          <label for="po_box_services">

                              Do not display rates if given address is post office

                          </label>

                      </div>

                  </div> -->





              </div>

              <div class="col-md-6 col-sm-6">

                



                  <div class="form-group">

                  <label><b>Quote settings for residential address</b></label>

                

                      <div class="checkbox checkbox-icon-black p-0">

                          <input id="residential_delivery" name="residential_delivery" type="checkbox" value="1" <?php echo( ($quoteSettings['residential_delivery']==1)?'checked':''); ?>>

                          <label for="residential_delivery">

                              Always offer residential address delivery

                          </label>

                      </div>

                 

                      <div class="checkbox checkbox-icon-black p-0">

                          <input id="residential_auto_detection" name="residential_auto_detection" type="checkbox" value="1" <?php echo( ($quoteSettings['residential_auto_detection']==1)?'checked':''); ?> <?=($level>=2? "":"disabled")?>>

                          <label for="residential_auto_detection">

                              <p>Automatic detection of residential address <span class="text-warning">( US only )</span> &nbsp <a href="https://shiprow.com/admin/index.php?module=plans&action=load" target="_blank" class="required"><span class="text-danger "><?=($level>=2?'':'Standard plan required')?></span></a>

                          </label>

                      </div>

                  </div>



                  <div class="form-group">

                  <label><b>Lift gate Service at Dock Settings</b></label>

                  

              

                      <div class="checkbox checkbox-icon-black p-0">

                          <input id="lift_gate_delivery" name="lift_gate_delivery" type="checkbox" value="1" <?php echo( ($quoteSettings['lift_gate_delivery']==1)?'checked':''); ?>>

                          <label for="lift_gate_delivery">

                              Always quote Lift Gate delivery service

                          </label>

                      </div>

                 

                      <div class="checkbox checkbox-icon-black p-0">

                          <input id="carrier_lift_gate_delivery_as_option" name="carrier_lift_gate_delivery_as_option" type="checkbox" value="1" <?php echo( ($quoteSettings['carrier_lift_gate_delivery_as_option']==1)?'checked':''); ?> <?=($level>=2? "":"disabled")?>>

                          <label for="carrier_lift_gate_delivery_as_option">

                              Lift gate delivery as an option &nbsp <a href="https://shiprow.com/admin/index.php?module=plans&action=load" target="_blank" class="required"><span class="text-danger "><?=($level>=2?'':'Standard plan required')?></span></a>

                          </label>

                      </div>

                 

                      <div class="checkbox checkbox-icon-black p-0">

                          <input id="liftgate_auto_detection" name="liftgate_auto_detection" type="checkbox" value="1"

                                <?php echo( ($quoteSettings['residential_auto_detection']==1)?'':'disabled'); ?> 

                                <?php echo( ($quoteSettings['liftgate_auto_detection']==1)?'checked':''); ?>

                          >

                          <label for="liftgate_auto_detection">

                              Only quote Lift Gate delivery when a residential address is detected &nbsp <a href="https://shiprow.com/admin/index.php?module=plans&action=load" target="_blank" class="required"><span class="text-danger "><?=($level>=2?'':'Standard plan required')?></span></a>

                          </label>

                      </div>

                  </div>

<!-- add later -->
<!-- 
                  <div class="form-group">

                  <label><b>Quote Details</b></label>

                  

              </div>

                  <div class="form-group">

                      <div class="radio p-0">

                          <input type="radio" name="orderNote" id="orderNote1" value="1" <?php echo( ($quoteSettings['orderNote']=="1")?'checked':''); ?>>

                          <label for="orderNote1">

                              <p>Write the quote details to the additional details widget</p>

                          </label>

                      </div>

                      <div class="radio p-0">

                          <input type="radio" name="orderNote" id="orderNote2" value="2" <?php echo( ($quoteSettings['orderNote']=="2")?'checked':''); ?>>

                          <label for="orderNote2">

                              <p>Write the quote detauls to the More Actions>Shipping quote details page</p>

                          </label>

                      </div>

                  </div>    -->          

            

                    </div>

          </div>

        