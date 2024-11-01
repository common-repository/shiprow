<?php

$quoteSettings['domestic']['UPS_GROUND'] = isset( $qs->domestic->UPS_GROUND ) ?esc_textarea( $qs->domestic->UPS_GROUND) : '';

$quoteSettings['domestic']['UPS_2ND_DAY'] = isset( $qs->domestic->UPS_2ND_DAY ) ?esc_textarea( $qs->domestic->UPS_2ND_DAY) : '';

$quoteSettings['domestic']['UPS_2ND_DAY_AM'] = isset( $qs->domestic->UPS_2ND_DAY_AM ) ?esc_textarea( $qs->domestic->UPS_2ND_DAY_AM) : '';

$quoteSettings['domestic']['UPS_NEXT_DAY_AIR_SAVER'] = isset( $qs->domestic->UPS_NEXT_DAY_AIR_SAVER ) ?esc_textarea( $qs->domestic->UPS_NEXT_DAY_AIR_SAVER) : '';

$quoteSettings['domestic']['UPS_NEXT_DAY_AIR'] = isset( $qs->domestic->UPS_NEXT_DAY_AIR ) ?esc_textarea( $qs->domestic->UPS_NEXT_DAY_AIR) : '';

$quoteSettings['domestic']['UPS_NEXT_DAY_AIR_EARLY'] = isset( $qs->domestic->UPS_NEXT_DAY_AIR_EARLY ) ?esc_textarea( $qs->domestic->UPS_NEXT_DAY_AIR_EARLY) : '';

$quoteSettings['domestic']['UPS_THREE_DAY_SELECT'] = isset( $qs->domestic->UPS_THREE_DAY_SELECT ) ?esc_textarea( $qs->domestic->UPS_THREE_DAY_SELECT) : '';





$quoteSettings['international']['UPS_STANDARD_INTERNATIONAL'] = isset( $qs->international->UPS_STANDARD_INTERNATIONAL ) ?esc_textarea(  $qs->international->UPS_STANDARD_INTERNATIONAL) : '';

$quoteSettings['international']['UPS_WORLDWIDE_EXPEDITED'] = isset( $qs->international->UPS_WORLDWIDE_EXPEDITED ) ?esc_textarea(  $qs->international->UPS_WORLDWIDE_EXPEDITED) : '';

$quoteSettings['international']['UPS_WORLDWIDE_SAVER'] = isset( $qs->international->UPS_WORLDWIDE_SAVER ) ?esc_textarea(  $qs->international->UPS_WORLDWIDE_SAVER) : '';

$quoteSettings['international']['UPS_WORLDWIDE_EXPRESS'] = isset( $qs->international->UPS_WORLDWIDE_EXPRESS ) ?esc_textarea(  $qs->international->UPS_WORLDWIDE_EXPRESS) : '';

$quoteSettings['international']['UPS_WORLDWIDE_EXPRESS_PLUS'] = isset( $qs->international->UPS_WORLDWIDE_EXPRESS_PLUS ) ?esc_textarea(  $qs->international->UPS_WORLDWIDE_EXPRESS_PLUS) : '';



$quoteSettings['show_delivery_estimate'] = isset($qs->show_delivery_estimate ) ?esc_textarea( $qs->show_delivery_estimate) : '';

$quoteSettings['cut_off_time'] = isset($qs->cut_off_time ) ?esc_textarea( $qs->cut_off_time) : '';

$quoteSettings['fulfillment_offset_days'] = isset($qs->fulfillment_offset_days ) ?esc_textarea( $qs->fulfillment_offset_days) : '';

$quoteSettings['day_monday'] = isset($qs->day_monday ) ?esc_textarea( $qs->day_monday) : '';

$quoteSettings['day_tuesday'] = isset($qs->day_tuesday ) ?esc_textarea( $qs->day_tuesday) : '';

$quoteSettings['day_wednesday'] = isset($qs->day_wednesday ) ?esc_textarea( $qs->day_wednesday) : '';

$quoteSettings['day_thursday'] = isset($qs->day_thursday ) ?esc_textarea( $qs->day_thursday) : '';

$quoteSettings['day_friday'] = isset($qs->day_friday ) ?esc_textarea( $qs->day_friday) : '';

