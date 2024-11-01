<?php



$quoteSettings['rating_method'] = isset( $qs->rating_method ) ?esc_textarea( $qs->rating_method) : '';

$quoteSettings['number_of_options'] = isset( $qs->number_of_options ) ?esc_textarea( $qs->number_of_options) : '';

$quoteSettings["carrier_label"] = isset( $qs->carrier_label ) ?esc_textarea( $qs->carrier_label) : '';

$quoteSettings['show_delivery_estimate'] = isset( $qs->show_delivery_estimate ) ?esc_textarea( $qs->show_delivery_estimate) : '';

$quoteSettings['weight_handling_unit'] = isset( $qs->weight_handling_unit ) ?esc_textarea( $qs->weight_handling_unit) : '';

$quoteSettings['handling_fee'] = isset( $qs->handling_fee ) ?esc_textarea( $qs->handling_fee) : '';

$quoteSettings['po_box_services'] = isset( $qs->po_box_services ) ?esc_textarea( $qs->po_box_services) : '';

$quoteSettings['residential_pickup'] = isset( $qs->residential_pickup ) ?esc_textarea( $qs->residential_pickup) : '';

$quoteSettings['residential_delivery'] = isset( $qs->residential_delivery ) ?esc_textarea( $qs->residential_delivery) : '';

$quoteSettings['residential_auto_detection'] = isset( $qs->residential_auto_detection ) ?esc_textarea( $qs->residential_auto_detection) : '';

$quoteSettings['liftgate_pickup'] = isset( $qs->liftgate_pickup ) ?esc_textarea( $qs->liftgate_pickup) : '';

$quoteSettings['lift_gate_delivery'] = isset( $qs->lift_gate_delivery ) ?esc_textarea( $qs->lift_gate_delivery) : '';

$quoteSettings['carrier_lift_gate_delivery_as_option'] = isset( $qs->carrier_lift_gate_delivery_as_option ) ?esc_textarea( $qs->carrier_lift_gate_delivery_as_option) : '';

$quoteSettings['liftgate_auto_detection'] = isset( $qs->liftgate_auto_detection ) ?esc_textarea( $qs->liftgate_auto_detection) : '';





?>

<input type="hidden" name="carrier_id" value="<?php echo esc_textarea($_POST['carrier_id']); ?>" />

<div class="row">

               <div class="col-md-6 col-sm-6">

                <div class="form-group">

                      <label>Rating technique</label>

                     <select id="rating_method" name="rating_method" class="form-control">

                      <option <?php echo( ($quoteSettings['rating_method']=="cheapest")?'selected':'');?> value="cheapest">Cheapest</option>

                      <option <?php echo( ($quoteSettings['rating_method']=="cheapest_options")?'selected':''); ?> value="cheapest_options">Cheapest Options</option>

                      

                     </select>

                  </div>

                  <div class="form-group">

                      <label>Number of options</label>

                     <select id="number_of_options" name="number_of_options" class="form-control"class="form-control" <?=( ($quoteSettings['rating_method']=="cheapest_options")?'':'disabled'); ?>>

                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>

                     </select>

                  </div>

                  <div class="form-group">

                      <label>Mark As</label>

                      <?php 

                        echo '<input type="text" id="carrier_label" name="carrier_label" class="form-control" placeholder="" value="'.$quoteSettings["carrier_label"].'">' 

                      ?>

                      <span class="help-block"><small>(User will be shown “R­L" during checkout, leaving it blank will display name of carrier.)</small> </span>

                  </div>



                   <div class="form-group">

                 <div class="checkbox checkbox-icon-black p-0">

                          <input id="show_delivery_estimate" name="show_delivery_estimate" value="1" type="checkbox" <?php echo( ($quoteSettings['show_delivery_estimate']==1)?'checked':''); ?>>

                          <label for="show_delivery_estimate">

                              Show Estimate Delivery

                          </label>

                      </div>

                </div>






                      <div class="form-group">

                      <label>Handling Fee</label>

                      <input type="text" id="handling_fee" name="handling_fee" class="form-control" placeholder="" value=<?php echo( (isset($quoteSettings['handling_fee']))?$quoteSettings['handling_fee']:''); ?>>

                      <span class="help-block"><small>(Enter percentage or amount, leaving it blank will disable this feature.)</small> </span>

                       </div>


     





              </div>

              <div class="col-md-6 col-sm-6">

                



                  <div class="form-group">

                  <label><b>Quote settings for residential address</b></label>





                      <div class="checkbox checkbox-icon-black p-0">

                          <input id="residential_delivery" name="residential_delivery" value="1" type="checkbox" <?php echo( ($quoteSettings['residential_delivery']==1)?'checked':''); ?>>

                          <label for="residential_delivery">

                              Always offer residential address delivery

                          </label>

                      </div>

                 

                      <div class="checkbox checkbox-icon-black p-0">

                          <input id="residential_auto_detection" name="residential_auto_detection" value="1" type="checkbox" <?php echo( ($quoteSettings['residential_auto_detection']==1)?'checked':''); ?> <?=($level>=2? "":"disabled")?>>

                          <label for="residential_auto_detection">

                              <p>Automatic detection of residential address <span class="text-warning">( US only )</span> &nbsp <a href="https://shiprow.com/admin/index.php?module=plans&action=load" target="_blank" class="required"><span class="text-danger "><?=($level>=2?'':'Standard plan required')?></span></a></p>

                          </label>

                      </div>



                  </div>



                  <div class="form-group">

                  <label><b>Lift gate Service at Dock Settings</b></label>

                  

                      <div class="checkbox checkbox-icon-black p-0">

                          <input id="lift_gate_delivery" name="lift_gate_delivery" value="1" type="checkbox" <?php echo( ($quoteSettings['lift_gate_delivery']==1)?'checked':''); ?>>

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

                          <input id="liftgate_auto_detection" name="liftgate_auto_detection" value="1" type="checkbox" 

                                <?php echo( ($quoteSettings['residential_auto_detection']==1)?'':'disabled'); ?> 

                                <?php echo( ($quoteSettings['liftgate_auto_detection']==1)?'checked':''); ?>

                                >

                          <label for="liftgate_auto_detection">

                              Only quote Lift Gate delivery when a residential address is detected

                          </label>

                      </div>

                  </div>



                              

            

                    </div>

          </div>

          <script type="text/javascript">
            //in wwe ltl rating method
  
          </script>

         