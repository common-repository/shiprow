 <?php

global $sp_strings;





$quoteSettings["carrier_label"] = isset( $qs->carrier_label ) ?esc_textarea( $qs->carrier_label)  : '';

$quoteSettings['FEDEX_FREIGHT_ECONOMY'] = isset( $qs->FEDEX_FREIGHT_ECONOMY ) ?esc_textarea( $qs->FEDEX_FREIGHT_ECONOMY)  : '';

$quoteSettings['FEDEX_FREIGHT_PRIORITY'] = isset( $qs->FEDEX_FREIGHT_PRIORITY ) ?esc_textarea( $qs->FEDEX_FREIGHT_PRIORITY)  : '';

$quoteSettings['show_delivery_estimate'] = isset( $qs->show_delivery_estimate ) ?esc_textarea( $qs->show_delivery_estimate)  : '';

$quoteSettings['holdAtTerminal'] = isset( $qs->holdAtTerminal ) ?esc_textarea( $qs->holdAtTerminal)  : '';

$quoteSettings['holdAtTerminalFee'] = isset( $qs->holdAtTerminalFee ) ?esc_textarea( $qs->holdAtTerminalFee)  : '';

$quoteSettings['handling_fee'] = isset( $qs->handling_fee ) ?esc_textarea( $qs->handling_fee)  : '';

$quoteSettings['discount_enable'] = isset( $qs->discount_enable ) ?esc_textarea( $qs->discount_enable)  : '';

$quoteSettings['promotional_discount'] = isset( $qs->promotional_discount ) ?esc_textarea( $qs->promotional_discount)  : '';

$quoteSettings['po_box_services'] = isset( $qs->po_box_services ) ?esc_textarea( $qs->po_box_services)  : '';

$quoteSettings['show_delivery_estimate'] = isset( $qs->show_delivery_estimate ) ?esc_textarea( $qs->show_delivery_estimate)  : '';

$quoteSettings['cut_off_time'] = isset( $qs->cut_off_time ) ?esc_textarea( $qs->cut_off_time)  : '';

$quoteSettings['fulfillment_offset_days'] = isset( $qs->fulfillment_offset_days ) ?esc_textarea( $qs->fulfillment_offset_days)  : '';

$quoteSettings['residential_delivery'] = isset( $qs->residential_delivery ) ?esc_textarea( $qs->residential_delivery)  : '';

$quoteSettings['residential_auto_detection'] = isset( $qs->residential_auto_detection ) ?esc_textarea( $qs->residential_auto_detection)  : '';

$quoteSettings['lift_gate_delivery'] = isset( $qs->lift_gate_delivery ) ?esc_textarea( $qs->lift_gate_delivery)  : '';

$quoteSettings['carrier_lift_gate_delivery_as_option'] = isset( $qs->carrier_lift_gate_delivery_as_option ) ?esc_textarea( $qs->carrier_lift_gate_delivery_as_option)  : '';

$quoteSettings['liftgate_auto_detection'] = isset( $qs->liftgate_auto_detection ) ?esc_textarea( $qs->liftgate_auto_detection)  : '';

$quoteSettings['orderNote'] = isset( $qs->orderNote ) ?esc_textarea( $qs->orderNote)  : '';



 ?>

