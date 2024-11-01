<?php

global $sp_strings;



$quoteSettings['domestic']['FEDEX_HOME_DELIVERY'] = isset( $qs->domestic->FEDEX_HOME_DELIVERY ) ?esc_textarea( $qs->domestic->FEDEX_HOME_DELIVERY ):'';

$quoteSettings['domestic']['FEDEX_GROUND'] = isset( $qs->domestic->FEDEX_GROUND ) ?esc_textarea( $qs->domestic->FEDEX_GROUND ):'';

$quoteSettings['domestic']['FEDEX_EXPRESS_SAVER'] = isset( $qs->domestic->FEDEX_EXPRESS_SAVER ) ?esc_textarea( $qs->domestic->FEDEX_EXPRESS_SAVER ):'';

$quoteSettings['domestic']['FEDEX_2_DAY'] = isset( $qs->domestic->FEDEX_2_DAY ) ?esc_textarea( $qs->domestic->FEDEX_2_DAY ):'';

$quoteSettings['domestic']['FEDEX_2_DAY_AM'] = isset( $qs->domestic->FEDEX_2_DAY_AM ) ?esc_textarea( $qs->domestic->FEDEX_2_DAY_AM ): '';

$quoteSettings['domestic']['STANDARD_OVERNIGHT'] = isset( $qs->domestic->STANDARD_OVERNIGHT ) ?esc_textarea( $qs->domestic->STANDARD_OVERNIGHT ): '';

$quoteSettings['domestic']['PRIORITY_OVERNIGHT'] = isset( $qs->domestic->PRIORITY_OVERNIGHT ) ?esc_textarea( $qs->domestic->PRIORITY_OVERNIGHT ): '';

$quoteSettings['domestic']['FIRST_OVERNIGHT'] = isset( $qs->domestic->FIRST_OVERNIGHT ) ?esc_textarea( $qs->domestic->FIRST_OVERNIGHT ):'';

$quoteSettings['domestic']['SMART_POST'] = isset( $qs->domestic->SMART_POST ) ?esc_textarea( $qs->domestic->SMART_POST ):'';



$quoteSettings['international']['INTERNATIONAL_DISTRIBUTION_FREIGHT'] = isset( $qs->international->INTERNATIONAL_DISTRIBUTION_FREIGHT ) ?esc_textarea( $qs->international->INTERNATIONAL_DISTRIBUTION_FREIGHT ): '';

$quoteSettings['international']['INTERNATIONAL_ECONOMY'] = isset( $qs->international->INTERNATIONAL_ECONOMY ) ?esc_textarea( $qs->international->INTERNATIONAL_ECONOMY ): '';

$quoteSettings['international']['INTERNATIONAL_ECONOMY_DISTRIBUTION'] = isset( $qs->international->INTERNATIONAL_ECONOMY_DISTRIBUTION ) ?esc_textarea( $qs->international->INTERNATIONAL_ECONOMY_DISTRIBUTION ): '';

$quoteSettings['international']['INTERNATIONAL_ECONOMY_FREIGHT'] = isset( $qs->international->INTERNATIONAL_ECONOMY_FREIGHT ) ?esc_textarea( $qs->international->INTERNATIONAL_ECONOMY_FREIGHT ): '';

$quoteSettings['international']['INTERNATIONAL_FIRST'] = isset( $qs->international->INTERNATIONAL_FIRST ) ?esc_textarea( $qs->international->INTERNATIONAL_FIRST ): '';

$quoteSettings['international']['INTERNATIONAL_PRIORITY'] = isset( $qs->international->INTERNATIONAL_PRIORITY ) ?esc_textarea( $qs->international->INTERNATIONAL_PRIORITY ): '';

$quoteSettings['international']['INTERNATIONAL_PRIORITY_DISTRIBUTION'] = isset( $qs->international->INTERNATIONAL_PRIORITY_DISTRIBUTION ) ?esc_textarea( $qs->international->INTERNATIONAL_PRIORITY_DISTRIBUTION ): '';

$quoteSettings['international']['INTERNATIONAL_PRIORITY_FREIGHT'] = isset( $qs->international->INTERNATIONAL_PRIORITY_FREIGHT ) ?esc_textarea( $qs->international->INTERNATIONAL_PRIORITY_FREIGHT ): '';