$quoteSettings['day_saturday'] = isset($qs->day_saturday ) ?esc_textarea( $qs->day_saturday) : '';

$quoteSettings['day_sunday'] = isset($qs->day_sunday ) ?esc_textarea( $qs->day_sunday) : '';

$quoteSettings['residential_delivery'] = isset($qs->residential_delivery ) ?esc_textarea( $qs->residential_delivery) : '';

$quoteSettings['residential_auto_detection'] = isset($qs->residential_auto_detection ) ?esc_textarea( $qs->residential_auto_detection) : '';

$quoteSettings['po_box_services'] = isset($qs->po_box_services ) ?esc_textarea( $qs->po_box_services) : '';

$quoteSettings['ground_hazardous_only'] = isset($qs->ground_hazardous_only ) ?esc_textarea( $qs->ground_hazardous_only) : '';

$quoteSettings['ground_hazardous_fee'] = isset($qs->ground_hazardous_fee ) ?esc_textarea( $qs->ground_hazardous_fee) : '';

$quoteSettings['air_hazardous_fee'] = isset($qs->air_hazardous_fee ) ?esc_textarea( $qs->air_hazardous_fee) : '';

$quoteSettings['handling_fee'] = isset($qs->handling_fee ) ?esc_textarea( $qs->handling_fee) : '';

$quoteSettings['negotiated_rates'] = isset($qs->negotiated_rates ) ?esc_textarea( $qs->negotiated_rates) : '';













?>

<input type="hidden" name="carrier_id" value="<?php echo esc_textarea($_POST['carrier_id']); ?>" />

          <div class="form-group">
            <label><b>UPS Services</b></label>
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

            <input id="UPS_2ND_DAY" name="domestic[UPS_2ND_DAY]" value="1" type="checkbox" <?php echo( ($quoteSettings['domestic']['UPS_2ND_DAY']==1)?'checked':''); ?>>

            <label for="UPS_2ND_DAY">

              UPS 2nd Day Air

            </label>

          </div>


    </div>

    <div class="form-group">

      <div class="checkbox checkbox-icon-black p-0">

            <input id="UPS_2ND_DAY_AM" name="domestic[UPS_2ND_DAY_AM]" value="1" type="checkbox" <?php echo( ($quoteSettings['domestic']['UPS_2ND_DAY_AM']==1)?'checked':''); ?>>

            <label for="UPS_2ND_DAY_AM">

              UPS 2nd Day Air A.M

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

    <div class="form-group">

      <div class="checkbox checkbox-icon-black p-0">

            <input id="UPS_THREE_DAY_SELECT" name="domestic[UPS_THREE_DAY_SELECT]" value="1" type="checkbox" <?php echo( ($quoteSettings['domestic']['UPS_THREE_DAY_SELECT']==1)?'checked':''); ?>>

            <label for="UPS_THREE_DAY_SELECT">

              UPS 3 Day Select

            </label>

          </div>


    </div>

    



</div> 





<div class="col-md-2 col-sm-2 col">





</div>