<input type="hidden" name="carrier_id" value="<?php echo esc_textarea($_POST['carrier_id']); ?>" />


          <div class="form-group">
            <label><b>FedEx Services</b></label>
          </div>
          <div class="form-group">
            <label><p>Please select the required services and their detail will be shown on the checkout page and order page.</p></label>
          </div>

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

            <label><b><?php echo $sp_strings['ChooseQuoteService']; ?></b></label>       

            <div class="checkbox checkbox-icon-black p-0">

                <input id="FEDEX_FREIGHT_ECONOMY" type="checkbox" name="FEDEX_FREIGHT_ECONOMY" <?php echo( ($quoteSettings['FEDEX_FREIGHT_ECONOMY']== 1 ) ? 'checked' : '' ); ?> value="1">

                <label for="FEDEX_FREIGHT_ECONOMY" >

                    <?php echo $sp_strings['FEDEX_FREIGHT_ECONOMY']; ?>

                </label>

            </div>





            <div class="checkbox checkbox-icon-black p-0">

                <input id="FEDEX_FREIGHT_PRIORITY"  name="FEDEX_FREIGHT_PRIORITY" type="checkbox" <?php echo( ($quoteSettings['FEDEX_FREIGHT_PRIORITY']== 1 ) ? 'checked':'' ); ?> value="1">

                <label for="FEDEX_FREIGHT_PRIORITY">

                    <?php echo $sp_strings['FEDEX_FREIGHT_PRIORITY']; ?>

                </label>

            </div>

            <div class="checkbox checkbox-icon-black p-0">

                <input id="selectAll" type="checkbox" name="selectAll" value="1"

                <?php //to enabel select all if all check boxees got are selected

                echo( 

                    (($quoteSettings['FEDEX_FREIGHT_ECONOMY']==1)&($quoteSettings['FEDEX_FREIGHT_PRIORITY']==1)==1)?'checked':''

                ); 

                ?>

                >

                <label for="selectAll">

                    <?php echo $sp_strings['BOTH']; ?>

                </label>

            </div>

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

                <label><?php echo $sp_strings['handling_fee']; ?></label>

                <input type="text" id="handling_fee"  name="handling_fee" class="form-control" placeholder="" value=<?php echo( (isset($quoteSettings['handling_fee']))?$quoteSettings['handling_fee']:''); ?>>

                <span class="help-block"><small><?php echo $sp_strings['help_handling_fee']; ?></small> </span>

            </div>

            <div class="form-group">

                <label><?php echo $sp_strings['MarkdownDiscount']; ?></label>





                <div class="radio p-0">

                    <input type="radio" name="discount_enable" id="discount_enable1" value="1" <?php echo( ($quoteSettings['discount_enable']=="1")?'checked':''); ?>>

                    <label for="discount_enable1">

                        <p><?php echo $sp_strings['discount_enable1']; ?></p>

                    </label>

                </div>

                <div class="radio p-0">

                    <input type="radio" name="discount_enable" id="discount_enable2" value="2" <?php echo( ($quoteSettings['discount_enable']=="2")?'checked':''); ?>>

                    <label for="discount_enable2">

                        <p><?php echo $sp_strings['discount_enable2']; ?></p>

                    </label>

                </div>



                <input type="number" min="0" oninput="validity.valid||(value='');" id="promotional_discount" name="promotional_discount" class="form-control" placeholder="" 

                <?php echo( ($quoteSettings['discount_enable']=="2")?'':'disabled'); ?>

                value=<?php echo( (isset($quoteSettings['promotional_discount']))?$quoteSettings['promotional_discount']:''); ?>>

                <span class="help-block"><small><?php echo $sp_strings['promotional_discount']; ?></small></span>



            </div>






        </div>

        <div class="col-md-6 col-sm-6">




          <div class="form-group">

              <label><b><?php echo $sp_strings['QuoteSettingsHomeAddress']; ?></b></label>



              <div class="checkbox checkbox-icon-black p-0">

                  <input id="residential_delivery" name="residential_delivery" type="checkbox" value="1" <?php echo( ($quoteSettings['residential_delivery']==1)?'checked':''); ?>>

                  <label for="residential_delivery">

                      <?php echo $sp_strings['residential_delivery']; ?>

                  </label>

              </div>



              <div class="checkbox checkbox-icon-black p-0">

                  <input id="residential_auto_detection" name="residential_auto_detection" type="checkbox" value="1"  <?php echo( ($quoteSettings['residential_auto_detection']==1)?'checked':''); ?> <?=($level>=2? "":"disabled")?>>

                  <label for="residential_auto_detection">

                     <p><?php echo $sp_strings['residential_auto_detection']; ?> <span class="text-warning">( US only )</span> &nbsp <a href="https://shiprow.com/admin/index.php?module=plans&action=load" target="_blank" class="required"><span class="text-danger "><?=($level>=2?'':'Standard plan required')?></span></a></p>

                  </label>

              </div>

          </div>



          <div class="form-group">

              <label><b><?php echo $sp_strings['TailLiftServiceDockSettings']; ?></b></label>



              

              <div class="checkbox checkbox-icon-black p-0">

                  <input id="lift_gate_delivery" type="checkbox" value="1" name="lift_gate_delivery" <?php echo( ($quoteSettings['lift_gate_delivery']==1)?'checked':''); ?>>

                  <label for="lift_gate_delivery">

                      <p><?php echo $sp_strings['lift_gate_delivery']; ?></p>

                  </label>

              </div>



              <div class="checkbox checkbox-icon-black p-0">

                  <input id="carrier_lift_gate_delivery_as_option" name="carrier_lift_gate_delivery_as_option" type="checkbox" value="1" <?php echo( ($quoteSettings['carrier_lift_gate_delivery_as_option']==1)?'checked':''); ?> <?=($level>=2? "":"disabled")?>>

                  <label for="carrier_lift_gate_delivery_as_option">

                      <?php echo $sp_strings['carrier_lift_gate_delivery_as_option']; ?>
                      &nbsp <a href="https://shiprow.com/admin/index.php?module=plans&action=load" target="_blank" class="required"><span class="text-danger "><?=($level>=2?'':'Standard plan required')?></span></a>

                  </label>

              </div>



              <div class="checkbox checkbox-icon-black p-0">

                  <input id="liftgate_auto_detection" name="liftgate_auto_detection" value="1" type="checkbox" 

                  <?php echo( ($quoteSettings['residential_auto_detection']==1)?'':'disabled'); ?> 

                  <?php echo( ($quoteSettings['liftgate_auto_detection']==1)?'checked':''); ?>>

                  <label for="liftgate_auto_detection">

                      <?php echo $sp_strings['liftgate_auto_detection']; ?> 

                  </label>

              </div>

          </div>





      </div>

  </div>