$quoteSettings['international']['PRIORITY_OVERNIGHT'] = isset( $qs->international->PRIORITY_OVERNIGHT ) ?esc_textarea( $qs->international->PRIORITY_OVERNIGHT ): '';

$quoteSettings['international']['STANDARD_OVERNIGHT'] = isset( $qs->international->STANDARD_OVERNIGHT ) ?esc_textarea( $qs->international->STANDARD_OVERNIGHT ): '';

$quoteSettings['international']['FEDEX_GROUND'] = isset( $qs->international->FEDEX_GROUND ) ?esc_textarea( $qs->international->FEDEX_GROUND ): '';



$quoteSettings['show_delivery_estimate'] = isset( $qs->show_delivery_estimate ) ?esc_textarea( $qs->show_delivery_estimate) : '';

$quoteSettings['cut_off_time'] = isset( $qs->cut_off_time ) ?esc_textarea( $qs->cut_off_time) : '';

$quoteSettings['show_delivery_estimate'] = isset( $qs->show_delivery_estimate ) ?esc_textarea( $qs->show_delivery_estimate) : '';

$quoteSettings['fulfillment_offset_days'] = isset( $qs->fulfillment_offset_days ) ?esc_textarea( $qs->fulfillment_offset_days) : '';

$quoteSettings['day_monday'] = isset( $qs->day_monday ) ?esc_textarea( $qs->day_monday) : '';

$quoteSettings['day_tuesday'] = isset( $qs->day_tuesday ) ?esc_textarea( $qs->day_tuesday) : '';

$quoteSettings['day_wednesday'] = isset( $qs->day_wednesday ) ?esc_textarea( $qs->day_wednesday) : '';

$quoteSettings['day_thursday'] = isset( $qs->day_thursday ) ?esc_textarea( $qs->day_thursday) : '';

$quoteSettings['day_friday'] = isset( $qs->day_friday ) ?esc_textarea( $qs->day_friday) : '';

$quoteSettings['day_saturday'] = isset( $qs->day_saturday ) ?esc_textarea( $qs->day_saturday) : '';

$quoteSettings['day_sunday'] = isset( $qs->day_sunday ) ?esc_textarea( $qs->day_sunday) : '';

$quoteSettings['residential_delivery'] = isset( $qs->residential_delivery ) ?esc_textarea( $qs->residential_delivery) : '';

$quoteSettings['residential_auto_detection'] = isset( $qs->residential_auto_detection ) ?esc_textarea( $qs->residential_auto_detection) : '';

$quoteSettings['ground_hazardous_only'] = isset( $qs->ground_hazardous_only ) ?esc_textarea( $qs->ground_hazardous_only) : '';

$quoteSettings['ground_hazardous_fee'] = isset( $qs->ground_hazardous_fee ) ?esc_textarea( $qs->ground_hazardous_fee) : '';

$quoteSettings['air_hazardous_fee'] = isset( $qs->air_hazardous_fee ) ?esc_textarea( $qs->air_hazardous_fee) : '';

$quoteSettings['po_box_services'] = isset( $qs->po_box_services ) ?esc_textarea( $qs->po_box_services) : '';

$quoteSettings['handling_fee'] = isset( $qs->handling_fee ) ?esc_textarea( $qs->handling_fee) : '';

$quoteSettings['negotiated_rates'] = isset( $qs->negotiated_rates ) ?esc_textarea( $qs->negotiated_rates) : '';





?>

