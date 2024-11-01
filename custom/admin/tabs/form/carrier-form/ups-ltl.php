 <?php

global $sp_strings;



$accountNumber = isset( $settings->account_number ) ?esc_textarea( $settings->account_number) : '';

$userName = isset( $settings->username ) ?esc_textarea( $settings->username) : '';

$password = isset( $settings->password ) ?esc_textarea( $settings->password) : '';

$UPSAPIAccessKey = isset( $settings->authentication_key ) ?esc_textarea( $settings->authentication_key) : '';



$othersettings = array();

$othersetting = isset( $settings->otherSettings ) ? json_decode( $settings->otherSettings ) : '';

$accessLevel = isset( $othersetting->accessLevel ) ? esc_textarea($othersetting->accessLevel) : '';



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

                <label class="control-label"><?php echo $sp_strings['userName']; ?> 

                    <span class="required"> * </span>

                </label>

               

                    <input name="userName" type="text" class="form-control" value="<?php echo $userName; ?>" required/>

                    

                

            </div>

                <div class="form-group">

                <label class="control-label "><?php echo $sp_strings['password']; ?>

                    <span class="required"> * </span>

                </label>

                

                    <input type="text" name="password" data-required="1" class="form-control" value="<?php echo $password; ?>" required/>

             </div>

              <div class="form-group">

                <label class="control-label "><?php echo $sp_strings['UPSAPIAccessKey']; ?>

                    <span class="required"> * </span>

                </label>

                

                    <input type="text" name="UPSAPIAccessKey" data-required="1" class="form-control" value="<?php echo $UPSAPIAccessKey; ?>" required/>

             </div>

             <div class="form-group">

                <label class="control-label"><?php echo $sp_strings['access_level']; ?> 

                    <span class="required"> * </span>

                </label>

              </div>

               <div class="form-group">

               

                    <div class="custom-control custom-radio custom-control-inline">

                    <input type="radio" class="custom-control-input" id="accessLevel1" checked="true" name="accessLevel" value=test <?php echo ($accessLevel=='test'?'checked':'') ?>>

                    <label class="custom-control-label" for="accessLevel1"><?php echo $sp_strings['accessLevel1']; ?></label>

                  </div>



                  <div class="custom-control custom-radio custom-control-inline">

                    <input type="radio" class="custom-control-input" id="accessLevel2" name="accessLevel" value=pro <?php echo ($accessLevel=='pro'?'checked':'') ?>/>

                    <label class="custom-control-label" for="accessLevel2"><?php echo $sp_strings['accessLevel2']; ?></label>

                  </div>

                

            </div>

             

         

              

            </div>


              

        

       