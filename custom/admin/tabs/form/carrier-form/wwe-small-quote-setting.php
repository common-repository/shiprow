<?php

$quoteSettings['domestic']['UPS_GROUND'] = isset( $qs->domestic->UPS_GROUND ) ?esc_textarea( $qs->domestic->UPS_GROUND) : '' ;

$quoteSettings['domestic']['UPS_THREE_DAY_SELECT'] = isset( $qs->domestic->UPS_THREE_DAY_SELECT ) ?esc_textarea( $qs->domestic->UPS_THREE_DAY_SELECT) : '' ;

$quoteSettings['domestic']['UPS_SECOND_DAY_AIR'] = isset( $qs->domestic->UPS_SECOND_DAY_AIR ) ?esc_textarea( $qs->domestic->UPS_SECOND_DAY_AIR) : '' ;

$quoteSettings['domestic']['UPS_SECOND_DAY_AIR_AM'] = isset( $qs->domestic->UPS_SECOND_DAY_AIR_AM ) ?esc_textarea( $qs->domestic->UPS_SECOND_DAY_AIR_AM) : '' ;

$quoteSettings['domestic']['UPS_NEXT_DAY_AIR_SAVER'] = isset( $qs->domestic->UPS_NEXT_DAY_AIR_SAVER ) ?esc_textarea( $qs->domestic->UPS_NEXT_DAY_AIR_SAVER) : '' ;

$quoteSettings['domestic']['UPS_NEXT_DAY_AIR'] = isset( $qs->domestic->UPS_NEXT_DAY_AIR ) ?esc_textarea( $qs->domestic->UPS_NEXT_DAY_AIR) : '' ;

$quoteSettings['domestic']['UPS_NEXT_DAY_AIR_EARLY'] = isset( $qs->domestic->UPS_NEXT_DAY_AIR_EARLY ) ?esc_textarea( $qs->domestic->UPS_NEXT_DAY_AIR_EARLY) : '' ;



$quoteSettings['show_delivery_estimate'] = isset( $qs->show_delivery_estimate ) ?esc_textarea( $qs->show_delivery_estimate) : '';

$quoteSettings['residential_delivery'] = isset( $qs->residential_delivery ) ?esc_textarea( $qs->residential_delivery) : '';

$quoteSettings['residential_auto_detection'] = isset( $qs->residential_auto_detection ) ?esc_textarea( $qs->residential_auto_detection) : '';

$quoteSettings['po_box_services'] = isset( $qs->po_box_services ) ?esc_textarea( $qs->po_box_services) : '';

$quoteSettings['ground_hazardous_only'] = isset( $qs->ground_hazardous_only ) ?esc_textarea( $qs->ground_hazardous_only) : '';

$quoteSettings['ground_hazardous_fee'] = isset( $qs->ground_hazardous_fee ) ?esc_textarea( $qs->ground_hazardous_fee) : '';

$quoteSettings['air_hazardous_fee'] = isset( $qs->air_hazardous_fee ) ?esc_textarea( $qs->air_hazardous_fee) : '';

$quoteSettings['handling_fee'] = isset( $qs->handling_fee ) ?esc_textarea( $qs->handling_fee) : '';





?>

