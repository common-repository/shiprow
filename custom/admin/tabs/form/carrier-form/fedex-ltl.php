 <?php

global $sp_strings;

//main settings

$billingAccountNumber = isset( $settings->account_number ) ?esc_textarea( $settings->account_number ): '';

$meterNumber = isset( $settings->username ) ?esc_textarea( $settings->username ): '';

$password = isset( $settings->password ) ?esc_textarea( $settings->password ): '';

$authenticationKey= isset( $settings->authentication_key ) ?esc_textarea( $settings->authentication_key ): '';

$shipperAccountNumber = isset( $settings->fedex_account_number ) ?esc_textarea( $settings->fedex_account_number ): '';



$othersettings = array();

$othersetting = isset( $settings->otherSettings ) ? json_decode( $settings->otherSettings ) : '';



//otherSettings...

$shipperAddress = isset( $othersetting->ShipperAddress ) ?esc_textarea( $othersetting->ShipperAddress) : '';

$shipperCity = isset( $othersetting->ShipperCity ) ?esc_textarea( $othersetting->ShipperCity) : '';

$shipperState = isset( $othersetting->ShipperState ) ?esc_textarea( $othersetting->ShipperState) : '';

$shipperZip = isset( $othersetting->ShipperZip ) ?esc_textarea( $othersetting->ShipperZip) : '';

$shipperCountry = isset( $othersetting->ShipperCountry ) ?esc_textarea( $othersetting->ShipperCountry) : '';

$physicalAddress = isset( $othersetting->physicalAddress ) ?esc_textarea( $othersetting->physicalAddress) : '';

$physicalCity = isset( $othersetting->physicalCity ) ?esc_textarea( $othersetting->physicalCity) : '';

$physicalState = isset( $othersetting->physicalState ) ?esc_textarea( $othersetting->physicalState) : '';

$physicalZip = isset( $othersetting->physicalZip ) ?esc_textarea( $othersetting->physicalZip) : '';

$physicalCountry = isset( $othersetting->physicalCountry ) ?esc_textarea( $othersetting->physicalCountry) : '';