<div class="col-md-6 col-sm-6 col">

   <div class="form-group">
    <div class="checkbox checkbox-icon-black p-0">
                    <input id="selectAllInternational" type="checkbox" >
                    <label for="selectAllInternational">
                     <b>International Services</b>
                   </label>
                 </div>

  </div>

  <div class="form-group">

    <div class="checkbox checkbox-icon-black p-0">

            <input id="UPS_STANDARD_INTERNATIONAL" name="international[UPS_STANDARD_INTERNATIONAL]" value="1" type="checkbox" <?php echo( ($quoteSettings['international']['UPS_STANDARD_INTERNATIONAL']==1)?'checked':''); ?>>

            <label for="UPS_STANDARD_INTERNATIONAL">

              UPS Standard

            </label>

          </div>


  </div>

  <div class="form-group">

      <div class="checkbox checkbox-icon-black p-0">

            <input id="UPS_WORLDWIDE_EXPEDITED" name="international[UPS_WORLDWIDE_EXPEDITED]" value="1" type="checkbox" <?php echo( ($quoteSettings['international']['UPS_WORLDWIDE_EXPEDITED']==1)?'checked':''); ?>>

            <label for="UPS_WORLDWIDE_EXPEDITED">

              UPS Worldwide Expedited

            </label>

          </div>


  </div>

  <div class="form-group">

      <div class="checkbox checkbox-icon-black p-0">

            <input id="UPS_WORLDWIDE_SAVER" name="international[UPS_WORLDWIDE_SAVER]" value="1" type="checkbox" <?php echo( ($quoteSettings['international']['UPS_WORLDWIDE_SAVER']==1)?'checked':''); ?>>

            <label for="UPS_WORLDWIDE_SAVER">

              UPS Worldwide Saver

            </label>

          </div>


  </div>

  <div class="form-group">

    <div class="checkbox checkbox-icon-black p-0">

            <input id="UPS_WORLDWIDE_EXPRESS" name="international[UPS_WORLDWIDE_EXPRESS]" value="1" type="checkbox" <?php echo( ($quoteSettings['international']['UPS_WORLDWIDE_EXPRESS']==1)?'checked':''); ?>>

            <label for="UPS_WORLDWIDE_EXPRESS">

              UPS Worldwide Express

            </label>

          </div>



  </div>

  <div class="form-group">

    <div class="checkbox checkbox-icon-black p-0">

            <input id="UPS_WORLDWIDE_EXPRESS_PLUS" name="international[UPS_WORLDWIDE_EXPRESS_PLUS]" value="1" type="checkbox" <?php echo( ($quoteSettings['international']['UPS_WORLDWIDE_EXPRESS_PLUS']==1)?'checked':''); ?>>

            <label for="UPS_WORLDWIDE_EXPRESS_PLUS">

              UPS Worldwide Express Plus

            </label>

          </div>



  </div>

  

  

</div>

</div>


<div class="form-group">&nbsp</div>

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

  <label><b>Quote settings for residential address</b></label>

  

  <div class="checkbox checkbox-icon-black p-0">

    <input id="residential_delivery" name="residential_delivery" value="1" type="checkbox" <?php echo( ($quoteSettings['residential_delivery']==1)?'checked':''); ?>>

    <label for="residential_delivery">

      Always offer residential address delivery

  </label>

</div>



<div class="checkbox checkbox-icon-black p-0">

    <input id="residential_auto_detection" name="residential_auto_detection" value="1" type="checkbox"  <?php echo( ($quoteSettings['residential_auto_detection']==1)?'checked':''); ?>  <?=($level>=2? "":"disabled")?>
  <?=($level>=2? "":"disabled")?>
 >

    <label for="residential_auto_detection">

      Automatic detection of residential address <span class="text-warning">( US only ) &nbsp <a href="https://shiprow.com/admin/index.php?module=plans&action=load" target="_blank" class="required"><span class="text-danger "><?=($level>=2?'':'Standard plan required')?></span></a></span>

  </label>

</div>

</div>



<div class="form-group">

  <label><b>Hazardous products settings</b></label>

  <div class="row">

     <div class="col-md-4 col-sm-4 col">

        <label>Only Display ground services hazardous shipments on checkout page &nbsp <a href="https://shiprow.com/admin/index.php?module=plans&action=load" target="_blank" class="required"><span class="text-danger "><?=($level>=2?'':'Standard plan required')?></span></a></span></label> 

    </div>

    <div class="col-md-1 col-sm-1 col">

        <div class="checkbox checkbox-icon-black p-0">

          <input id="ground_hazardous_only" name="ground_hazardous_only" value="1" type="checkbox"  <?php echo( ($quoteSettings['ground_hazardous_only']==1)?'checked':''); ?>   <?=($level>=2? "":"disabled")?>
>

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

  <label><b>Rate Settings</b></label>

  <div class="radio p-0">


    <input type="radio" name="negotiated_rates" id="negotiated_rates1" value="0" <?php echo( ($quoteSettings['negotiated_rates']=="0" OR (empty($quoteSettings['negotiated_rates'])))?'checked':''); ?>>

    <label for="negotiated_rates1">

      <p>Use my negotiated rates</p>

  </label>

</div>

<div class="radio p-0">

    <input type="radio" name="negotiated_rates" id="negotiated_rates2" value="1" <?php echo( ($quoteSettings['negotiated_rates']=="1")?'checked':''); ?>>

    <label for="negotiated_rates2">

      <p>Use retail(list) rates</p>

  </label>

</div>

</div>

</div>



</div>