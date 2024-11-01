<?php

global $sp_strings;



$accountNumber =  isset( $settings->account_number ) ?esc_textarea( $settings->account_number) : '';

$meterNumber =  isset( $settings->username ) ?esc_textarea( $settings->username) : '';

$password =  isset( $settings->password ) ?esc_textarea( $settings->password) : '';

$authenticationKey =  isset( $settings->authentication_key ) ?esc_textarea( $settings->authentication_key) : '';



?>



                <div class="form-body">



  

          <div class="form-group">

            <label class="control-label"><?php echo $sp_strings['accountNumber']; ?> 

              <span class="required"> * </span>

            </label>



            <input name="accountNumber" type="text" class="form-control" value="<?php echo $accountNumber; ?>" required/>

            <span class="help-block"> e.g: 5500 0000 0000 0004 </span>



          </div>



          <div class="form-group">

            <label class="control-label"><?php echo $sp_strings['meterNumber']; ?> 

              <span class="required"> * </span>

            </label>



            <input name="meterNumber" type="number" class="form-control" value="<?php echo $meterNumber; ?>" required/>





          </div>



          <div class="form-group">

            <label class="control-label "><?php echo $sp_strings['password']; ?>

              <span class="required"> * </span>

            </label>



            <input type="text" name="password" data-required="1" class="form-control" value="<?php echo $password; ?>" required/>

          </div>

          <div class="form-group">

            <label class="control-label "><?php echo $sp_strings['authenticationKey']; ?>

              <span class="required"> * </span>

            </label>



            <input type="text" name="authenticationKey" data-required="1" class="form-control" value="<?php echo $authenticationKey; ?>" required/>

          </div>



                </div>



            

            