$thirdPartyAccountNumber = isset( $othersetting->third_party_account ) ?esc_textarea( $othersetting->third_party_account) : '';

 ?>

 

    <div class="form-body">

     	<div class="form-group">

            <label class="control-label"><?php echo $sp_strings['billingAccountNumber']; ?> 

                <span class="required"> * </span>

            </label>

            <input name="billingAccountNumber" type="text" data-msg-required="<?php echo $sp_strings['err_billingAccountNumber']; ?> " class="form-control" required value="<?php echo $billingAccountNumber; ?>"/>

            <span class="help-block"> e.g: 5500 0000 0000 0004 </span>

        </div>



        <div class="form-group">

            <label class="control-label"><?php echo $sp_strings['meterNumber']; ?> 

                <span class="required"> * </span>

            </label>

                <input name="meterNumber" type="number" class="form-control" data-msg-required="<?php echo $sp_strings['err_meterNumber']; ?>" required value="<?php echo $meterNumber; ?>"/>

                <span class="help-block"> e.g: 5500 0000 0000 0004 </span>

        </div>

        <div class="form-group">

                <label class="control-label "><?php echo $sp_strings['password']; ?>

                    <span class="required"> * </span>

                </label>

                

                    <input type="text" name="password" data-required="1" class="form-control" data-msg-required="<?php echo $sp_strings['err_password']; ?>" required value="<?php echo $password; ?>"/>

        </div>

              <div class="form-group">

                <label class="control-label "><?php echo $sp_strings['authenticationKey']; ?>

                    <span class="required"> * </span>

                </label>

                

                    <input type="text" name="authenticationKey" data-required="1" data-msg-required="<?php echo $sp_strings['err_authenticationKey']; ?>" class="form-control" required value="<?php echo $authenticationKey; ?>"/>

             </div>

             <div class="form-group">

                <label class="control-label"><?php echo $sp_strings['shipperAccountNumber']; ?> 

                    <span class="required"> * </span>

                </label>

               

                    <input name="shipperAccountNumber" type="number" class="form-control" data-msg-required="<?php echo $sp_strings['err_shipperAccountNumber']; ?>" required value="<?php echo $shipperAccountNumber; ?>"/>

                    <span class="help-block"> e.g: 5500 0000 0000 0004 </span>

                

            </div>

             <div class="form-group">

                <label class="control-label"><?php echo $sp_strings['shipperAddress']; ?>

                    <span class="required"> * </span>

                </label>

                <div class="row">

                <div class="col-sm-4">

                    <input type="text" name="shipperAddress" data-required="1" class="form-control" placeholder="Address" data-msg-required="<?php echo $sp_strings['err_shipperAddress']; ?>" required value="<?php echo $shipperAddress; ?>"/>

                  </div>

                   <div class="col-sm-4">

                    <input type="text" name="shipperCity" data-required="1" class="form-control" placeholder="City" data-msg-required="<?php echo $sp_strings['err_shipperCity']; ?>" required value="<?php echo $shipperCity; ?>"/>

                  </div>

                  <div class="col-sm-4">

                    <input type="text" name="shipperState" data-required="1" class="form-control" placeholder="State" data-msg-required="<?php echo $sp_strings['err_shipperState']; ?>" required value="<?php echo $shipperState; ?>"/>

                  </div>

                </div>

                <div class="row">

                  <div class="col-sm-4">

                    <input type="text" name="shipperZip" data-required="1" class="form-control" placeholder="Zip" data-msg-required="<?php echo $sp_strings['err_shipperZip']; ?>" required value="<?php echo $shipperZip; ?>"/>

                  </div>

                  <div class="col-sm-4">

                    <input type="text" name="shipperCountry" data-required="1" class="form-control" placeholder="Country" data-msg-required="<?php echo $sp_strings['err_shipperCountry']; ?>" required value="<?php echo $shipperCountry; ?>"/>

                  </div>

                  

                </div>

             </div>


             <div class="form-group">
                <div class="checkbox checkbox-icon-black p-0">
                          <input id="copyBillingToPhysicalCheckbox"  type="checkbox" >
                          <label for="copyBillingToPhysicalCheckbox" >
                              Copy billing address to physical address
                          </label>
                      </div>
             </div>



              <div class="form-group">

                <label class="control-label"><?php echo $sp_strings['physicalAddress']; ?>

                    

                </label>

                <div class="row">

                <div class="col-sm-4">

                    <input type="text" name="physicalAddress" data-required="1" class="form-control" placeholder="Address" data-msg-required="<?php echo $sp_strings['err_physicalAddress']; ?>" value="<?php echo $physicalAddress; ?>"/>

                  </div>

                   <div class="col-sm-4">

                    <input type="text" name="physicalCity" data-required="1" class="form-control" placeholder="City" data-msg-required="<?php echo $sp_strings['err_physicalCity']; ?>" value="<?php echo $physicalCity; ?>"/>

                  </div>

                  <div class="col-sm-4">

                    <input type="text" name="physicalState" data-required="1" class="form-control" placeholder="State" data-msg-required="<?php echo $sp_strings['err_physicalState']; ?>" value="<?php echo $physicalState; ?>"/>

                  </div>

                </div>

                <div class="row">

                  <div class="col-sm-4">

                    <input type="text" name="physicalZip" data-required="1" class="form-control" placeholder="Zip" data-msg-required="<?php echo $sp_strings['err_physicalZip']; ?>" value="<?php echo $physicalZip; ?>"/>

                  </div>

                  <div class="col-sm-4">

                    <input type="text" name="physicalCountry" data-required="1" class="form-control" placeholder="Country" data-msg-required="<?php echo $sp_strings['err_physicalCountry']; ?>" value="<?php echo $physicalCountry; ?>"/>

                  </div>

                  

                </div>

             </div>



             <div class="form-group">

                <label class="control-label"><?php echo $sp_strings['thirdPartyAccountNumber']; ?> 

                

                </label>

               

                    <input name="thirdPartyAccountNumber" type="text" class="form-control" value="<?php echo $thirdPartyAccountNumber; ?>"/>

                    

                

            </div>


              

            </div>

              

        