<input type="hidden" name="carrier_id" value="<?php echo esc_textarea($_POST['carrier_id']); ?>" />

          <div class="form-group">
            <label><b>FedEx Services</b></label>
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
                     <b><?php echo $sp_strings['DomesticServices']; ?></b>
                   </label>
                 </div>

        

      </div>



      <div class="form-group">

        <div class="checkbox checkbox-icon-black p-0">

            <input id="FEDEX_HOME_DELIVERY" name="domestic[FEDEX_HOME_DELIVERY]" value="1" type="checkbox" <?php echo( ($quoteSettings['domestic']['FEDEX_HOME_DELIVERY']==1)?'checked':''); ?>>

            <label for="FEDEX_HOME_DELIVERY">

              <?php echo $sp_strings['FEDEX_HOME_DELIVERY']; ?>

            </label>

          </div>
      </div>

      <div class="form-group">
        <div class="checkbox checkbox-icon-black p-0">

            <input id="FEDEX_GROUND" name="domestic[FEDEX_GROUND]" value="1" type="checkbox" <?php echo( ($quoteSettings['domestic']['FEDEX_GROUND']==1)?'checked':''); ?>>

            <label for="FEDEX_GROUND">

              <?php echo $sp_strings['FEDEX_GROUND']; ?>

            </label>

          </div>

        
      </div>

      <div class="form-group">
        <div class="checkbox checkbox-icon-black p-0">

            <input id="FEDEX_EXPRESS_SAVER" name="domestic[FEDEX_EXPRESS_SAVER]" value="1" type="checkbox" <?php echo( ($quoteSettings['domestic']['FEDEX_EXPRESS_SAVER']==1)?'checked':''); ?>>

            <label for="FEDEX_EXPRESS_SAVER">

              <?php echo $sp_strings['FEDEX_EXPRESS_SAVER']; ?>

            </label>

          </div>



      </div>

      <div class="form-group">

        <div class="checkbox checkbox-icon-black p-0">

            <input id="FEDEX_2_DAY" name="domestic[FEDEX_2_DAY]" value="1" type="checkbox" <?php echo( ($quoteSettings['domestic']['FEDEX_2_DAY']==1)?'checked':''); ?>>

            <label for="FEDEX_2_DAY">

              <?php echo $sp_strings['FEDEX_2_DAY']; ?>

            </label>

          </div>



      </div>

      <div class="form-group">
        <div class="checkbox checkbox-icon-black p-0">

            <input id="FEDEX_2_DAY_AM" name="domestic[FEDEX_2_DAY_AM]" value="1" type="checkbox" <?php echo( ($quoteSettings['domestic']['FEDEX_2_DAY_AM']==1)?'checked':''); ?>>

            <label for="FEDEX_2_DAY_AM">

              <?php echo $sp_strings['FEDEX_2_DAY_AM']; ?>

            </label>

          </div>



      </div>

      <div class="form-group">

        <div class="checkbox checkbox-icon-black p-0">

            <input id="STANDARD_OVERNIGHT" name="domestic[STANDARD_OVERNIGHT]" value="1" type="checkbox" <?php echo( ($quoteSettings['domestic']['STANDARD_OVERNIGHT']==1)?'checked':''); ?>>

            <label for="STANDARD_OVERNIGHT">

              <?php echo $sp_strings['STANDARD_OVERNIGHT']; ?>

            </label>

          </div>



      </div>

      <div class="form-group">

        <div class="checkbox checkbox-icon-black p-0">

            <input id="PRIORITY_OVERNIGHT" name="domestic[PRIORITY_OVERNIGHT]" value="1" type="checkbox" <?php echo( ($quoteSettings['domestic']['PRIORITY_OVERNIGHT']==1)?'checked':''); ?>>

            <label for="PRIORITY_OVERNIGHT">

              <?php echo $sp_strings['PRIORITY_OVERNIGHT']; ?>

            </label>

          </div>



      </div>

      <div class="form-group">

        <div class="checkbox checkbox-icon-black p-0">

            <input id="FIRST_OVERNIGHT" name="domestic[FIRST_OVERNIGHT]" value="1" type="checkbox" <?php echo( ($quoteSettings['domestic']['FIRST_OVERNIGHT']==1)?'checked':''); ?>>

            <label for="FIRST_OVERNIGHT">

              <?php echo $sp_strings['FIRST_OVERNIGHT']; ?>

            </label>

          </div>



      </div>

      <div class="form-group">



      </div>



    </div> 





    <div class="col-md-2 col-sm-2 col">





    </div>







    <div class="col-md-6 col-sm-6 col">

      <div class="form-group">
        <div class="checkbox checkbox-icon-black p-0">
                    <input id="selectAllInternational" type="checkbox" >
                    <label for="selectAllInternational">
                     <b><?php echo $sp_strings['InternationalServices']; ?></b>
                   </label>
                 </div>


      </div>

      



      <div class="form-group">

        <div class="checkbox checkbox-icon-black p-0">

            <input id="INTERNATIONAL_DISTRIBUTION_FREIGHT" name="international[INTERNATIONAL_DISTRIBUTION_FREIGHT]" value="1" type="checkbox" <?php echo( ($quoteSettings['international']['INTERNATIONAL_DISTRIBUTION_FREIGHT']==1)?'checked':''); ?>>

            <label for="INTERNATIONAL_DISTRIBUTION_FREIGHT">

              <?php echo $sp_strings['INTERNATIONAL_DISTRIBUTION_FREIGHT']; ?>

            </label>

          </div>



      </div>

      <div class="form-group">

        <div class="checkbox checkbox-icon-black p-0">

            <input id="INTERNATIONAL_ECONOMY" name="international[INTERNATIONAL_ECONOMY]" value="1" type="checkbox" <?php echo( ($quoteSettings['international']['INTERNATIONAL_ECONOMY']==1)?'checked':''); ?>>

            <label for="INTERNATIONAL_ECONOMY">

              <?php echo $sp_strings['INTERNATIONAL_ECONOMY']; ?>

            </label>

          </div>


      </div>

      <div class="form-group">

        <div class="checkbox checkbox-icon-black p-0">

            <input id="INTERNATIONAL_ECONOMY_DISTRIBUTION" name="international[INTERNATIONAL_ECONOMY_DISTRIBUTION]" value="1" type="checkbox" <?php echo( ($quoteSettings['international']['INTERNATIONAL_ECONOMY_DISTRIBUTION']==1)?'checked':''); ?>>

            <label for="INTERNATIONAL_ECONOMY_DISTRIBUTION">

              <?php echo $sp_strings['INTERNATIONAL_ECONOMY_DISTRIBUTION']; ?>

            </label>

          </div>



      </div>

      <div class="form-group">

        <div class="checkbox checkbox-icon-black p-0">

            <input id="INTERNATIONAL_ECONOMY_FREIGHT" name="international[INTERNATIONAL_ECONOMY_FREIGHT]" value="1" type="checkbox" <?php echo( ($quoteSettings['international']['INTERNATIONAL_ECONOMY_FREIGHT']==1)?'checked':''); ?>>

            <label for="INTERNATIONAL_ECONOMY_FREIGHT">

              <?php echo $sp_strings['INTERNATIONAL_ECONOMY_FREIGHT']; ?>

            </label>

          </div>



      </div>

      <div class="form-group">

        <div class="checkbox checkbox-icon-black p-0">

            <input id="INTERNATIONAL_FIRST" name="international[INTERNATIONAL_FIRST]" value="1" type="checkbox" <?php echo( ($quoteSettings['international']['INTERNATIONAL_FIRST']==1)?'checked':''); ?>>

            <label for="INTERNATIONAL_FIRST">

              <?php echo $sp_strings['INTERNATIONAL_FIRST']; ?>

            </label>

          </div>



      </div>

      <div class="form-group">

        <div class="checkbox checkbox-icon-black p-0">

            <input id="INTERNATIONAL_PRIORITY" name="international[INTERNATIONAL_PRIORITY]" value="1" type="checkbox" <?php echo( ($quoteSettings['international']['INTERNATIONAL_PRIORITY']==1)?'checked':''); ?>>

            <label for="INTERNATIONAL_PRIORITY">

              <?php echo $sp_strings['INTERNATIONAL_PRIORITY']; ?>

            </label>

          </div>

      </div>

      <div class="form-group">

        <div class="checkbox checkbox-icon-black p-0">

            <input id="INTERNATIONAL_PRIORITY_DISTRIBUTION" name="international[INTERNATIONAL_PRIORITY_DISTRIBUTION]" value="1" type="checkbox" <?php echo( ($quoteSettings['international']['INTERNATIONAL_PRIORITY_DISTRIBUTION']==1)?'checked':''); ?>>

            <label for="INTERNATIONAL_PRIORITY_DISTRIBUTION">

              <?php echo $sp_strings['INTERNATIONAL_PRIORITY_DISTRIBUTION']; ?>

            </label>

          </div>


      </div>

      <div class="form-group">

        <div class="checkbox checkbox-icon-black p-0">

            <input id="INTERNATIONAL_PRIORITY_FREIGHT" name="international[INTERNATIONAL_PRIORITY_FREIGHT]" value="1" type="checkbox" <?php echo( ($quoteSettings['international']['INTERNATIONAL_PRIORITY_FREIGHT']==1)?'checked':''); ?>>

            <label for="INTERNATIONAL_PRIORITY_FREIGHT">

              <?php echo $sp_strings['INTERNATIONAL_PRIORITY_FREIGHT']; ?>

            </label>

          </div>



      </div>

      <div class="form-group">

        <div class="checkbox checkbox-icon-black p-0">

            <input id="PRIORITY_OVERNIGHTi" name="international[PRIORITY_OVERNIGHT]" value="1" type="checkbox" <?php echo( ($quoteSettings['international']['PRIORITY_OVERNIGHT']==1)?'checked':''); ?>>

            <label for="PRIORITY_OVERNIGHTi">

              <?php echo $sp_strings['PRIORITY_OVERNIGHT']; ?>

            </label>

          </div>


      </div>

      <div class="form-group">

        <div class="checkbox checkbox-icon-black p-0">

            <input id="STANDARD_OVERNIGHTi" name="international[STANDARD_OVERNIGHT]" value="1" type="checkbox" <?php echo( ($quoteSettings['international']['STANDARD_OVERNIGHT']==1)?'checked':''); ?>>

            <label for="STANDARD_OVERNIGHTi">

              <?php echo $sp_strings['STANDARD_OVERNIGHT']; ?>

            </label>

          </div>



      </div>

      <div class="form-group">

        <div class="checkbox checkbox-icon-black p-0">

            <input id="FEDEX_GROUNDi" name="international[FEDEX_GROUND]" value="1" type="checkbox" <?php echo( ($quoteSettings['international']['FEDEX_GROUND']==1)?'checked':''); ?>>

            <label for="FEDEX_GROUNDi">

              <?php echo $sp_strings['FEDEX_GROUND']; ?>

            </label>

          </div>



      </div>

      

    </div>

  </div>

