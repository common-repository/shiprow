<?php

global $sp_strings;



$quoteSettings["carrier_label"]= isset( $qs->carrier_label ) ?esc_textarea( $qs->carrier_label) : '';

$quoteSettings['show_delivery_estimate']= isset( $qs->show_delivery_estimate ) ?esc_textarea( $qs->show_delivery_estimate) : '';

$quoteSettings['show_guranteed_options']= isset( $qs->show_guranteed_options ) ?esc_textarea( $qs->show_guranteed_options) : '';

$quoteSettings['fulfillment_offset_days']= isset( $qs->fulfillment_offset_days ) ?esc_textarea( $qs->fulfillment_offset_days) : '';

$quoteSettings['cut_off_time']= isset( $qs->cut_off_time ) ?esc_textarea( $qs->cut_off_time) : '';

$quoteSettings['holdAtTerminal']= isset( $qs->holdAtTerminal ) ?esc_textarea( $qs->holdAtTerminal) : '';

$quoteSettings['holdAtTerminalFee']= isset( $qs->holdAtTerminalFee ) ?esc_textarea( $qs->holdAtTerminalFee) : '';

$quoteSettings['handling_fee']= isset( $qs->handling_fee ) ?esc_textarea( $qs->handling_fee) : '';

$quoteSettings['only_po_box_services']= isset( $qs->only_po_box_services ) ?esc_textarea( $qs->only_po_box_services) : '';

$quoteSettings['residential_delivery']= isset( $qs->residential_delivery ) ?esc_textarea( $qs->residential_delivery) : '';

$quoteSettings['residential_auto_detection']= isset( $qs->residential_auto_detection ) ?esc_textarea( $qs->residential_auto_detection) : '';

$quoteSettings['lift_gate_delivery']= isset( $qs->lift_gate_delivery ) ?esc_textarea( $qs->lift_gate_delivery) : '';

$quoteSettings['carrier_lift_gate_delivery_as_option']= isset( $qs->carrier_lift_gate_delivery_as_option ) ?esc_textarea( $qs->carrier_lift_gate_delivery_as_option) : '';

$quoteSettings['liftgate_auto_detection']= isset( $qs->liftgate_auto_detection ) ?esc_textarea( $qs->liftgate_auto_detection) : '';

$quoteSettings['orderNote']= isset( $qs->orderNote ) ?esc_textarea( $qs->orderNote) : '';





?>

<input type="hidden" name="carrier_id" value="<?php echo esc_textarea($_POST['carrier_id']); ?>" />

<div class="row">

  <div class="col-md-6 col-sm-6">

   <div class="form-group">

    <label><?php echo $sp_strings['mark_as']; ?></label>

    <?php 

    echo '<input type="text" id="carrier_label" name="carrier_label" class="form-control" placeholder="" value="'.$quoteSettings["carrier_label"].'">' 

    ?>



    <span class="help-block"><small><?php echo $sp_strings['help_carrier_label']; ?></small> </span>

  </div>



  <div class="form-group">

    <div class="checkbox checkbox-icon-black p-0">

      <input id="show_delivery_estimate" name="show_delivery_estimate" value="1" type="checkbox" <?php echo( ($quoteSettings['show_delivery_estimate']==1)?'checked':''); ?>>

      <label for="show_delivery_estimate">

        <?php echo $sp_strings['show_delivery_estimate']; ?>

      </label>

    </div>

  </div>

  <div class="form-group">

    <div class="checkbox checkbox-icon-black p-0">

      <input id="show_guranteed_options" name="show_guranteed_options" value="1" type="checkbox" <?php echo( ($quoteSettings['show_guranteed_options']==1)?'checked':''); ?>>

      <label for="show_guranteed_options">

        <?php echo $sp_strings['show_guranteed_options']; ?>

      </label>

    </div>

  </div>


  <div class="form-group">



    <label><?php echo $sp_strings['handling_fee']; ?></label>

    <input type="text" id="handling_fee" name="handling_fee" class="form-control" placeholder="" value=<?php echo( (isset($quoteSettings['handling_fee']))?$quoteSettings['handling_fee']:''); ?>>

    <span class="help-block"><small><?php echo $sp_strings['help_handling_fee']; ?></small> </span>

  </div>

  <div class="form-group">




  </div>





</div>



<div class="col-md-6 col-sm-6">

 <div class="form-group">

  <label><b><?php echo $sp_strings['QuoteSettingsHomeAddress']; ?></b></label>





  <div class="checkbox checkbox-icon-black p-0">

    <input id="residential_delivery" name="residential_delivery" value="1" type="checkbox" <?php echo( ($quoteSettings['residential_delivery']==1)?'checked':''); ?>>

    <label for="residential_delivery">

      <?php echo $sp_strings['residential_delivery']; ?>

    </label>

  </div>



  <div class="checkbox checkbox-icon-black p-0">

    <input id="residential_auto_detection" name="residential_auto_detection" value="1" type="checkbox" <?php echo( ($quoteSettings['residential_auto_detection']==1)?'checked':''); ?> <?=($level>=2? "":"disabled")?>>

    <label for="residential_auto_detection">

        <?php echo $sp_strings['residential_auto_detection']; ?> <span class="text-warning">( US only )</span>
        &nbsp <a href="https://shiprow.com/admin/index.php?module=plans&action=load" target="_blank" class="required"><span class="text-danger "><?=($level>=2?'':'Standard plan required')?></span></a>
    </label>

  </div>

</div>







<div class="form-group">

  <label><b><?php echo $sp_strings['TailLiftServiceDockSettings']; ?></b></label>





  <div class="checkbox checkbox-icon-black p-0" >

    <input id="lift_gate_delivery" name="lift_gate_delivery" value=1 type="checkbox" <?php echo( ($quoteSettings['lift_gate_delivery']==1)?'checked':''); ?><?=($level>=2? "":"disabled")?>> 

    <label for="lift_gate_delivery">

      <?php echo $sp_strings['lift_gate_delivery']; ?> &nbsp <a href="https://shiprow.com/admin/index.php?module=plans&action=load" target="_blank" class="required"><span class="text-danger "><?=($level>=2?'':'Standard plan required')?></span></a>

    </label>

  </div>



  <div class="checkbox checkbox-icon-black p-0">

    <input id="carrier_lift_gate_delivery_as_option" name="carrier_lift_gate_delivery_as_option" value="1" type="checkbox" <?php echo( ($quoteSettings['carrier_lift_gate_delivery_as_option']==1)?'checked':''); ?>>

    <label for="carrier_lift_gate_delivery_as_option">

      <?php echo $sp_strings['carrier_lift_gate_delivery_as_option']; ?>

    </label>

  </div>



  <div class="checkbox checkbox-icon-black p-0">

    <input id="liftgate_auto_detection" name="liftgate_auto_detection" value="1" type="checkbox" 

    <?php echo( ($quoteSettings['residential_auto_detection']==1)?'':'disabled'); ?> 

    <?php echo( ($quoteSettings['liftgate_auto_detection']==1)?'checked':''); ?>

    >

    <label for="liftgate_auto_detection">

      <?php echo $sp_strings['liftgate_auto_detection']; ?>

    </label>

  </div>

</div>


</div>





</div>