<input type="hidden" name="carrier_id" value="<?php echo esc_textarea($_POST['carrier_id']); ?>" />


          <div class="form-group">

            <label><b>WWE Services</b></label>

          </div>

          <div class="form-group">

            <label><p>Please select the required services and their detail will be shown on the checkout page and order page.</p></label>

          </div>




        <div class="container">

          <div class="row">

            <div class="col-md-4 col-sm-4  col">

              <div class="form-group">
                  <div class="checkbox checkbox-icon-black p-0">
                    <input id="selectAllDomestic" type="checkbox" >
                    <label for="selectAllDomestic">
                     <b>US Domestic Services</b>
                   </label>
                 </div>

              </div>

              <div class="form-group">

                <div class="checkbox checkbox-icon-black p-0">

                  <input id="UPS_GROUND" name="domestic[UPS_GROUND]" value="1" type="checkbox" <?php echo( ($quoteSettings['domestic']['UPS_GROUND']==1)?'checked':''); ?>>

                  <label for="UPS_GROUND">

                    UPS Ground

                  </label>

                </div>

       

              </div>

               <div class="form-group">

                <div class="checkbox checkbox-icon-black p-0">

                  <input id="UPS_THREE_DAY_SELECT" name="domestic[UPS_THREE_DAY_SELECT]" value="1" type="checkbox" <?php echo( ($quoteSettings['domestic']['UPS_THREE_DAY_SELECT']==1)?'checked':''); ?>>

                  <label for="UPS_THREE_DAY_SELECT">

                    UPS 3 Day Select

                  </label>

                </div>


              </div>

              <div class="form-group">

                <div class="checkbox checkbox-icon-black p-0">

                  <input id="UPS_SECOND_DAY_AIR" name="domestic[UPS_SECOND_DAY_AIR]" value="1" type="checkbox" <?php echo( ($quoteSettings['domestic']['UPS_SECOND_DAY_AIR']==1)?'checked':''); ?>>

                  <label for="UPS_SECOND_DAY_AIR">

                    UPS 2nd Day Air

                  </label>

                </div>


              </div>

              <div class="form-group">

                <div class="checkbox checkbox-icon-black p-0">

                  <input id="UPS_SECOND_DAY_AIR_AM" name="domestic[UPS_SECOND_DAY_AIR_AM]" value="1" type="checkbox" <?php echo( ($quoteSettings['domestic']['UPS_SECOND_DAY_AIR_AM']==1)?'checked':''); ?>>

                  <label for="UPS_SECOND_DAY_AIR_AM">

                    UPS 2nd Day Air M

                  </label>

                </div>

        

              </div>

              <div class="form-group">

                <div class="checkbox checkbox-icon-black p-0">

                  <input id="UPS_NEXT_DAY_AIR_SAVER" name="domestic[UPS_NEXT_DAY_AIR_SAVER]" value="1" type="checkbox" <?php echo( ($quoteSettings['domestic']['UPS_NEXT_DAY_AIR_SAVER']==1)?'checked':''); ?>>

                  <label for="UPS_NEXT_DAY_AIR_SAVER">

                    UPS Next Day Air Saver

                  </label>

                </div>



              </div>

               <div class="form-group">

                <div class="checkbox checkbox-icon-black p-0">

                  <input id="UPS_NEXT_DAY_AIR" name="domestic[UPS_NEXT_DAY_AIR]" value="1" type="checkbox" <?php echo( ($quoteSettings['domestic']['UPS_NEXT_DAY_AIR']==1)?'checked':''); ?>>

                  <label for="UPS_NEXT_DAY_AIR">

                    UPS Next Day Air

                  </label>

                </div>


              </div>

              <div class="form-group">


                <div class="checkbox checkbox-icon-black p-0">

                  <input id="UPS_NEXT_DAY_AIR_EARLY" name="domestic[UPS_NEXT_DAY_AIR_EARLY]" value="1" type="checkbox" <?php echo( ($quoteSettings['domestic']['UPS_NEXT_DAY_AIR_EARLY']==1)?'checked':''); ?>>

                  <label for="UPS_NEXT_DAY_AIR_EARLY">

                    UPS Next Day Air Early

                  </label>

                </div>


              </div>

              <div class="form-group">&nbsp</div>

              <div class="form-group">

                 <div class="checkbox checkbox-icon-black p-0">

                          <input id="show_delivery_estimate" name="show_delivery_estimate" value="1" type="checkbox" <?php echo( ($quoteSettings['show_delivery_estimate']==1)?'checked':''); ?>>

                          <label for="show_delivery_estimate">

                              Show Estimate Delivery

                          </label>

                      </div>

                </div>



            </div> 





            <div class="col-md-4 col-sm-4 col">





            </div>







            <div class="col-md-4 col-sm-4 col">

            

              

            </div>

          </div>

         