<!-- add later -->
        <div class="form-group">

          <div class="checkbox checkbox-icon-black p-0">

            <input id="show_delivery_estimate" name="show_delivery_estimate" value="1" type="checkbox" <?php echo( ($quoteSettings['show_delivery_estimate']==1)?'checked':''); ?>>

            <label for="show_delivery_estimate">

              <?php echo $sp_strings['show_delivery_estimate']; ?>

            </label>

          </div>

        </div>





<div class="form-group">

  <label><b>Quote settings for residential address </b></label>

  

  <div class="checkbox checkbox-icon-black p-0">

    <input id="residential_delivery" name="residential_delivery" value="1" type="checkbox" <?php echo( ($quoteSettings['residential_delivery']==1)?'checked':''); ?>>

    <label for="residential_delivery">

      Always offer residential address delivery

    </label>

  </div>

  

  <div class="checkbox checkbox-icon-black p-0">

    <input id="residential_auto_detection" name="residential_auto_detection" value="1" type="checkbox"  <?php echo( ($quoteSettings['residential_auto_detection']==1)?'checked':''); ?> <?=($level>=2? "":"disabled")?>>

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

  <label><b>Other settings</b></label>





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

<div class="form-group">

  <div class="row">

   <div class="col-md-4 col-sm-4 col">

     <label>Negotiated Rates Settings</label>



   </div>

   <div class="col-md-8 col-sm-8 col">

    <div class="radio p-0">

      <input type="radio" name="negotiated_rates" id="negotiated_rates1" value="1" <?php echo( ($quoteSettings['negotiated_rates']=="1")?'checked':''); ?>>

      <label for="negotiated_rates1">

        <p>Display Negotiated Rates</p>

      </label>

    </div>

    <div class="radio p-0">

      <input type="radio" name="negotiated_rates" id="negotiated_rates2" value="2" <?php echo( ($quoteSettings['negotiated_rates']=="2")?'checked':''); ?>>

      <label for="negotiated_rates2">

        <p>Do not display Negotiated Rates</p>

      </label>

    </div>

  </div>

</div>

</div>



</div>