<div class="form-group">

                    <label><b>Quote settings for residential address</b></label>

                  

                        <div class="checkbox checkbox-icon-black p-0">

                            <input id="residential_delivery" name="residential_delivery" value="1" type="checkbox" <?php echo( ($quoteSettings['residential_delivery']==1)?'checked':''); ?>>

                            <label for="residential_delivery">

                                Always offer residential address delivery

                            </label>

                        </div>

                    

                        <div class="checkbox checkbox-icon-black p-0">

                            <input id="residential_auto_detection" name="residential_auto_detection" value="1" type="checkbox"  <?php echo( ($quoteSettings['residential_auto_detection']==1)?'checked':''); ?>   <?=($level>=2? "":"disabled")?>
>

                            <label for="residential_auto_detection">

                                Automatic detection of residential address <span class="text-warning">( US only )</span> &nbsp <a href="https://shiprow.com/admin/index.php?module=plans&action=load" target="_blank" class="required"><span class="text-danger "><?=($level>=2?'':'Standard plan required')?></span></a>

                            </label>

                        </div>

</div>




  <div class="form-group">

            <label><b>Hazardous products settings</b></label>

            <div class="row">

             <div class="col-md-4 col-sm-4 col">

              <label>Only Display ground services hazardous shipments on checkout page &nbsp <a href="https://shiprow.com/admin/index.php?module=plans&action=load" target="_blank" class="required"><span class="text-danger "><?=($level>=2?'':'Standard plan required')?></span></a></label>

            </div>

            <div class="col-md-1 col-sm-1 col">

              <div class="checkbox checkbox-icon-black p-0">

                            <input id="ground_hazardous_only" name="ground_hazardous_only" value="1" type="checkbox"  <?php echo( ($quoteSettings['ground_hazardous_only']==1)?'checked':''); ?> <?=($level>=2? "":"disabled")?>>

                            <label for="ground_hazardous_only">

                                

                            </label>

                </div>

            </div>

            <div class="col-md-7 col-sm-7 col">

            </div>

          </div>



          <div class="row">

           <div class="col-md-4 col-sm-4 col">

             <label>Ground Hazardous Shipment Charges</label>



           </div>

           <div class="col-md-8 col-sm-8 col">

            <input type="number" id="ground_hazardous_fee" name="ground_hazardous_fee" class="form-control" placeholder="" 
              <?=($level>=2? "":"disabled")?>

            value=<?php echo( (isset($quoteSettings['ground_hazardous_fee']))?$quoteSettings['ground_hazardous_fee']:''); ?>

            >

            <span class="help-block"><small>Enter amount. Leave blank to disable</small></span>

          </div>

        </div>

        <div class="row">

           <div class="col-md-4 col-sm-4 col">

             <label>Air Hazardous Shipment Charges </label>



           </div>

           <div class="col-md-8 col-sm-8 col">

            <input type="number" id="air_hazardous_fee" name="air_hazardous_fee" class="form-control" placeholder="" 
              <?=($level>=2? "":"disabled")?>

            value=<?php echo( (isset($quoteSettings['air_hazardous_fee']))?$quoteSettings['air_hazardous_fee']:''); ?>

            >

            <span class="help-block"><small>Enter amount. Leave blank to disable</small></span>

          </div>

        </div>

      </div>



 <div class="form-group">

          <div class="row">

           <div class="col-md-4 col-sm-4 col">

            <label>Handling Fee</label>

                    

          </div><div class="col-md-8 col-sm-8 col">

           

                      <input type="text" id="handling_fee" name="handling_fee" class="form-control" placeholder="" value=<?php echo( (isset($quoteSettings['handling_fee']))?$quoteSettings['handling_fee']:''); ?>>

                      <span class="help-block"><small>(Enter percentage or amount, leaving it blank will disable this feature.)</small> </span>

          </div>

        </div>

         </div>





</div>